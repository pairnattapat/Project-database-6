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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "Homepage1.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_mydb, $mydb);
  
  $LoginRS__query=sprintf("SELECT USERNAME, PASSWORD FROM login_detial WHERE USERNAME=%s AND PASSWORD=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $mydb) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Welcome to PERFECTBANKING</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <style type="text/css">
  body,td,th {
	font-family: times, times, sans-serif;
	font-size: 0.9em;
}
body {
	background-color: #A2A2A2;
}
  </style>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
</head>

<body>
<div id="main">
  <div id="header">
    <div id="banner"><img src="images/12351172_10153795376338658_54570629_n.jpg" width="920" height="146" alt=""/></div>
    <p><!--end banner--></p>
    <p>&nbsp;</p>
    <div id="menubar">
      <ul id="menu">
        <li><a href="login.php">หน้าหลัก</a></li>
        <li><a href="login.php">ธุรกรรมทางการเงิน</a></li>
        <li><a href="login.php">ประวัติ</a></li>
        <li><a href="HowtouseBL.php">วิธีการใช้งาน</a></li>
        <li><a href="Register.php"><strong>ลงทะเบียน</strong></a></li>
      </ul>
    </div>
    <!--end menubar-->
  </div>
  <p>
  <!--end header--></p>
  <div id="site_content">
    <div id="content">
      <div class="content_item">
        <p>PERFECTBANKING ช่วยให้การทำธุรกรรมทางการเงินเป็นเรื่องง่ายและปลอดภัยสำหรับคุณ โดยมีฟังก์ชันต่าง ๆ ให้เลือกใช้อย่างมากมาย ไม่ว่าจะเป็น โอนเงิน ถอนเงิน
        ฝากเงินเข้าบัญชี รวมไปถึงการซื้อสินค้า และกองทุน   </p>
        <p>สนใจสมัครสมาชิก คลิกที่ปุ่มลงทะเบียนได้เลย</p>
        <p>&nbsp; </p>
      </div>
    <!--end content_item--></div>
    <div class="sidebar_container">
      <div class="sidebar">
        <div class="sidebar_item">
          <form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
            <h2>&#3648;&#3586;&#3657;&#3634;&#3626;&#3641;&#3656;&#3619;&#3632;&#3610;&#3610;</h2>
            <p>
              <label for="textfield">Username:</label>
              <input type="text" name="textfield" id="textfield">
              <span style="font-size: 14px"><br>
                <label for="password">Password:<br>
                </label>
                <input name="password" type="password" id="password" size="22">
              </span></p>
            <p>
              <input type="submit" name="submit" id="submit" value="Log in">
            </p>
          </form>
          <h2>&nbsp;</h2>
        </div>
      </div>
      <!--end sidebar-->
      <div class="sidebar">
        <div class="sidebar_item">
          <h2>&#3648;&#3617;&#3609;&#3641;&#3627;&#3621;&#3633;&#3585;</h2>
          <p>&#3595;&#3639;&#3657;&#3629;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&#3629;&#3629;&#3609;&#3652;&#3621;&#3609;&#3660;<br />
            &#3585;&#3629;&#3591;&#3607;&#3640;&#3609;
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
