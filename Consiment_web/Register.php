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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO customer_detial (ID, FIRST_NAME, LAST_NAME, BIRTH_DATE, ADDRESS, TEL_NUMBER, EMAIL) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID'], "text"),
                       GetSQLValueString($_POST['Name'], "text"),
                       GetSQLValueString($_POST['Lname'], "text"),
                       GetSQLValueString($_POST['date'], "date"),
                       GetSQLValueString($_POST['Addr'], "text"),
                       GetSQLValueString($_POST['tel'], "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_mydb, $mydb);
  $Result1 = mysql_query($insertSQL, $mydb) or die(mysql_error());

  $insertGoTo = "login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO login_detial (ID, USERNAME, PASSWORD) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['ID'], "text"),
                       GetSQLValueString($_POST['Username'], "text"),
                       GetSQLValueString($_POST['password2'], "text"));

  mysql_select_db($database_mydb, $mydb);
  $Result1 = mysql_query($insertSQL, $mydb) or die(mysql_error());

  $insertGoTo = "login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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

if (isset($_POST['textfield5'])) {
  $loginUsername=$_POST['textfield5'];
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
  <title>PerfectMoney</title>
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
    <div id="banner">
      <p><img src="images/12351172_10153795376338658_54570629_n.jpg" width="920" height="146" alt=""/></p>
    </div>
    <p>&nbsp;</p>
    <p><!--end banner-->
    </p>
    <div id="menubar">
      <ul id="menu">
        <li><a href="login.php">&#3627;&#3609;&#3657;&#3634;&#3627;&#3621;&#3633;&#3585;</a></li>
        <li><a href="login.php">&#3608;&#3640;&#3619;&#3585;&#3619;&#3619;&#3617;&#3607;&#3634;&#3591;&#3585;&#3634;&#3619;&#3648;&#3591;&#3636;&#3609;</a></li>
        <li><a href="login.php">&#3611;&#3619;&#3632;&#3623;&#3633;&#3605;&#3636;</a></li>
        <li><a href="HowtouseBL.php">&#3623;&#3636;&#3608;&#3637;&#3585;&#3634;&#3619;&#3651;&#3594;&#3657;&#3591;&#3634;&#3609;</a></li>
        <li class="last"><a href="login.php">&#3648;&#3586;&#3657;&#3634;&#3626;&#3641;&#3656;&#3619;&#3632;&#3610;&#3610;</a></li>
      </ul>
    </div>
    <!--end menubar-->
  </div>
  <p>
  <!--end header--></p>
  <div id="site_content">
    <footer></footer>
    <div id="content">
      <div class="content_item">
        <p>&#3621;&#3591;&#3607;&#3632;&#3648;&#3610;&#3637;&#3618;&#3609; PERFECTBANKING<br>
        -----------------------------------------------</p>
        <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
          <p>
            <label for="Name">&#3594;&#3639;&#3656;&#3629; :</label>
            <input name="Name" type="text" required id="Name">
            &nbsp; &nbsp; 
            <label for="Lname">&#3609;&#3634;&#3617;&#3626;&#3585;&#3640;&#3621;:</label>
            <input name="Lname" type="text" required id="Lname">
            <br>
            <label for="date">&#3623;&#3633;&#3609;&#3648;&#3604;&#3639;&#3629;&#3609;&#3611;&#3637;&#3648;&#3585;&#3636;&#3604;:</label>
            <input name="date" type="date" required id="date">
         &nbsp; &nbsp;
         <label for="ID">&#3648;&#3621;&#3586;&#3610;&#3633;&#3605;&#3619;&#3611;&#3619;&#3632;&#3594;&#3634;&#3594;&#3609; :</label>
         <input name="ID" type="number" required id="ID">
          <br>
          <label for="Addr">&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;:</label>
          <textarea name="Addr" required id="Addr"></textarea>
          &nbsp;
          <label for="tel">&#3627;&#3617;&#3634;&#3618;&#3648;&#3621;&#3586;&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660;:</label>
          <input name="tel" type="tel" required id="tel">
          <br>
          <label for="email">Email:</label>
          <input name="email" type="email" required id="email">
          <label for="textfield8">&#3648;&#3621;&#3586;&#3607;&#3637;&#3656;&#3610;&#3633;&#3597;&#3594;&#3637;:</label>
          <input name="Account_No" type="text" required id="textfield8">
          <br>
          &nbsp;
          <label for="select3">&#3608;&#3609;&#3634;&#3588;&#3634;&#3619; :</label>
          <select name="select" required id="select3">
            <option value="ps">--&#3650;&#3611;&#3619;&#3604;&#3648;&#3621;&#3639;&#3629;&#3585;--</option>
            <option value="KTB">&#3608;&#3609;&#3634;&#3588;&#3634;&#3619;&#3585;&#3619;&#3640;&#3591;&#3648;&#3607;&#3614;</option>
            <option value="KSB">&#3608;&#3609;&#3634;&#3588;&#3634;&#3619;&#3585;&#3626;&#3636;&#3585;&#3619;&#3652;&#3607;&#3618;</option>
            <option value="TCB">&#3608;&#3609;&#3634;&#3588;&#3634;&#3619;&#3652;&#3607;&#3618;&#3614;&#3634;&#3603;&#3636;&#3594;&#3618;&#3660;</option>
            <option value="GSB">&#3608;&#3609;&#3634;&#3588;&#3634;&#3619;&#3629;&#3629;&#3617;&#3626;&#3636;&#3609;</option>
          </select>
          <br>
          <label for="textfield7">Username :</label>
          <input name="Username" type="text" required id="textfield7">
          <br>
&nbsp;
<label for="password4">Password:</label>
<input name="password2" type="password" required id="password4">
<br>
          </p>
<input type="hidden" name="MM_insert" value="form1">
        <input type="submit" name="submit3" id="submit3" value="&#3621;&#3591;&#3607;&#3632;&#3648;&#3610;&#3637;&#3618;&#3609;">
        </form>
        <p>
          <label for="textfield9"></label>
<label for="textfield2"></label>
        </p>
        <p>
          <label for="textfield6"><br>
</label>
        </p>
      </div>
    <!--end content_item--></div>
    <div class="sidebar_container">
      <div class="sidebar">
        <div class="sidebar_item">
          <form ACTION="<?php echo $loginFormAction; ?>" id="form2" name="form2" method="POST">
            <h2>&#3648;&#3586;&#3657;&#3634;&#3626;&#3641;&#3656;&#3619;&#3632;&#3610;&#3610;</h2>
            <p><span style="font-size: 14px">
              <label for="textfield5">Username:</label>
              <input type="text" name="textfield5" id="textfield5">
              <br>
              <label for="password">Password:</label>
              <br>
              </span><span style="font-size: 14px">
                <input name="password" type="password" id="password" size="21">
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
&#3585;&#3629;&#3591;&#3607;&#3640;&#3609;<br>
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
