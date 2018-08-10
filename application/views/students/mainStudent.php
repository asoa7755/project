<?php include_once('../shared/_headerview.php') ?>

    <!-- Page Content -->
    
        <h3> All Orders / Tickets </h3>
        <p>Search for your order / Ticket</p>  
  <input style="width: 250px;"class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
        
        <div class="card mb-3">
            <div class="card-header">
              <i style=" padding-right: 15px; font-size: 20px;" class="fa fa-table"></i><h7>My Tickets </h7>
              </div>
            <div dir="ltr" class="card-body">
              <div dir="rtl" class="table-responsive-sm">
        <table style="border-color: darkcyan;" dir="rtl" class="table table-bordered">
  <thead>
    <tr>
      <th style="width:15%;" scope="col">Ticket No.</th>
      <th  scope="col">comments</th>
      <th style="width:15%;" scope="col">status</th>
      <th style="width:20%;" scope="col">Data / Time</th>
      <th style="width:10%;" scope="col">View</th>
    </tr>
  </thead>
  <tbody id="myOrder">
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td><span class="label label-info">Open/New</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
      
    <tr>
      <th scope="row">2</th>
      <td>Mark</td>
      <td><span class="label label-primary">under studying</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
      
    <tr>
      <th scope="row">3</th>
      <td>Mark</td>
      <td><span class="label label-warning">return to student</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
      
    
      <tr>
      <th scope="row">4</th>
      <td>Mark</td>
      <td><span class="label label-danger">rejected</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self"><i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
    
    <tr>
      <th scope="row">5</th>
      <td>Mark</td>
      <td><span class="label label-success">accepted</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
    
    <tr>
      <th scope="row">6</th>
      <td>Mark</td>
      <td><span class="label label-warning">Warning Label</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
      
    <tr>
      <th scope="row">7</th>
      <td>Mark</td>
      <td><span class="label label-warning">Warning Label</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self"><i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
    
  </tbody>
</table>
        
 </div>
      
                <!-- for search table -->
    <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myOrder tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
            
</div>
</div>
        
        
        
        
        
        
    <!-- Footer -->
<?php include_once('../shared/_footerview.php') ?>