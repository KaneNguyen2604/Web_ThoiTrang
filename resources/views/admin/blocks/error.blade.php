     @if(count($errors)>0)<!-- Đếm thông báo lỗi -->
                        <div class="alert alert-danger">
                            <ul>
                                 @foreach($errors->all() as $error)
                             <li> {!! $error !!}</li>
                        
                            @endforeach  
                            </ul>
                          
                        </div>                          
                    @endif