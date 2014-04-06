<?php

/**
 * Filename: PagesInfo.php
 * 
 * Created: 2014-01-09
 *
 * @author Bartosz M. Lewiński <jabarti@wp.pl>
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
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
            $title = t("Strona Główna");
        break;
    
        case 'login':
            $title = t('Logowanie');
        break;
    
        case 'register':
            $title = t('Rejestracja');
        break;    
    
        case 'MakeLogin':
            $title = t('Login/Hasło');// | Login/Password';
        break; 
    
        case 'regPrac': 
            $title = t('Rejestracja Pracownika');// | Worker Registration';
        break;     
    
        default:
            $title = t("Strona Główna");
//            $title = t("Główna strona Proj Zesp");
        break; 
    }
?>
