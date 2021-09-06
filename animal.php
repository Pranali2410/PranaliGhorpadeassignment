<?php

$con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "animal_db");
error_reporting(0);
$q="SELECT * FROM animaltb ";
$data=mysqli_query($con,$q);
$total=mysqli_num_rows($data);

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Animal listing page</title>
        <style type="text/css">
        *{
            margin: 0px;
            padding: 0px;
            background-color: grey;
            
        }

        .ani{
            margin-top: 30px;
            text-align: center;
            color: darkgreen;
        }
      

        table{
	width: 50%;
        margin-top: -300px;
        margin-left: 400px;
	text-align: center;
	border-color: black;
    color: black;
    font-size: 20px;
    font-style: hypot;

	}

    th{
	     
		text-align: center;
        font-size: 25px;
        font-family: calibri;
        color: black;
	}

    tr{
        text-align: center;
        font-family: calibri;


    }
    .one{
        margin-top: 100px;
        
        background-color: black;
        height: 100px;
        width: 200px;
        
        margin-left: 30px;
        font-size: 20px;
        color: white;
        text-align: center;
        padding-top: 30px;
        
    }
    .opt{
        margin-top: 20px;
        margin-left: 20px;
        height: 20px;
        width: 120px;
        
    }

</style>

    </head>
    <body>
        <h1 class="ani">Animal Listing Page</h1>


        


<?php
  $ip=$_SERVER['REMOTE_ADDR'];

	$sql ="INSERT INTO  counter (ipaddr) VALUES ('$ip')";
    	mysqli_query($con,$sql);
	$select ="SELECT * FROM counter ";
	$count= mysqli_num_rows(mysqli_query($con,$select));
?>
   


<div class="one"> Visitors Count:<br> <?php echo $count;?> </div><br><br>

<h4>Sort list :</h4> <select class="opt" name="alpha"><option>Choose option</option>
 <option> sort Alphabetically</option>
 <option> sort by date </option>
 </Select>
 <input type="button" name="sort " value="SORT"><br><br><br>


<?php


?>
      


<table border="2">
	<tr>
		<!--<th>Id</th>-->
	    <th>Name</th>
	    <th>Category</th>
	    <th>Image</th>
		<th>Description</th>
		<th>Life_Expectancy</th>


	</tr>
    
    <?php
     
          

    while($result=mysqli_fetch_assoc($data))
    {
            echo"<tr>
                     
                     <td>".$result['name']."</td>
                     <td>".$result['category']."</td>
                     <td><img src='".$result['image']."' height=' 100' width='100'></td>
                     <td>".$result['description']."</td>
                     <td>".$result['life']."</td>
        </tr>";
    }
   
    ?>
</table>
</body>
</html>

<