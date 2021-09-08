<?
$serial=$_REQUEST['serial'];
$estado=$_REQUEST['estado'];

date_default_timezone_set('America/Lima'); 
$fecha= date('m-d-Y, h:i:s a', time()); 

echo "<h1>Serial Detectado</h1>";
echo "<h3>El numero de serial es: ".$serial."</h3><br>";
echo "<h3>Estado: ".$estado."</h3><br>";
echo "<h3>Fecha de acceso: ".$fecha."</h3><br>";

?>