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
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ซื้อสินค้าออนไลน์</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <style type="text/css">
  body,td,th {
	font-family: times, times, sans-serif;
	font-size: 0.9em;
	color: #000000;
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
  <!--end header--></p>
  <div id="site_content">
    <div id="content">
      <div class="content_item">
        <p><span style="font-size: 18px; font-weight: bold; color: #000000;">ซื้อสินค้าออนไลน์</span></p>
        <p>-----------------------------------</p>
        <table width="651" border="1">
          <tbody>
            <tr>
              <th width="209" height="202" align="center" valign="middle" scope="row"><p><img src="file:///E|/xampp/htdocs/img/Nokia-Lumia-540-Dual-SIM.jpg" width="220" height="218" alt=""/></p>
                <p>Nokia Lumia 640<br>
                <span style="color: #000000; font-weight: bold;">THB 5,990</span> </p>
              <p>
                <input type="submit" name="submit" id="submit" value="Submit">
              </p></th>
              <td width="212" align="center" valign="top"><p><img src="file:///E|/xampp/htdocs/img/432014122914AM_635_nokia_lumia_630_dual_sim.jpeg" width="220" height="218" alt=""/></p>
              <p><strong>Nokia Lumia 630 Dual Sim</strong><br>
                <strong style="color: #000000">THB 4,790</strong> </p>
              <p>
                <input type="submit" name="submit2" id="submit2" value="Submit">
              </p></td>
              <td width="208" align="center" valign="top"><p><img src="file:///E|/xampp/htdocs/img/94201425319PM_635_nokia_lumia_730_dual_sim.jpeg" width="198" height="218" alt=""/><br>                
                </p>
                <p>Nokia Lumia 730<br>
                <span style="color: #000000; font-style: normal; font-weight: bold;">THB 7,490</span></p>
                <p>
                  <input type="submit" name="submit3" id="submit3" value="Submit">
                  <br>
              </p></td>
            </tr>
            <tr>
              <th height="205" align="center" scope="row"><p><img src="file:///E|/xampp/htdocs/img/original-1376582920338.png" width="220" height="218" alt=""/></p>
              <p>Nokia Wireless Charger<br>
                <span style="color: #000000">THB 950</span> </p>
              <p>
                <input type="submit" name="submit4" id="submit4" value="Submit">
              </p></th>
              <td align="center" valign="top"><p><img src="images/เคสมือถือ-เคส-ROCK-NOKIA-925-Elegant-Side-Flip-case-Gadget-Friends02.jpg" width="220" height="218" alt=""/></p>
              <p>Rock Elegant Flip Case<br>
THB 550              </p>
              <p>
                <input type="submit" name="submit5" id="submit5" value="Submit">
              </p></td>
              <td align="center"><p><img src="images/en-INTL_L_Yurbuds_Ironman_INSPIRE_Talk_Sport_Earbuds_BLACK_DCF-00104_mnco.jpg" width="200" height="218" alt=""/></p>
              <p>Ear Bud Earphone<br>
                THB 350</p>
              <p>
                <input type="submit" name="submit6" id="submit6" value="Submit">
              </p></td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
    <!--end content_item--></div>
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
          <p><a href="Shop_online.php">&#3595;&#3639;&#3657;&#3629;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&#3629;&#3629;&#3609;&#3652;&#3621;&#3609;&#3660;</a><br />
            <a href="Fund.php">&#3585;&#3629;&#3591;&#3607;&#3640;&#3609;
            </a><br>
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
