<?php

//Problem 2 Spec.
//By considering the terms in the Fibonacci sequence whose values
//do not exceed four million, find the sum of the even-valued terms.

function sumFibSequence($limit, $termOrder=NULL)
{
	$fibSeq = array();
	$terms = array();
	$index = 0;
	array_push($fibSeq, 1);
	array_push($fibSeq, 2);
	do
	{
		$fibSeq[2] = $fibSeq[0] + $fibSeq[1];
		if($fibSeq[0] <= $limit)
		{
			if(!isset($termOrder))
			{
				array_push($terms, $fibSeq[0]);
			}
			else
			{
				if(determineEven($fibSeq[0]) && ($termOrder == 'even')) array_push($terms, $fibSeq[0]);
				if(!determineEven($fibSeq[0]) && ($termOrder == 'odd')) array_push($terms, $fibSeq[0]);
			}
		}
		array_shift($fibSeq);
	}
	while($fibSeq[0] <= $limit);

	
	if(determineEven($fibSeq[count($fibSeq)-1] && ($termOrder == 'even'))) array_push($terms, $fibSeq[count($fibSeq)-1]);
	if(!determineEven($fibSeq[count($fibSeq)-1] && ($termOrder == 'odd'))) array_push($terms, $fibSeq[count($fibSeq)-1]);
	if(determineEven($fibSeq[count($fibSeq)-2] && ($termOrder == 'even'))) array_push($terms, $fibSeq[count($fibSeq)-2]);
	if(!determineEven($fibSeq[count($fibSeq)-2] && ($termOrder == 'odd'))) array_push($terms, $fibSeq[count($fibSeq)-2]);

	return $terms;
}

function determineEven($number)
{
	$half = $number/2;
	return is_float($half) ? false : true;
}

$limit = 4000000;
$termOrder = 'even';
$terms = sumFibSequence($limit, $termOrder);
var_dump(array_sum($terms));


?>
