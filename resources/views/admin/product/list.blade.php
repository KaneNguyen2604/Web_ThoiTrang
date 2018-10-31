@extends('admin.layout.index')
@section('controller','product') 
@section('action','list') 
@section('content') 
        <!-- Page Content -->
        
                
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Views</th>
                               
                                <th>Date</th>
                                 <th>Category</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0 ?>
                        @foreach($data as $item)

                        <?php $stt+=1; ?>
                            <tr class="odd gradeX" align="center">
                                <td>{{$stt}}</td>
                                <td>{!! $item->name !!}</td>
                                <td>{!! number_format($item->price) !!} VND</td>
                                <td>{!! $item->views !!}</td>
                                <td>
                               {{--  Hàm php đễ lấy thời gian --}}
                                    {!!
                                     \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() 
                                    !!}
                                </td>
                               {{--  $tt->loaitin->theloai->Ten --}}
                                <td></td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr>
                        @endforeach()
                        </tbody>
                    </table>
        @endsection