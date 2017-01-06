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
</style>
</head>


</body>
</html>
  
 <html>
<head>
<style>
body  {
    background-image: url("https://newevolutiondesigns.com/images/freebies/city-wallpaper-47.jpg");
    background-color: #cccccc;
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

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body bgcolor="#EEFDEF">


<html>
  <body>
  	

  	<form name='form' method='post' action="city.php">
  <center><input type="text" name="cities" placeholder="Searchcity" value=""><br></center>
    <center><input type="text" name="countries" placeholder="Searchcountry" value=""><br></center>
  <center><input type="text" name="Districts" placeholder="Districts" value=""><br></center>

    <center><input type="submit" name="submit" value="submit"><br></center>
</form>
</body>
</html>



<?php
include'check.php';


if(!empty($_POST['cities']) && empty($_POST['countries']) && empty($_POST['Districts'])){
$username = $_POST['cities'];


	$city = 'select ID,city.Name as cityName,CountryCode,District,Population from city ';
	$result = mysqli_query($conn,$city);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			if($username==$row['cityName'] || $username=='ALL'){
				
			echo "<tr><td>".$row['ID']."</td>  <td>".$row['cityName']."</td>  <td>".$row['CountryCode']."</td>  <td>".$row['Population']."</td></tr>";
		}
	}
	echo "</table>";
	}
}


if(!empty($_POST['countries']) && empty($_POST['cities']) && empty($_POST['Districts'])){
$username = $_POST['countries'];


	$country = 'select city.ID,city.Name as cityName,city.CountryCode,city.District,city.Population,country.Name as countryName from city,country where city.CountryCode=country.Code';
	$result = mysqli_query($conn,$country);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			if($username==$row['countryName'] || $username=='ALL'){
				
			echo "<tr><td>".$row['ID']."</td>  <td>".$row['cityName']."</td>  <td>".$row['countryName']."</td>  <td>".$row['Population']."</td></tr>";
		}
	}
	echo "</table>";
	}
}


if(!empty($_POST['Districts']) && empty($_POST['cities']) && empty($_POST['countries'])){
$username = $_POST['Districts'];


	$District = 'select ID,city.Name as cityName,District,Population from city ';
	$result = mysqli_query($conn,$District);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			if($username==$row['District'] || $username=='ALL'){
				
			echo "<tr><td>".$row['ID']."</td>  <td>".$row['cityName']."</td>  <td>".$row['District']."</td>  <td>".$row['Population']."</td></tr>";
		}
	}
	echo "</table>";
	}
}
if((!empty($_POST['Districts'])) && (!empty($_POST['cities'])) && empty($_POST['countries'])){
	$Districts = $_POST['Districts'];
	$cities = $_POST['cities'];
	$query = "select ID,city.Name as cityName,city.Population,District from city where city.Name='$cities' and District='$Districts' ";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row= mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['ID']."</td><td>".$row['cityName']."</td><td>".$row['District']."</td><td>".$row['Population']."</td></tr>";
		}
		echo "</table>";
	}
}
if( (!empty($_POST['countries'])) && (!empty($_POST['cities'])) && (empty($_POST['Districts'])) ){
	$countries = $_POST['countries'];
	$cities = $_POST['cities'];
	$query = "select city.ID,city.Name as cityName,city.Population,District,country.Name as countryName from city,country where city.Name='$cities' and country.Name='$countries' and city.CountryCode=country.Code";
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
}
else
{
	echo mysqli_error($conn);
}

if( (!empty($_POST['countries'])) && (!empty($_POST['cities'])) && (!empty($_POST['Districts'])) ){
	$countries = $_POST['countries'];
	$cities = $_POST['cities'];
	$Districts = $_POST['Districts'];
	$query = "select city.ID,city.Name as cityName,city.Population,District,country.Name as countryName from city,country where city.Name='$cities' and country.Name='$countries' and city.CountryCode=country.Code";
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
if((!empty($_POST['Districts'])) && (empty($_POST['cities'])) && empty(!$_POST['countries'])){
	$Districts = $_POST['Districts'];
	$countries = $_POST['countries'];
	$query =" select ID,city.Name as cityName,city.Population,District from city,country where District='$Districts' and country.Name='$countries' and city.CountryCode=country.Code";
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