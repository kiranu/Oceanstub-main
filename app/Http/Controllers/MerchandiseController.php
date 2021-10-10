<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\User;
use App\Models\Seller;
use Validator;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Session;
use redirect;
use Auth;
use Path\To\DomDocument;
use Intervention\Image\ImageManagerStatic;

class MerchandiseController extends Controller
{


  protected function get_merchandise_and_services()
  {
  $merchandise = Merchandise::all();
  if(Auth::check())
       {

       $userId = Auth::user()->id;
       $organizer = User::where('id',$userId)->first();
       $organizer_name = $organizer->seller;
       }else{
        return redirect()->route('seller.login');
       }
  return view('seller.manage_event.merchandise_and_services',compact('merchandise','organizer_name'));
  }


 protected function get_FilterMerchandise()
 {
   $result = QueryBuilder::for(Merchandise::class)
      ->allowedFilters([
        AllowedFilter::scope('id'),
        AllowedFilter::scope('name'),
      ])->get();
    return $result;
 }

    public function get_merchandise()
    {
      if(Auth::check())
       {

       $userId = Auth::user()->id;
       $organizer = User::where('id',$userId)->first();
       $organizer_name = $organizer->seller;
       }else{
        return redirect()->route('seller.login');
       }
    return view('seller.manage_event.merchandise',compact('organizer_name'));
    }


    public function post_merchandise(Request $request){
        
        $validator = Validator::make($request->all(), [
                                     'price' =>'required',
                                    'type' => 'required',
                                    'name' => 'required',
                                    'code' => 'required',
                                    'keyword' => 'required',
                                    'giftcard_price' => 'required',
                                    'sale_price' => 'required',
                                    'event_orginizer' => 'required',
                                     'images' => 'required',
                            'images.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->route('get_add_merchandise')
                        ->withErrors($validator)
                        ->withInput();
        }
    
       

  
    $mer_images= [];
    if($files=$request->file('images')){
        foreach($files as $file){

            $imageName = $file->getClientOriginalName();
            $file->storeAs('uploads', $imageName, 'public');

            $mer_images[]=$imageName;
        }
    }
    /*image end*/









       $description = $request->description;
 
       $dom = new \DomDocument();
       libxml_use_internal_errors(true);
 
       $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
       libxml_clear_errors();   
 
       $images = $dom->getElementsByTagName('img');
 
       foreach($images as $k => $img){
 
 
           $data = $img->getAttribute('src');
 
           list($type, $data) = explode(';', $data);
 
           list($type, $data) = explode(',', $data);
 
           $data = base64_decode($data);
 
           $image_name= "/uploads/" . time().$k.'.png';
 
           $path = public_path() . $image_name;
 
           file_put_contents($path, $data);
 
           $img->removeAttribute('src');
 
           $img->setAttribute('src', $image_name);
 
        }
       
       
        $description = $dom->saveHTML();

 if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
  

                                    
      $data_Merchandise = new  Merchandise();
      $data_Merchandise->seller_id = $seller_id;
      $data_Merchandise->type = $request->type;
      $data_Merchandise->name = $request->name;
      $data_Merchandise->code = $request->code ;
      $data_Merchandise->keyword = $request->keyword;
  
$data_Merchandise->filenames = implode(',',$mer_images);


      if($request->active){
      $data_Merchandise->active = $request->active;
    }
      if($request->featured){
      $data_Merchandise->featured = $request->featured;
    }if($request->soldout){
      $data_Merchandise->sold_out = $request->soldout;
    }
      $data_Merchandise->price = $request->price;
      $data_Merchandise->sale_price = $request->sale_price;
      $data_Merchandise->sortorder = $request->sortorder ;
      $data_Merchandise->tax= $request->tax;
      $data_Merchandise->event_orgainizer = $request->event_orginizer;
      $data_Merchandise->description = $description;
      $data_Merchandise->save();


//       echo "<h1>Title</h1>" , $Title;
 
//    echo "<h2>Description</h2>" , $description;
      return redirect()->back()->with('message', 'Merchandise Created Successfully...!');


    } 

    public function get_edit_merchandise($id)
    {
          if(Auth::check())
       {

       $userId = Auth::user()->id;
       $organizer = User::where('id',$userId)->first();
       $organizer_name = $organizer->seller;
       }else{
        return redirect()->route('seller.login');
       }
          $mer = Merchandise::where('id',$id)->first();
       

    return view('seller.manage_event.edit_merchandise',compact('mer','organizer_name'));
    }
    public function post_edit_merchandise(Request $request)
    {

dd($request->file('images'));
$id= $request->id;
        $validator = Validator::make($request->all(), [
                                     'price' =>'required',
                                    'type' => 'required',
                                    'name' => 'required',
                                    'code' => 'required',
                                    'keyword' => 'required',
                                    
                                    'sale_price' => 'required',
                                    'event_orginizer' => 'required',
                                     
                            'images.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->route('seller.edit_merchandise',$id)
                        ->withErrors($validator)
                        ->withInput();
        }
    
       
 
  
    $mer_images= [];
    if($files=$request->file('images')){
        foreach($files as $file){

            $imageName = $file->getClientOriginalName();
            $file->storeAs('uploads', $imageName, 'public');

            $mer_images[]=$imageName;
        }
    }
    /*image end*/
     


       $description = $request->description;
       $dom = new \DomDocument();
       libxml_use_internal_errors(true);
       $dom->loadHtml($description,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
       libxml_clear_errors();   
       $images = $dom->getElementsByTagName('img');

       foreach($images as $k => $img){
 
 
           $data = $img->getAttribute('src');
 
           list($type, $data) = explode(';', $data);
 
           list($type, $data) = explode(',', $data);
 
           $data = base64_decode($data);
 
           $image_name= "/uploads/" . time().$k.'.png';
 
           $path = public_path() . $image_name;
 
           file_put_contents($path, $data);
 
           $img->removeAttribute('src');
 
           $img->setAttribute('src', $image_name);
 
        }

        $description = $dom->saveHTML();

     
      Merchandise::where('id',$id)->update(['name'=> $request->name,
                                            'type' => $request->type,
                                            'code' => $request->code,
                                            'keyword' => $request->keyword,
                                            'active' => $request->active,
                                            'featured' => $request->featured,
                                            'sold_out' => $request->soldout,
                                            'price' => $request->price,
                                            'sale_price' => $request->sale_price,
                                            'sortorder' => $request->sortorder,
                                            'tax' => $request->tax,
                                            'event_orgainizer' => $request->event_orginizer,
                                            'description' => $description,
                                            'filenames'=>implode(',',$mer_images),
                                            ]);


      return redirect()->back()->with('message', 'Updated Successfully!');

    }
    public function delete($id)
    {
        $mer=Merchandise::findOrfail($id);
        $mer->delete();
        return redirect('/seller/merchandise_and_services')->with('message', ' deleted Successfully...!');
    }


}
