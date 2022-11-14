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
                    <div>
                        <p>Activity: </p>
                        <select onchange="Search()" name="Activity" id="Actvalue">
                            <option value="null" selected>No Activity filter</option>
                            <option value="A">Active</option>
                            <option value="I">Inactive</option>
                        </select>
                    </div>
                    <input id="searchinput" onkeyup="Search()" type="text"> <!--//input////////////////////////////////////////////////////-->
                </div>
                <div class="buttonss">
                    <div id="divclients" class="input-box button list-title"> 
                        <!--///////all clients with query///////-->
                    </div>
                    <div id="divproducts" class="input-box button list-title">
                        <button class="title-btn" type="button">Product</button>
                        <!--///////all products with query///////-->
                    </div>
                    <div id="divorders" class="input-box button list-title">
                        <button class="title-btn" type="button">Pre-Order</button>
                        <!--///////all orders with query///////-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script>

        function showPopup() {
            $(".custom-model-main").addClass('model-open');
            $.ajax(
                {
                    type: "POST",
                    url: "queromorrer.php",
                    data: {'id': event.target.id.split(" ")[0], 'type': event.target.id.split(" ")[1] },
                    success:function(result){
                        document.getElementById("popupid").innerHTML = result;
                    }
                });
        }
 
    $(".close-btn, .bg-overlay").click(function(){
      $(".custom-model-main").removeClass('model-open');
    });

    function Search()
    {
        var search_text = document.getElementById("searchinput").value;
        var Activity_Value = document.getElementById("Actvalue").value;
        var divclients = document.getElementById("divclients");
        var divproducts = document.getElementById("divproducts");
        var divorders = document.getElementById("divorders");

        $.ajax(
        {
            type: "POST",
            url: "searchQuery.php",
            data: {'search_text': search_text, 'Act_value': Activity_Value},
            success:function(result){
                result = JSON.parse(result);
                divclients.innerHTML = result[0];
                divproducts.innerHTML = result[1];
                divorders.innerHTML = result[2];
            }
        }
    )
    }

    Search("");

    function Edit(type, id)
    {

        var typeTransform = {
            "cliente": "Client:",
            "products": "Product:",
            "orders": "Order:"
        }

        var editbtn = document.getElementById("editbtn");
        var orderbtn = document.getElementById("orderbtn");
        var popupdiv = document.getElementById("popupid").children;
        var btns = [];
        var initialLength = popupdiv.length;
        if (editbtn.innerText == "Edit")
        {
            editbtn.innerText = "Save";
            orderbtn ? orderbtn.style.display = "none" : null ;
            for (var i=0; i<initialLength; i++)
            {
                if (popupdiv[i].tagName != "BUTTON")
                {
                    popupdiv[i].style.display = "none";
                    var newText = document.createElement(popupdiv[i].tagName);
                    newText.innerText = newText.tagName == "H1" ? typeTransform[type] : popupdiv[i].innerText.split(": ")[0] + ":";
                    newText.setAttribute("class", "removable");
                    if (popupdiv[i].id == "Activity" || popupdiv[i].id == "estado")
                    {
                        var newElement = document.createElement("div");
                        newElement.setAttribute("class", "input-field");
                        newElement.innerHTML = 
                        `
                        <div>
                            <label for='dot-1'>
                                <span class='dot one'></span>
                                <span class='Activity'>Active</span>
                            </label>
                            <input name='estado' type='radio' value='A' id='dot-1' `+ (popupdiv[i].innerText.split(": ")[1] == "Active" ? "checked" : "") +`>
                        </div>
                        <div>
                            <label for='dot-2'>
                                <span class='dot two'></span>
                                <span class='Activity'>Inactive</span>
                            </label>
                            <input name='estado' type='radio' value='I' id='dot-2' `+ (popupdiv[i].innerText.split(": ")[1] == "Inactive" ? "checked" : "") +`>
                        </div>
                        `
                    }
                    else
                    {
                        var newElement = document.createElement("INPUT");
                        newElement.setAttribute("type", "text");
                        newElement.setAttribute("class", "input-box");
                        newElement.setAttribute("value", newText.tagName == "H1" ? popupdiv[i].innerText : popupdiv[i].innerText.split(": ")[1]);
                    }
                    popupdiv[i].parentNode.appendChild(newText);
                    newText.appendChild(newElement);
                }
                else
                {
                    btns.push(popupdiv[i]);
                }
            }
            for (var i = 0; i<btns.length; i++)
            {
                popupdiv[0].parentNode.appendChild(btns[i]);
            }
        }
        else
        {
            var info = [];
            var allInputs = $(".removable");
            var allText = $("#popupid [style*='display: none']");
            for (var i=0; i<allText.length; i++)
            {
                allText[i].style.display = ""
            }
            for (var i=0; i<allInputs.length; i++)
            {
                
                if(allInputs[i].lastChild.hasChildNodes())
                {
                    var Act = $("#dot-1").is(":checked") ? "Active" : "Inactive";
                    allText[i].innerText = allText[i].innerText.split(": ")[0] + ": " + Act ;
                    info.push(Act[0])
                }
                else{
                    if(allText[i].id == "morada" && allInputs[i].lastChild.value.replace(/[^,]/g, "").length != 2)
                    {
                        info.push(allText[i].innerText.split("ddress: ")[1]);
                    }
                    else
                    {
                        allText[i].innerText = allText[i].tagName == "H1" ?
                            allInputs[i].lastChild.value : 
                            allText[i].innerText.split(": ")[0] + ": " + allInputs[i].lastChild.value ;
                        info.push(allInputs[i].lastChild.value);
                    }
                }
                allInputs[i].parentNode.removeChild(allInputs[i]);
            }
            var mainbtn = document.getElementById(id + " " + type);
            if (type != "orders")
            {
                mainbtn.style ="background:linear-gradient(to right, " + (Act[0] == "A" ? "#59f309 0%, #368f1f 100%" : "#ff1414 0%, #a92828 100%") + ");";

            }
            mainbtn.innerText = info[0];
            editbtn.innerText = "Edit";
            $.ajax(
            {
                type: "POST",
                url: "SaveInfo.php",
                data: {'info': info, 'type': type, 'id': id},
                success:function(result){
                }
            })
        }
    }
    function Order(id, orderName)
    {
        $.ajax(
        {
            type: "POST",
            url: "Order.php",
            data: {'id': id, 'orderName' : orderName},
            success:function(result){
                $(".custom-model-main").removeClass('model-open');
                alert(result);
            }
        })
    }
    </script>

</body>
</html>