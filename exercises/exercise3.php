<?php
 $dividend=$_GET['dividend'];
 $divisor=$_GET['divisor'];

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

function divide($a,$b){
 return $a/$b;
}
?>
