
<?php 



	$simple_string = ""; 

	// Display the original string 
	//echo "Original String: " . $simple_string ; 

	// Store the cipher method 
	$ciphering = "AES-128-CTR"; 

	// Use OpenSSl Encryption method 
	$iv_length = openssl_cipher_iv_length($ciphering); 
	$options = 0; 

	// Non-NULL Initialization Vector for encryption 
	$encryption_iv = '1234567891012345'; 

	// Store the encryption key 
	$encryption_key = "csm"; 

	$encryption = "";
	$decryption = "";

	// Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891012345'; 

// Store the decryption key 
$decryption_key = "csm"; 

	if(isset($_POST['enc'])){

		$cnt = $_POST['content'];
		$simple_string = $cnt; 

	//echo $cnt;

	// Store a string into the variable which 
	// need to be Encrypted 
	

	// Use openssl_encrypt() function to encrypt the data 
	$encryption = openssl_encrypt($simple_string, $ciphering, 
				$encryption_key, $options, $encryption_iv); 

	// Display the encrypted string 
	//echo "Encrypted String: " . $encryption . "\n"; 

	}

	//$aa = $encryption;
	//setcookie('aa', $encryption);



	if(isset($_POST['dec'])){
	//$abc = $_COOKIE['aa'];
		$cnt = $_POST['content'];
		$simple_string = $cnt; 

// Use openssl_decrypt() function to decrypt the data 
$decryption=openssl_decrypt ($cnt, $ciphering, 
		$decryption_key, $options, $decryption_iv); 

// Display the decrypted string 
//echo "Decrypted String: " . $decryption; 

//setcookie('ba', $decryption);

}

//echo $decryption;



?> 

<!DOCTYPE html>
<html>
<head>
	<title> 6677 </title>

	<style type="text/css">
			


	</style>


</head>
<body>




<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	
	<!-- <input type="textbox" name="content" size="50" class="content" value="HI"> -->
	<textarea rows="10" cols="50" name="content"><?php if(isset($_POST['enc'])){echo $encryption;}else{echo $decryption;} ?></textarea><br />
	<input type="submit" name="enc" value="encrypt">
	<input type="submit" name="dec" value="decrypt">


	


</form>


</body>
</html>



