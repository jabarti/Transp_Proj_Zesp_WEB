<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Projekt Zespołowy Transport" content="Bartosz M. Lewiński" />
	<meta http-equiv="Creation-Date" content="Fri, 27 Dec 2013 23:29:28 GMT" />
        <link rel="shortcut icon" href="<?php echo HTTP_PICTURES_PATH.'favicon_no_euro.ico';?>" type="image/x-icon"/><!---->
<!--	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
	 <!--<script type='text/javascript' src="<?php echo HTTP_SCRIPTS_PATH.'jQuery v1.8.3.js';?>"></script>-->
         <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
         <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
         <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
         <script type="text/javascript" src="<?php echo HTTP_SCRIPTS_PATH.'whcookies.js';?>"></script><!---->
         <script type="text/javascript" src="<?php echo HTTP_SCRIPTS_PATH.'FunctionsJS.js';?>"></script><!---->
         <script type="text/javascript" src="<?php 
            if (!isset($_COOKIE['cookies_accepted'])){
                echo '2nd ONLOAD blocked!!';
            }
            switch ($Main_view_name){
                case 'register':
                    echo HTTP_SCRIPTS_PATH.'Valid_RegisterPanel.js';
                break;
                case 'MakeLogin':
                    echo HTTP_SCRIPTS_PATH.'Valid_MakeLoginPanel.js';
                break;            
                default:
                    echo HTTP_SCRIPTS_PATH.'Valid_ContactForm.js';
                break;
            }
        ?>"></script>

         <!--<script type="text/javascript" src="<?php echo HTTP_SCRIPTS_PATH.'Valid_ContactForm.js';?>"></script>-->
         <!--<script type="text/javascript" src="<?php echo HTTP_SCRIPTS_PATH.'Valid_RegisterPanel.js';?>"></script>-->
 
        <!--<meta http-equiv="Content-Language" content="PL" />-->
        
	<meta http-equiv="refresh" content="400"/>  <!-- Odświeżanie co 5 minut i 30sek = 330 -->
        
	<!--<link rel="Stylesheet" type="text/css" href="<?php echo HTTP_STYLES_PATH.'reset.css'?>" />-->
	<link rel="Stylesheet" type="text/css" href="<?php echo HTTP_STYLES_PATH.'style.css'?>" />
	<link rel="Stylesheet" type="text/css" href="<?php echo HTTP_STYLES_PATH.'guziki.css'?>" />
        
        <title><?php echo $title ?></title>
        <meta charset="utf-8">
        <?php
echo '//******************************<br>
Tymczasowo ustalone hasło na sztywno wpisywane do BD!!!!!! usunąć!!!!<br>
MakeLoginPanel.php line 56<br>
//******************************';
        ?>
    </head>
    <body>