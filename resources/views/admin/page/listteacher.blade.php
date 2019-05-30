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
                                <h3 class="panel-title">Danh Sách Giáo Viên</h3>
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
                           <form method="post" enctype="multipart/form-data" action="{{ url('importexcel') }}">
                               {{ csrf_field() }}
                               <div class="form-group">
                                  <table class="table">
                                     <tr>
                                        <td width="30%">
                                           <input type="file" name="select_file" required />
                                       </td>
                                       <td width="30%" align="left">
                                           <input type="submit" name="upload" class="btn btn-primary" value="Import excel">
                                       </td>
                                       <td width="40%" align="right">
                                          <button class="btn btn-primary"><a href="addteacher" style="color: white">Thêm Mới</a></button>
                                      </td>
                                  </tr>
                              </table>
                          </div>
                      </form>
                  </div>
                  <div class="panel-body">
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Mã CB</th>
                                <th>Họ Tên</th>
                                <th>Tên Tài Khoản</th>
                                <th>Email</th>
                                <th>Học Vị</th>
                                <th>Đơn Vị Công Tác</th>
                                <th>Hành động </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                        	@foreach($users as $u)
                            <tr class="odd gradeX" align="center">
                                <td>{{++$i}}</td>
                                <td style="width: 10px">{{$u->maCB}}</td>
                                <td>{{$u->fullname}}</td>
                                <td>{{$u->username}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->hocvi}}</td>
                                <td>{{$u->department->department_name}}</td>
                                <td class="center">
                                 <a href="editteacher/{{$u->id}}" title="Sửa"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                                 <a href="deleteteacher/{{$u->id}}" title="Xóa"> <i class="fa fa-trash-o" aria-hidden="true"></i></a> 
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