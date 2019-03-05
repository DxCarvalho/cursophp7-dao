<?php 

require_once("config.php");

$sql = new sql();

$results = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($results);

?>
