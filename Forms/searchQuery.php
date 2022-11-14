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

    $data_data = ["", "", ""];

    $sql = "Select id, nome, estado from cliente where (nome like '%".$_POST['search_text']."%' 
    or nif like '%".$_POST['search_text']."%' 
    or morada like '%".$_POST['search_text']."%'
    or localidade like '%".$_POST['search_text']."%'
    or cpostal like '%".$_POST['search_text']."%' 
    or horas like '%".$_POST['search_text']."%'
    or setor like '%".$_POST['search_text']."%') ". ($_POST['Act_value'] != "null" ? " AND estado like '".$_POST['Act_value']."'" : "");
    $info = mysqli_query($conexao, $sql);
    
    $data_data[0] = "<button class='title-btn' type='button'>Client</button>";
    if($info -> num_rows)
    {
        foreach($info as $row)
        {
            $data_data[0] = $data_data[0]."<button  onclick='showPopup();' id='".$row['id']." cliente' class='Click-here' style='background:linear-gradient(to right, ". (($row['estado'] == 'A') ? "#59f309 0%, #368f1f 100%" : "#ff1414 0%, #a92828 100%") .");' type='button'>".$row['nome']."</button>";
        }
    }
    else{
        $data_data[0] = $data_data[0]."<p>Não há Registos</p>";
    }


    $sql = "Select prodCode, Activity, prodId from products where (prodId like '%".$_POST['search_text']."%' 
    or prodCode like '%".$_POST['search_text']."%'
    or prodDesc like '%".$_POST['search_text']."%'
    or horas like '%".$_POST['search_text']."%') ". ($_POST['Act_value'] != "null" ? " AND Activity like '".$_POST['Act_value']."'" : "");
    $info = mysqli_query($conexao, $sql);
    
    $data_data[1] = "<button class='title-btn' type='button'>Client</button>";
    if($info -> num_rows)
    {
        foreach($info as $row)
        {
            $data_data[1] = $data_data[1]."<button onclick='showPopup()' id='".$row['prodId']." products' class='Click-here' style='background:linear-gradient(to right, ". (($row['Activity'] == 'A') ? "#59f309 0%, #368f1f 100%" : "#ff1414 0%, #a92828 100%") .");' type='button'>".$row['prodCode']."</button>";
        }
    }
    else{
        $data_data[1] = $data_data[1]."<p>Não há Registos</p>";
    }

    
    $sql = "Select id, client, product from orders where (client like '%".$_POST['search_text']."%' 
    or product like '%".$_POST['search_text']."%'
    or horas like '%".$_POST['search_text']."%'
    or week like '%".$_POST['search_text']."%')";
    $info = mysqli_query($conexao, $sql);
    
    $data_data[2] = "<button class='title-btn' type='button'>Client</button>";
    if($info -> num_rows)
    {
        foreach($info as $row)
        {
            $data_data[2] = $data_data[2]."<button onclick='showPopup()' id='".$row['id']." orders' class='Click-here' type='button'>".$row['client']."-".$row['product']."</button>";
        }
    }
    else{
        $data_data[2] = $data_data[2]."<p>Não há Registos</p>";
    }
    // $sql3 = "Select id, client, product from orders where 1";
    // $info3 = mysqli_query($conexao, $sql3);
    
    // if($info3 -> num_rows)
    // {
    //     foreach($info3 as $row)
    //     {
    //         echo "<button id='".$row['id']." orders' class='Click-here' type='button'>".$row['client']."-".$row['product']."</button>";
    //     }
    // }
    // else{
    //     echo "<p>Não há Registos</p>";
    // }

    echo json_encode($data_data);

?>