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
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <header>
        <nav>
            <div class="menu">
                <div class="logo">
                    <img style="width: 100px; height: 40px;" src="Clan.png" alt="logo" />
                </div>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="CClient.html">Create Client</a></li>
                    <li><a href="CProduct.html">Create Product</a></li>
                    <li><a href="History.php">History</a></li>
                    <li><a href="POrder.php">Pre-Order</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="img"></div>
    <div class="custom-model-main" style='height: 100%;'>
        <div class="custom-model-inner">
            <div class="close-btn"></div>
            <div class="custom-model-wrap">
                <div id="popupid" class="pop-up-content-wrap">
                    <!--///////query results go here///////-->
                </div>
            </div>
        </div>
        <div class="bg-overlay"></div>
    </div>
        <div class="center">
            <div class="container">
                <div class="custom-select">
                    <select name="filters" id="filters">
                        <option value>1</option>
                        <option value>2</option>
                        <option value>3</option>
                        <option value>4</option>
                        <option value>5</option>
                        <option value>6</option>
                        <option value>7</option>
                    </select>
                </div>
                <div class="buttonss">
                    <div class="input-box button list-title">
                        <button class="title-btn" type="button">Client</button>
                        <?php
                            $sql = "Select id, nome, estado from cliente where 1";
                            $info = mysqli_query($conexao, $sql);
                            
                            if($info -> num_rows)
                            {
                                foreach($info as $row)
                                {
                                    echo "<button id='".$row['id']." cliente' class='Click-here' style='background:linear-gradient(to right, ". (($row['estado'] == 'A') ? "#59f309 0%, #368f1f 100%" : "#ff1414 0%, #a92828 100%") .");' type='button'>".$row['nome']."</button>";
                                }
                            }
                            else{
                                echo "<p>Não há Registos</p>";
                            }
                        ?>
                    </div>
                    <div class="input-box button list-title">
                        <button class="title-btn" type="button">Product</button>
                        <?php
                            $sql2 = "Select prodCode, Activity, prodId from products where 1";
                            $info2 = mysqli_query($conexao, $sql2);
                            
                            if($info2 -> num_rows)
                            {
                                foreach($info2 as $row)
                                {
                                    echo "<button  id='".$row['prodId']." products' class='Click-here' style='background:linear-gradient(to right, ". (($row['Activity'] == 'A') ? "#59f309 0%, #368f1f 100%" : "#ff1414 0%, #a92828 100%") .");' type='button'>".$row['prodCode']."</button>";
                                }
                            }
                            else{
                                echo "<p>Não há Registos</p>";
                            }
                        ?>
                    </div>
                    <div class="input-box button list-title">
                        <button class="title-btn" type="button">Pre-Order</button>
                        <?php
                            $sql3 = "Select id, client, product from orders where 1";
                            $info3 = mysqli_query($conexao, $sql3);
                            
                            if($info3 -> num_rows)
                            {
                                foreach($info3 as $row)
                                {
                                    echo "<button id='".$row['id']." orders' class='Click-here' type='button'>".$row['client']."-".$row['product']."</button>";
                                }
                            }
                            else{
                                echo "<p>Não há Registos</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script>

    $(".Click-here").on('click', function() {
      $(".custom-model-main").addClass('model-open');
      $.ajax(
        {
            type: "POST",
            url: "queromorrer.php",
            data: {'id': event.target.id.split(" ")[0], 'type': event.target.id.split(" ")[1] },
            success:function(result){
                document.getElementById("popupid").innerHTML = result;
            }

        }
    )

    }); 
    $(".close-btn, .bg-overlay").click(function(){
      $(".custom-model-main").removeClass('model-open');
    });
    </script>

</body>
</html>