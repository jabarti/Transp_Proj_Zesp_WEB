<?php
/* * **************************************************
 * Project:     BartiLevi_WEB
 * Filename:    translation_panel_mod.php
 * Encoding:    UTF-8
 * Created:     2014-04-03
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once "../common.inc.php";
include '../DB_Connection.php';
$title = 'BartiLevi | translation_panel_mod';
//include '../header.php';
//include '../flag.php';
//include '../buttons.php';

if(isset($_GET['tlum'])){
    echo '<br>$_GET[lang]:'.$_GET['lang'];
    echo '<br>$_GET[key]:'.$_GET['key'];
    echo '<br>$_GET[translation]:'.$_GET['translation'];
    
//    if($_GET['translation'] == ''){
//        header("Location: ../translation_panel.php");
//    }else{
        $sql = "UPDATE `localization` SET `translation`='".$_GET['translation']."'"
              ."WHERE `key`='".$_GET['key']."' AND `lang`='".$_GET['lang']."';";
        echo "<br>SQL = ".$sql;
        
        if(mysql_query($sql)){
            header("Location: ../translation_interface.php");
        }else{
            echo "<br>ERROR in sql";
        }
//    }
}

if(isset($_GET[del])){
        
//    if($_GET['translation'] == ''){
//        header("Location: ../translation_panel.php");
//    }else{
        $sql = "DELETE FROM `localization`"
              ."WHERE `key`='".$_GET['key']."' AND `lang`='".$_GET['lang']."';";
        echo "<br>SQL = ".$sql;
        
        if(mysql_query($sql)){
            header("Location: ../translation_interface.php");
        }else{
            echo "<br>ERROR in sql";
        }
//    }
}
