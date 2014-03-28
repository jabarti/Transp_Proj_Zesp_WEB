<?php
/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    Form_Contact_Mod.php
 * Encoding:    UTF-8
 * Created:     2014-01-10
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 * ************************************************* */
require_once "../common.inc.php";

//foreach ($_POST as $k){
//    $_SESSION[$k]=$_POST[$k];
//}


if(InsertInto('Formularz', 'ContactForm')){
    $_SESSION['ContactFormRES']=true;
}else{
    $_SESSION['ContactFormRES']=false;
}

//    $Form = new Formularz();

//$_SESSION['arrContForm'] = $arrContForm;

//echo '<br>=====<br>var_dump($_SESSION):';
//var_dump($_SESSION);                // use it to send data!!!!!
//echo '<br>=====<br>var_dump($arrContForm):';
//var_dump($arrContForm);             // use it to work here!!!!!
//echo '<br>=====<br>session?($arrContForm):';
//var_dump($_SESSION['arrContForm']);  // use it to work and send ir somewhere!!!!!
header("Location: ".HTTP_HTDOCS.'index.php');
?>
