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
require ("check.php");
$name = $_GET["name"];
echo $name;
$sql = "select count(*) from country where name = '$name';";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($res);
if ($row[0]!=0) {
  $z = urlencode($name);
  header( "Location: http://localhost/country1.php/?name=$z" ) ;
}
$sql = "select count(*),id from city where name = '$name';";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($res);
if ($row[0]!=0) {
  header( "Location: http://localhost/city.php/?id=$row[1]" ) ;
}
$sql = "select count(*) from city where district = '$name';";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($res);
if ($row[0]!=0) {
  $z=urlencode($name);
  header( "Location: http://localhost/showcity.php/?district=$z" ) ;
}
$sql ="select name from country where name like '$name%';";
$res = mysqli_query($conn,$sql);
echo "Do you mean .... <br><br>";
$n=0;
while($row = mysqli_fetch_row($res)) {
  if ($n==0) {
    # code...
    echo "in countries.. <br>";
  }
  $n=1;
  $k=urlencode($row[0]);
  echo "<a href=http://localhost/country.php/?name=$k>$row[0]</a>" ;
  echo "<br>";
}
if ($n==1) {
  # code...
  echo "<br>";
}

$sql ="select name,id from city where name like '$name%';";
$res = mysqli_query($conn,$sql);
$n=0;
while($row = mysqli_fetch_row($res)) {
  if ($n==0) {
    # code...
    echo "in cities.. <br>";
  }
  $n=1;
  echo "<a href=http://localhost/city.php/?id=$row[1]>$row[0]</a>" ;
  echo "<br>";
}
$sql =" select distinct(country.name),city.district from city,country where city.countrycode=country.code and city.district like '$name%';";
$res = mysqli_query($conn,$sql);

if ($n==1) {
  # code...
  echo "<br>";
}
$n=0;
while($row = mysqli_fetch_row($res)) {
  if ($n==0) {
    # code...
    echo "in districts.. <br>";
  }
  $n=1;
  $k=urlencode($row[1]);
  echo "<a href=http://localhost/showcity.php/?district=$k>$row[1]</a>" ;
  echo "      $row[0]";
  echo "<br>";
}
 ?>