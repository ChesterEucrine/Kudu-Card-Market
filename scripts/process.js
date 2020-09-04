function displayItems(arry, home){
    for (var i=0; i<arry.length; i++){
            var div1 = document.createElement("div");
            var div2 = document.createElement("div");
            div1.setAttribute("class","column");
            var string1 = "location.href='./item_page.php?id=";
            string1 = string1.concat(arry[i]['MARKET_ID'], "';");
            div1.setAttribute("onclick", string1);
            div2.setAttribute("class","card");
            var img = document.createElement("IMG");
            img.setAttribute("src", arry[i]["IMAGE_URL"]);
            img.setAttribute("alt", arry[i]["NAME"]);
            img.setAttribute("width","210");
            img.setAttribute("height","170");
            var div3 = document.createElement("div");
            div3.setAttribute("class","container");
            var para = document.createElement("P");
            para.innerText = arry[i]["NAME"];
            var price = document.createElement("P");
            price.innerText = "R" + myData[i]["PRICE"];
            priceDiv.appendChild(price);
            div3.appendChild(para);
            div2.appendChild(img);
            div2.appendChild(div3);
            div1.appendChild(div2);
            home.appendChild(div1);
    }
}
