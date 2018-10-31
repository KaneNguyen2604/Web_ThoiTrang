  @extends('admin.layout.index')

@section('content')
        <!-- Page Content -->
          <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>{{$slide->Ten}}</small>
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
                        <form action="admin/slide/sua/{{$slide->id}}" enctype="multipart/form-data"method="POST">
                              {{ csrf_field() }}
                             <input type="hidden" name="_token" value="{{csrf_token()}}" >
                          
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên slide" value="{{$slide->Ten}}" />
                            </div>
                           
                        
                          
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control ckeditor" name="NoiDung" id="demo" rows="3">{{$slide->NoiDung}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>link</label>
                                <p><img width="500px" src="upload/slide/{{$slide->Hinh}}" alt=""></p>
                                <input class="form-control" name="link" placeholder="Nhập link" value="{{$slide->link}}" />
                            </div>
                           
                             <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="Hinh"  class="form-control" />
                            </div>

                           

                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection