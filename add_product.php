<?php
include('connection.php');


//Databse Connection file

if(isset($_POST['submit']))
  {
  	//getting the post values
    $productname=$_POST['productname'];
   $productprice=$_POST['productprice'];
   if($_FILES['productimage']['name']){
    move_uploaded_file($_FILES['productimage']['tmp_name'], "image/".$_FILES['productimage']['name']);
    $img="image/".$_FILES['productimage']['name'];
    }
  
   $categoryname=$_POST['category'];
   
  // Query for data insertion
     $query=mysqli_query($con, "insert into product(product_id,product_name,product_price,product_image,category_id) value(4,'$productname', '$productprice','$img','$categoryname' )");
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<form  method="POST" enctype="multipart/form-data" >
		<h2>Fill Data</h2>
		<p class="hint-text">Fill below form.</p>
        <div class="form-group">
			
				<div ><input type="text" class="form-control" name="productname" placeholder="product Name" required="true"></div>
			       	
        </div>
         <div class="form-group">
			
				<div><input type="text" class="form-control" name="productprice" placeholder="product price" required="true"></div>
			       	
        </div>
         <div class="form-group">
			
				<div class="col"><input type="file" class="form-control" name="productimage" placeholder="product image" required="true"></div>
			       	
        </div>
         <div class="form-group">
			
				<div class="col">
				<select name = 'category'>
                <?php
                $result=mysqli_query($con, "select * from category ");
 while($row = mysqli_fetch_array($result)) {
	
     ?> 

				<option value = '<?=$row['category_id']?>'><?=$row['category_name']?></option>
			<?php
 
}?>	
			</select>
                </div>
			       	
        </div>
       <div class="form-group">
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>

</body>
</html>