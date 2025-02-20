<?php 
require_once("include/header.php");
?>

<div id="body">
	<?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
    <?php 
    if(isset($_GET['list'])){
        //product
        if(!strcmp(strtolower($_GET['list']), "product")){
            echo "<h1><span>List of ".ucfirst($_GET['list'])."</span></h1>";
            echo "<div id='contentbox'><div id='data'>
                  <table id='itemList' ><tr><th>ID</th><th>Product name</th><th>Supplier name</th><th>Market Price</th><th>Cost Price</th><th>Options</th></tr>";

            $plist = $conn->query("SELECT product_id, product_name, supplier_id, market_price, cost_price FROM product");

            while($row = $plist->fetch_assoc()){
                echo "<tr><td>{$row['product_id']}</td>
                     <td>{$row['product_name']}</td>";

                $slist = $conn->query("SELECT sdealer FROM supplier WHERE sid='{$row['supplier_id']}'");
                $slist = $slist->fetch_assoc();

                echo "<td>{$slist['sdealer']}</td>
                     <td>{$row['market_price']}</td>
                     <td>{$row['cost_price']}</td>
                     <td><a href='editlist.php?name=product&id={$row['product_id']}'>Edit</a> ";
            }
            echo "</tr></table></div></div>";
        }//end product

// supplier
elseif (!strcmp(strtolower($_GET['list']), "supplier")) {
    echo "<h1><span>List of " . ucfirst($_GET['list']) . "</span></h1>";
    echo "<div id='contentbox'><div id='data'><table id='itemList' ><tr><th>ID</th><th>Supplier name</th><th>Dealer name</th><th>Email</th><th>Phone</th></tr>";

    $slist = $conn->query("SELECT sid, sname, sdealer, semail, sphone FROM supplier");

    while ($row = $slist->fetch_assoc()) {
        echo "<tr><td>{$row['sid']}</td>
             <td>{$row['sname']}</td>
             <td>{$row['sdealer']}</td>
             <td>{$row['semail']}</td>
             <td>{$row['sphone']}</td></tr>";
    }
    echo "</table></div></div>";
}
//end supplier

        //customer
        elseif(!strcmp(strtolower($_GET['list']), "customer")){
            echo "<h1><span>List of ".ucfirst($_GET['list'])."</span></h1>";
            echo "<div id='contentbox'><div id='data'><table id='itemList' ><tr><th>ID</th><th>Name</th><th>Join Date</th><th>Money Spent</th><th>Address</th><th>Spent Reset</th><th>Phone</th></tr>";

            $slist = $conn->query("SELECT cid, first_name, last_name, cjoin_date, cmoney_spent, caddress, cmoney_spent_reset, cphone FROM customer");

            while($row = $slist->fetch_assoc()){
                echo "<tr><td>{$row['cid']}</td>
                     <td>{$row['first_name']}&nbsp;{$row['last_name']}</td>";            
                echo "<td>{$row['cjoin_date']}</td>
                     <td>{$row['cmoney_spent']}</td>
                     <td>{$row['caddress']}</td>
                     <td>{$row['cmoney_spent_reset']}</td>
                     <td>{$row['cphone']}</td></tr>";
                     
            }
            echo "</table></div></div>";
        }//end customer

        //employee
        elseif(!strcmp(strtolower($_GET['list']), "employee")){
            echo "<h1><span>List of ".ucfirst($_GET['list'])."</span></h1>";
            echo "<div id='contentbox'><div id='data'><table id='itemList' ><tr><th>ID</th><th>Name</th><th>Salary</th><th>Admin</th><th>DOB</th><th>Phone</th><th>Address</th><th>UID</th><th>Join Date</th><th>End Date</th></tr>";

            $slist = $conn->query("SELECT id, first_name, last_name, salary, admin, dob, phone_number, address, uid, join_date, end_date FROM employee");

            while($row = $slist->fetch_assoc()){
                echo "<tr><td>{$row['id']}</td>
                     <td>{$row['first_name']}&nbsp;{$row['last_name']}</td>";
                echo "<td>{$row['salary']}</td>
                     <td>{$row['admin']}</td>
                     <td>{$row['dob']}</td>
                     <td>{$row['phone_number']}</td>
                     <td>{$row['address']}</td>
                     <td>{$row['uid']}</td>
                     <td>{$row['join_date']}</td>
                     <td>{$row['end_date']}</td>
                     ";
            }
        }//end employee

        //promo
        elseif(!strcmp(strtolower($_GET['list']), "promo")){
            echo "<h1><span>List of ".ucfirst($_GET['list'])."</span></h1>";
            echo "<div id='contentbo'><div id='data'><table id='itemList' ><tr><th>ID</th><th>Discount</th><th>Valid upto</th><th>count</th></tr>";

            $slist = $conn->query("SELECT promo_code, discount, valid_upto, count FROM promotion");

            while($row = $slist->fetch_assoc()){
                echo "<tr><td>{$row['promo_code']}</td>
                     <td>{$row['discount']}</td>
                     <td>{$row['valid_upto']}</td>
                     <td>{$row['count']}</td>";
            }
        }//end promo

        //dept
        elseif(!strcmp(strtolower($_GET['list']), "dept")){
            echo "<h1><span>List of ".ucfirst($_GET['list'])."</span></h1>";
            echo "<div id='contentbo'><div id='data'><table id='itemList' ><tr><th>ID</th><th>Name</th><th>Manager</th></tr>";

            $dlist = $conn->query("SELECT dept_id, dept_name, manager_id FROM department");

            while($row = $dlist->fetch_assoc()){
                echo "<tr><td>{$row['dept_id']}</td>
                     <td>{$row['dept_name']}</td>";
                if($row['manager_id']){
                    $elist = $conn->query("SELECT first_name, last_name FROM employee WHERE id='{$row['manager_id']}'");
                    $ename =  $elist->fetch_assoc();
                    echo "<td>{$ename['first_name']}&nbsp;{$ename['last_name']}</td>";
                }
                else echo"<td>No one assigned</td>";
            }
        }//end dept

        // ... (add other sections as needed)

    } else {
        echo "<h1><span><a href='viewlist.php?list=Product'>Product list</a></span></h1>
              <h1><span><a href='viewlist.php?list=Supplier'>Supplier list</a></span></h1>
              <h1><span><a href='viewlist.php?list=Customer'>Customer list</a></span></h1>
              <h1><span><a href='viewlist.php?list=Employee'>Employee list</a></span></h1>";
        // ... (add other sections as needed)
    }
    ?>
    </div>
</div>
<!-- body ends -->

<?php 
//require_once("include/footer.php");
?>
