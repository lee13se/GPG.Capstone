<link rel="stylesheet" href="style.css">

<?php include('Login/auth.php');?>
<?php include('Includes/Print.php');?>
<!-- used to set the browser window size -->
</body>
<head>


<script language="javascript">
<!--
function openit(sURL){
newwindow=open(sURL,"Help","scrollbars=yes, toolbar=no, directories=no, menu bar=no, resizable=yes, status=no, width=600, height=500");
}

-->
</script>



</head>
<body>

<?php
function help($anchor)
{
	?>
	<a href="javascript:void(window.open('/Help.php#<?php echo $anchor ?>', 'Help',
    		'width=400,height=405, location=no, menubar=no, status=no, toolbar=no, scrollbars=yes, resizable=yes'))">
	<img src='../Images/HelpGear.jpg' width='40' height='40' alt='Help'> </a> 
<?php
}

function viewClientContacts($clientNum)
{
	?>
	<script>
    function openWindow()
    {
    javascript:void(window.open('/ClientContacts.php?clientNum=<?php echo $clientNum ?>', 'View Client Contacts',
				'width=850,height=800, location=no, menubar=no, status=no, toolbar=no, scrollbars=yes, resizable=yes'))
    }
    </script>
       <input name="" type="button" value="View Client Contacts" onClick="openWindow()"></a> 
 
<?php
}


function back()
{
	echo "<INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);'> ";
}

?>

<!-- Title Section -->
<div class="title"> <a href="/"><img src="/Images/gpg_logo_small.jpg" alt="Gateway Precision Gear" width="190" height="60" align="left"></a>

<h2> Production Management System</h2>

<!-- End Title Section -->


		<!-- This indented section is displayed of we are on an edit page  -->
                <!-- Main Tab Bar -->
		<?php if($link == 1) { ?>                
                <ul id="menu">
                <li><a target="_self" title="Quote & Order" 
                    <?php if($header_page_id == "quote_order"){
                        echo "class='current'";
                        } 
                    ?>
                    >Quote & Order</a></li>
                    
                <li><a target="_self" title="Production"
                    <?php if($header_page_id == "production"){
                        echo "class='current'";
                        } 
                    ?>
                    >Production</a></li>
                    
                <li><a target="_self" title="Shipping"
                    <?php if($header_page_id == "shipping"){
                        echo "class='current'";
                        } 
                    ?>
                    >Shipping</a></li>
                    
                <li><a target="_self" title="Inventory"
                    <?php if($header_page_id == "inventory"){
                        echo "class='current'";
                        } 
                    ?>
                    >Inventory</a></li>
                    
                <li><a target="_self" title="Reports"
                    <?php if($header_page_id == "reports"){
                        echo "class='current'";
                        } 
                    ?> 
                    >Reports</a></li>
                    
                <li><a target="_self" title="Advanced"
                    <?php if($header_page_id == "advanced"){
                        echo "class='current'";
                        } 
                    ?>
                    >Advanced</a></li>
                </ul>
                <!-- End Main Tab Bar -->
                
                <!-- Sub Tab Bar -->
                    <!-- Submenu for Quote and Order -->
                    <?php if($header_page_id == "quote_order") { ?>
                        <ul id="submenu">
                           <li><a target="_self"
                           <?php if($header_subpage_id == "new_quote"){
                                    echo "class='current'";
                                    } 
                                ?>>New Quote</a></li>
                                
                           <li><a target="_self"
                           <?php if($header_subpage_id == "find_quote"){
                                    echo "class='current'";
                                    } 
                                ?>>Find Existing Quote</a></li>
                                
                           <li><a target="_self"
                           <?php if($header_subpage_id == "new_order"){
                                    echo "class='current'";
                                    } 
                                ?>>New Order</a></li>
                                
                           <li><a target="_self"
                           <?php if($header_subpage_id == "find_order"){
                                    echo "class='current'";
                                    } 
                                ?>>Find Existing Order</a></li>
                        </ul>
                    <? } ?>
                    
                    <!-- Submenu for Production -->
                        <?php if($header_page_id == "production") { ?>
                        <ul id="submenu">
                           <li><a target="_self"
                           <?php if($header_subpage_id == "production_traveler"){
                                    echo "class='current'";
                                    } 
                                ?>>Print Production Traveler</a></li>
                                
                           <li><a target="_self"
                           <?php if($header_subpage_id == "employee_logs"){
                                    echo "class='current'";
                                    } 
                                ?>>Employee Logs</a></li>
                           <li><a target="_self"
                           <?php if($header_subpage_id == "order_status"){
                                    echo "class='current'";
                                    } 
                                ?>>Order Status</a></li>
                        </ul>
                    <? } ?>
                
                    <!-- Submenu for Shipping -->
                        <?php if($header_page_id == "shipping") { ?>
                        <ul id="submenu">
                                        
                           <li><a target="_self"
                           <?php if($header_subpage_id == "enter_shipments"){
                                    echo "class='current'";
                                    } 
                                ?>>Enter Shipments</a></li>
                                
                           <li><a target="_self"
                           <?php if($header_subpage_id == "shipments_due"){
                                    echo "class='current'";
                                    } 
                                ?>>Shipments Due</a></li>
                        </ul>
                    <? } ?>
                    
                    
                    <!-- Submenu for Inventory -->
                    <?php if($header_page_id == "inventory") { ?>
                        <ul id="submenu">
                           <li><a target="_self"
                           <?php if($header_subpage_id == "rmInventory"){
                                    echo "class='current'";
                                    } 
                                ?>>Raw Material Inventory</a></li>
                                
                           <li><a target="_self"
                           <?php if($header_subpage_id == "fgInventory"){
                                    echo "class='current'";
                                    } 
                                ?>>Finished Goods Inventory</a></li>
                        </ul>
                    <? } ?>
                    
                    
                    <!-- Submenu for Reports -->
                    <!-- Submenu for Advanced -->
                    <?php if($header_page_id == "advanced") { ?>
                        <ul id="submenu">
                           <li><a target="_self"
                           <?php if($header_subpage_id == "edit_employees"){
                                    echo "class='current'";
                                    } 
                                ?>>Employees</a></li>
                                
                           <li><a target="_self"
                           <?php if($header_subpage_id == "search_parts"){
                                    echo "class='current'";
                                    } 
                                ?>>Parts</a></li>
                                
                           <li><a target="_self"
                           <?php if($header_subpage_id == "search_customers"){
                                    echo "class='current'";
                                    } 
                                ?>>Clients</a></li>
                                
                         <!--  <li><a target="_self"
                           <?php //if($header_subpage_id == "database"){
                                 //   echo "class='current'";
                                  //  } 
                                ?>>Back Up & Restore Database</a></li>-->
                        </ul>
                    <? } 
				}
				?>    
                
                <!-- End Sub Tab Bar -->









<?php if ($link != 1) { ?>

<!-- Main Tab Bar -->

<ul id="menu">
<li><a href="/quote_order.php" target="_self" title="Quote & Order" 
	<?php if($header_page_id == "quote_order"){
		echo "class='current'";
		} 
	?>
	>Quote & Order</a></li>
    
<li><a href="/production.php" target="_self" title="Production"
	<?php if($header_page_id == "production"){
		echo "class='current'";
		} 
	?>
	>Production</a></li>
    
<li><a href="/shipping.php" target="_self" title="Shipping"
	<?php if($header_page_id == "shipping"){
		echo "class='current'";
		} 
	?>
	>Shipping</a></li>
    
<li><a href="/inventory.php" target="_self" title="Inventory"
	<?php if($header_page_id == "inventory"){
		echo "class='current'";
		} 
	?>
	>Inventory</a></li>
    
<li><a href="/reports.php" target="_self" title="Reports"
	<?php if($header_page_id == "reports"){
		echo "class='current'";
		} 
	?> 
	>Reports</a></li>
    
<li><a href="/advanced.php" target="_self" title="Advanced"
	<?php if($header_page_id == "advanced"){
		echo "class='current'";
		} 
	?>
	>Advanced</a></li>
</ul>
<!-- End Main Tab Bar -->

<!-- Sub Tab Bar -->
	<!-- Submenu for Quote and Order -->
    <?php if($header_page_id == "quote_order") { ?>
        <ul id="submenu">
           <li><a href="newQuote.php" target="_self"
           <?php if($header_subpage_id == "new_quote"){
                    echo "class='current'";
                    } 
                ?>>New Quote</a></li>
                
           <li><a href="findQuote.php" target="_self"
           <?php if($header_subpage_id == "find_quote"){
                    echo "class='current'";
                    } 
                ?>>Find Existing Quote</a></li>
                
           <li><a href="NewSalesOrder.php" target="_self"
           <?php if($header_subpage_id == "new_order"){
                    echo "class='current'";
                    } 
                ?>>New Order</a></li>
                
           <li><a href="findOrder.php" target="_self"
           <?php if($header_subpage_id == "find_order"){
                    echo "class='current'";
                    } 
                ?>>Find Existing Order</a></li>
        </ul>
    <? } ?>
    
    <!-- Submenu for Production -->
        <?php if($header_page_id == "production") { ?>
        <ul id="submenu">
           <li><a href="ProductionTraveler.php" target="_self"
           <?php if($header_subpage_id == "production_traveler"){
                    echo "class='current'";
                    } 
                ?>>Print Production Traveler</a></li>
                
           <li><a href="Employeeproductionlog.php" target="_self"
           <?php if($header_subpage_id == "employee_logs"){
                    echo "class='current'";
                    } 
                ?>>Employee Logs</a></li>
           <li><a href="OrderStatus.php" target="_self"
           <?php if($header_subpage_id == "order_status"){
                    echo "class='current'";
                    } 
                ?>>Order Status</a></li>
        </ul>
    <? } ?>

    <!-- Submenu for Shipping -->
        <?php if($header_page_id == "shipping") { ?>
        <ul id="submenu">
                        
           <li><a href="enterShipments.php" target="_self"
           <?php if($header_subpage_id == "enter_shipments"){
                    echo "class='current'";
                    } 
                ?>>Enter Shipments</a></li>
            </ul>  
    <? } ?>
    
    
    <!-- Submenu for Inventory -->
    <?php if($header_page_id == "inventory") { ?>
        <ul id="submenu">
           <li><a href="ViewMaterial.php" target="_self"
           <?php if($header_subpage_id == "rmInventory"){
                    echo "class='current'";
                    } 
                ?>>Raw Material Inventory</a></li>
                
           <li><a href="Viewfginventory.php" target="_self"
           <?php if($header_subpage_id == "fgInventory"){
                    echo "class='current'";
                    } 
                ?>>Finished Goods Inventory</a></li>
        </ul>
    <? } ?>
    
    
    <!-- Submenu for Reports -->
	<?php if($header_page_id == "reports") { ?>
        <ul id="submenu">
           <li><a href="CostAnalysis.php" target="_self"
           <?php if($header_subpage_id == "cost_analysis"){
                    echo "class='current'";
                    } 
                ?>>Cost Analysis</a></li>
                
           <li><a href="ViewShipped.php" target="_self"
           <?php if($header_subpage_id == "view_shipped"){
                    echo "class='current'";
                    } 
                ?>>View Boxes Shipped</a></li>       
    
    	</ul>
    <? } ?>
    
    <!-- Submenu for Advanced -->
    <?php if($header_page_id == "advanced") { ?>
        <ul id="submenu">
           <li><a href="ViewActiveEmployees.php" target="_self"
           <?php if($header_subpage_id == "edit_employees"){
                    echo "class='current'";
                    } 
                ?>>Employees</a></li>
                
           <li><a href="searchParts.php" target="_self"
           <?php if($header_subpage_id == "search_parts"){
                    echo "class='current'";
                    } 
                ?>>Parts</a></li>
                
           <li><a href="ViewClient.php" target="_self"
           <?php if($header_subpage_id == "search_customers"){
                    echo "class='current'";
                    } 
                ?>>Clients</a></li>
                
         <!--  <li><a href="backupDatabase.php" target="_self"
           <?php //if($header_subpage_id == "database"){
                 //   echo "class='current'";
                 //   } 
                ?>>Back Up & Restore Database</a></li> -->
        </ul>
    <? }
}?>    

<!-- End Sub Tab Bar -->


<!-- Connect to the databse -->
<?php include('Dbconnect.php'); ?>



<div class="body">
