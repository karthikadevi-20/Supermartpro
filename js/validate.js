function pidChange() {
    var pid = document.getElementById("prodid").value;
    if (pid.length != 0) {
        getprice("id", pid);
    } else {
        document.getElementById("prodname").disabled = false;
        document.getElementById("prodname").value = "";
        document.getElementById("quantity").setAttribute("placeholder", "");
    }
}

function pnameChange() {
    var pname = document.getElementById("prodname").value;
    if (pname.length != 0) {
        getprice("name", pname);
    } else {
        document.getElementById("prodid").disabled = false;
        document.getElementById("prodid").value = "";
        document.getElementById("quantity").setAttribute("placeholder", "");
    }
}

//transaction 1st half validate
function transadd() {
    var id = document.getElementById("prodid").value;
    var name = document.getElementById("prodname").value;
    var q = document.getElementById("quantity").value;

    // Uncomment and modify the conditions as needed
    // if (id != 0 && id.length && name.length && q.length && q != 0) {
        addData();
        // document.getElementById("prodid").value = document.getElementById("prodname").value = document.getElementById("quantity").value = "";
        // document.getElementById("quantity").setAttribute("placeholder", "");
        // document.getElementById("itemPrice").innerHTML = "";
    // } else {
        // alert("Errors in input. Please fix them");
        // return false;
    // }
}

function validate() {
    var quantity = document.getElementById("quantity").value;
    var discount = document.getElementById("discount").value;
    var cid = document.getElementById("cid").value;

    if (quantity.trim() === '' || isNaN(quantity) || parseInt(quantity) <= 0) {
        alert("Please enter a valid quantity.");
        return false;
    }

    if (discount.trim() === '' || isNaN(discount)) {
        alert("Please enter a valid discount.");
        return false;
    }

    if (cid.trim() === '' || isNaN(cid) || parseInt(cid) < 0) {
        alert("Please enter a valid customer ID.");
        return false;
    }

    // Additional validation checks can be added as needed

    // If all validations pass, you can proceed with submitting the form
    // Uncomment the line below if you want to submit the form
    // document.forms[0].submit();

    return true;
}

