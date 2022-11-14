<?php
    $server="localhost";
    $user ="root";
    $pass ="banana445566";
    $database="prod";

    date_default_timezone_set("Europe/Lisbon");

    $conexao = mysqli_connect("localhost", "root", "", "prod"); //adicionar pass no espaco em braco ( string vazia)

    if ($conexao->connect_error) {
        die("Connection failed: " . $conexao->connect_error);
    }

    $id = $_POST["prodId"];
    $code = $_POST["prodCode"];
    $description = $_POST["prodDesc"];
    $estado= $_POST["Activity"];

    $sql = "select * from products where prodId = '". $id."'";
    $sql2 = "select * from products where prodCode = '". $code."'";

    $info = mysqli_query($conexao,$sql);
    $info2 = mysqli_query($conexao,$sql2);

    if($info -> num_rows != 0){
        echo "<script>  window.location.href = 'Forms/CProduct.html'; alert('Esse id já está associado a um produto.'); </script>";
    }
    else if($info2 -> num_rows != 0){
        echo "<script> window.location.href = 'Forms/CProduct.html'; alert('Esse codigo já está associado a um produto.'); </script>";
    }
    else{
        $sql = "INSERT INTO products VALUES ('$id','$code','$description','$estado','".date("jS F Y h:i:s A")."')";
        $info = mysqli_query($conexao,$sql);
        //header('Location: ../Forms/CClient.html');
        echo "<script>  window.location.href = 'Forms/CProduct.html'; alert('Produto adicionado.');  </script>";
    }
?>