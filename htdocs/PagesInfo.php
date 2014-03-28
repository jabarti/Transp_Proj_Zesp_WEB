<?php

/**
 * Filename: PagesInfo.php
 * 
 * Created: 2014-01-09
 *
 * @author Bartosz M. Lewiński <jabarti@wp.pl>
 */
    
//$BASE_FILE = $_SERVER['SCRIPT_NAME'];	// $PLIK ZAPAMIĘTUJE ŚCIEŻKĘ    
if (!isset($_GET['Main_view_name'])){
//        $Main_view_name = 'index.php';
        $Main_view_name = 'index';
}else{
//        $view_name = sha1($_GET['view_name']);   // It doesn't encode it!!!
        $Main_view_name = $_GET['Main_view_name'];
//        echo '<br>$_GET["Main_view_name"]: '.$_GET['Main_view_name'];
}

switch ($Main_view_name){
        case 'main':
            $title = 'Main | Główna';
        break;
    
        case 'login':
            $title = 'Login | Logowanie';
        break;
    
        case 'register':
            $title = 'Register | Rejestracja';
        break;    
    
        case 'MakeLogin':
            $title = 'Login/Hasło | Login/Password';
        break; 
    
        case 'regPrac': 
            $title = 'Rejestracja Pracownika | Worker Registration';
        break;     
    
        default:
            $title = 'Main | Główna || Default';
        break; 
    }
?>
