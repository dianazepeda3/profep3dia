<?php
$conexion = pg_connect("host=localhost dbname=profep3dia user=postgres password=lumitylover");
//$conn = pg_pconnect("dbname=profep3dia");
if (!$conexion) {
  echo "Ocurrió un error.\n";
  exit;
}
?>