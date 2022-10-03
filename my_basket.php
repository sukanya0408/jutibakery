<?php 
	session_start();
	
	$bk_id = $_GET['bk_id']; 
	$product_type_id = $_GET['product_type_id'];

	if($act=='add' && !empty($bk_id))
	{
		if(isset($_SESSION['cart'][$bk_id]))
		{
			$_SESSION['cart'][$bk_id]++;
		}
		else
		{
			$_SESSION['cart'][$bk_id]=1;
		}
	}

	if($bk_id=='remove' && !empty($bk_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$bk_id]);
	}

	if($bk_id=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $bk_id=>$amount)
		{
			$_SESSION['my_basket'][$bk_id]=$amount;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
</head>

<body>
<form id="my_basket" name="my_basket" method="post" action="?bk_id=update">
  <table width="1400" border="1" align="center" class="square">
  <h2><font color="#252B31"> ตะกร้าของฉัน </font></h2>
    <tr>
      <td bgcolor="#FFFFCC">สินค้า</td>
      <td align="center" bgcolor="#FFFFCC">ราคา</td>
      <td align="center" bgcolor="#FFFFCC">จำนวน</td>
      <td align="center" bgcolor="#FFFFCC">ราคารวม</td>
      <td align="center" bgcolor="#FFFFCC">ลบ</td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("conn.php");
	foreach($_SESSION['my_basket'] as $bk_id=>$qty)
	{
		$sql = "select * from bakery where bk_id=$bk_id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['p_price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='334'>" . $row["p_name"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["p_price"],2) . "</td>";
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$p_id]' value='$qty' size='2'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='cart.php?p_id=$p_id&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
<tr>
<td><a href="index_ctm.php">กลับหน้าหลัก</a></td>
<td colspan="4" align="right">
    <input type="submit" name="edit" id="button" value="แก้ไข" />
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
</td>
</tr>
</table>
</form>
</body>
</html>