<?php
if(!empty($_POST))
{
    $conexao = mysqli_connect("localhost", "root", "", "prod"); //adicionar pass no espaco em braco ( string vazia)

    if ($conexao->connect_error) {
        die("Connection failed: " . $conexao->connect_error);
    }

    $sql = "INSERT INTO ordered VALUES('".$_POST['id']."', '".date('jS F Y h:i:s A')."')";
    $query_res = mysqli_query($conexao, $sql);
    echo $_POST['orderName']. " was ordered successfully";
}

?>