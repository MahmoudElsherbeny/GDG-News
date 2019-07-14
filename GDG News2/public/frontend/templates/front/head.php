<?php 
    include "templates/back/dbConfig.php";
?>

<!DOCCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="" />
        <title>GDG News</title>
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/navbar%20and%20footer.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/signup_login.css" />
        <link rel="stylesheet" href="css/news_details.css" />
        <link rel="stylesheet" href="css/media_quires.css" />
        <link rel="stylesheet" href="css/all.min.css" />
    </head>
    <body>
        
        <!-- navbar -->
        <nav class="navbar out-hidden">
            <div class="container full-width out-hidden">
                
                <!-- logo -->
                <div class="logo fl-left">
                    <a href="index.php">GDG<span>News</span></a>
                </div>
                
                <!-- fields -->
                <div class="fields fl-left">
                    <ul class="ls-st-none" >
                       <?php 
                            $sql = "SELECT * FROM sections ORDER BY sec_id";
                            $result = $conn->query($sql);
                            while($row = $result->fetch()) {    
                                echo <<<FELD
                                    <li class="fl-left lsChecked" >
                                        <a href="{$row['sec_name']}.php">{$row['sec_name']}</a>
                                    </li>
FELD;
                            }
                        ?>
                    </ul>
                </div>
                
                <!-- login & Signup -->
                <div class="form fl-right">
                    <?php 
                        session_start();
                        if(empty($_SESSION['account'])) {
                            echo <<<SHOW
                                <ul class="ls-st-none full-width" >
                                    <li class="fl-left" >
                                        <a href="signup.php" class="btn">SignUp</a>
                                    </li>
                                    <li class="fl-left" >
                                        <a href="login.php" class="btn">Login</a>
                                    </li>
                                </ul>
SHOW;
                        }
                        else {
                            $sql = "SELECT * FROM users,admins WHERE email=?";
                            $result = $conn->prepare($sql);
                            $result->execute(array($_SESSION['account']));
                            $row = $result->fetch();
                            echo <<<SHOW
                                <ul class="ls-st-none full-width" >
                                    <li class="fl-left username" >
                                        {$row['name']}
                                    </li>
                                    <li class="fl-left" >
                                        <a href="logout.php" class="btn">Logout</a>
                                    </li>
                                </ul>
SHOW;
                        }
                    ?>
                </div>
                
                <!--  menu button  display in small screen only  -->
                <button class="mobileMenuButton" id="mobileMenuBtn"> <i class="fas fa-bars fa-lg"></i> </button>
                
                <div class="mobileMenu" id="mobileMenu">
                    <ul class="ls-st-none" >
                        <?php 
                            $sql = "SELECT * FROM sections ORDER BY sec_id";
                            $result = $conn->query($sql);
                            while($row = $result->fetch()) {    
                                echo <<<FELD
                                    <li class="full-width" >
                                        <a href="{$row['sec_name']}.php" class="full-width" >{$row['sec_name']}</a>
                                    </li>
FELD;
                            }
                        ?>
                        
                        <hr>
                        
                        <li class="full-width" >
                            <button class="full-width" > <a href="signup.php" class="full-width">SignUp</a> </button>
                        </li>
                        <li class="full-width" >
                            <button class="full-width" > <a href="login.php" class="full-width">Login</a> </button>
                        </li>
                    </ul>
                </div>
                
            </div>
        </nav>
        <!-- end navbar  -->
   