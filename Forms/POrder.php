<?php
    $server="localhost";
    $user ="root";
    $pass ="banana445566";
    $database="prod";

    $conexao = mysqli_connect("localhost", "root", "", "prod"); //adicionar pass no espaco em braco ( string vazia)

    if ($conexao->connect_error) {
        die("Connection failed: " . $conexao->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <header>
        <nav>
            <div class="menu">
                <div class="logo">
                    <img style="width: 100px; height: 40px;" src="Clan.png" alt="logo" />
                </div>
                <ul><li><a href="index.html">Home</a></li>
                    <li><a href="CClient.html">Create Client</a></li>
                    <li><a href="CProduct.html">Create Product</a></li>
                    <li><a href="History.php">History</a></li>
                    <li><a href="POrder.php">Pre-Order</a></li>
                    <li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="img"></div>
    <div class="center">
        <div class="wrapper">
            <h2>Pre-Order</h2>
            <form action="POrder.php" method="POST">
                <div class="custom-select">
                    <!--<input name="name" type="text" placeholder="Enter Name" required>-->
                    <Select name="client">
                        <?php
                            $sql = "Select nome from cliente where estado = 'A'";
                            $info = mysqli_query($conexao, $sql);
                            if ($info -> num_rows)
                            {
                                echo "<option value='' disabled selected>Select Client</option>";
                                foreach ($info as $name)
                                {
                                    echo "<option value='".$name['nome']."'>".$name['nome']."</option>";
                                }
                            }
                            else
                            {
                                echo "<option value'' disabled selected>No Clients Available</option>";
                            }
                        ?>
                    </Select>
                </div>
                <div class="custom-select">
                    <!--<input name="name" type="text" placeholder="Enter Name" required>-->
                    <Select name="product">
                        <?php
                            $sql2 = "Select prodCode from products where Activity = 'A'";
                            $info2 = mysqli_query($conexao, $sql2);
                            if ($info2 -> num_rows)
                            {
                                echo "<option value='' disabled selected>Select Product</option>";
                                foreach ($info2 as $code)
                                {
                                    echo "<option value='".$code['prodCode']."'>".$code['prodCode']."</option>";
                                }
                            }
                            else
                            {
                                echo "<option value'' disabled selected>No Products Available</option>";
                            }
                        ?>
                    </Select>
                </div>
                <div id="num-teste" class="input-box">
                    <input name="amount" type="number" placeholder="Enter the amount" min="1" max="8" required>
                </div>
                <div class="input-box">
                    <input name="week" type="week" placeholder="Enter the week" required>
                </div>

                <div class="input-box button">
                    <input name="submit" type="submit" value="Pre-Order">
                </div>


            </form>
            <?php

            date_default_timezone_set("Europe/Lisbon");
            function SendDetails()
            {
                $client = $_POST["client"];
                $product = $_POST["product"];
                $amount = $_POST["amount"];
                $week = $_POST["week"];
                global $conexao;

                

                $sql_send = "insert into orders(client, product, amount, week, horas) values('$client', '$product', '$amount', '$week', '".date('jS F Y h:i:s A')."')";
                $info_send = mysqli_query($conexao, $sql_send);

                echo "<script>  window.location.href = 'POrder.php'; alert('Pre-Order Realizada com sucesso'); </script>";
            }
            if(isset($_POST['submit']))
            {
                SendDetails();
            }
            ?>
        </div>
    </div>
</body>
</html>