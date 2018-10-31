<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
 use App\Cate;
 use App\Product;
 use App\ProductImage;
 use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    public function getList()	{
        $data =product::select('id', 'name', 'price','featured','views','cate_id','created_at')->orderBy('id','DESC')->get();
        return view('admin.product.list',compact('data'));
	}
    public function getAdd(){
    	$cate =cate::select('id', 'name' , 'parent_id')->get();
    	return view('admin.product.add',compact('cate'));
    	
    }
    public function postAdd(ProductRequest $request){
       
        $product = new Product();
        $product->name = $request->txtName;
        $product->alias = str_slug($request->txtName);
        $product->price =$request->txtPrice;
        $product->intro =$request->txtIntro;
        $product->content =$request->txtContent;
       // $product->image =$request->fImages;
        if($request->hasFile('fImages'))
        {
            $file = $request->file('fImages');

        
            $name = $file->getClientOriginalName();//LayTenHinh
            $Hinh =  str_random(4)."_".$name;//chuyen chuoir random de cho no khac
            while(file_exists("upload/images/Products/".$Hinh))
            {
                $Hinh =  str_random(4)."_".$name;
            }
            $file->move("upload/images/Products/",$Hinh);//Luu hinh
            $product->image=$Hinh;
        }
        else
        {
            $product->image ="";
        }
        $product->keywords=$request->txtKeywords;
        $product->description =$request->txtDescription;
        $product->featured = $request->rdoFeatured;
        $product->views= 0;
        $product->user_id =1;//login
        $product->cate_id= $request->srtParent;
         $product->save();
        $product_id = $product->id;
        if($request->hasFile('fProductDetail'))//kiem ta co hinh hay khong
        {
            //duyêt các phần tử có hình
            foreach ($request->file('fProductDetail') as $file) {
               $product_image = new ProductImage();
               if(isset($file)){
                $product_image->image = $file->getClientOriginalName();
                $product_image->product_id = $product_id;//lấy id đi của product
                 $file->move("upload/images/Products_Detail/",$file->getClientOriginalName());
                 $product_image->save();
               }
            }
           
        }
       



    }
    public function getDelete($id){
    }
    public function getEdit($id){
   
    }
    public function postEdit(Request $request,$id){

    }
}
