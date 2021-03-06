<?php require_once('Connections/mydb.php'); ?>
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

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if (isset($_POST['number2'])){
	$TransferTarget = $_POST['number'];
	$TransferAmount = $_POST['number2'];
	
	$insertSQL = sprintf("INSERT INTO transfer_history (TRANFER_AMOUNT, TRANSFER_TARGET,USERNAME) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['number'], "text"),
                       GetSQLValueString($_POST['number2'], "text"),                    
                       GetSQLValueString($_SESSION['MM_Username'], "text"));
	
	mysql_select_db($database_mydb, $mydb);
	$Result1 = mysql_query($insertSQL, $mydb) or die(mysql_error());
	
	
	$updateSQL = sprintf("UPDATE user_account_detial set BALANCE = BALANCE - %s where USERNAME = %s",
                       GetSQLValueString($_POST['number2'], "text"),                    
                       GetSQLValueString($_SESSION['MM_Username'], "text"));	
	mysql_select_db($database_mydb, $mydb);
	$Result2 = mysql_query($updateSQL, $mydb) or die(mysql_error());
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

mysql_select_db($database_mydb, $mydb);
$query_Recordset3 = "SELECT ACCOUNT_ID FROM account_detial";
$Recordset3 = mysql_query($query_Recordset3, $mydb) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>&#3650;&#3629;&#3609;&#3648;&#3591;&#3636;&#3609;</title>
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
        <form ACTION="<?php echo $editFormAction; ?>" id="form1" name="form1" method="post">
          <p>การโอนเงิน<br>
            ------------------</p>
          <p>กรุณาระบุรายละเอียดต่อไปนี้</p>
          <p>บัญชีผู้โอน : <?php echo $row_Recordset3['ACCOUNT_ID']; ?><br>
            <label for="number">เลขที่บัญชีผู้รับโอน :</label>
            <input type="number" name="number" id="number">
            <br>
            <label for="number2">จำนวนเงิน :</label>
            <input type="number" name="number2" id="number2">
            <br>
          </p>
          <p>
  
            <input type="submit" name="Sub_tra" id="Sub_tra" value="ยืนยันการโอนเงิน">
          </p>
        </form>
        <p>&nbsp;</p>
        <p><br>
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
          <p>ข้อมูลเลขที่บัญชี :</p>
          <p><?php echo $row_Recordset2['ACCOUNT_ID']; ?><br>
          </p>
        </div>
      </div>
      <!--end sidebar-->
      <div class="sidebar">
        <div class="sidebar_item">
          <h2>&#3648;&#3617;&#3609;&#3641;&#3627;&#3621;&#3633;&#3585;</h2>
          <p><a href="Shop_online.php">&#3595;&#3639;&#3657;&#3629;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&#3629;&#3629;&#3609;&#3652;&#3621;&#3609;&#3660;</a><br />
            <a href="Fund.php">&#3585;&#3629;&#3591;ทุน</a><br>
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

mysql_free_result($Recordset3);
?>
