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

mysql_select_db($database_topic, $topic);
$query_Recordset1 = "SELECT * FROM topic ORDER BY TopicID DESC";
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
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div data-role="page" id="home" >

	<div role="main" class="ui-content">

        <ul data-role="listview" data-inset="true">
        	   <?php do { ?>
       	    <li data-icon="info">
       	   
       	        <?php echo "<a href="."./content.php?TopicID=".$row_Recordset1['TopicID'].">".$row_Recordset1['Title']."</a>"; ?>
   	        
       	    </li>
        	   <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </ul>

    </div><!-- /content -->

</div><!-- /page -->
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
