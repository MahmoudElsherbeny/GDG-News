<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="" />
        <title>mail template</title>
        <link rel="stylesheet" href=" {{ url('frontend/css/mail.css') }} " />
    </head>
    <body>
        
        <div class="container">
            <div class="sub-container">
                
                <div class="image">
                    <img src="images/may-brussels.jpg" width="100%" height="100%" />
                </div>
                
                <div class="content">
                    <p>Thank you for signup in <a href=" {{url('/')}} ">GDG News</a>. Please go to this link to verify your account: <a href="">verify account</a>.</p>
                </div>
                
                <div class="footer">
                    
                    <div class="links">
                        <a href="https://www.facebook.com/" target="_blank">
                            <img alt="Facebook" height="32" src="images/facebook@2x.png" title="Facebook" width="32">
                        </a>
                    
                        <a href="https://twitter.com/" target="_blank">
                            <img alt="Twitter" height="32" src="images/twitter@2x.png" title="Twitter" width="32">
                        </a>

                        <a href="https://instagram.com/" target="_blank">
                            <img alt="Instagram" height="32" src="images/instagram@2x.png" title="Instagram" width="32">
                        </a>

                        <a href="https://www.pinterest.com/" target="_blank">
                            <img alt="Pinterest" height="32" src="images/pinterest@2x.png" title="Pinterest" width="32">
                        </a>
                    </div>
                    
                    <div class="text">
                        <p style="font-size: 14px; line-height: 21px; text-align: center; margin: 0;">NetShop - Lorem ipsum dolor sit amet hasellus sagittis aliquam luctus.&nbsp;</p>
                        <p style="font-size: 14px; line-height: 21px; text-align: center; margin: 0;">329 California St, San Francisco, CA 94118</p>
                    </div>
                    
                </div>
                        
            </div>
        </div>
    </body>
</html>