<?php

//Problem 5. 2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.
//What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?


function numberDividesNaturals($number)
{
	$naturals = array_reverse((array) range(2, $number-1, 1));
	
	$current = $number;
	$factorUp = 2;
	$rtn = true;
	while($rtn)
	{
		$current = $factorUp*$number;
		foreach($naturals as $key => $natural)
		{
			$divisionTest = $current/$natural;
			if($divisionTest != ceil($divisionTest))
			{
				break;
			}
		}
		
		if( $key == count($naturals)-1)
		{
			$rtn = false;
		}
		$factorUp++;
	}

	return $current;
}

print(numberDividesNaturals(20));


?>
