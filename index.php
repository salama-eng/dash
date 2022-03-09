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

  <!----- Category --------->

  <h1>categories</h1>
  <a href="add_category.php?$counter_cat">Add categories</a>
  <table>
    <tr>
      <th>cat_id</th>
      <th>Category name</th>
    </tr>

    <?php
    $result = mysqli_query($con, "select * from category");
    $row = mysqli_num_rows($result);
    $counter_cat = 1;
    if ($row > 0) {
      while ($row = mysqli_fetch_array($result)) {

    ?>
        <tr>
          <td><?php echo $counter_cat; ?></td>
          <td><?php echo $row['category_name']; ?> </td>
          <td>
            <a href="read.php?viewid=<?php echo htmlentities($row['category_id']); ?>">view</a>
            <a href="edit.php?editid=<?php echo htmlentities($row['category_id']); ?>">edite</a>
            <a href="index.php?delid=<?php echo ($row['category_id']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');">delete</a>
          </td>
        </tr>

      <?php
        $counter_cat += 1;
      }
    } else { ?>
      <tr>
        <th>No Record Found</th>
      </tr>
    <?php }

    ?>



  </table>

  <!----- Category end--------->

  <!----- product view --------->
  <a href="add_product.php">Add product</a>
  <h2>Product Management</h2>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th> Product Name</th>
        <th> Product Price</th>
        <th> Product Image</th>
        <th> Category</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $ret = mysqli_query($con, "select * from product");
      $cnt = 1;
      $row = mysqli_num_rows($ret);
      if ($row > 0) {
        while ($row = mysqli_fetch_assoc($ret)) {

      ?>
          <!--Fetch the Records -->
          <tr>
            <td><?php echo $cnt; ?></td>
            <td><?php echo $row['product_name']; ?> </td>
            <td><?php echo $row['product_price']; ?> </td>
            <td><img src="<?php echo $row['product_image']; ?>" width="100px" height="100px" alt="<?php echo $row['product_image']; ?>"></td>

            <?php
            $cat = $row['category_id'];
            $squery = mysqli_query($con, "select category_name from category where category_id= $cat")->fetch_object()->category_name;

            ?>
            <td><?php echo $squery; ?> </td>
            <td>
              <a href="readproduct.php?viewproid=<?php echo htmlentities($row['product_id']); ?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
              <a href="editpro.php?editproid=<?php echo htmlentities($row['product_id']); ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
              <a href="index.php?delproid=<?php echo ($row['product_id']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
            </td>
          </tr>
        <?php
          $cnt = $cnt + 1;
        }
      } else { ?>
        <tr>
          <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
        </tr>
      <?php } ?>

    </tbody>
  </table>




</body>

</html>