
<?php

$ID=$_GET["id"];

include("conn.php");
	
$query="select inventory_amt from inventory_amount where product_ID='$ID'";
               
/*echo $Product_ID;*/
$result=mysql_query($query, $conn);
while($row=mysql_fetch_array($result))
{
  $inventory_number=$row["inventory_amt"];
}


if( $inventory_number>=$_POST["select"])
{
session_start();
ob_start();

$number=$_POST["select"];

$Product_ID=$_GET["id"];



$arr=$_SESSION["mycart"];
foreach($arr as$key=>$proId)
{
if($key==$Product_ID)
{
$uu=$arr[$Product_ID];
$uu["num"]=$number;
$arr[$Product_ID]=$uu;
}

}

echo $uu["num"];
$_SESSION["mycart"]=$arr;
ob_clean();
header("location:cart.php");

}


else
{
echo "sorry, only ";
echo $_POST["select"];;
echo " left in stock";
}

?>