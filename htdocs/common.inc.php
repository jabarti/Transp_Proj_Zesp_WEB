<?php
/*****************************************************
 * common.inc.php
 *
 * Includes all necessary files for the project.
 *
 * @author Bartosz Lewiński <jabarti@wp.pl>
 *
 *****************************************************/

ob_start();
session_start();

//echo session_id();

//echo '<div id="LogInfo" style="left: 5px; opacity:0,5;">';
//if (isset($_SESSION)){
////    echo '<br>linia: '.__LINE__.' $_SESSION[\'count\']: '.$_SESSION['count'].'<br>';
////    echo 'session set';
//        foreach ($_SESSION as $key => $value){
//                echo '<br>$_SESSION['.$key.'] => '. $value;
//        }
//echo '</div>';
////        echo '<br>';
//}
////else{
////    echo '<br>session WAS NOT set, I\'ve set it<br>';
//    //session_start();
//    $_SESSION['count'] = 1;
////    echo '<br>linia: '.__LINE__.' '.$_SESSION['count'].'<br>';
////}

if(!empty($_SERVER['HTTP_REFERER'])) 
		$ref = $_SERVER['HTTP_REFERER'];   	// PHP.NET: The address of the page (if any) which referred

//if (!defined('MAX_MAIL_BATCH')) {
//	define('MAX_MAIL_BATCH', 1); // Maximum number of emails to send while running the newsletter mailer job.
//}

require 'Paths.php';

//mysql_query('SET NAMES utf8')or die ('error');

mb_internal_encoding('UTF-8') or die ('error');
    
if (isset($_SESSION['user'])){
//    echo "<br>Jest Session USER";
    $expire=time()+60*6;			// 1.5min! - Odświarzanie musi być ustawione na dłuższy czas niż długość życia cookie!!!!!
    setcookie("user", $_SESSION['user'], $expire);
    
    if (isset($_COOKIE['user'])){
//    echo "<br><br>\$_COOKIE[\'user\']: ".$_COOKIE['user'];
//    echo '<br>date start: '.date('Y-M-D, H:M:s');
//    echo '<br>expire: '.$expire;
//    echo '<br>=====================================<br>';
    }
}

    require 'DB_Connection.php';
//    require_once HDD_STABLEVIEWS_PATH.'header.php';
//    require HDD_STABLEVIEWS_PATH.'buttons.php';
    require_once HDD_SCRIPT_PATH.'PHP_Functions.php';
    require_once HDD_SCRIPT_PATH.'PHP_FunctionsForm.php';
    require 'PagesInfo.php';
    require_once HDD_STABLEVIEWS_PATH.'header.php';
  
//    IncludeClassFile('Obiekt.class.php');
//    IncludeClassFile('Person.class.php');
    IncludeClassFile('Osoba.class.php');
    IncludeClassFile('Pracownik.class.php');
//    IncludeClassFile('Formularz.class.php');
    
if (!isset($_COOKIE['user'])){          // SKOŃCZYŁ SIE CZAS SESJI USERA
    unsetter();                         // really works?
    unset($_SESSION['uzytkID']);
    echo ('Sesja usera wygasła');
//    header('Location:'.HTTP_MODELS_PATH.'LoggOut_Mod.php');
    
//    echo $_SESSION['uzytkID'];
//    Logged();
}

echo '<div id="LogInfo" style="left: 5px; opacity:0,5;">';
if (isset($_SESSION)){
//    echo '<br>linia: '.__LINE__.' $_SESSION[\'count\']: '.$_SESSION['count'].'<br>';
//    echo 'session set';
        foreach ($_SESSION as $key => $value){
                echo '<br>$_SESSION['.$key.'] => '. $value;
        }
echo '</div>';
}

if(Logged()){
    echo '<div id="LogInfo">
            <h1>ZALOGOWANY</h1>
            <p class="red">User: <b>'.$_SESSION['user'].'</b></p>
            <p class="red">Rola: <b>'.$_SESSION['upraw_user'].'</b></p>
          </div>';
}else{
    echo '<div id="LogInfo"><h1>NIE ZALOGOWANY</h1></div>';
//    session_destroy();
}
        require HDD_STABLEVIEWS_PATH.'buttons.php';

//    echo "<br>END common.inc.php<br>=================================<br>";
?>
