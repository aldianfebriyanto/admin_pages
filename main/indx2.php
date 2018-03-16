<html>
 <head>
  <title>Data Table User</title>
  <script src="../static/js/jquery-1.12.0.js"></script>
  <script src="../static/js/jquery.validate.min.js"></script>
  <script src="../static/js/bootstrap.min.js"></script>
  <script src="../static/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="../static/css/bootstrap-datepicker.css" />
  <script src="../static/js/bootstrap-datepicker.js"></script>
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
  
  
    <link rel="stylesheet" href="../static/css/bootstrap.min.css" />
    <script src="../static/js/jquery.dataTables.min.js"></script>  
    <link rel="stylesheet" href="../static/css/jquery.dataTables.min.css" />
    

 </head>
 <body>
  <div class="container box">
   <h1 align="center">Data Table User</h1>
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

    <div id="userModal" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add User</h4>
        </div>
        <div class="modal-body">
          <br />
          <label>Tanggal</label>
          <input type="date" name="tanggal" id="tanggal" class="form-control" required />
          <br />

          <label>Store</label>
          <input type="radio" name="store" id="store" class="form-control" required /> STORE 1
          <input type="radio" name="store" id="store" class="form-control" required /> STORE 2
          <input type="radio" name="store" id="store" class="form-control" required /> STORE 3
          <br />

          <label>Alamat Store</label>
          <input type="text" name="alamat" id="alamat" class="form-control" required />
          <br />

          <form method='POST' action=''>
          <h4>Kategori</h4>
          <h4><select name="kategori">
          <option hidden>Select Category</option>
          <option value="Stand By">Stand By</option>
          <option value="Maintenance">Maintenance</option>
          </select>
          </h4>
          </form>
          <br/>

          Keterangan<br/>  
          <form action="" method="post">  
          <textarea rows="5" cols="75" name="keterangan" style="border-radius: 10px;"></textarea><br/>   
          </form>  


        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_job" id="id_job" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>


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

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  $('#add_button').click(function(){
    $('#user_form')[6].reset();
    $('.modal-title').text("Add User");
    $('#action').val("Add");
    $('#operation').val("Add");
    
  });
  
  var dataTable = $('#user_data').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"http://192.168.10.4:6969/list-outlet-json-limit?start=0&end=10&search=",
      type:"POST"
    },
    "columnDefs":[
      {
        "targets":[6,7,5],
        "orderable":false,
        "searchable": false,
      },
    ],

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
        $('#id_job').val(id_job);
        
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

 </body>
</html>
