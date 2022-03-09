<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php 
//Databse Connection file
include('connection.php');

if(isset($_POST['submit']))
  {
  	//getting the post values
    $category_name=$_POST['categoryname'];
   
   
  // Query for data insertion
     $query=mysqli_query($con, "insert into category(category_id,category_name) values(4,'$category_name' )");
    if ($query) {
    echo "<script>alert('You have successfully inserted the data');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>

<form  method="POST">
		<h2>Fill Data</h2>
		<p class="hint-text">Fill below form.</p>
        <div class="form-group">
			
				<div class="col"><input type="text" class="form-control" name="categoryname" placeholder="category Name" required="true"></div> 
        </div>
       <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
        </div>
    </form>

</body>
</html>