<?php

//Problem 3 Spec.
//The prime factors of 13195 are 5, 7, 13 and 29.
//What is the largest prime factor of the number 600851475143 ?

function getCollectionPrimeNumbers($number)
{
	$min = 2;
	$max = $number;
	$primeFactors = array();
	while($min < $max)
	{
		$factor = $number/$min;
		if($factor == ceil($factor))
		{
			$primeFactors = array_merge($primeFactors, getCollectionPrimeNumbers($factor));
			$primeFactors = array_merge($primeFactors, getCollectionPrimeNumbers($min));
		}
		$min = $min + 1;
		$max = $factor;
	}
	return !empty($primeFactors) ? $primeFactors : array($number);
}

function getUniquePrimeNumbers($primes)
{
	return (is_array($primes)) ? array_unique($primes) : false;
}

function getLargestPrime($primes)
{
	return is_array($primes) ? max($primes) : false;
}

function getLargestPrimeNumberForNumber($number)
{
	$primes = getCollectionPrimeNumbers($number);
	$primes = getUniquePrimeNumbers($primes);
	$maxPrime = getLargestPrime($primes);
	return $maxPrime;
}
var_dump(getLargestPrimeNumberForNumber(100));
?>