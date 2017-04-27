<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<meta name="author" content="Ste Brennan - Code Computerlove - http://www.codecomputerlove.com/" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="styles.css" type="text/css" rel="stylesheet" />
	
	<link href="./photoswipe/photoswipe.css" type="text/css" rel="stylesheet" />
	
	<script type="text/javascript" src="./photoswipe/klass.min.js"></script>
	<script type="text/javascript" src="./photoswipe/code.photoswipe-3.0.5.min.js"></script>
	
	
	<script type="text/javascript">
	
		(function(window, PhotoSwipe){
		
			document.addEventListener('DOMContentLoaded', function(){
			
				var
					options = {},
					instance = PhotoSwipe.attach( window.document.querySelectorAll('#Gallery a'), options );
			
			}, false);
			
			
		}(window, window.Code.PhotoSwipe));
		
	</script>

</head>

<body>

<div id="MainContent">
	
	<ul id="Gallery" class="gallery">

<?php
$servername = "localhost";
$username = "admin";
$password = "123456";
$dbname = "product";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, Img, Title FROM description";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<li><a href="."./img/" . $row["Img"]. "><img src="."./img/" . $row["Img"]. " alt=".$row["Title"] . " ></a></li>";
		// <li><a href="img/m01.png"><img src="img/m01.png" alt="Image 001" /></a></li>  
    }
} else {
    echo "0 results";
}
$conn->close();
?>


        	  
       </ul>
	
</div>
<div id="Footer">
</div>
	
</body>
</html>