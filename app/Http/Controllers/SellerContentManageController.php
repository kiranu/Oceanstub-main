<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SellerContentManagement;
use App\Models\Seller;
use Redirect;
use File;
use Hash;
use Session;
use Auth;
use DB;
use Carbon\Carbon;
use Validator;
use Response;

class SellerContentManageController extends Controller
{
  public function get_ReturnPolicy()
  {
    if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
    $policy = SellerContentManagement::where('seller_id',$seller_id)->first();
   
   return view('seller.content_management.return_policy',compact('policy'));
  }

   public function getEdit_ReturnPolicy($id)
  {


     if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

        $policy = SellerContentManagement::where('id',$id)->first();
   return view('seller.content_management.edit_return_policy',compact('policy'));
  }
public function get_PrivacyPolicy()
  {
    if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
    $policy = SellerContentManagement::where('seller_id',$seller_id)->first();
   
   return view('seller.content_management.privacy_and_policy',compact('policy'));
  }

   public function getEdit_PrivacyPolicy($id)
  {


     if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

        $policy = SellerContentManagement::where('id',$id)->first();
   return view('seller.content_management.edit_privacy_and_policy',compact('policy'));
  }


public function get_TermsOfUse()
  {
    if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
    $policy = SellerContentManagement::where('seller_id',$seller_id)->first();
   
   return view('seller.content_management.terms_of_use',compact('policy'));
  }

   public function getEdit_TermsOfUse($id)
  {


     if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

        $policy = SellerContentManagement::where('id',$id)->first();
   return view('seller.content_management.edit_terms_of_use',compact('policy'));
  }

  public function get_TermsOfPurchase()
  {
    if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
    $policy = SellerContentManagement::where('seller_id',$seller_id)->first();
   
   return view('seller.content_management.terms_of_purchase',compact('policy'));
  }

   public function getEdit_TermsOfPurchase($id)
  {


     if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

        $policy = SellerContentManagement::where('id',$id)->first();
   return view('seller.content_management.edit_terms_of_purchase',compact('policy'));
  }
public function get_AboutUs()
  {
    if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
    $policy = SellerContentManagement::where('seller_id',$seller_id)->first();
   
   return view('seller.content_management.about_us',compact('policy'));
  }

   public function getEdit_AboutUs($id)
  {


     if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

        $policy = SellerContentManagement::where('id',$id)->first();
   return view('seller.content_management.edit_about_us',compact('policy'));
  }
  public function getAdd_content()
  {
      if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
       $content =null;
       $content = SellerContentManagement::where('seller_id',$seller_id)->first();
      
return view('seller.content_management.create_content',compact('content'));
  }

 public function store_content(Request $request)
  {
   
   

     if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

       $policy = new SellerContentManagement;
        $policy->seller_id = $seller_id;

       if($request->ReturnPolicyContent)
       {
         $content = $request->ReturnPolicyContent;            
         $dom = new \DomDocument();
         libxml_use_internal_errors(true);
         $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
         libxml_clear_errors();   
         $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img)
        {
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

       $return_policy = $dom->saveHTML();
       $policy->return_policy = $return_policy;
       }
       
if($request->PrivacyPolicyContent){
 $privacy_policy = $request->PrivacyPolicyContent;
  $dom = new \DomDocument();
         libxml_use_internal_errors(true);
         $dom->loadHtml($privacy_policy, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
         libxml_clear_errors();   
         $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img)
        {
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

       $privacy_policy = $dom->saveHTML();
       $policy->privacy_policy =$privacy_policy ;
}


      if($request->TermsOfUseContent)
      {
 $terms_of_use = $request->TermsOfUseContent;
  $dom = new \DomDocument();
         libxml_use_internal_errors(true);
         $dom->loadHtml($terms_of_use, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
         libxml_clear_errors();   
         $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img)
        {
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

      $terms_of_use = $dom->saveHTML();
        $policy->terms_of_use =$terms_of_use ;
} 
      
       
      if($request->TermsOfPurchersContent)
      {
 $terms_of_purchase = $request->TermsOfPurchersContent;
  $dom = new \DomDocument();
         libxml_use_internal_errors(true);
         $dom->loadHtml($terms_of_purchase, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
         libxml_clear_errors();   
         $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img)
        {
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

      $terms_of_purchase = $dom->saveHTML();
        $policy->terms_of_purchase =$terms_of_purchase ;
} 
       
     if($request->AboutUsContent)
      {
 $about_us = $request->AboutUsContent;
  $dom = new \DomDocument();
         libxml_use_internal_errors(true);
         $dom->loadHtml($about_us, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
         libxml_clear_errors();   
         $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img)
        {
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

      $about_us = $dom->saveHTML();
        $policy->about_us = $about_us;
     } 

       try{
       $policy->save();
       return response()->json(['status' => 1,'msg'=>'Created..!']);
        }  
        catch (exception $e) 
        {
             report($e);
             return false;
        }
    
  }

  public function update_content(Request $request)
  {
    $id=$request->id;
    if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }


       if($request->ReturnPolicyContent)
       {
         $content = $request->ReturnPolicyContent;            
         $dom = new \DomDocument();
         libxml_use_internal_errors(true);
         $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
         libxml_clear_errors();   
         $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img)
        {
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

       $return_policy = $dom->saveHTML();
   try{
        SellerContentManagement::where('id',$id)
                          ->update(['return_policy'=>$return_policy,
                                    ]);
       
        }  
        catch (exception $e) 
        {
             report($e);
             return false;
        }
                                 }
       
if($request->PrivacyPolicyContent){
 $privacy_policy = $request->PrivacyPolicyContent;
  $dom = new \DomDocument();
         libxml_use_internal_errors(true);
         $dom->loadHtml($privacy_policy, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
         libxml_clear_errors();   
         $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img)
        {
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

       $privacy_policy = $dom->saveHTML();
       try{
        SellerContentManagement::where('id',$id)
                          ->update([
                                     'privacy_policy'=>$privacy_policy,
                                     ]);
       
        }  
        catch (exception $e) 
        {
             report($e);
             return false;
        }
   
}


      if($request->TermsOfUseContent)
      {
 $terms_of_use = $request->TermsOfUseContent;
  $dom = new \DomDocument();
         libxml_use_internal_errors(true);
         $dom->loadHtml($terms_of_use, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
         libxml_clear_errors();   
         $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img)
        {
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

      $terms_of_use = $dom->saveHTML();
      try{
        SellerContentManagement::where('id',$id)
                          ->update([
                                     'terms_of_use' =>$terms_of_use,
                                     ]);
      
        }  
        catch (exception $e) 
        {
             report($e);
             return false;
        }
       
} 
      
       
      if($request->TermsOfPurchersContent)
      {
 $terms_of_purchase = $request->TermsOfPurchersContent;
  $dom = new \DomDocument();
         libxml_use_internal_errors(true);
         $dom->loadHtml($terms_of_purchase, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
         libxml_clear_errors();   
         $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img)
        {
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

      $terms_of_purchase = $dom->saveHTML();
      try{
        SellerContentManagement::where('id',$id)
                          ->update([
                                     'terms_of_purchase'=>$terms_of_purchase,
                                     ]);
      
        }  
        catch (exception $e) 
        {
             report($e);
             return false;
        }
       
}
       
     if($request->AboutUsContent)
      {
 $about_us = $request->AboutUsContent;
  $dom = new \DomDocument();
         libxml_use_internal_errors(true);
         $dom->loadHtml($about_us, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
         libxml_clear_errors();   
         $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img)
        {
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

      $about_us = $dom->saveHTML();
     try{
        SellerContentManagement::where('id',$id)
                          ->update([
                                     'about_us'=>$about_us,]);
      
        }  
        catch (exception $e) 
        {
             report($e);
             return false;
        }
     } 



  


        try{
        
       return response()->json(['status' => 1,'msg'=>'Updated..!']);
        }  
        catch (exception $e) 
        {
             report($e);
             return false;
        }
  }

}
