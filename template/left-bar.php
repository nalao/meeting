<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">MENU</li>
                <li>
                    <a href="#" onclick="loadPage('home')" aria-expanded="false">
                        <i class="ti-home"></i>
                        <span class="hide-menu">
                            ໜ້າຫຼັກ
                        </span>
                    </a>
                </li>
                <?php 
                    // SHOW WHEN USER ADMIN
                    if (isset($_SESSION["user_name"]) AND $_SESSION["user_name"] != "" AND $_SESSION["type"] == 1 ) {
                    ?>
                        <li>
                            <a href="#" onclick="loadPage('manage-user')" aria-expanded="false">
                                <i class="ti-settings"></i>
                                <span class="hide-menu">
                                    ຈັດການຜູ້ໃຊ້ງານ
                                </span>
                            </a>
                        </li>                
                    <?php
                    }
                 ?>
                <li>
                    <a href="#" onclick="loadPage('add-topic')" aria-expanded="false">
                        <i class="fa fa-wpforms"></i>
                        <span class="hide-menu">
                            ຈັດການຫົວຂໍ້ປະຊຸມ
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="loadPage('add-vara')" aria-expanded="false">
                        <i class="fa fa-wpforms"></i>
                        <span class="hide-menu">
                            ຈັດການວາລະ
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>