<?php
	function averageOfTwo($num1, $num2) {
		return ($num1 + $num2) / 2;
	}

	echo "<h2>The average is " . averageOfTwo(31, 1524) . "</h2>";

	function circumference($radius) {
		return (pi()*2) * $radius;
	}

	echo "<h2>The circumference is " . circumference(43.2) . "</h2>";