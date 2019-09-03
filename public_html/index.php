<?php

require '../bootloader.php';

use App\App;

$navigation = new \App\Views\Navigation();
$footer = new \App\Views\Footer();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index.php</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <!-- Header -->   
        <header>
<?php print $navigation->render(); ?>
        </header>
        <!-- Main -->   
        <main>
            <section id="main-photo"></section>
            <section class="wrapper">
                <div id="container" class="flex">
                    <div class="service">
                        <div class="foto-one"></div>
                        <div class="service-text">
                            <h3>Body Art</h3>
                            <p>We are providing professional body art photoshoots. Our make-up body art design will make you feel like never before!</p>
                        </div>
                    </div>
                    <div class="service">
                        <div class="foto-two"></div>
                        <div class="service-text">
                            <h3>Portrait</h3>
                            <p>Portrait photoshoots can be interesting and attractive, agree? Of course there is a possibility for a regular portrait for your profile.</p>
                        </div>
                    </div>
                    <div class="service">
                        <div class="foto-three"></div>
                        <div class="service-text">
                            <h3>Different</h3>
                            <p>Let's do something you've never did before! Our imagination is unlimited if you don't say no! Say yes and let's start our journey!</p>
                        </div>
                    </div>
                </div>
            </section>
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.219602278381!2d25.33569661533429!3d54.72335198029061!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0xdd7887e198efd4c7!2sSaul%C4%97tekio%20al.%2015%2C%20Vilnius%2010221!5e0!3m2!1slt!2slt!4v1567523556744!5m2!1slt!2slt" width="100%" height="300"></iframe>
            </div>
        </main>
        <!-- Footer -->        
        <footer>
<?php print $footer->render(); ?>
        </footer>
        <!-- Script --> 
        <script defer src="media/js/app.js"></script>
    </body>
</html>
