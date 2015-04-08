<?php 
session_start();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>G4 MONITOR - The first monitor for you network</title>
    
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="foundation-icons/foundation-icons.css" />
    <script src="js/vendor/modernizr.js"></script>
    

</head>

<body>
    <div id="top"></div>
    <div class="contain-to-grid fixed">
        <nav class="top-bar" data-topbar>
            <ul class="title-area">
                <li class="name">
                    <h1>
                        <a href="#"><img class="logo_g4monitor" src="img/logo_g4monitor.png" alt="G4 Monitor"></a>
                    </h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon">
                    <a href="#">
                        <span></span>
                    </a>
                </li>
            </ul>
            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul id="nav" class="right">
                    <li>
                        <a href="#top">Home</a>
                    </li>

                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a href="#contact">Contact Us</a>
                    </li>
                </ul>

            </section>
        </nav>
    </div>
    <section class="jumbo">
        <div class="row">
            <div class="large-12 columns">
                <h1>Do not lose sight of the priorities</h1>
                <p class="text-center">
                    <a href="#" class="medium button radius">Check Us Out!</a>
                </p>

            </div>
        </div>
    </section>

    <section id="about">
        <div class="row">
            <div class="small-12 large-12 columns">
                <div class="text-center">
                    <h2>Why would you choose G4 monitor ?</h2>
                    <p>G4 Monitor is the choice of some of the world’s largest companies and mission-critical organizations for real-time IT performance monitoring and diagnostics management. </p>
                    <ul class="disc">
                        
                        <li>Monitor your entire IT infrastructure</li>
                       <li>Spot problems before they occur</li>
                       <li> Know immediately when problems arise</li>
                       <li> Share availability data with stakeholders</li>
                       <li> Detect security breaches</li>
                       <li> Plan and budget for IT upgrades</li>
                       <li>Reduce downtime and business losses</li>

                    </ul>
                </div>
                <div>
                    <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3" data-equalizer>
                        <li>
                            <ul class="pricing-table" data-equalizer-watch>
                                <li class="title">Standard</li>
                                <li class="price">$500 / year</li> 
                                
                                <li class="bullet-item">Online Support</li>
                                <li class="bullet-item">Response time 48h</li>
                                <li class="bullet-item">Facilities management/li>
                                <li class="cta-button">
                                    <a class="button" href="#">Buy Now</a>
                                </li> 
                            </ul>
                        </li>
                        <li>
                           <ul class="pricing-table" data-equalizer-watch>
                                <li class="title">Premium</li>
                                <li class="price">$2 000 / year</li> 
                                
                                <li class="bullet-item">Dedicated support 6d/7, 24h/24</li>
                                <li class="bullet-item">Response time 24h</li>
                                <li class="bullet-item">Facilities management</li>
                                <li class="cta-button">
                                    <a class="button" href="#">Buy Now</a>
                                </li> 
                            </ul>
                        </li>
                        <li>
                            <ul class="pricing-table" data-equalizer-watch>
                                <li class="title">Ultimate</li>
                                <li class="price">$5 300 / year</li> 
                                
                                <li class="bullet-item">Dedicated support 7d/7, 24h/24</li>
                                <li class="bullet-item">Response time 2h</li>
                                <li class="bullet-item">Facilities management</li>
                                <li class="cta-button">
                                    <a class="button" href="#">Buy Now</a>
                                </li> 
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio">
        <div class="row">
            <div class="large-12 columns">
                <h2 id="title_advantage">They take advantage of our services</h2>
                <br/>
                <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
                    <li>
                        <img class="th" id="logo-atos" src="img/logo_atos_blanc.png" alt="image1" />
                    </li>
                    <li class="logo-dacast">
                        <img class="th" src="img/logo_dacast_blanc.png" alt="image2" />

                    </li>
                    <li>
                        <img class="th" id="logo_lufthansa" src="img/Lufthansa_Logo_blanc.png" alt="image3" />
                    </li>
                    <li class="logo-quechua">
                        <img class="th" src="img/logo_quechua_blanc.png" alt="image1" />
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <footer>
        <div id="contact" class="text-center">
            <div class="row">
                <h2> Contact us</h2>
                <div class="large-8 large-centered columns">
                    <?php
                    if (isset($_SESSION['msg_send']) && $_SESSION['msg_send'] && isset($_GET['msg_send']) && $_GET['msg_send'])
                    {
                    ?>
                    <img src="img/image_email_send.gif">
                    <div data-alert class="alert-box success radius">  Your mail has been send, we will answer you as soon as possible  <a href="#" class="close">&times;</a></div>
                    <?php
                    }
                    else if(isset($_SESSION['msg_send']) && $_SESSION['msg_send'] && isset($_GET['msg_send']) && !$_GET['msg_send'])
                    {
                    ?>
                    <div data-alert class="alert-box alert radius">  Your mail has not been send ! <a href="#" class="close">&times;</a></div>
                    <?php
                    }
                    ?>
                    <form method="POST" action="contact_action.php">
                        <label class="text-left">Name
                            <input id="name-contact" type="text" name="name" placeholder="What is your name ?" required>
                        </label>
                        <label class="text-left"> Email
                            <input id="email-contact" type="email" name="email" placeholder="What is your email ?" required>
                        </label>
                        <label class="text-left"> Message
                            <textarea id="message-contact" name="message" placeholder="What is your message ?" required> </textarea>
                        <label>
                        <input id="send_contact" class="button" type="submit" value="Send">                
                    </form>
                </div>
            </div>
        </div>
        <div class="copy">
            <div class="row">
                <div class="large-12 columns">
                    <div class="large-4 pull-1 columns text-center">
                        <p>&copy; Copyright RO(B|MA)IN.</p>
                    </div>
                    <div class="large-7 push-2 columns text-center">
                        <!-- Please Leave this link out of respect for the designer -->
                        <p>Designed By: RO(B|MA)IN
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
    <script>
        $(function() {
            $('a[href*=#]:not([href=#])').click(function() {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });

            $("#logo-atos").hover(
            function(){
                $(this).attr("src", "img/logo_atos.png");

            },function(){
                $(this).attr("src", "img/logo_atos_blanc.png");
            });

            $("#logo_lufthansa").hover(
            function(){
                $(this).attr("src", "img/Lufthansa_Logo.png");

            },function(){
                $(this).attr("src", "img/Lufthansa_Logo_blanc.png");
            });

            $(".logo-dacast img").hover(
            function(){
                $(this).attr("src", "img/logo_dacast.png");

            },function(){
                $(this).attr("src", "img/logo_dacast_blanc.png");
            });

             $(".logo-quechua img").hover(
            function(){
                $(this).attr("src", "img/logo_quechua.png");

            },function(){
                $(this).attr("src", "img/logo_quechua_blanc.png");
            });

        });
    </script>
</body>

</html>
