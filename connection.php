<?php
$con=mysqli_connect("localhost", "root", "", "php_test");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
else
{
  echo "you are connected";

}
?>