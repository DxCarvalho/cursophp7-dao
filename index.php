<?php 

require_once("config.php");

//$sql = new sql();

//$results = $sql->select("SELECT * FROM tb_usuarios");

//echo json_encode($results);

//trás um usuário especifico
//$user = new usuario();
//$user->loadByID(3);
//echo ($user);
//echo "<br>";

//trás a lista dos usuários
//$list = (usuario::getList());
//echo json_encode($list);

//trás a lista usuários baseado em parte do login
//$search = (usuario::search("iego"));
//echo json_encode($search);

//trás  usuário validade por usuario ou senha
//$user = new usuario();
//$user->login("Diego Xavier", 123456);
//echo $user;

//INSERT para colocar usuário no banco de dados
//$aluno = new usuario("Snoopy Dog", '1au2au3au');
//$aluno->insert();
//echo $aluno;

//UPDATE inserindo arquivos 
$user = new usuario();
$user->loadByID(7);
$user->update("Snoopy Dog Dog", "shitzu");
echo $user;

?>
