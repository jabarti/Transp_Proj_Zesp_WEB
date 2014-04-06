<?php

/* * **************************************************
 * Project:     BartiLevi_WEB
 * Filename:    translacjon.php
 * Encoding:    UTF-8
 * Created:     2014-04-03
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
/* this funktion gets translation from table "localization" */
function t($text){
    
    $text_long='';
    $text_leng = 100;

    if(strlen($text)>$text_leng){
//        echo "<BR>Dł tekstu1: ". strlen($text);
        $text_long = $text;
        $text = substr($text, 0, $text_leng);
//        echo "<BR>Dł tekstu2: ". strlen($text);
//        echo'<br>';
    }
    
    $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'pl';
    $sql_sel = "SELECT * FROM `localization` WHERE `lang` ='".$lang."' AND `key` = '".$text."';";
    
    $temp = mysql_fetch_row(mysql_query($sql_sel));
    
    if (mysql_affected_rows()){             // if it's some result = 1, else 0;
        if ($temp[3] == ''){
//            echo $text;
            if(strlen($text_long) >= $text_leng){
                return $text_long;
            }else{
                return $text;
            }
        }else{
//            echo $temp[2];
            return $temp[3];
        }
    } else {

//        $file = preg_replace('/\.php$/', '', __FILE__);
        $file = $_SERVER['PHP_SELF'];
//        echo $file;
//        echo $text; 
//        return $text;
//        $text .= __FILE__;
        if(strlen($text_long)<300){
            $sql_ins = "INSERT INTO `localization`(`lang`, `key`, `file`) VALUES ('$lang','$text','$file')";
        } else {
            $sql_ins = "INSERT INTO `localization`(`lang`, `key`, `LongText`, `file`) VALUES ('$lang','$text','$text_long','$file')";
        }
        
        
        if(!mysql_query($sql_ins)){
            return "<br>ERROR in sql: ".strlen($sql_ins).$sql_ins;
        }else{
            return $text;
        }
    }
}

