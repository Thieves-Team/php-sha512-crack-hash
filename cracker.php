<?php

echo "<br>
		<title>Sha512 Hash Crack v1.1</title>
		<center><img src='http://i41.tinypic.com/kefc6b.png'></img></center>
		<body text=#FFA04b bgcolor=#111111 vlink=#62b1ae link=#FFA04b clink=white>

		<center>Hash decrypt is: <font color=red>".password()."</font></center>
		<form action=? method=post>
			<center>Password: <input type=text name=crypt size=30 maxlength=17 placeholder = '408A0717EC1881582'>
							<input type=submit name=check value=Start>
			</center>
		</form>	
		<center><font color=red>Hint *Sha512 for 17 caracters</center>
			";

function password(){
	$decrypt = "./decrypt.txt";
	$dictionar = "./pass.txt";
	$lines = file($dictionar);
 	
	foreach ($lines as $line_num => $line) {
		$line = strtolower($line);
		$line = trim($line);
		
      	$str = hash("sha512", $line);
        $len = strlen($line);
        $encrypt =  strtoupper(substr($str, $len, 17)); 

     	if ($encrypt == $_POST['crypt']) {
            $fh = fopen($decrypt, 'a+') or die("can't open file");

			$stringData = "rn--------------Decrypt Hash: $line--------------rn";
			fwrite($fh, $stringData);
			fclose($fh);
			return $line;
        }
	}
}

?>
