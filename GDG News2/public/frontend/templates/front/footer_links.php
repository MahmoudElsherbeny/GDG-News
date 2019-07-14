    <!--  footer links  -->
    <div class="footerLinks out-hidden">
        <div class="container">

            <div class="ftlinks fl-left out-hidden">
                <h2>Pages:</h2>
                <ul class="ls-st-none">
                    <?php 
                            $sql = "SELECT * FROM sections ORDER BY sec_id";
                            $result = $conn->query($sql);
                            while($row = $result->fetch()) {    
                                echo <<<FELD
                                    <li>
                                        <a href="{$row['sec_name']}.php">{$row['sec_name']}</a>
                                    </li>
FELD;
                            }
                        ?>
                </ul>
            </div>

            <div class="ftlinks followUS fl-left out-hidden">
                <h2>Follow Us:</h2>
                <u class="ls-st-none">
                    <li> <i class="fab fa-facebook out-hidden fcbook"></i> <a href="">Facebook</a></li>
                    <li> <i class="fab fa-twitter twtr"></i> <a href="">Twitter</a></li>
                    <li> <i class="fab fa-instagram insta"></i> <a href="">Instagram</a></li>
                </u>
            </div>

            <div class="ftlinks contact fl-left out-hidden">
                <h2>Contact Us:</h2>
                <u class="ls-st-none">
                    <li> <i class="fas fa-envelope"></i> <span>gdgnews@gmail.com</span> </li>
                    <li> <i class="fas fa-phone"></i> <span>+02 5232459987</span> </li>
                </u>
            </div>

        </div>
    </div>
    <!--  end footer links  -->