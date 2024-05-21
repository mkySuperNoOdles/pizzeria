<!-- start admcontent.php -->
<div class="container">
    <div class="left-section">
        <h2>Content</h2>
        <!-- einde admcontent.php -->
        <!-- start manageorders.php -->
        <div class="left-section-content">LEFT SECTION CONTENT GOES HERE</div>
    </div>
    <!-- einde manageorders.php -->
    <!-- start userprofile.php -->
    <div class="right-section">

        <div class="userprofilecontainer">
            <?php echo $message ?>
        </div>
        <!-- einde userprofile.php -->
        <!-- start admmenu.php -->
        <div class="cart-container">
            <!-- Admin Menu -->
            <h2>Manage</h2>
            <div class="admlinks">
                <div class="admlink"><a href="adminpage.php?action=manageUsers">Users</a></div>
                <div class="admlink"><a href="adminpage.php?action=managePizzas">Pizzas</a></div>
                <div class="admlink"><a href="adminpage.php?action=manageOrders">Orders</a></div>
            </div>
        </div>
    </div>
</div>