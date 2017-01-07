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
</style>


</head>
<body background= "imas1.jpg"></body>


</html>
<center><form method="POST" name="test" action="form.html" >
 <center> <input type="submit" name="Submit"  value="Home" align="center" /></center>
</form></center>

<?php

include'check.php';

$lan1=$_GET['var1'];
$query="SELECT Name from country where Continent='$lan1'";
if($result=mysqli_query($conn,$query))
{
  if(mysqli_num_rows($result)==NULL)
  {
    echo "empty database";
  }
  else{
    echo "<div>";
echo "<ul>";
echo "<li>";
echo "<center><a href='#'>Country</a></center>";
echo "<ul>";
    while ($each_row=mysqli_fetch_assoc($result)) {
      $cars=array();
$cars=explode(' ', $each_row['Name']);
$i=0;
$avr=$cars[$i];
for ($i=1; $i<count($cars) ; $i++) { 
  # code...

$avr=$avr.'+'.$cars[$i];}
//$avr=$avr.'+'.$cars[$i];  

      $country=$each_row['Name'];

      echo "<li><a href=cdandpop1.php?var2=$avr>$country</a></li>";

}
echo "</ul>";
echo "</li>";
echo "</ul>";
echo "</div>";
}
}
?>

