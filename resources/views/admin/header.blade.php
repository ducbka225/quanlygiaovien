
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand" style="padding: 0;">
				<a href="admin/index"><img src="assets/img/logo.png" alt="Quanlygiaovien" class="img-responsive logo" width="80%"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
					</div>
				</form>
				<div class="navbar-btn navbar-btn-right">
					
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown" style="margin-top: 30px;">
							@if(Auth::check())
							<p>
							<span>Xin Chào: {{Auth::user()->fullname}}</span>  |
							<a href="admin/logout"><i class="lnr lnr-exit"></i> <span>Đăng xuất</span></a>
							</p>
		                   @endif 
						</li>
				
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
				
						<li>
							<a href="/listteacher" ><i class="fa fa-users" aria-hidden="true"></i> <span>Quản Lý Cán Bộ</span></a>
						</li>
						<li>
							<a href="/listres" ><i class="fa fa-book" aria-hidden="true"></i> <span>Lĩnh Vực Nghiên Cứu</span></a>
						</li>
						<li>
							<a href="#subpage" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Quản Lý Đơn Vị</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subpage" class="collapse">
								<ul class="nav">
									<li><a href="quanlydonvi" class="">Danh Sách Đơn vị</a></li>
									<li><a href="adddep" class="">Thêm Mới</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
				<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->

