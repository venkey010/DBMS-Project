 <!DOCTYPE html>
<html>
<head>
<p><a href="http://localhost/home1.html">Visit Home page</a></p>
<style>

input[type=text] {
    width: 250px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white`;
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
background-color:B3BAC7;

}
th, td {
    text-align: left;
    padding: 8px;
    border-color:Brown;
    border-style:solid;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body bgcolor="#EEFDEE">

<html>
  <body>
  	

  	<form name='form' method='post' action="country.php">
  	
    <center><input type="text" name="countries" placeholder="Searchcountries" value=""><br></center>
    <center><input type="text" name="continents" placeholder="Searchcontinents" value=""><br></center>

    <center><input type="submit" name="submit" value="submit"><br></center>
</form>
</body>
</html>



<?php
include'check.php';
echo $_POST['countryName'];

	if( (!empty($_POST['countries'])) && (empty($_POST['continents'])) ){
	$username = $_POST['countries'];
	$country = 'select Code,Name,Continent,Region,SurfaceArea,IndepYear,Population,LifeExpectancy,GNP,GNPOld,LocalName,GovernmentForm,HeadOfState,Capital,Code2 from country ';
	$result = mysqli_query($conn,$country);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			if($username==$row['Name'] || $username=='ALL'){
				
			echo "<tr><td>".$row['Code']."</td>  <td>".$row['Name']."</td>  <td>".$row['Continent']."</td>  <td>".$row['Region']."</td>  <td>".$row['SurfaceArea']."</td>  <td>".$row['IndepYear']."</td>  <td>".$row['Population']."</td>  <td>".$row['LifeExpectancy']."</td>  <td>".$row['GNP']."</td>  <td>".$row['GNPOld']."</td>  <td>".$row['LocalName']."</td>  <td>".$row['GovernmentForm']."</td>  <td>".$row['HeadOfState']."</td>  <td>".$row['Capital']."</td>  <td>".$row['Code2']."</td></tr>";
			}
		}
	}
}

	if( (!empty($_POST['countries'])) && (empty($_POST['continents'])) ){
	$username = $_POST['countries'];
	$country = 'select city.ID,city.Name as cityName,city.CountryCode,city.District,city.Population,country.Name as countryName from city,country where city.CountryCode=country.Code';
	$result = mysqli_query($conn,$country);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			if($username==$row['countryName'] ){
				
				echo "<tr><td>".$row['ID']."</td>  <td>".$row['cityName']."</td>  <td>".$row['countryName']."</td>  <td>".$row['Population']."</td></tr>";			}
		}
	}
}


if( (!empty($_POST['continents'])) && (empty($_POST['countries'])) ){
$username = $_POST['continents'];
	$country1 = 'select distinct Continent from country ';
	$result = mysqli_query($conn,$country1);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			if($username==$row['Continent'] || $username=='ALL'){
				
			echo "<tr><td>".$row['Continent']."</td></tr>";}
	}
	}
}

if( (!empty($_POST['continents'])) && (empty($_POST['countries'])) ){
	$username = $_POST['continents'];
	$country2 = 'select Code,country.Name as countryName,Continent from country';
	$result = mysqli_query($conn,$country2);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			//if($username==$row['Continent']){
				echo "<tr><td>".$row['Code']."</td> <td>".$row['countryName']."</td></tr>";
			//}
		}
	}
}
if( (!empty($_POST['continents'])) && (!empty($_POST['countries'])) ){
	$continents = $_POST['continents'];
	$countries = $_POST['countries'];
	$country2 = "select Code,country.Name as countryName,Continent,Region,SurfaceArea,IndepYear,country.Population,LifeExpectancy,GNP,GNPOld,LocalName,GovernmentForm,HeadOfState,Capital,Code2 from country where country.Name='$countries' and continent='$continents' ";
	$result = mysqli_query($conn,$country2);
	if(mysqli_num_rows($result)>0){
		echo"<table>";
		while($row = mysqli_fetch_assoc($result)){
			
				echo "<tr><td>".$row['Code']."</td>  <td>".$row['countryName']."</td>  <td>".$row['Continent']."</td>  <td>".$row['Region']."</td>  <td>".$row['SurfaceArea']."</td>  <td>".$row['IndepYear']."</td>  <td>".$row['country.Population']."</td>  <td>".$row['LifeExpectancy']."</td>  <td>".$row['GNP']."</td>  <td>".$row['GNPOld']."</td>  <td>".$row['LocalName']."</td>  <td>".$row['GovernmentForm']."</td>  <td>".$row['HeadOfState']."</td>  <td>".$row['Capital']."</td>  <td>".$row['Code2']."</td></tr>";
			
		}
		echo"</table>";
	}
}
else
{
	echo mysqli_error($conn);
}
?>