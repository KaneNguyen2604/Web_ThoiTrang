<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
 use App\Cate;
class CateController extends Controller
{
	public function getList()
	{
		$data =Cate::select('id', 'name' , 'parent_id')->orderBy('id','DESC')->get();
    	return view('admin.cate.list',compact('data'));
	}
    public function getAdd(){
    	//$parent =Cate::all(); 
    	$parent =Cate::select('id', 'name' , 'parent_id')->get();
    	return view('admin.cate.add',compact('parent'));
    }
    public function postAdd(CateRequest $request){
    	
    	$cate = new Cate();
    	$cate->name = $request->txtCateName;
    	$cate->alias = str_slug($request->txtCateName,'-');
    	//Cách 2 mình tự tạo hàm
    	//$cate->alias = changeTitle($request->txtCateName);
    	$cate->order = $request->txtOrder;
    	$cate->parent_id = $request->srtParent;
    	$cate->keywords = $request->txtKeywords;
    	$cate->description = $request->txtDescription;
    	$cate->save();
   
    	 return redirect('admin/cate/list')->with(['flash_level'=>'success','flash_message'=>'Success !! complete add category']);

    }
    public function getDelete($id){
    	$parent = Cate::where('parent_id',$id)->count();
    	if ($parent == 0) {
    		$cate = Cate::find($id);//tim id trong modle the loai app/TheLoai   	
    		$cate->delete($id);
     		return redirect('admin/cate/list')->with(['flash_level'=>'success','flash_message'=>'Success !! complete delete category']);
    	}else{
    		
    
    		echo "<script type='text/javascript'>
    		 alert('Sorry! You can not delete this category');
    		 window.location='";
    		        echo route('ListCate'); 
    				
    				echo "'
    		</script>";
    	
    		 

    	}

    	

    }
    public function getEdit($id){
    	$data = Cate::findOrFail($id);
    	$parent =Cate::select('id', 'name' , 'parent_id')->get();
    	return view('admin.cate.edit',compact('parent','data'));

    }
    public function postEdit(Request $request,$id){
    	$this->validate($request,
    		[   			
    			'txtCateName'=>'required',
    		
    		],[
    	
    			'txtCateName.required'=>'please Enter category 1'
    		
    		]);
    	$cate = Cate::find($id);
        $cate->name = $request->txtCateName;
    	$cate->alias = str_slug($request->txtCateName,'-');
    	$cate->order = $request->txtOrder;
    	$cate->parent_id = $request->srtParent;
    	$cate->keywords = $request->txtKeywords;
    	$cate->description = $request->txtDescription;
    	$cate->save();
    	 return redirect('admin/cate/list')->with(['flash_level'=>'success','flash_message'=>'Success !! complete Edit category']);

    }
}
