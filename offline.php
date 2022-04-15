<?php
    header('HTTP/1.1 503 Service Temporarily Unavailable');
    header('Status: 503 Service Temporarily Unavailable');
    header('Retry-After: 3600');
    die('
    <head>
        <style>
            body {
                width:80%;
                margin:20px auto;
                text-align:center;
            }
        </style>
    </head>

    <body>
        <div style="border:1px solid #ccc;">
        <h2>Maintenance Mode</h2>
		<img src="maintenance.png" alt="Website is in maintenance mode."/>
        <p>We\'re sorry, our website is currently undergoing maintenance.  We\'ll be back online soon, so please try again later.<br />
        If you need assistance in the meantime, please call or text us at: <a style="margin-left:auto; margin-right: auto;" href="tel:+11234567890">(123) 456-7890</a>. or <a href="">[ Click here ]</a> to send us a message</p>
        <p>For the  Client Portal or to place Service Orders please visit: <a href="https://portal.example.com/">https://portal.example.com/</a></p>
        <p>Thank you for visiting.</p>
        <br />
        </div>
    </body
    ');

?>