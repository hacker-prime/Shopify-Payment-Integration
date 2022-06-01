<!-- https://stackoverflow.com/questions/5067279/how-to-align-this-span-to-the-right-of-the-div -->
    <div class="navButton">
        <span style="cursor:pointer" onclick="openNav()" class="right">&#9776;</span>
    </div>
    
     <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav -->
     <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#sandbox" onclick="hideSideNav()">Sandbox</a>
        <a href="#live" onclick="hideSideNav()">Live</a>
        <a href="#feestructures" onclick="hideSideNav()">Fee Structures</a>
        <a href="#currency">Currency</a>
    </div>
    
    <section>
        <div id="nabvar" class="header nav">
            <!-- <h2 class="logo">WiPay</h2> -->
            <ul class="test" id="menu-wrapper">
                <li class="mainMenu">
                    <a href="https://shaynhacker.com/wipay-deyah/sandbox/sandbox2.php" class="btn active home" id="myDIV" data-target="body"> Sandbox</a>
                </li>
                <!-- <li>
                    <a href="#">About</a>
                </li>
                -->
                <li class="mainMenu" data-target="services"> 
                    <a href="https://shaynhacker.com/wipay-deyah/live/live.php?shop=<?php echo $shop ?>" class="btn" data-target="services">Live</a>
                </li>
                <!-- <li>
                    <a href="#">Our Work</a>
                </li> -->
                <li class="mainMenu">
                    <a href="https://shaynhacker.com/wipay-deyah/fee-structure/feestructure.php?shop=<?php echo $shop ?>" class="btn" data-target="portfolio">Fee Structures</a>
                </li>    
                <li class="mainMenu">
                    <a href="https://shaynhacker.com/wipay-deyah/currency/currency.php?shop=<?php echo $shop ?>" class="btn" data-target="portfolio">Currency</a>
                </li>       
            </ul>
        </div>
    </section>    

