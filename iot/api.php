<?
$serial=$_REQUEST['serial'];
$estado=$_REQUEST['estado'];

date_default_timezone_set('America/Lima'); 
$fecha= date('Y-m-d H:i:s', time()); 

echo "<h1>Serial Detectado</h1>";
echo "<h3>El numero de serial es: ".$serial."</h3><br>";
echo "<h3>Estado: ".$estado."</h3><br>";
echo "<h3>Fecha de acceso: ".$fecha."</h3><br>";

//guardando en la base de datos

include_once("../database/conexion.php");

if(strtolower($estado)=="permitido"){
    $estado=1;

}else{
    $estado=0;
}

$listarea=array("Sala de Seguridad",
            "Sala de Operaciones A",
            "Sala de Operaciones B",
            "Sala de Operaciones C",
            "Sala de Operaciones D",
            "Laboratorio"
);
shuffle($listarea);
$keys=array_rand($listarea,1);
echo "<h3>Area: ".$listarea[$keys]."</h3><br>";
//echo "<h3>Area: ".$area[$keys]."</h3><br>";
$area=$listarea[$keys];

$sql="INSERT INTO registro(RFID,fecha,acceso,area) VALUES('$serial','$fecha',$estado,'$area');";
$query=mysqli_query($conexion,$sql);

if($query){
    echo "<h3>Registro guardado en la base de datos</h3>";
}

?>