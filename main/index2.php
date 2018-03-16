<html>
 <head>
  <title>Date Range Search in Datatables using PHP Ajax</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
  

 </head>
 <body>
  <div class="container box">
   <h1 align="center">Date Range Search in Datatables using PHP Ajax</h1>
   <br />

   <div class="table-responsive">
    <br />
    
    <div class="row">
     <div class="input-daterange">
      <div class="col-md-4">
       <input type="text" name="start_date" id="start_date" class="form-control" />
      </div>
      <div class="col-md-4">
       <input type="text" name="end_date" id="end_date" class="form-control" />
      </div>      
     </div>
     <div class="col-md-4">
      <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
     </div>
    </div>

    <br/>

    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button> <br>

    <br />
    <table id="order_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Nomor Pekerjaan</th>
       <th>Tanggal</th>
       <th>Store</th>
       <th>Alamat Store</th>
       <th>Kategori</th>
       <th>Keterangan</th>
       <th width="2.5%">Edit</th>
       <th width="2.5%">Delete</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
 </body>
</html>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='')
 {
  var dataTable = $('#order_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"fetch2.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='')
  {
   $('#order_data').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Both Date is Required");
  }
 }); 


  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var nomor = $('#nomor').val();
    var tanggal = $('#tanggal').val();
      
    if(nomor != '' && tanggal != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form')[0].reset();
          $('#userModal').modal('hide');
          dataTable.ajax.reload();
        }
      });
    }
    else
    {
      alert("Both Fields are Required");
    }
  });
  
  $(document).on('click', '.update', function(){
    var id_job = $(this).attr("id_job");
    $.ajax({
      url:"fetch_single.php",
      method:"POST",
      data:{id_job:id_job},
      dataType:"json",
      success:function(data)
      {
        $('#userModal').modal('show');
        $('#nomor').val(data.nomor);
        $('#tanggal').val(data.tanggal);
        $('#store').val(data.store);
        $('#alamat').val(data.alamat);
        $('#kategori').val(data.kategori);
        $('#keterangan').val(data.keterangan);
        $('.modal-title').text("Edit User");
        $('#user_id').val(user_id);
        
        $('#action').val("Edit");
        $('#operation').val("Edit");
      }
    })
  });
  
  $(document).on('click', '.delete', function(){
    var user_id = $(this).attr("id_job");
    if(confirm("Are you sure you want to delete this?"))
    {
      $.ajax({
        url:"delete.php",
        method:"POST",
        data:{id_job:id_job},
        success:function(data)
        {
          alert(data);
          dataTable.ajax.reload();
        }
      });
    }
    else
    {
      return false; 
    }
  });
 
});
</script>