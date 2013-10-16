<html>
  <head><title>prime numbers assigment</title></head>
   <body>
   
   
      <form action = "" method="POST">
			<input type = "text" name="txtOne"/>
		    <input type = "submit" value ="number"/>
	  </form>
	   
		<?php
			set_time_limit(0);
			$time_start = microtime(true);

			// Find first prime number
			$firstPrime = firstPrime(100000000000);

			$time_end = microtime(true);
			$time = $time_end - $time_start;

			echo "Found prime number ($firstPrime) in $time seconds<br/>";
			echo isPrime($firstPrime);


			// if(true OR $_POST['submit']) {
			// 	$num = $_POST['txtOne'];
			// 	echo "<h1>Numero: "+$_POST['txtOne']+"</h1>";
			// }
		  
		 	function isPrime($n) {
				$i = 2;

				if($n == 2) {
					return true;
				} else {
					while($i <= $n/2) {
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
					while($i <= $n/2) {
						if ($n % $i == 0) {
							continue 2;
						}
						$i++;
					}
					return $n;
					exit;
				}
			}
      ?>
   </body>
</html>

