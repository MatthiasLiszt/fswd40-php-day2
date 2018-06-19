<html>
<title>database tasks</title>
<body>
<h3>create a database </h3>
<form method='get'>
<p>database name: <input type='text' name="dbname"/></p>
<p><button type="submit" name="dbnameSet">submit</button></p>
</form>
<?php

 if(isset($_GET['dbnameSet']))
  {createDatabase($_GET['dbname']);}

 function createDatabase($dbname){
  $server='localhost';
  $user='root';
  $sql="create database $dbname CHARACTER SET utf8mb4"; 
  $connect=mysqli_connect($server,$user);
  if($connect)
   {mysqli_query($connect,$sql);
    echo "$dbname created";
    mysqli_close($connect);
   }
  else
   {echo "error: no connection to database";}
  
 }

?>
<h3>create a table - in a database </h3>
<form method='get'>
<p>database name: <input type='text' name="dbname"/></p>
<p>table name: <input type='text' name="dbtable" /></p>
<p><button type="submit" name="dbtableSet">submit</button></p>
</form>
<?php
  
  if(isset($_GET['dbtableSet']))
   {createTable($_GET['dbname'],$_GET['dbtable']);
   }

  function createTable($dbname,$dbtable){
   $server='localhost';
   $user='root';
   $pw='';
   $sql="create table $dbtable(id int(12) auto_increment primary key, name varchar(21), surname varchar(21))"; 
   $insert="insert into $dbtable(name,surname) values ('dummy','dummy')";
   
   $c=mysqli_connect($server,$user,$pw,$dbname);
   
 if($c)
    {mysqli_query($c,$sql);
     mysqli_query($c,$insert);
     echo "$dbtable created and dummy data inserted";
    }
   else
    {echo "error: no connection to database";}

  }

?>
<h3>a sample data form </h3>
<form method="get">
<p>database name: <input type='text' name="dbname"/></p>
<p>table name: <input type='text' name="dbtable" /></p>
<h6>content for new table entry</h6>
<p>name <input type="text" name="name"/></p>
<p>surname <input type="text" name="surname"/></p>
<p><button type="submit" name="dataSet">submit</button></p>
</form>
<?php
  function connectDB($dbname){
   $server='localhost';
   $user='root';
   $pw='';
   $c=mysqli_connect($server,$user,$pw,$dbname);
 
   return $c;
  } 

  function insertData($connect,$table,$name,$surname){
   $insert="insert into $table(name,surname) values ('$name','$surname')";
   mysqli_query($connect,$insert);
  }

  if(isset($_GET['dataSet']))
   {//$connect=connectDB($_GET['dbname']);
    $server='localhost';
    $user='root';
    $pw='';
    $dbname=$_GET['dbname'];
    $connect=mysqli_connect($server,$user,$pw,$dbname);
    if($connect)
     {//insertData($connect,$_GET['dbtable'],$_GET['name'],$_GET['surname']);
      $table=$_GET['dbtable'];
      $name=$_GET['name'];
      $surname=$_GET['surname'];
      $insert="insert into $table(name,surname) values ('$name','$surname')";
      mysqli_query($connect,$insert);
      echo "$name, $surname inserted into $table";     
     }
    else
     {echo "error: connection failed";}
   }

?>
<h3>show table data</h3>
<form method="get">
<p>database name: <input type='text' name="dbname"/></p>
<p>table name: <input type='text' name="dbtable" /></p>
<p><button type="submit" name="showSet">show</button></p>
</form>
<?php
 if(isset($_GET['showSet'])){
   showData($_GET['dbname'],$_GET['dbtable']);
   echo "show data now";
 }  
else
 {echo "you did not select database nor table";}

 function showData($dbname,$table){
    $server='localhost';
    $user='root';
    $pw='';
    
    $connect=mysqli_connect($server,$user,$pw,$dbname);

    $sql="select name,surname from $table ";
    $result=mysqli_query($connect,$sql);

    echo "showData executed";

    if($connect){
      if(mysqli_num_rows($result)>0)
       {while($row = mysqli_fetch_assoc($result)){
                $name=$row['name'];
                $surname=$row['surname'];
                echo "<p>$name $surname</p>";
               }
       }
      else
       {echo "table is empty";}
     }
    else
     {echo "not connected";}
 }
?>
</body>
</html>

