@extends('admin.layout.index')
@section('controller','Product') 
@section('action','add') 
@section('content') 
<form action="admin/product/add" enctype="multipart/form-data" method="POST">
  <div class="col-lg-8" style="padding-bottom:120px">
                    @include('admin.blocks.error')
                        
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="srtParent">
                                    <option value="">Please Choose Category</option>
                                  {{--   Dung de quy  --}}
                                 <?php  cate_parent($cate,0,"--",old('srtParent')) ?>//
                               
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!!old('txtName')!!}" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value= "{!!old('txtPrice')!!}" />
                            </div>
                            <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" name="txtIntro" id="txtIntro">{!!old('txtIntro')!!}</textarea>
                                <script> CKEDITOR.replace('txtIntro');</script>
                                
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="txtContent">{!!old('txtContent')!!}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages" value="{!!old('fImages')!!}">
                            </div>
                            <div class="form-group">
                                <label>Product Keywords</label>
                                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!!old('txtKeywords')!!}" />
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" name="txtDescription">{!!old('txtKeywords')!!}</textarea>
                            </div>
                            {{-- <div class="form-group">
                                <label>Product Status</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Invisible
                                </label>
                            </div> --}}
                            <div class="form-group">
                                <label>Featured </label>
                                <label class="radio-inline">
                                    <input name="rdoFeatured" value="1" checked="" type="radio">No
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoFeatured" value="2" type="radio">Yes
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                       
                    </div>
    <div class="col-md-1">
        
    </div>
    <div class="col-md-4">
             <h2>Image products detail</h2>
           @for($i= 1;$i<=10;$i++)
        <div class="form-group">
            <label>Image product detail {{$i}}</label>
              <input type="file" name="fProductDetail[]" />
        </div>
        @endfor
    </div>
     <form>
@endsection