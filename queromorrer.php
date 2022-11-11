<?php
    if(!empty($_POST))
    {
        $conexao = mysqli_connect("localhost", "root", "", "prod"); //adicionar pass no espaco em braco ( string vazia)

        if ($conexao->connect_error) {
            die("Connection failed: " . $conexao->connect_error);
        }
        switch ($_POST['type'])
        {
            case "client":
                $sql_client = "select * from client where id = ".$_POST['id'];
                $info_client = mysqli_query($conexao, $sql_client);
                
                break;
            case "product":

                break;
            case "order":

                break;


        }

    }

?>