<?php

	function Trapezium($array,$h)
	{
		$x=array_shift($array);
		$y=array_pop($array);
		$I=(($x+$y)*$h)/2;
	   foreach($array as $key=>$value) 
        { 
          $I+=$h*$value;
        } 
		// echo "Parabolic method:  $I" . PHP_EOL ; 
		return $I;
	}
	function Parabola($array,$h)
	{
		$a=array_shift($array);
		$b=array_pop($array);
		//$I=(($a+$b)*$h)/6;
		$I=(($a+$b)*$h)/6;
		$count=count($array);
	   for($i=0;$i<$count;$i+=2)
        { 
        	
          $I+=4*$h*$array[$i]/3;
        } 
         for($i=2;$i<$count;$i+=2)
        { 
        	
          $I+=2*$h*$array[$i]/3;
        } 
		// echo "Simpson's method: $I" . PHP_EOL ; 
		return $I;
	}
	function Three_eighths($array,$h)
	{
		$a=array_shift($array);
		$b=array_pop($array);
		$I=(($a+$b)*3*$h)/8;
		$count=count($array);
		
	   for($i=0;$i<$count;$i+=3)
        { 
        $I+=9*$h*$array[$i]/8;
        // if($array[$i+1]!=null)
		if($i+1<$count)
       	 $I+=9*$h*$array[$i+1]/8;     
        } 
         for($i=2;$i<$count;$i+=3)
        { 
         $I+=6*$h*$array[$i]/8; 
        } 
		//echo "Three-eighths method: $I" . PHP_EOL ; 
		return $I;
	}

?>