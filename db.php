<?php 



// $ch = curl_init('10.67.169.131:3306'); // Replace with the target URL
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // 5 seconds timeout
// $result = curl_exec($ch);

// if ($result === false) {
//     echo "Outbound connection failed: " . curl_error($ch);
// } else {
//     echo "Outbound connection successful!";
// }

// curl_close($ch);


// $host = '10.67.169.131'; // Replace with the target host you want to connect to
// $port = 3306; // Replace with the port you want to use for the connection

// $connection = @fsockopen($host, $port, $errno, $errstr, 5); // 5 seconds timeout

// if (!$connection) {
//     echo "Outbound connection failed: " . $errstr . " (Error code: " . $errno . ")";
// } else {
//     echo "Outbound connection successful!";
//     fclose($connection);
// }




// echo phpinfo();
try{
	$mysqli = new mysqli("10.67.169.131",'cms_dbu','%$SY$Ygh&^%*#@1',"cms_db", '3306');
	if ($mysqli -> connect_errno) {
	  echo "jjjjFailed to connect to MySQL: " . $mysqli -> connect_errno;
	  //exit();
	}else{
		echo "connected";
	}
} catch(Exception $e){
	echo "MMMMMMMMMMM".$e->getMessage();
}





// Check connection



// $servername = "10.67.169.131";
// $username = "cms_dbu";
// $password = "%$SY$Ygh&^%*#@1";

// // try {
// //   $conn = new PDO("mysql:host=$servername;dbname=cms_db", $username, $password);
// //   // set the PDO error mode to exception
// //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// //   echo "Connected successfully";
// // } catch(PDOException $e) {
// //   echo "Connection failed: " . $e->getMessage();
// // }


// $conn = mysqli_connect($servername, $username, $password);

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

?>
