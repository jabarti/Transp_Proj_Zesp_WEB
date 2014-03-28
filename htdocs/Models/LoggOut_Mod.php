<?php
/**
 * Filename: LoggOut_Mod.php
 * 
 * Created: 2014-01-08
 *
 * @author Bartosz M. Lewiński <jabarti@wp.pl>
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 */

require_once "../common.inc.php";

//    if (isset($_SESSION) || isset($_COOKIES)){
//    echo '<br>================SPRAWDZAM SESSIE I COOKIES=======================<br>';
    foreach ($_SESSION as $key => $value){
            echo '<br>$_SESSION['.$key.'] = '.$value;
            unset($_SESSION['.$key.']);
            echo '<br>$_SESSION['.$key.'] = '.$value;
        }
//        
////    foreach ($_COOKIES as $key => $value){
////            echo '<br>$key: '.$key.' = '.$value;
////        }
//    echo '<br>=================================================================<br>';
//    }
//        setcookie("user", null, -1, '/') or die ('sth wrong with unsetting cookie');
        setcookie("user", '', time()-42000, '/') or die ('sth wrong with unsetting cookie');
        // Inicjalizuj sesję
        // Jeśli używasz sesion_name("cośtam"), nie zapomnij o tym teraz!
        session_start();
        // Usuń wszystkie zmienne sesyjne
        $_SESSION = array();

        // Jeśli pożądane jest zabicie sesji, usuń także ciasteczko sesyjne.
        // Uwaga: to usunie sesję, nie tylko dane sesji
        if (isset($_COOKIE[session_name()])) { 
                setcookie(session_name(), '', time()-42000, '/'); 
        }

        // Na koniec zniszcz sesję

	session_destroy() or die ('Nie moge zamknąć sesji');
	echo "<br>Zostales wylogowany";
        unsetter();
        echo '<br>$_COOKIE[\'user\']'.$_COOKIE['user'];
        
        $_COOKIE['user'] = '';
        echo '<br>$_COOKIE[\'user\']'.$_COOKIE['user'];
//        setcookie("user", 'HASH', 2, '/') or die ('sth wrong with unsetting cookie');
        foreach ($_SESSION as $key => $value){
            echo '<br>$_SESSION['.$key.'] = '.$value;
            unset($_SESSION['.$key.']);
            echo '<br>$_SESSION['.$key.'] = '.$value;
        }
        
//	header("Location: ../Index.php");
	header("Location: ".ROOT.HTTP_HTDOCS.'index.php');
        echo "<br>Jest OK";
?>
