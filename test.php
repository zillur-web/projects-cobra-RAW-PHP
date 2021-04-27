<?php
$to ="zillur78489@gmail.com";
$subject = "TEST";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: zillur78489@gmail.com";


if (mail($to,$subject,$txt,$headers)) {
	echo "OK";
}
else{
	echo "No";
}
?>