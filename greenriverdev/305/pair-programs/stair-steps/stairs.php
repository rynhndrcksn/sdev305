<?php
/*
 * Author: Ryan Hendrickson
 * Date: October 19th, 2020.
 * stairs.php is a file that creates a function that draws stairs. The wall is kinda shaky due to budget constraints
 * but shouldn't cause any long term damage to property or individuals.
 */

ini_set("display_errors", 1);
error_reporting(E_ALL);



function stairSteps($numOfSteps) {
	// print a row
	for ($i = 0; $i < $numOfSteps; $i++) {
		$space = str_repeat("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp", ($numOfSteps-1) - $i);
		$wall = str_repeat("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp", $i);

		echo "$space&nbsp;O&nbsp;&nbsp;&nbsp;&nbsp;*$wall*<br>
					$space&nbsp;/|\&nbsp;&nbsp;&nbsp;&nbsp;*$wall*<br>
					$space&nbsp;/ \&nbsp;&nbsp;&nbsp;&nbsp;*$wall*<br>
					$space*****$wall*<br>";
	}
	echo str_repeat("*****", $numOfSteps);
}

stairSteps(5);