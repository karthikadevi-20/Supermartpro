// JavaScript Document
function getprice(type, value) {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText == "") {
                document.getElementById("transalert").innerHTML = "Product Id or Product Name does not exist.";
            } else {
                document.getElementById("transalert").innerHTML = "";
                var n = xmlhttp.responseText.split(",", 3);
                document.getElementById("itemPrice").innerHTML = n[1];
                if (type == 'id') document.getElementById("prodname").value = n[0];
                else if (type == 'name') document.getElementById("prodid").value = n[0];
                document.getElementById("quantity").setAttribute("placeholder", "<=" + n[2]);
            }
        }
    };
    if (type == 'id') xmlhttp.open("GET", "getprice.php?pid=" + value, true);
    else if (type == 'name') { value = value.toLowerCase(); xmlhttp.open("GET", "getprice.php?pname=" + value, true); }
    xmlhttp.send();
}

// Add data to transtable
function addData() {
    var value = document.getElementById("prodid").value;
    var quantity = document.getElementById("quantity").value;
    console.log("Value: " + value + ", Quantity: " + quantity);

    // Use the fetch API to make the AJAX request
    fetch(value.length === 0 && quantity.length === 0 ? "transtable.php" : `transtable.php?pid=${value}&q=${quantity}`)
        .then(response => response.text())
        .then(data => {
            console.log("Response Text: " + data);
            document.getElementById("transtable").innerHTML = data;
        })
        .catch(error => {
            console.error("Error adding data:", error);
        });
}


// Del data from transtable
function delData(pid) {
    fetch("transtable.php?id=" + pid)
        .then(response => response.text())
        .then(data => {
            document.getElementById("transtable").innerHTML = data;
        })
        .catch(error => {
            console.error("Error deleting data:", error);
        });
}

// Trigger addData on button click
function transadd() {
    addData();
}
document.getElementById("add").addEventListener("click", transadd);