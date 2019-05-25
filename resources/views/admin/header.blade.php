
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="admin/index"><img src="assets/img/logo-dark.png" alt="Quanlygiaovien" class="img-responsive logo"></a>
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
						
						<li class="dropdown">
							
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="assets/img/user.png" class="img-circle" alt="Avatar">
								 
								   @if(Auth::check())
				                    <span>{{Auth::user()->name}}</span> 
				                   @endif 
								 
								 <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>Thông tin cá nhân</span></a></li>
								<li><a href="admin/logout"><i class="lnr lnr-exit"></i> <span>Đăng xuất</span></a></li>
							</ul>
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
							<a href="/listteacher" ><i class="lnr lnr-file-empty"></i> <span>Quản Lý Cán Bộ</span></a>
						</li>
						<li>
							<a href="/listres" ><i class="lnr lnr-file-empty"></i> <span>Lĩnh Vực Nghiên Cứu</span></a>
						</li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Quản Lý Đơn Vị</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="quanlydonvi" class="">Danh Sách Đơn vị</a></li>
									<li><a href="adddonvi" class="">Thêm Mới</a></li>
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

