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
						<h1 class="page-header">Thêm Mới Lĩnh Vực Nghiên Cứu
						</h1>
						@if(Session::has('message'))
						<div class="alert alert-danger">{{Session::get('message')}}</div>
						@endif
					</div>
					<!-- /.col-lg-12 -->
					<div class="col-lg-7" style="padding-bottom:120px">

						<form name="ajax-form" id="contact-form2" action="addres" method="post" >
							{!!csrf_field()!!}

							<div class="form-group">
								<label>Lĩnh Vực Nghiên Cứu</label>
								<input class="form-control" name="research_field" required />
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