@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="wrapper">
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Mới Giáo Viên
                        </h1>
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>

                            @endforeach
                        </div>
                        @endif
                        @if(Session::has('message'))
                        <div class="alert alert-danger">{{Session::get('message')}}</div>
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                     <form name="ajax-form" id="contact-form2" action="addteacher" method="post" >
                         {!!csrf_field()!!}

                         <div class="form-group">
                            <label>Tài Khoản</label>
                            <input class="form-control" name="username" placeholder="Please Enter Name" required />
                        </div>
                        <div class="form-group">
                            <label>Mã Cán Bộ</label>
                            <input class="form-control" name="maCB" placeholder="Please Enter Name" required />
                        </div>

                        <div class="form-group">
                            <label>Tên Đầy Đủ</label>
                            <input class="form-control" name="fullname" placeholder="Please Enter Name" required />
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input class="form-control" name="email" placeholder="Please Enter Email" required type="email" />
                       </div>

                       <div class="form-group">
                           <label>Password</label>
                           <input class="form-control" id="password" name="password" required="" placeholder="Mật Khẩu" type="password">							
                       </div>
                       <div class="form-group">
                        <label>Phòng Ban</label>
                        <select class="form-control" name="id_department" id="category">
                            @foreach($dep as $c)
                            <option value="{{$c->id}}">{{$c->department_name}}</option>
                            @endforeach    
                        </select>
                    </div>

                    <div class="form-group">
                       <label>Học Vị</label>
                       <input class="form-control" name="hocvi" placeholder="Please Enter Address" required />
                   </div>
                   <div class="form-group">
                       <label>Số Điện Thoại</label>
                       <input class="form-control" name="phone" placeholder="Please Enter Avatar" required />
                   </div>

                   <div class="form-group">
                    <input name="submit" class="btn btn-primary" value="Thêm" id="send" type="submit">
                </div>

            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
</div>
</div>
<!-- /#page-wrapper -->
@endsection