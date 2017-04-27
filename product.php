<?php require_once('Connections/product.php'); ?>
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

mysql_select_db($database_product, $product);
$query_Recordset1 = "SELECT * FROM `description` ORDER BY ID DESC";
$Recordset1 = mysql_query($query_Recordset1, $product) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listview Responsive Grid - jQuery Mobile Demos</title>
	<link rel="shortcut icon" href="./img/favicon.ico">
	<link rel="stylesheet" href="./jquerymobile/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="listview-grid.css">
	<script src="./jquerymobile/jquery-2.1.0.min.js"></script>
	<script src="./jquerymobile/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>
<div data-role="page" data-theme="b" id="demo-page" class="my-page">

	<div role="main" class="ui-content">

        <ul data-role="listview" data-inset="true">
        	<?php do { ?>
       	    <li><a href="#">
        	    <!--<img src="./img/htc-10.png" class="ui-li-thumb">-->
        	    <?php echo "<img src=./img/".$row_Recordset1['Img']." class=ui-li-thumb>"; ?>
        	    <h2><?php echo $row_Recordset1['Title']; ?></h2>
        	    <p>Apple released iOS 6.1</p>
        	    <p class="ui-li-aside">htc</p>
       	      </a></li>
        	  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </ul>

    </div><!-- /content -->

</div><!-- /page -->
<?php echo "<img src=localhost/img/".$row_Recordset1['Img'].">"; ?>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
