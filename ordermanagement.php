<link rel="stylesheet" href="assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="assets/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
<style>
  #dashboard
  {
    display:none;
  }
</style>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-8">
</div>
<div class="col-4">
<div class="card-footer clearfix" style="background-color:rgb(244 246 249) !important">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Add Orders</button>
</div>
</div>

<div class="modal fade" id="modal-default">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add Orders</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form>
<div class="container-fluid">
<div class="card-body">

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">Name</label>
<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
</div>
</div>
</div> 

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">Building Name</label>
<input type="text" class="form-control" id="name1" placeholder="Enter  Building Name" name="name1">
</div>
</div>
</div> 

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">Addressline1</label>
<input type="text" class="form-control" id="addressline1" placeholder="Enter  Address Line1" name="addressline1">
</div>
</div>
</div> 

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">Addressline2</label>
<input type="text" class="form-control" id="addressline2" placeholder="Enter  Address Line2" name="addressline2">
</div>
</div>
</div> 

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">City</label>
<input type="text" class="form-control" id="city" placeholder="Enter  City" name="city">
</div>
</div>
</div> 
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">Landmark</label>
<input type="text" class="form-control" id="landmark" placeholder="Enter  Landmark" name="landmark">
</div>
</div>
</div> 

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">District</label>
<input type="text" class="form-control" id="district" placeholder="Enter District" name="district">
</div>
</div>
</div> 

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">State</label>
<input type="text" class="form-control" id="state" placeholder="Enter State" name="state">
</div>
</div>
</div> 

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">Country</label>
<input type="text" class="form-control" id="country" placeholder="Enter Country" name="country">
</div>
</div>
</div> 

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">Pincode</label>
<input type="text" class="form-control" id="pincode" placeholder="Enter Pincode" name="pincode">
</div>
</div>
</div> 

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">Latitude</label>
<input type="text" class="form-control" id="latitude" placeholder="Enter Latitude" name="latitude">
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">Longitude</label>
<input type="text" class="form-control" id="longitude" placeholder="Enter Longitude" name="longitude">
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">Quantity</label>
<input type="text" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity">
</div>
</div>
</div> 

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="exampleSelectBorder">Status</label>
<select class="custom-select" id="status" name="status">
<option>Status</option>
<option value="1">Active</option>
<option value="2">InActive</option>
</select>
</div>
</div>
</div>
</form>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary" name="submit" onclick="save()">Save changes</button>
</div>
</div>

</div>

</div>
</div>

</div>

</section>

<section class="content" id="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Order Details</h3>
</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>SI.No</th>
<th>name</th>
<th>deliveryaddress</th>
<th>quantity</th>
<th>status</th>
<th>createdby</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
// $vendor=pg_query($db,"SELECT weight,status,createdby FROM cylinderweight WHERE status=1");
$vendor=pg_query($db,"SELECT * FROM ordermanagement LEFT JOIN users ON ordermanagement.userid=users.id LEFT JOIN useraddresses ON ordermanagement.deliveryaddressid=useraddresses.id");
$i=1;
while($row=pg_fetch_assoc($vendor))
{
  ?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $row['firstname'] ?></td>
<td><?php echo $row['name'] ?><br><?php echo $row['addressline1']?><br><?php echo $row['addressline2'] ?><br><?php echo $row['city'] ?><br><?php echo $row['landmark'] ?><br><?php echo $row['district'] ?><br><?php echo $row['pincode'] ?></td>
<td><?php echo $row['quantity'] ?></td>

<td>
<?php
if($row['status']==1)
{
  echo "Active";
}else{
  echo "InActive";
}
?></td>
<td><?php 
if($row['createdby']==1)
{
  echo "Admin";
}?></td>

<td><a style="margin-right: 10px;cursor:pointer" data-toggle="modal" data-target="#viewmodal-default<?php echo $row['id'];?>"><i class="nav-icon fas fa-eye"></i></a>
<a style="margin-right: 10px;cursor:pointer" data-toggle="modal" data-target="#editmodal-default<?php echo $row['id'];?>"><i class="nav-icon fas fa-edit"></i></a> 
<a style="cursor:pointer" data-toggle="modal" data-target="#deletemodal-sm<?php echo $row['id'];?>"><i class="nav-icon fas fa-trash"></i></a>
</td>
<!-- Delete Start -->
<div class="modal fade" id="deletemodal-sm<?php echo $row['id'];?>">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Delete Orders</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
  <p>Are you sure you want to delete?</p>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
<button type="button" class="btn btn-primary" onclick = "deleterecord(<?php echo $row['id'];?>)" >Yes</button>
</div>
</div>

</div>

</div>
<!-- edit start -->
<div class="modal fade" id="editmodal-default<?php echo $row['id'];?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Edit Orders</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form>
<div class="card-body">

<div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="text" class="form-control" id="name<?php echo $row['id'];?>" placeholder="Enter Name" name="name" value="<?php echo $row['firstname'];?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Quantity</label>
<input type="text" class="form-control" id="quantity<?php echo $row['id'];?>" placeholder="Enter Quantity" name="quantity" value="<?php echo $row['quantity'];?>">
</div>


<div class="form-group">
<label for="exampleSelectBorder">Status</label>
<select class="custom-select" id="status<?php echo $row['id'];?>" name="status">
<option>Status</option>
<option value="1" <?php if($row['status']=="1") echo "Selected"?>>Active</option>
<option value="2" <?php if($row['status']=="2") echo "Selected"?>>InActive</option>
</select>
</div>

</div>

</form>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary" name="submit" onclick="editsave(<?php echo $row['id'];?>)">Save changes</button>
</div>
</div>

</div>

</div>
<!-- view start -->
<div class="modal fade" id="viewmodal-default<?php echo $row['id'];?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Details</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form>
<div class="container-fluid">
<div class="card-body">
<div class="row">

<div class="col-sm-4">
<div class="form-group">
<label for="exampleInputEmail1">name</label>
</div>
</div>
<div class="col-sm-8">
<div class="form-group">
<p class="text-sm"><?php echo $row['firstname'];?>
</p>
</div>
</div>


<div class="col-sm-4">
<div class="form-group">
<label for="exampleInputEmail1">quantity</label>
</div>
</div>
<div class="col-sm-8">
<div class="form-group">
<p class="text-sm"><?php echo $row['quantity'];?>
</p>
</div>
</div>

<div class="col-sm-4">
<div class="form-group">
<label for="exampleInputEmail1">Status</label>
</div>
</div>
<div class="col-sm-8">
<div class="form-group">
<p class="text-sm"><?php echo 'Active';?>
</p>
</div>
</div>
</div>
</form>
</div>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!-- 5 -->
</div>
</div>

</div>

</div>
</tr>
  <?php
  $i++;
}
?>



</table>
</div>

</div>



</div>

</div>

</div>

</section>

<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="plugins/toastr/toastr.min.js"></script>
<script>
  $(function () {
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  
  
  
  function save()
  {
    var quantity=$("#quantity").val();
    var status=$("#status").val();
    if ( quantity == "") {
      alert("quantity must be filled out");
      return false;
    }
    else if(status == "Status")
    {
      alert("Status must be filled out");
      return false;
    }else if(quantity !== ""  && status !== "" )
    {
      $.ajax({
      url:"http://localhost:8080/gash/api/createordermanagement",
      method:"POST",
      dataType: "json",
      data: {
        
        "quantity":quantity,
        "status":status,
      },
      success:function(msg)
      {
        console.log(msg);
        var message=msg['message'];
        if(message=="Successfull")
        {
           success();  
        }
        else if(message=="email_existed")
        {
          email_existed();  
        }
        else{
          error();
        }
      }
    })
    }
    
    
  }
  function RefreshTable() {
  
       $( "#content" ).load( "index.php?pageid=1 #content" );
   }

   function error()
   {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
        icon: 'error',
        title: 'Please Check.'
      })
          setTimeout(function () {
        
        location.reload(true);
      }, 1000);
          
   }
  function success()
  {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
        icon: 'success',
        title: 'Registration Successfully.'
      })
          setTimeout(function () {
       
        location.reload(true);
      }, 1000);
          
  }
  function email_existed()                                       
  {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
            icon: 'info',
            title: 'Email already existed.'
          })
          setTimeout(function () {
        //alert('Reloading Page');
        location.reload(true);
      }, 1000);
          //window.location.reload();
  }


  function editsave(id)
  {
    var courseid=id;
    var course = $("#course"+id).val();
    var status = $("#status"+id).val();
    var course_credit_hour = $("#course_credit_hour"+id).val();
    var course_code = $("#course_code"+id).val();
    if (course == "") {
      alert("Name must be filled out");
      return false;
    }
    else if(status == "Status")
    {
      alert("Status must be filled out");
      return false;
    }
    if (course_credit_hour == "") {
      alert("Hour must be filled out");
      return false;
    }
    if (course_code == "") {
      alert("Code must be filled out");
      return false;
    }else if(course != "" && status !="" && course_credit_hour !=="" && course_code !=="")
    {
      $.ajax({
      type:"GET",
      url:"mastercourse.php",
      data:
      {
        "id":courseid,
        "course":course,
        "status":status,
        "course_credit_hour":course_credit_hour,
        "course_code":course_code,
      },
      success:function(msg)
      {
        console.log(msg);
        if(msg=="success")
        {
          
          editsuccess();
          
          
        }else{

        }
      }
    })
    }
  }

  function editsuccess()
  {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
            icon: 'success',
            title: 'Course Edit Successfully.'
          })
          setTimeout(function () {
        
        location.reload(true);
      }, 1000);
          
  }

  function deleterecord(id)
  {
   
    var deleteid=id;
    $.ajax({
      type:"POST",
      url:"http://localhost:8080/gash/api/deleteproduct",
      data:
      {
        
        "deleteid":deleteid,
       
      },
      success:function(msg)
      {
        console.log(msg);
        var message=msg['message'];
        
        if(message=="Successfull")
        {
           
          deletesuccess();
          
          
        }else{
          error();
        }
      }
    })
  }

  function deletesuccess()
  {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
            icon: 'success',
            title: 'Deleted Successfully.'
          })
          setTimeout(function () {
        
        location.reload(true);
      }, 1000);
          
  }
</script>