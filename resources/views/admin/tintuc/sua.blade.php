  @extends('admin.layout.index')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>{{$tintuc->TieuDe}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-10" style="padding-bottom:120px">
                          @if(count($errors)>0)<!-- Đếm thông báo lỗi -->
                        <div class="alert alert-danger">
                           @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach  
                        </div>                          
                        @endif
                        <!-- In thong bao -->
                         @if(session('thongbao'))
                          <div class="alert alert-success">
                            
                            {{session('thongbao')}}
                        
                        </div> 
                        @endif
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" enctype="multipart/form-data"method="POST">
                              {{ csrf_field() }}
                             <input type="hidden" name="_token" value="{{csrf_token()}}" >
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                    @if($tintuc->loaitin->theloai->id == $tl->id)
                                    {{"selected"}}
                                    @endif
                                    <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại tin</label>
                                   <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                    @if($tintuc->loaitin->id == $lt->id)
                                    {{"selected"}}
                                    @endif
                                    <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" value="{{$tintuc->TieuDe}}" />
                            </div>
                           
                        
                            <div class="form-group">
                                <label>Tóm tăt</label>
                                <textarea class="form-control ckeditor" name="TomTat" id="demo" rows="3" >{{$tintuc->TomTat}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                
                                
                                <textarea class="form-control ckeditor" name="NoiDung" id="demo" rows="3" >{{$tintuc->NoiDung}}</textarea>
                            </div>

                             <div class="form-group">
                                <label>Hình ảnh</label>
                                <p><img width="400px" src="upload/tintuc/{{$tintuc->Hinh}}" alt=""></p>
                                <input type="file" name="Hinh"  class="form-control" />
                            </div>

                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" checked=""
                                    @if($tintuc->NoiBat == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="2" @if($tintuc->NoiBat == 1)
                                    {{"checked"}}
                                    @endif type="radio">Có
                                </label>
                            </div>

                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình luận
                            <small>danh sách</small>
                        </h1>
                            <div>
                       <!--in thong báo-->
                             @if(session('thongbao'))
                          <div class="alert alert-success">
                            
                            {{session('thongbao')}}
                        
                        </div> 
                        @endif  
                    </div>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Nguời dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                               
                                <th>Delete</th>
                      
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc->comment as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td><p>{{$cm->user->name}}</td>
                                <td>{{$cm->NoiDung}}</td>
                                <td>{{$cm->created_at}}</td>
                               

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$tintuc->id}}">Xóa</a></td>
                             
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("#TheLoai").change(function(){  
             var idTheLoai = $(this).val();
              //alert(idTheLoai);
              $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                //alert(data);
                    $("#LoaiTin").html(data);//thay doi toan bo du lieu ben trong thay du lieu moi
              });
      });
  });
</script>

@endsection