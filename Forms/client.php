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

    $name = $_POST["name"];
    $nif = $_POST["nif"];
    $morada = $_POST["morada"];
    $local = $_POST["local"];
    $cpostal = $_POST["cpostal"];
    $setor = $_POST["setor"];
    $hora = $_POST["hora"];
    $estado= $_POST["estado"];

    $sql = "select * from cliente where nif = '". $nif."'";
    $info = mysqli_query($conexao,$sql);

    if($info -> num_rows != 0){
        echo "<script>  window.location.href = 'CClient.html'; alert('Esse nif já está associado a um cliente.'); </script>";
    }
    else{
        $sql = "INSERT INTO cliente (nome, nif, morada, localidade, cpostal , setor, horario, estado, horas) VALUES ('$name','$nif','$morada','$local','$cpostal','$setor','$hora','$estado','".date("jS F Y h:i:s A")."')";
        $info = mysqli_query($conexao,$sql);
        echo "<script> window.location.href = 'CClient.html'; alert('Cliente adicionado.'); </script>";
    }
?>
