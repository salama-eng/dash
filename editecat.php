<?php 
//Database Connection
include('connection.php');
if(isset($_POST['submit']))
  {
  	$eid=$_GET['editid'];
  	//Getting Post Values
    $category_name=$_POST['categoryname'];
  

    //Query for data updation
     $query=mysqli_query($con, "update category set category_name='$category_name' where category_id='$eid'");
     
    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>
<body>
<div class="signup-form">
    <form  method="POST">
 <?php
$eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from category where category_id='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
		<h2>Update </h2>
		<p class="hint-text">Update Category.</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="categoryname" value="<?php  echo $row['category_name'];?>" required="true"></div>
	
			</div>        	
       
		        
      <?php 
}?>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
    </form>

</div>
</body>
</html>