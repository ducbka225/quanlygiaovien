@extends('master')
@section('content')
<style type="text/css">
  	.treeview {
  margin: 10px 0 0 20px;
	}

	.treeview { 
	  list-style-type: none;
	}
	.treeview ul{ 
	  list-style-type: none;
	}

	.treeview li {
	  background: url(http://jquery.bassistance.de/treeview/images/treeview-default-line.gif) 0 0 no-repeat;
	  padding: 2px 0 2px 16px;
	}

	.treeview > li:first-child > label {
	  /* style for the root element - IE8 supports :first-child
	  but not :last-child ..... */
	  
	}

	.treeview li.last {
	  background-position: 0 -1766px;
	}

	.treeview li > input {
	  height: 16px;
	  width: 16px;
	  /* hide the inputs but keep them in the layout with events (use opacity) */
	  opacity: 0;
	  filter: alpha(opacity=0); /* internet explorer */ 
	  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(opacity=0)"; /*IE8*/
	}

	.treeview li > label {
	  background: url(https://www.thecssninja.com/demo/css_custom-forms/gr_custom-inputs.png) 0 -1px no-repeat;
	  /* move left to cover the original checkbox area */
	  margin-left: -20px;
	  /* pad the text to make room for image */
	  padding-left: 20px;
	}

	/* Unchecked styles */

	.treeview .custom-unchecked {
	  background-position: 0 -1px;
	}
	.treeview .custom-unchecked:hover {
	  background-position: 0 -21px;
	}

	/* Checked styles */

	.treeview .custom-checked { 
	  background-position: 0 -81px;
	}
	.treeview .custom-checked:hover { 
	  background-position: 0 -101px; 
	}

	/* Indeterminate styles */

	.treeview .custom-indeterminate { 
	  background-position: 0 -141px; 
	}
	.treeview .custom-indeterminate:hover { 
	  background-position: 0 -121px; 
	}
  </style>
<div class="container-fluid">
	<hr>
  <div class="row">
  	<div class="col-sm-2"></div>
    <div class="col-sm-5" >
    	<div id="info-gv" style="padding-left: 30px">
    		<p class="title-tt">{{$user->hocvi}}. {{$user->fullname}}</p>
	    	<p>Đơn vị: {{$user->department->department_name}}</p>
	    	<p>Học vị, hàm vị: {{$user->hocvi}}</p>
	    	<p>VNU email: {{$user->email}}</p>
	    	<p>Website: abcd.com</p>
    	</div>
    	<hr>
    	<div id="topic" style="padding-left: 30px">
    		<p class="title-tt">Chủ đề nghiên cứu</p>
	    	<ul style="list-style-type: none; padding: 0;">
	    		@foreach($research as $r)
	    		<li>
	    			{{$r->lecture_research->name}}
	    			<a href="#">
			          <span class="glyphicon glyphicon-remove" style="color: red"></span>
			        </a>
	    		</li>
	    		@endforeach
	    	</ul>
    	</div>
    	<hr>
    	<div id="field" style="padding-left: 30px">
    		<div>
    			<p class="title-tt">Lĩnh Vực Quan Tâm</p>
				@if(Session::has('message'))
                <div class="alert alert-danger">{{Session::get('message')}}</div>
                @endif
    		</div>
	    	<ul>
	    		@foreach($lecture as $l)
	    		<li>
	    			{{$l->lecture_qt->name }}

	    			<a href="/deletelecture_qt/{{$l->lecture_qt->id}}" class="w3-right" style="margin-right: 50%;">
			          <span class="glyphicon glyphicon-remove" style="color: red"></span>
			        </a>
    			</li>
    			@endforeach	
	    	</ul>
	    	<div class="btn btn-success" id="addlecture">Thêm mới</div>
    	</div>
    </div>

    <div class="col-sm-5">
       <div>
       	<img src="source/img/avatar.png" width="35%" >
       		<div style="text-align: center; width: 35%">
		        <div class="input-container">
				  <i class="fa fa-photo icon"></i> 
				  <input class="input-field" type="file" name="avatar" placeholder="Chọn ảnh đại diện">
			  	</div>
       		</div>
       </div>
    </div>
    <div class="col-sm-1"></div>
  </div>

  <!-- The Modal -->
	<div id="lectureModal" class="modal">
	  	<!-- Modal content -->
	  	<div class="modal-content">
	    	<span>Thêm lĩnh vực nghiên cứu</span>
	    	<ul class="treeview">
	    		@foreach($research_field as $rf)
		        <li>
		            <input type="checkbox" name="tall" id="tall">
		            <label for="tall" class="custom-unchecked">{{$rf->research_field}}</label>
		            <ul>
		            	@foreach($rf->lecture_qt as $l)
		                 <li>
		                     <input type="checkbox" name="lvqt" id="tall-1" value="{{$l->id}}">
		                     <label for="tall-1" class="custom-unchecked">{{$l->name}}</label>
		                 </li>
		                @endforeach
		            </ul>
		        </li>
		        @endforeach
		    </ul>
		    <hr>
		    <div style="margin-left: 70px;">
		    	<button class="btn btn-success" id="submitlecture">Đồng ý</button>
		    	<button class="btn btn-danger closes">Bỏ qua</button>
		    </div>
	  	</div>
	</div>	

<script>
	// Get the modal
	var modal = document.getElementById("lectureModal");

	// Get the button that opens the modal
	var btn = document.getElementById("addlecture");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("closes")[0];

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

<script type="text/javascript">
	$(function() {

	  	$('input[type="checkbox"]').change(checkboxChanged);

	  	function checkboxChanged() {
		    var $this = $(this),
		        checked = $this.prop("checked"),
		        container = $this.parent(),
		        siblings = container.siblings();

		    container.find('input[type="checkbox"]')
		    .prop({
		        indeterminate: false,
		        checked: checked
	    })
		    .siblings('label')
		    .removeClass('custom-checked custom-unchecked custom-indeterminate')
		    .addClass(checked ? 'custom-checked' : 'custom-unchecked');

		    checkSiblings(container, checked);
	  	}

	  function checkSiblings($el, checked) {
	    var parent = $el.parent().parent(),
	        all = true,
	        indeterminate = false;

	    $el.siblings().each(function() {
	      return all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
	    });

	    if (all && checked) {
	      parent.children('input[type="checkbox"]')
	      .prop({
	          indeterminate: false,
	          checked: checked
	      })
	      .siblings('label')
	      .removeClass('custom-checked custom-unchecked custom-indeterminate')
	      .addClass(checked ? 'custom-checked' : 'custom-unchecked');

	      checkSiblings(parent, checked);
	    } 
	    else if (all && !checked) {
	      indeterminate = parent.find('input[type="checkbox"]:checked').length > 0;

	      parent.children('input[type="checkbox"]')
	      .prop("checked", checked)
	      .prop("indeterminate", indeterminate)
	      .siblings('label')
	      .removeClass('custom-checked custom-unchecked custom-indeterminate')
	      .addClass(indeterminate ? 'custom-indeterminate' : (checked ? 'custom-checked' : 'custom-unchecked'));

	      checkSiblings(parent, checked);
	    } 
	    else {
	      $el.parents("li").children('input[type="checkbox"]')
	      .prop({
	          indeterminate: true,
	          checked: false
	      })
	      .siblings('label')
	      .removeClass('custom-checked custom-unchecked custom-indeterminate')
	      .addClass('custom-indeterminate');
	    }
	  }
	});
</script>

<input type="hidden" value="{{csrf_token()}}" id="token"/>
<script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    //ajax search by department
    $('#submitlecture').click(function(e) {
    e.preventDefault();
    var allVals = [];
		$("input[name=lvqt]:checked").each(function() {
		  allVals.push($(this).val());
		});

    var token = $('#token').val();
    $.ajax({
      type : 'POST',
      url : '/addlecture_qt',
      data: {allVals},
      success: function (data) {
      	if(data == true){
      		alert('Thành Công');
      		window.location.reload();
      	}
      },
      error: function (data) {
       console.log('Error:', data);
      }
      });
    });
});  
</script>
	
</div>
@endsection