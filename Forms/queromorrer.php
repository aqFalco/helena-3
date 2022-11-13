<?php
    if(!empty($_POST))
    {
        $conexao = mysqli_connect("localhost", "root", "", "prod"); //adicionar pass no espaco em braco ( string vazia)

        if ($conexao->connect_error) {
            die("Connection failed: " . $conexao->connect_error);
        }
        switch ($_POST['type'])
        {
            case "cliente":
                $sql = "select * from ".$_POST['type']." where id = ".$_POST['id'];
                $info = mysqli_query($conexao, $sql) -> fetch_assoc();
                echo "
                    <h1 id='nome'>".$info['nome']."</h1> <!--nome-->
                    <p id='nif'>Nif: ".$info['nif']."</p> <!--nif-->
                    <p id='nif'>ID Cliente: ".$info['id']."</p> <!--nif-->
                    <p id='morada'>Morada: ".$info['morada'].", ".$info['localidade'].", ".$info['cpostal']."</p> <!--morada localidade cpostal-->
                    <p id='setor'>Setor: ".$info['setor']."</p> <!--setor-->
                    <p id='horario'>Horario: ".$info['horario']."</p> <!--horario-->
                    <p id='estado'>Estado: ".($info['estado'] == "A" ? "Ativo" : "Inativo" )."</p> <!--estado-->
                    <p id='horas'>Horas: ".$info['horas']."</p> <!--horas-->
                ";
                break;
            case "products":
                $sql = "select * from ".$_POST['type']." where prodId = ".$_POST['id'];
                $info = mysqli_query($conexao, $sql) -> fetch_assoc();
                echo "
                    <h1 id='prodCode'>".$info['prodCode']."</h1> <!--prodCode-->
                    <p id='prodId'>ID Produto: ".$info['prodId']."</p> <!--prodId-->
                    <p id='prodDesc'>Descrição: ".$info['prodDesc']."</p> <!--prodDesc-->
                    <p id='Activity'>Estado: ".($info['Activity'] == "A" ? "Ativo" : "Inativo" )."</p> <!--Activity-->
                    <p id='horas'>Horas: ".$info['horas']."</p> <!--horas-->
                ";
                break;
            case "orders":
                $sql = "select * from ".$_POST['type']." where id = ".$_POST['id'];
                $info = mysqli_query($conexao, $sql) -> fetch_assoc();
                echo "
                    <h1 id='order'>".$info['client']."-".$info['product']."</h1> <!--cliente e product-->
                    <p id='nif'>ID Order: ".$info['id']."</p> <!--nif-->
                    <p id='amount'>Quantidade: ".$info['amount']."</p> <!--amount-->
                    <p id='week'>Semana: ".$info['week']."</p> <!--week-->
                    <p id='horas'>Horas: ".$info['horas']."</p> <!--horas-->
                ";
                break;
        }
        echo "<button class='button-71' role='button'>Edit</button>
        <button class='button-71' role='button'>Order</button>";

    }

?>