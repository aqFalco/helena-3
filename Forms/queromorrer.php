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
                    <p id='morada'>Address: ".$info['morada'].", ".$info['localidade'].", ".$info['cpostal']."</p> <!--morada localidade cpostal-->
                    <p id='setor'>Sector: ".$info['setor']."</p> <!--setor-->
                    <p id='horario'>Time: ".$info['horario']."</p> <!--horario-->
                    <p id='estado'>Activity: ".($info['estado'] == "A" ? "Active" : "Inactive" )."</p> <!--estado-->
                    <p id='horas'>Hours: ".$info['horas']."</p> <!--horas-->
                ";
                break;
            case "products":
                $sql = "select * from ".$_POST['type']." where prodId = ".$_POST['id'];
                $info = mysqli_query($conexao, $sql) -> fetch_assoc();
                echo "
                    <h1 id='prodCode'>".$info['prodCode']."</h1> <!--prodCode-->
                    <p id='prodId'>Product ID: ".$info['prodId']."</p> <!--prodId-->
                    <p id='prodDesc'>Description: ".$info['prodDesc']."</p> <!--prodDesc-->
                    <p id='Activity'>Activity: ".($info['Activity'] == "A" ? "Active" : "Inactive" )."</p> <!--Activity-->
                    <p id='horas'>Hours: ".$info['horas']."</p> <!--horas-->
                ";
                break;
            case "orders":
                $sql = "select * from ".$_POST['type']." where id = ".$_POST['id'];
                $info = mysqli_query($conexao, $sql) -> fetch_assoc();
                $ordername = $info['client']."-".$info['product'];
                echo "
                    <h1 id='order'>".$ordername."</h1> <!--cliente e product-->
                    <p id='amount'>Quantity: ".$info['amount']."</p> <!--amount-->
                    <p id='week'>Week: ".$info['week']."</p> <!--week-->
                    <p id='horas'>Hours: ".$info['horas']."</p> <!--horas-->
                    <button id='orderbtn' onclick='Order(\"".$_POST['id']."\", \"$ordername\")' class='button-71' role='button'>Order</button>
                ";
                break;
        }
        echo "  <button id='editbtn' onclick='Edit(\"".$_POST['type']."\", \"".$_POST['id']."\")' class='button-71' role='button'>Edit</button>";

    }

?>