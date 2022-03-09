<?php
include('connection.php');
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
			
				<div class="col"><input type="text" class="form-control" name="productname" placeholder="product Name" required="true"></div>
			       	
        </div>
         <div class="form-group">
			
				<div class="col"><input type="text" class="form-control" name="productprice" placeholder="product price" required="true"></div>
			       	
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
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
        </div>
    </form>

</body>
</html>