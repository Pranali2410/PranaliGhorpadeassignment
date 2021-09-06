<?php

$con= mysqli_connect("localhost","root",""); //database connection
mysqli_select_db($con, "animal_db");

?>
 
 <!--HTML code -->

<!DOCTYPE html>
<html>
    <head>
        <title>Animal Information </title>
        <style type="text/css">
        * {
            margin: 0;
            padding: 0;
    
        
        }

        body {
             background-image: url(abc.jpg); 
             background-position: center;
             background-repeat: no-repeat;
             background-size: cover; 
             font-family: sans-serif; 
             margin-top: 30px;
        }
        .animal{
            margin-top: 30px;
            width: 500px;
            height: 50px;
            background-color:rgb(0,0,0,0.6);
            margin: auto;
            color: white;
            padding: 20px,0px,10px,0px;
            text-align: center;
            border-radius: 15px,15px,0px,0px;
        }
        .main{
            background-color: rgb(0,0,0,0.5);
            width: 500px;
            margin: auto;

        }
        form {
            padding: 10px;
        }
        .name{
            margin-left: 20px;
            margin-top: 20px;
            width: 100px;
            color: white;
            
        }
        .aname{
            position: relative;
            left: 100px;
            top: -25px;
            right: 100px;
            line-height: 30px;
            margin-left: 30px;
            border-radius: 6px;
            padding-left: 40px;
            padding-right: 40px;
            
        }
       .cate{
            margin-left:  130px;
            margin-top: -100px;
            height: 40px;
        
            width: 200px;
            color: black ;
            
        }
        .herbi{
            margin-top: 30px;
            
            
            
        }
        
    
        .imag{
            margin-left: 140px;
            margin-top: -10px;
            height: 40px;
            width: 900px;
        }
        .des{
            margin-left: 150px;
            margin-top: -20px;
        }
        .opt{
            margin-left: 150px;
            margin-top: -10px;
            height: 30px;
            width: 200px;
        }
        .sub{
            margin-left: 160px;
            height:40px;
            width: 140px;
            background-color: yellowgreen;
        }
        </style>
    </head>
    
    <body>



        
        <div class="animal"><h1>Animal Information Form</h1><br><br></div>
        <div class="main">
  <form method="POST"  enctype="multipart/form-data">  
    <h4 class="name">Name:</h4>
    <input class="aname" type="text" name="name" placeholder="Enter the name of Animal"/> <br><br>
    <font color="white"><h4>Category:</h4> <select class="cate" name="category"> 
        <option>Choose option</option>
        <option >Herbivores</option>
        <option>Omnivores</option>
        <option>Carnivores</option>
      </select>


 <h4 class= herbi> Upload Image:</h4> 
 <input class="imag"  type="file" name="image" value=""><br><br><br>
 

  

<h4>Description:</h4> <textarea class="des" rows="6" cols="25" name="description" placeholder="Description"> 
</textarea>  <br><br><br>

<h4>Life Expectancy :</h4> <select class="opt" name="life"><option>Choose option</option>
 <option> 0-1 year </option>
 <option> 1-5 years </option>
 <option> 5-10 years </option>
 <option> 10+ years </option></Select><br><br><br>
<input class="sub"  type="submit" name="submit" value="submit">


   </font>
</form>


<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $category = $_POST['category'];
    $image = $_FILES['image']["name"];
    $tempname = $_FILES['image']["name"];
    $folder = "animalsimg/" .$image;
    move_uploaded_file($tempname, $folder);
    $description = $_POST['description'];
    $life = $_POST['life'];


    if($name!= "" && $category!=""  && $image!="" && $description!= ""  && $life!= "" )
    {
        $query= "INSERT INTO animaltb VALUES ('$name','$category','$folder','$description','$life')";

        $data=mysqli_query($con,$query);

        if($data)
      {
        echo "data is inserted into database";
       }
    }
     else
        {
            echo "All fields are required";
        }            
}

?>

    </body>
</html>