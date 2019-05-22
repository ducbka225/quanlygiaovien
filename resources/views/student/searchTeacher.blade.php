@extends('master')
@section('content')
<div class="container-fluid">
  <h3>Tìm Kiếm Giảng Viên</h3>
  <div class="row">
    <div class="col-sm-5">
      <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'dvct')" id="defaultOpen">Đơn Vị Công Tác</button>
        <button class="tablinks" onclick="openCity(event, 'lvqt')">Lĩnh Vực Quan Tâm</button>
      </div>

      <div id="dvct" class="tabcontent">
        <ul style="list-style-type:none; padding-left: 2%">
          @foreach($department as $d)
          <li class="department" data-iddep="{{$d->id}}"><p>{{$d->department_name}}</p></li>
          @endforeach
        </ul>  
      </div>

      <div id="lvqt" class="tabcontent">
        <ul id="tree1" class="tree"> 
          @foreach($research_field as $r)
         <li class="branch"><a>{{$r->research_field}}</a> 
          <ul>
            @foreach($r->lecture_qt as $l)
           <li>{{$l->name}}</li>
           @endforeach
          </ul> 
         </li>
         @endforeach
        </ul>
      </div>

      <script type="text/javascript">
        $.fn.extend({    
        treed: function (o) {            
        var openedClass = 'glyphicon-minus-sign';      
        var closedClass = 'glyphicon-plus-sign';            
        if (typeof o != 'undefined'){        
        if (typeof o.openedClass != 'undefined'){        
        openedClass = o.openedClass;        
        }        
         
        if (typeof o.closedClass != 'undefined'){        
        closedClass = o.closedClass;        
        }      
        };              
         
        //initialize each of the top levels        
        var tree = $(this);        
        tree.addClass("tree");        
        tree.find('li').has("ul").each(function () {            
        var branch = $(this); //li with children ul            
        branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");            
        branch.addClass('branch');            
        branch.on('click', function (e) {                
        if (this == e.target) {                    
        var icon = $(this).children('i:first');                    
        icon.toggleClass(openedClass + " " + closedClass);                    
        $(this).children().children().toggle();                
        }            
        })            
        branch.children().children().toggle();        
        });        
         
        //fire event from the dynamically added icon      
        tree.find('.branch .indicator').each(function(){        
         
        $(this).on('click', function () {            
        $(this).closest('li').click();        
        });      
        });        
        //fire event to open branch if the li contains an anchor instead of text        
         
        tree.find('.branch>a').each(function () {            
        $(this).on('click', function (e) {                
        $(this).closest('li').click();                
        e.preventDefault();            
        });        
        });        
         
        //fire event to open branch if the li contains a button instead of text        
        tree.find('.branch>button').each(function () {            
        $(this).on('click', function (e) {                
        $(this).closest('li').click();                
        e.preventDefault();            
        });        
        });    
        }});
        $('#tree1').treed();
      </script>

      <script>
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }
      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
      </script>
    </div>

    <div class="col-sm-7 ttgv">
      <p>Danh Sách Giảng Viên:</p>            
      <table class="table">
        <thead>
          <tr>
            <th>HHHV</th>
            <th>Tên Giảng Viên</th>
            <th>Đơn Vị</th>
          </tr>
        </thead>
        <tbody>
        <!--   <tr>
            <td>Thạc Sĩ</td>
            <td>Giang Viên A</td>
            <td>Khoa học máy tính</td>
          </tr> -->
        </tbody>
      </table>
    </div>
  </div>
</div>
<input type="hidden" value="{{csrf_token()}}" id="token"/>
<script type="text/javascript">
  $(document).ready(function() {

    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.department').click(function(e) {
    e.preventDefault();
    var id = ($(this).attr("data-iddep"));
    var token = $('#token').val();
    $.ajax({
      type : 'POST',
      url : '/searchbydep',
      data: {'id':id, '_token': token},
      dataType: 'json',
      success: function (data) {
        $(".table tbody").html("");
        $.each(data, function (i) {                
         $(".table tbody").append("<tr " + "class=" +'"infoteacher"' + 'data-iduser=' +  data[i].id + ">" +
                              "<td>" + data[i].hocvi + "</td>" +
                              "<td>" + data[i].fullname + "</td>" +
                              "<td>" + data[i].department_name + "</td>" +
                          "</tr>");
        })  
      },
      error: function (data) {
       console.log('Error:', data);
      }
    });
  });

   // click to detals
   $(document).on("click", ".infoteacher", function() {
    var iduser = ($(this).attr("data-iduser"));
    var url = '/teacher/info/' + iduser
    window.location.href = url;
  });
});  
</script>

@endsection