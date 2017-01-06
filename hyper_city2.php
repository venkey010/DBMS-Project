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
$from2=$_GET['var2'];
echo "$var2";
$District = 'select  city.Name as cityName,District,Population from city where District='$from2'';
    $result = mysqli_query($conn,$District);
    if(mysqli_num_rows($result)>0){
        echo"<table>";
        while($row = mysqli_fetch_assoc($result)){
           // if($from2==$row['District'] || $from2=='ALL'){
                
            echo "<tr> <td>".$row['cityName']."</td>  <td>".$row['District']."</td>  <td>".$row['Population']."</td></tr>";
        }
    }
    echo "</table>";
    }
>?