@extends('admin.layout.index')
@section('controller','category') 
@section('action','list') 
@section('content') 
        <!-- Page Content -->
        
                    <!-- /.col-lg-12 -->

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category Parent</th>
                          
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $stt = 0 ?>
                        @foreach($data as $item)

                        <?php $stt+=1; ?>
                            <tr class="odd gradeX" align="center">

                                <td>{!! $stt !!}</td>
                                <td>{!! $item->name!!}</td>
                                <td>
                                   @if($item["parent_id"] == 0)
                                   {!! "None" !!}
                                   @else
                                       <?php 
                                       $parent = DB::table('cates')->where('id',$item["parent_id"])->first();
                                       echo $parent->name;

                                       ?>
                                   @endif


                                </td>
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw" ></i><a onclick="return xatNhanXoa('Bạn có chắc xóa không ?')" href="admin/cate/delete/{{$item->id}} "> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cate/edit/{{$item->id}}">Edit</a></td>
                            </tr>
                    @endforeach()
                        </tbody>
                    </table>
                
        @endsection

  