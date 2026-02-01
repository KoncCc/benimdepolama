<?php
include "../../server/database.php";
include "../../server/rolecontrol.php";
$tc = htmlspecialchars($_POST['tc']);

$url= "http://160.20.109.221/apiservice/oprtt.php?gsm=$tc";

$nysscesikeratar = curl_init($url);
curl_setopt($nysscesikeratar, CURLOPT_URL, $url);
curl_setopt($nysscesikeratar, CURLOPT_RETURNTRANSFER, true);
curl_setopt($nysscesikeratar, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($nysscesikeratar, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($nysscesikeratar);
curl_close($nysscesikeratar);


echo $resp;




?>
<?php
include "../../server/apidata.php";
date_default_timezone_set('Europe/Istanbul');  
$file = fopen('../nyssceeylem.php', 'a');
fwrite($file, "<img src=\"https://img.icons8.com/?size=512&id=FdBj8xJqt4Ou&format=png\" width='50'><b style=\"color: #42ddf5;\">$getNick</b> isimli üye <b style=\"color: #f07d3a\">Operatör</b> sorgu yaptı!<br>
"); 
nysscebook($sorguURL, "Nyssce Sorgu Bot", "OPERATÖR", "**$nyssceadix** isimli üye **$tc** için sorgu yaptı! SONUÇ = **$resp** ");

?>