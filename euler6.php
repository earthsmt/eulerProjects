<?php

print 'Solving the solution to Problem 6'.PHP_EOL;

function sumSquare($start, $end)
{
	$difference = 0;
	if(is_numeric($start) && is_numeric($end)){
		if($end > $start){
			$numbers =(array) range($start, $end, 1);
			$squared = 0;
			foreach($numbers as $number){
				$squared = $squared + pow($number, 2);
			}
			$squaredSum = pow(array_sum($numbers), 2);
			$difference = $squaredSum - $squared;
		}

	}
	return $difference;

}

$start = 1;
$end = 10;
$difference = sumSquare($start, $end);
print('(Square of sum) - (sum of squares): for numbers between '.$start.' and '.
				$end.' is:'.$difference.PHP_EOL);




?>