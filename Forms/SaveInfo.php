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
            $morada = explode(",", $_POST['info'][2])[0];
            while($morada[0] == ' ')
            {
                $morada = ltrim($morada, $morada[0]);
            }
            $localidade = explode(",", $_POST['info'][2])[1];
            while($localidade[0] == ' ')
            {
                $localidade = ltrim($localidade, $localidade[0]);
            }
            $cpostal = explode(",", $_POST['info'][2])[2];
            while($cpostal[0] == ' ')
            {
                $cpostal = ltrim($cpostal, $cpostal[0]);
            }

            $sel_sql = "Select nome from cliente where id = ".$_POST['id'];
            $name_query = mysqli_query($conexao, $sel_sql)->fetch_assoc();

            $sql = "UPDATE cliente
                    SET nome = '".$_POST['info'][0]."',
                    nif = '".$_POST['info'][1]."',
                    morada = '$morada',
                    localidade = '$localidade',
                    cpostal = '$cpostal',
                    setor = '".$_POST['info'][3]."',
                    horario = '".$_POST['info'][4]."',
                    estado = '".$_POST['info'][5]."',
                    horas = '".$_POST['info'][6]."'
                    WHERE cliente.id = ".$_POST['id'].";
                    UPDATE orders set client = '".$_POST['info'][0]."' where client = '".$name_query['nome']."'";
            $query = mysqli_multi_query($conexao, $sql);

            if ($_POST['info'][5] == "I")
            {
                $del_query = "delete from orders where client = '".$_POST['info'][0]."'";
                $delete = mysqli_query($conexao, $del_query);
            }

            break;
        case "products":

            $sel_sql = "Select prodCode from products where prodId = ".$_POST['id'];
            $name_query = mysqli_query($conexao, $sel_sql)->fetch_assoc();

            $sql = "UPDATE products
                    SET prodCode = '".$_POST['info'][0]."',
                    prodId = '".$_POST['info'][1]."',
                    prodDesc = '".$_POST['info'][2]."',
                    Activity = '".$_POST['info'][3]."',
                    horas = '".$_POST['info'][4]."'
                    WHERE products.prodId = ".$_POST['id'].";
                    UPDATE orders set product = '".$_POST['info'][0]."' where product = '".$name_query['prodCode']."'";
            $query = mysqli_multi_query($conexao, $sql);

            if ($_POST['info'][3] == "I")
            {
                $del_query = "delete from orders where product = '".$_POST['info'][0]."'";
                $delete = mysqli_query($conexao, $del_query);
            }
            break;
        case "orders":
            $orderDetails = explode("-", $_POST['info'][0]);
            while($orderDetails[0][strlen($orderDetails[0])-1] == " ")
            {
                $orderDetails[0] = ltrim($orderDetails[0], $orderDetails[0][strlen($orderDetails[0])-1]);
            }
            while($orderDetails[1][0] == ""){
                $orderDetails[1] = ltrim($orderDetails[1], $orderDetails[1][0]);
            }
            $sql = "UPDATE orders
                    SET client = '".$orderDetails[0]."',
                    product = '".$orderDetails[1]."',
                    amount = '".$_POST['info'][1]."',
                    week = '".$_POST['info'][2]."',
                    horas = '".$_POST['info'][3]."'
                    WHERE orders.id = ".$_POST['id'];
            $query = mysqli_query($conexao, $sql);
            break;
    }


}
?>