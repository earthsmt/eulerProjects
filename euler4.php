<?php

//Problem 4 Spec.
//A palindromic number reads the same both ways. The largest palindrome made from the product of two 2-digit numbers is:
//9009 = 91 × 99.
//Find the largest palindrome made from the product of two 3-digit numbers

function isPalindromicNumber($number)
{
	$rtn = true;
	if(is_integer($number))
	{
		$elements = str_split($number);
		if(is_array($elements))
		{
			$middleIndex = floor(count($elements)/2);
			$i = 0;
			while($i < $middleIndex)
			{
				if($elements[$i] != $elements[count($elements)-1-$i])
				{
					$rtn = false;
					break;
				}
				$i++;
			}
		}
	}
	return $rtn;
}

function digitPalindromicNumber($numDigits)
{
	$maxNumber = ($numDigits > 1) ? implode(array_fill(0, $numDigits, '9'), '') : '9';
	$minNumber = ($numDigits > 1) ? ('1'.implode(array_fill(0, $numDigits-1, '0'), '')) : '1';
	$number = $maxNumber;
	$palindromics = array();
	while($maxNumber > $minNumber)
	{
		while($number > $minNumber)
		{
			$multiple = $number * $maxNumber;
			if(isPalindromicNumber($multiple))
			{
				array_push($palindromics, $multiple);
				break;
			}
			$number = $number -1;
		}
		$maxNumber = $maxNumber - 1;
		$number = implode(array_fill(0, $numDigits, '9'), '');
	}
	
	return !empty($palindromics) ? max($palindromics) : false;
}

//var_dump(isPalindromicNumber(31013));
var_dump(digitPalindromicNumber(3));
?>

