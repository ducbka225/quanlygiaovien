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
                                    </div>
                                    <div class="w3-right" style="margin-right: 25px">
                                    	<button class="btn-primary">Thêm Mới</button>
                                    	<button class="btn-primary">Thêm Từ excel</button>
                                    </div>
                                    <br>
                <div class="panel-body">
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Nội dung phụ</th>
                                <th>Nội dung </th>
                                <th>Hành động </th>
                            </tr>
                        </thead>
                        <tbody>
                        	
                            <tr class="odd gradeX" align="center">
                                <td>a</td>
                                <td>b</td>
                                <td>â</td>
                                <td>c</td>
                                <td>a</td>
                                <td class="center">
							        <a href="deletepost" title="Xóa"> Xóa<i class="fa fa-trash-o  fa-fw"></i></a> 
                                </td>
                            </tr>
                            
                            
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