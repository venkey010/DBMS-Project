<!DOCTYPE html>
<html>
<head>
	<p><li><a href="http://localhost/home1.html">Visit Home page</a></li></p>
<style> 
body  {
    background-image: url("http://www.sltinfo.com/wp-content/uploads/2014/01/most-spoken-languages-in-the-world.jpg");
    background-color: #cccccc;
}

input[type=text] {
    width: 250px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 10px 12px 20px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 45%;
}
</style>
</head>

</body>
</html>  


 <html>
<head>
<style>
table
{
border-style:solid;
border-width:2px;
border-color:Brown;
background-color:red;
}
th, td {
    text-align: left;
    padding: 8px;
    border-color:creame;
    border-style:solid;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body bgcolor="#EEFDEF">


<html>
  <body>
  	<form name='form' method='post' action="countrylanguage.php">
  <center><input type="text" name="languages" placeholder="Searchlanguage" value=""><br></center>

    <center><input type="submit" name="submit" value="submit"><br></center>
</form>
</body>
</html>



<?php
include'check.php';
$from1=$_GET['var8'];


//if(!empty($_POST['languages'])){
//$username = $_POST['languages'];


	$city = 'call language()';
    echo $city;
	$result = mysqli_query($conn,$city);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			if($from8==$row['Language'] || $from8=='ALL'){
				
			echo "<tr><td>".$row['CountryCode']."</td>  <td>".$row['Language']."</td>  <td>".$row['IsOfficial']."</td>  <td>".$row['Percentage']."</td></tr>";
		}
	}
	}
}
?>