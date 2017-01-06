Enter the country Name and 
<html>
<head><title>World</title>
<style>
div {background-color: green;}
div:hover{
	background-color: #d0d3d4;
	
}
div a {
    text-decoration: none;
    color: black;
    font-size: 10px;
    padding: 15px;
    display:inline-block;
    position: center;
   
}
ul {
  display: inline;
  margin: 0;
  padding: 0;
}
ul li {display: inline-block;}
ul li:hover {background: #555;}
ul li:hover ul {display: block;}
ul li ul {
  position: center;
  width: 200px;
  display: none;
}
ul li ul li { 
  background: #555; 
  display: block; 
}
ul li ul li a {display:block !important;
				} 
ul li ul li:hover {background: #666;}
ul li ul li a:hover{background-color: #aed6f1;}


table, tr, th {
    border: 1px solid black;
    border-collapse: collapse;
    position: center;
}
tr, th {
    padding: 15px;
    text-align: left;
}

table#t01 th:nth-child(even) {
    background-color: #eee;
color: black;
}
table#t01 th:nth-child(odd) {
   background-color:#fff;
   color: black;
}
table#t01 tr {
    background-color: black;
    color: white;
}
</style>


</head>
<body	background= "imas1.jpg"></body>
</html>


<center><form method="POST" name="test" action="form.html" >
 <center> <input type="submit" name="Submit"  value="Home" align="center" /></center>
</form></center>

<?php

include"check.php";
$query="SELECT * FROM continentpop";
$query1="SELECT * FROM continentpop1";

$con1="Asia";
$con2="North America";
$cars=array();
$cars=explode(' ', $con2);
$i=0;
$avr='';
for ($i=0; $i <count($cars)-1 ; $i++) { 
	# code...

$avr=$cars[$i].'+'.$avr;}
$avr=$avr.$cars[$i];
$con3="South America";
$cars3=array();
$cars3=explode(' ', $con3);
$i=0;
$avr3='';
for ($i=0; $i <count($cars3)-1 ; $i++) { 
	# code...

$avr3=$cars3[$i].'+'.$avr3;}
$avr3=$avr3.$cars3[$i];
$con4="Africa";
$con5="europe";
$con6="Australia";
$con7="Antarctica";
echo "<div>";
echo "<ul>";
echo "<li>";
echo "<center><a href='#'>Continent</a></center>";

echo "<ul>";

	echo "<li><a target='_blank' href=cdandpop2.php?var1=$con1>$con1</a></li>";
	echo "<li><a target='_blank' href=maxpop.php?var1=$avr>$con2</a></li>";
	echo "<li><a target='_blank' href=maxpop.php?var1=$avr3>$con3</a></li>";
	echo "<li><a target='_blank' href=maxpop.php?var1=$con4>$con4</a></li>";
	echo "<li><a target='_blank' href=maxpop.php?var1=$con5>$con5</a></li>";
	echo "<li><a target='_blank' href=maxpop.php?var1=$con6>$con6</a></li>";
	echo "<li><a target='_blank' href=maxpop.php?var1=$con7>$con7</a></li>";
echo "</ul>";
echo "</li>";
echo "</ul>";
echo "</div>";


#$lan2=$_POST['districtdata'];
if($result=mysqli_query($conn,$query1))
{
  if(mysqli_num_rows($result)==NULL)
  {
    echo "empty database";
  }
  else{
			echo "<table id='t01'>"	;
		echo "<tr>";
echo "<th>Continent</th>";
#echo "<th>CountryCode</th>";
echo "<th>SurfaceArea</th>";
echo "</tr>";

	while ($each_row=mysqli_fetch_assoc($result)) {
		$population=$each_row['cont_surfacearea'];
		$continent=$each_row['continent'];
		echo "<th>$continent</th>";
		echo "<th>$population</th>";
echo "</tr>";
}
echo "</table>";
}
}
if($result=mysqli_query($conn,$query))
{
  if(mysqli_num_rows($result)==NULL)
  {
    echo "empty database";
  }
  else{
			echo "<right><table id='t01'>"	;
		echo "<tr>";
echo "<th>Continent</th>";
#echo "<th>CountryCode</th>";
echo "<th>population</th>";
echo "</tr></right>";

	while ($each_row=mysqli_fetch_assoc($result)) {
		$population=$each_row['cont_population'];
		$continent=$each_row['continent'];
		echo "<th>$continent</th>";
		echo "<th>$population</th>";
echo "</tr>";
}
echo "</table>";
}
}

?>