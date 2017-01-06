	<!DOCTYPE html>
<html>
<head>
	<body>

<p><a href="http://localhost/home1.html">Visit Home page</a></p>

</body>
<style> 
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
table
{
border-style:solid;
border-width:2px;
border-color:Brown;
background-color:pink;

}
th, td {
    text-align: left;
    padding: 8px;
    border-color:creame;
    border-style:solid;
}
</style>
</head>
<?php
include'check.php';
$from1=$_GET['var1'];
#$from2=$_GET['var2'];
#$from3=$_GET['var3'];

echo $from."Dinesh";


#if(!empty($_POST['cities']) && empty($_POST['countries']) && empty($_POST['Districts'])){
#$username = $_POST['cities'];


	$city = 'select ID,city.Name as cityName,CountryCode,District,Population from city ';
	$result = mysqli_query($conn,$city);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			if($from1==$row['cityName'] || $from1=='ALL'){
				
			echo "<tr><td>".$row['ID']."</td>  <td>".$row['cityName']."</td>  <td>".$row['CountryCode']."</td>  <td>".$row['Population']."</td></tr>";
		}
	}
	echo "</table>";
	}



//if(!empty($_POST['countries']) && empty($_POST['cities']) && empty($_POST['Districts'])){
//$username = $_POST['countries'];


	$country = 'select city.ID,city.Name as cityName,city.CountryCode,city.District,city.Population,country.Name as countryName from city,country where city.CountryCode=country.Code';
	$result = mysqli_query($conn,$country);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			if($from3==$row['countryName'] || $from3=='ALL'){
				
			echo "<tr><td>".$row['ID']."</td>  <td>".$row['cityName']."</td>  <td>".$row['countryName']."</td>  <td>".$row['Population']."</td></tr>";
		}
	}
	echo "</table>";
	}



//if(!empty($_POST['Districts']) && empty($_POST['cities']) && empty($_POST['countries'])){
//$username = $_POST['Districts'];


	$District = 'select ID,city.Name as cityName,District,Population from city ';
	$result = mysqli_query($conn,$District);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			if($from2==$row['District'] || $from2=='ALL'){
				
			echo "<tr><td>".$row['ID']."</td>  <td>".$row['cityName']."</td>  <td>".$row['District']."</td>  <td>".$row['Population']."</td></tr>";
		}
	}
	echo "</table>";
	}

//if((!empty($_POST['Districts'])) && (!empty($_POST['cities'])) && empty($_POST['countries'])){
//	$Districts = $_POST['Districts'];
//	$cities = $_POST['cities'];
	
	

//if( (!empty($_POST['countries'])) && (!empty($_POST['cities'])) && (empty($_POST['Districts'])) ){
//	$countries = $_POST['countries'];
//	$cities = $_POST['cities'];
	$query = "select city.ID,city.Name as cityName,city.Population,District,country.Name as countryName from city,country where city.Name='$from1' and country.Name='$from3' and city.CountryCode=country.Code";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row= mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['ID']."</td><td>".$row['cityName']."</td><td>".$row['Population']."</td><td>".$row['District']."</td><td>".$row['countryName']."</td></tr>";
		}
		echo "</table>";
	}
	else
			echo "0";

else
{
	echo mysqli_error($conn);
}

//if( (!empty($_POST['countries'])) && (!empty($_POST['cities'])) && (!empty($_POST['Districts'])) ){
//	$countries = $_POST['countries'];
//	$cities = $_POST['cities'];
//	$Districts = $_POST['Districts'];
	$query = "select city.ID,city.Name as cityName,city.Population,District,country.Name as countryName from city,country where city.Name='$from1' and country.Name='$from3' and city.CountryCode=country.Code";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row= mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['ID']."</td><td>".$row['cityName']."</td><td>".$row['District']."</td><td>".$row['countryName']."</td><td>".$row['Population']."</td></tr>";
		}
		echo "</table>";
	}
	else
			echo "0";
}
else
{
	echo mysqli_error($conn);
}
//if((!empty($_POST['Districts'])) && (empty($_POST['cities'])) && empty(!$_POST['countries'])){
//	$Districts = $_POST['Districts'];
//	$countries = $_POST['countries'];
	$query =" select ID,city.Name as cityName,city.Population,District from city,country where District='$from2' and country.Name='$from3' and city.CountryCode=country.Code";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row= mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['ID']."</td><td>".$row['cityName']."</td><td>".$row['District']."</td><td>".$row['Population']."</td></tr>";
		}
		echo "</table>";
	}
}
?>