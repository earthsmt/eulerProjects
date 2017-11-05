<?php

//Problem 1 Spec.
//If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9. 
//The sum of these multiples is 23.
//Find the sum of all the multiples of 3 or 5 below 1000.

function multiplesFactor($number, $factor)
{
	$multiples = array();
	$currentNum = $number;
	do
	{
		array_push($multiples, $currentNum);
		$currentNum += $number;
	}
	while( ($currentNum < $factor) && ($currentNum >= 2) );
	
	return $multiples;
}

function eulerOneSolution()
{
	$multiples = array();
	$multiples[0] = multiplesFactor(3, 1000);
	$multiples[1] = multiplesFactor(5, 1000);
	foreach($multiples as $key => $multiple)
	{
		if($key >= 1) 
		{
			$multiples[0] = array_merge($multiples[0], $multiples[$key]);
			unset($multiples[$key]);
		}
	}
	
	$sum = array_sum(array_unique($multiples[0]));
	var_dump($sum);
}

eulerOnesolution();

?>