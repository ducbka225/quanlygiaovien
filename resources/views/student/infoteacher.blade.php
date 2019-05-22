@extends('master')
@section('content')
<div class="container-fluid">
	<hr>
  <div class="row">
  	<div class="col-sm-2"></div>
    <div class="col-sm-5" >
    	<div id="info-gv" style="padding-left: 30px">
    		<p class="title-tt">PGS.TS. Giảng Viên A</p>
	    	<p>Đơn vị: abc</p>
	    	<p>Học vị, hàm vị: PGS.TS</p>
	    	<p>VNU email: abcd.xyz@gmail</p>
	    	<p>Website: bla bla</p>
    	</div>
    	<hr>
    	<div id="topic" style="padding-left: 30px">
    		<p class="title-tt">Chủ đề nghiên cứu</p>
	    	<ul style="list-style-type: none; padding: 0;">
	    		<li>chủ đề 1</li>
	    		<li>chủ đề 2</li>
	    		<li>chủ đề 3</li>
	    	</ul>
    	</div>
    	<hr>
    	<div id="field" style="padding-left: 30px">
    		<p class="title-tt">Lĩnh Vực Quan Tâm</p>
	    	<ul>
	    		<li>lĩnh vực 1</li>
	    		<li>lĩnh vực 2</li>
	    		<li>lĩnh vực 3</li>
	    	</ul>
    	</div>
    </div>

    <div class="col-sm-5">
       <img src="./img/teacher.png" width="30%" >
    </div>
    <div class="col-sm-1"></div>
  </div>
</div>

@endsection