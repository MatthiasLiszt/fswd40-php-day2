<html>
<body>
<h1>Exercise 1</h1>
<div>
<?php 
 $viewer=getenv("HTTP_USER_AGENT");
 $browser="unknown browser";
 $addCss=false;
 
 if(preg_match('/Chrome/i',"$viewer"))
  {$css="<link rel='stylesheet' href='chrome.css'>";
   $browser="chrome";
   $addCss=true; 
  }
 if(preg_match('/Firefox/i',"$viewer"))
  {$css="<link rel='stylesheet' href='mozilla.css'>";
   $browser="mozilla";
   $addCss=true;
  }

  if($addCss)
  {echo $css;
  } 

  echo "<p id='output'>you are watching with $viewer</p>";
?>
</div>
<h2>Exercises 3</h2>
<form action='' method='get'>
<p><input type='text' name="dividend"></p>
<p><input type='text' name="divisor"></p>
<p><button type="submit" name="submit" >divide</button></p>
</form>
<?php

 if(isset($_GET['submit']))
 {
 $dividend=$_GET['dividend'];
 $divisor= $_GET['divisor'];

 if(is_numeric($dividend) && is_numeric($divisor))
  {
   $dividend=(double)$dividend;
   $divisor=(double)$divisor;

   if($divisor==0)
    {echo "error: divisor is zero";}
   else
    {$result=divide($dividend,$divisor);
     echo "the result is $result";
    }
  }
 else
  {echo "error: you did not enter numbers";}
 }

function divide($a,$b){
 return $a/$b;
}
?>


</body>
</html>