@extends('backend.layoutss.master')

@section('main-content')
<div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Phân quyền người dùng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('user.updatepq',$pq->id) }}">
                    @csrf
                        
                    <div class="form-group">
                    <select name="role" id="" class="form-control">
			       		<option value="{{ $pq->role }}" disabled="disabled" selected="selected">{{ $pq->role }}</option>
					    <option value="1">1-User</option>				
					    <option value="2">2-Admin</option>				
					    <option value="3">3-Boss</option>				
			       </select>
                    </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('user.index') }}" class="btn btn-danger">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-sucess">Phân quyền</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection