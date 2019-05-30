@extends('admin.master')
@section('content')
<div id="wrapper">

    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <!-- BASIC TABLE -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Đơn Vị</h3>
                                @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                 <ul>
                                  @foreach($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                          @endif

                          @if($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}</div>
                        @endif
                    </div>
                    <div>

                        <div class="form-group">
                         <table class="table">
                          <tr>
                            <td width="40%" align="right">
                                <button class="btn btn-primary"><a href="adddep" style="color: white">Thêm Mới</a></button>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="panel-body">
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên Đơn Vị</th>
                            <th>Loại Đơn Vị</th>
                            <th>Địa Chỉ</th>
                            <th>Số Điện Thoại </th>
                            <th>Website </th>
                            <th>Hành Động </th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($dep as $d)
                     <tr class="odd gradeX" align="center">
                        <td>{{$d->id}}</td>
                        <td>{{$d->department_name}}</td>
                        <td>{{$d->typedepartment}}</td>
                        <td>{{$d->address}}</td>
                        <td>{{$d->phone}}</td>
                        <td>{{$d->website}}</td>
                        <td class="center">
                            <a href="editdep/{{$d->id}}" title="Sửa"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                            <a href="deletedep/{{$d->id}}" title="Xóa"> <i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>      
</div>
</div>   
</div>
</div>         
<!-- /.container-fluid -->
</div>
</div>    
@endsection