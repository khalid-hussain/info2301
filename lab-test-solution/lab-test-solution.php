<?php
if(isset($_POST["type"]))
{
	$input = NULL;
	$input = $_POST["type"];
	$expression = $_POST["expression"];
  
	if($input === '=' && count($expression)>2) 
  {	
		$expr_tmp = array();
		$sum=NULL;$op = NULL;$op2=FALSE;
		
    for($index=2;$index<sizeof($expression);$index+=2)
    {			
			$op = $expression[$index];
			switch ($op)
      {
				case '*':
					$sum = $expression[$index-1];					
					$sum *= $expression[$index+1];
					$expression[$index+1]=$sum;					
					break;
				case '/':
					$sum = $expression[$index-1];									
					$sum /= $expression[$index+1];
					$expression[$index+1]=$sum;							
					break;								
				default:
					if(!is_numeric($op))
          {									
						$op2 = TRUE;
						$expr_tmp[]=$expression[$index-1];	
						$expr_tmp[]=$expression[$index];
					}															
			}		
		}
    
		if($op2)
    {
			$expr_tmp[] = end($expression);
			
      for($index=1;$index<sizeof($expr_tmp);$index+=2)
      {
				$op = $expr_tmp[$index];
				switch ($op)
        {
					case '+':
						$sum = $expr_tmp[$index-1];						
						$sum += $expr_tmp[$index+1];
						$expr_tmp[$index+1]=$sum;						
						break;
					case '-':
						$sum = $expr_tmp[$index-1];				
						$sum -= $expr_tmp[$index+1];
						$expr_tmp[$index+1]=$sum;										
						break;									
				}		
			}
			$expression = array(NULL,end($expr_tmp));			
		}
		else
    { 
      $expression = array(NULL,end($expression));
    }		
	}	
	else 
  {	
    if (is_numeric($input))
    {
      if(is_numeric(end($expression)))
      {
        $index = count($expression)-1;
        $expression[$index].= $input;
      }
      else {$expression[]=$input;}		
    }
    else if(is_string($input))
    {
      $var = end($expression);
      if(!is_numeric($var) && $var)
      {		
        $index = count($expression)-1;
        $expression[$index] = $input;
      }
      else if($var or $var==='0')
        $expression[]=$input;
    }
	}
  
  $display = NULL;
  
  foreach($expression as $value)
  {
    $display .= $value;
  }
}
else 
{
	$expression = array(NULL);
	$display = 0;	
}

print_r($expression);
?>

<html>
<title>Web Calculator</title>
<body>
	<center>
		<form method="post" action="">						
      <br>
      <?php
        echo "$display<br><br>"; 
        foreach($expression as $value)
          echo '<input type="hidden" name="expression[]" value="'.$value.'"/>';
      ?>
      <br>
      <input type="submit" name="type" value="1" />
      <input type="submit" name="type" value="2" />
      <input type="submit" name="type" value="3" />
      <br>
      <input type="submit" name="type" value="4" />
      <input type="submit" name="type" value="5" />
      <input type="submit" name="type" value="6" />
      <br>
      <input type="submit" name="type" value="7" />
      <input type="submit" name="type" value="8" />
      <input type="submit" name="type" value="9" />
      <br>
      <input type="submit" name="type" value="=" />
      <input type="submit" name="type" value="0" />
      <input type="submit" name="type" value="+" />
      <br>
      <input type="submit" name="type" value="-" />
      <input type="submit" name="type" value="*" />
      <input type="submit" name="type" value="/" />
      <br>
      <input type="submit" name="reset" value="RESET" />
		</form>
</body>
</html>