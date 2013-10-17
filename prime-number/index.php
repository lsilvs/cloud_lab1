<?php
	/* if started from commandline, wrap parameters to $_POST and $_GET */
	if (!isset($_SERVER["HTTP_HOST"])) {
	  parse_str($argv[1], $_GET);
	  parse_str($argv[1], $_POST);
	}

	function isPrime($n) {
		$i = 2;

		if($n == 2) {
			return true;
		} else {
			while($i <= pow($n, (1/2))) {
				if ($n % $i == 0) {
					return "false";
				}
				$i++;
			}
		}
		return "true";
	}

	function firstPrime($n) {
		while(true) {
			$i = 2;
			$n++;
			while($i <= pow($n, (1/2))) {
				if ($n % $i == 0) {
					continue 2;
				}
				$i++;
			}
			return $n;
			exit;
		}
	}

	if($_POST['digits']) {
		for($i=0; $i < 15; $i++) {
			$digits = pow(10 , ($_POST['digits']-1));

			set_time_limit(0);
			$time_start = microtime(true);

			// Find first prime number
			$firstPrime = firstPrime($digits);

			$time_end = microtime(true);
			$time = $time_end - $time_start;

			echo "Found prime number ($firstPrime) in $time seconds<br/>\n";
			// echo isPrime($firstPrime) . "\n";
		}
	} else {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Find prime number</title>
	</head>

	<body>
		<h1>Finding prime number</h1>
		<form action="index.php" method="post">
			Digits in length: <input type="text" name="digits" value="<?=$_POST['digits']?>">
			<input type="submit" value="Submit">
		</form>

		<p><b>Note:</b>When submiting it will find the first number that is at least n digits in length.</p>
	</body>

</html>

<?php } ?>