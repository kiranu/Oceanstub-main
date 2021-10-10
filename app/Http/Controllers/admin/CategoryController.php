<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
class CategoryController extends Controller
{
    public function category()
    {
        $categorys= Category::get();
        // $category=json_decode(json_encode($categorys),true);
        // dd($category);die;
        return view('admin.category.category')->with(compact('categorys'));
    }
    public function addcategory()
    {   $categorys=Category::where(['parent_id'=>0])->where('status',1)->get();
        return view('admin.category.addcategory')->with(compact('categorys'));
    }
    public function update_category_status(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();
            // print_r($data);
            if($data['status']=="Active")
            {
                $status=0;
            }else{
                $status=1;
            }
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }
    public function addcategory_create(Request $request)
    {
        $data=$request->all();
        $request->validate([
            'category_name' => 'unique:categories|required',
        ]);
        $category = new category;

        $category->category_name=$data['category_name'];
        $category->parent_id=$data['parent_id'];

        $category->description=$data['description'];
        if ($request->hasFile('category_image'))
        {
            $filename =$data['category_image'];
           // @unlink('uploads/Admin/Category/head/'.$filename);
            $file = $request->file('category_image');
            $extention = $file->getClientOriginalExtension();
            $filename =time().'.'.$extention;
            $files='uploads/Admin/Category/'.$filename;
            $file->move('uploads/Admin/Category/',$filename);
            $category->category_image=$filename;
        }
        $category->status=1;

        $category->save();
        $request->session()->flash('succes_message', 'Category Added Succesfully');
        return redirect("/admin/category");
    }
    public function category_edit($id)
    {
        $category =Category::where('id',$id)->first();
        // $categorys=json_decode(json_encode($categorys),true);
        $categorys=Category::with('subcategory')->where('id','!=',$id)->where(['parent_id'=>0])->get();
        // $getcategories=json_decode(json_encode($getcategories),true);


        return view('admin.category.editcategory')->with(compact('categorys','category'));


    }
    public function category_delete($id)
    {
        $categorys =Category::with('subcategory')->find($id);
        if (!empty($categorys['subcategory'])){
            foreach ($categorys['subcategory'] as $category){
                $filename =$category['category_image'];
                @unlink('uploads/Admin/Category/'.$filename);
                $category->delete();
            }
        }
        Session::flash('danger_message','Category Deleted Successfully');
        $filename =$categorys['category_image'];
        @unlink('uploads/Admin/Category/'.$filename);
        $categorys->delete();
        return redirect("/admin/category");
    }
    public function category_update(Request $request,$id)
    {
        $data=$request->all();
        $request->validate([
            'category_name' => 'required',
        ]);
        $category =Category::find($id);

        $category->category_name=$data['category_name'];
        $category->parent_id=$data['parent_id'];
        $category->description=$data['description'];
        if ($request->hasFile('category_image'))
        {
            $filename =$data['category_image'];
           @unlink('uploads/Admin/Category/'.$filename);
            $file = $request->file('category_image');
            $extention = $file->getClientOriginalExtension();
            $filename =time().'.'.$extention;
            $files='uploads/Admin/Category/'.$filename;
            $file->move('uploads/Admin/Category/',$filename);
            $category->category_image=$filename;
        }
        $category->update();
        $request->session()->flash('succes_message', 'Category Updated Succesfully');
        return redirect("/admin/category");
    }

}
