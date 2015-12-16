<?php require_once('Connections/mydb.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_mydb, $mydb);
$query_Recordset1 = "SELECT customer_detial.FIRST_NAME FROM customer_detial";
$Recordset1 = mysql_query($query_Recordset1, $mydb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_mydb, $mydb);
$query_Recordset2 = "SELECT account_detial.ACCOUNT_ID FROM account_detial";
$Recordset2 = mysql_query($query_Recordset2, $mydb) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title>Deposit</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <style type="text/css">
  body,td,th {
	font-family: times, times, sans-serif;
	font-size: 0.9em;
}
  </style>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
</head>

<body>
<div id="main">
  <div id="header">
    <div id="banner"><img src="images/12351172_10153795376338658_54570629_n.jpg" width="920" height="146" alt=""/></div>
    <p>&nbsp;</p>
    <p><!--end banner-->
    </p>
    <div id="menubar">
      <ul id="menu">
        <li><a href="Homepage1.php">หน้าหลัก</a></li>
        <li><a href="Transaction.php">ธุรกรรมทางการเงิน</a></li>
        <li><a href="History.php">ประวัติ</a></li>
        <li><a href="Howtouse.php">วิธีการใช้งาน</a></li>
        <li class="last"><a href="<?php echo $logoutAction ?>">ออกจากระบบ</a></li>
      </ul>
    </div>
    <!--end menubar-->
  </div>
  <p>
    <!--end header-->
  </p>
  <div id="site_content">
    <div id="content">
      <div class="content_item">
        <p>การฝากเงิน<br>
        ------------------</p>
        <p>กรุณาระบุรายละเอียดต่อไปนี้</p>
        <p>รหัสบัตรเติมเงิน : 
          <input type="number" name="number" id="number">
           (กรุณาตรวจสอบความถูกต้องของข้อมูล)<br>
           <label for="password">กรอกรหัสผ่าน&nbsp;  :</label>
          <input type="password" name="password" id="password">
           <br>
        </p>
        <p>
          <input type="submit" name="submit" id="submit" value="Submit">
        </p>
        <p>&nbsp;</p>
      </div>
      <!--end content_item-->
    </div>
    <!--end content-->
    <div class="sidebar_container">
      <div class="sidebar">
        <div class="sidebar_item">
          <h2>&#3618;&#3636;&#3609;&#3604;&#3637;&#3605;&#3657;&#3629;&#3609;&#3619;&#3633;&#3610;&#3626;&#3617;&#3634;&#3594;&#3636;&#3585;</h2>
          <p><?php echo $row_Recordset1['FIRST_NAME']; ?></p>
          <p>ข้อมูลเลขที่บัญชี</p>
          <p><?php echo $row_Recordset2['ACCOUNT_ID']; ?></p>
        </div>
      </div>
      <!--end sidebar-->
      <div class="sidebar">
        <div class="sidebar_item">
          <h2>&#3648;&#3617;&#3609;&#3641;&#3627;&#3621;&#3633;&#3585;</h2>
          <p><a href="Shop_online.html">&#3595;&#3639;&#3657;&#3629;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&#3629;&#3629;&#3609;&#3652;&#3621;&#3609;&#3660;</a><br />
&#3585;&#3629;&#3591;ทุน<br>
ตั้งค่าบัญชี
          </p>
        </div>
        <div class="sidebar_base"></div>
      </div>
      <!--end sidebar-->
    </div>
    <!--end sidebar_container-->
  </div>
  <!--end site_content-->
</div>
<!--end main--><!--end footer-->
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
