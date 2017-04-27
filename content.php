<?php require_once('Connections/topic.php'); ?>
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

$colname_Recordset1 = "-1";
if (isset($_GET['TopicID'])) {
  $colname_Recordset1 = $_GET['TopicID'];
}
mysql_select_db($database_topic, $topic);
$query_Recordset1 = sprintf("SELECT * FROM topic WHERE TopicID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $topic) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
	<script src="./jquerymobile/jquery-2.1.0.min.js"></script>
	<script src="./jquerymobile/jquery.mobile-1.4.5.min.js"></script>
    <link rel="stylesheet" href="./jquerymobile/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="css/mycss.css">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div data-role="page" id="home" >
	<div data-role="header" data-theme="b">
    	<a href="#" data-rel="back" data-role="button" data-theme="a">Back</a>
         <h3><?php echo $row_Recordset1['Title']; ?></h3>
    </div>

	<div role="main" class="ui-content">
		<div class="txt shadow round">
       		<?php echo $row_Recordset1['Content']; ?><br>
         </div>
  
      作者:<?php echo $row_Recordset1['Nickname']; ?><br>
      時間:<?php echo $row_Recordset1['Time']; ?><br>
		
    </div><!-- /content -->

</div><!-- /page -->
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
