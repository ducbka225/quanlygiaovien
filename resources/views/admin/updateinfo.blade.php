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
    		<div>
    			<p class="title-tt">Lĩnh Vực Quan Tâm</p>
    		</div>
	    	<ul>
	    		<li>lĩnh vực 1</li>
	    		<li>lĩnh vực 2</li>
	    		<li>lĩnh vực 3</li>
	    	</ul>
	    	<div class="btn btn-success" id="myBtn">Thêm mới</div>
    	</div>
    </div>

    <div class="col-sm-5">
       <img src="./img/teacher.png" width="30%" >
       <div>
       		<div style="float: left; margin-right: 20px;">Cập nhật ảnh</div>
       		<div>Xóa ảnh X</div>
       </div>
    </div>
    <div class="col-sm-1"></div>
  </div>

  <!-- The Modal -->
	<div id="myModal" class="modal">
	  	<!-- Modal content -->
	  	<div class="modal-content">
	    	<p class="close">Bỏ qua</p>
	    	<p>Some text in the Modal..</p>
	  	</div>

	</div>

	<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</div>
@endsection