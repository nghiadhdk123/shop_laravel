@extends("backend.layoutss.master")
<style>
    .inf-content{
        border:1px solid #DDDDDD;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
    }			       
</style>
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thông tin người dùng</h1>
            </div><!-- /.col -->
            
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('main-content')
        <div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
            @if(!$vale->avatar)
                <img alt="" style="width:500px;height:400px" title="" class="img-circle img-thumbnail isTooltip" src="https://st.quantrimang.com/photos/image/072015/22/avatar.jpg" data-original-title="Usuario">
            @else
                <img alt="" style="width:500px;height:400px" title="" class="img-circle img-thumbnail isTooltip" src="{{ \Illuminate\Support\Facades\Storage::url($vale->avatar) }}" data-original-title="Usuario">
            @endif
            <ul title="Ratings" class="list-inline ratings text-center">
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <strong>Thông tin</strong><br>
            <div class="table-responsive">
            <table class="table table-user-information">
                <tbody>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                    Mã Mật                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{$vale->id}}     
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                Tên người dùng                                             
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{ $vale->name }}    
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                Email                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{ $vale->email }} 
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                Số điện thoại                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{ $vale->userinfor->phone }} 
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                Địa chỉ                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{ $vale->userinfor->address }}
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Chức vụ                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            @if($vale->role == 2)
                                <p>Admin</p>
                            @endif
                            @if($vale->role == 1)
                                <p>User</p>
                            @endif
                            @if($vale->role == 3)
                                <p>Boss</p>
                            @endif  
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                Thời gian tạo                                           
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{ $vale->created_at }}
                        </td>
                    </tr>                                    
                </tbody>
            </table>
            </div>
            
        </div>
    </div>
</div>
</div>     
<a href="{{ route('user.index') }}" class="btn btn-primary" style="display:block;width:150px;margin:5% auto">Back</a>
@endsection