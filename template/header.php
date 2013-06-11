<?php include('header_tag.php'); ?>
    <body>
        <div class='container'>
            <div class='row'>
                <?php include('calendar.php'); ?>
                <div id='header'class='span6'>
                    <div id='row'>
                        <div class='span6 offset3'>
                            <div id='register_now'>Don't have an account? <a href='register.php'>Register Now</a></div><!-- register_now -->
                            <div id="login_form">
                                <form class="form-inline">
                                    <input type="email" class="input-medium" placeholder="Email">
                                    <input type="password" class="input-medium" placeholder="Password">
                                    <button type="submit" class="btn btn-success">Sign in</button>
                                </form>
                            </div><!-- login_form --> 
                        </div>
                    </div>
                    <div id='green_strip'></div><!-- green_strip -->
                    <h3 class='span8 offset1'>The Foundation of Sheikhs and Islamic Scholars of Tanzania</h3>
                    <div id='logo'><img src='img/logo.png' alt='logo' width='120'/></div><!-- logo -->
                    <button class="btn btn-large btn-warning span2 offset7" type="button">Donate Now</button>
                    <div id='nav' class="nav nav-tabs span7 lead">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="scholars.php">Imams & Scholars</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Library</a></li>
                            <li><a href="#">Contact Us</a></li>
                    </div><!-- nav -->
                </div><!-- header -->
            </div><!-- row [top_content] -->