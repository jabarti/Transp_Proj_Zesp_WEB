<?php
/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    RegisterPanel_Mod.php
 * Encoding:    UTF-8
 * Created:     2014-01-11
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 * ************************************************* */
require_once "../common.inc.php";
$whereGo = '';
//echo "<br>whereGo: ".$whereGo;
//if (isset($_POST['RegisterForm'])){
if (isset($_POST['RegisterForm'])){
    DisplayArr($_POST);
    
        if($_POST['RegisterForm']=='Wyślij'){
            echo('<br>'.$_POST['RegisterForm']);
            unset($_POST['RegisterForm']);
        }
        echo '<br>HERE:'.__LINE__.'<br>';
        if(isset($_POST['Klient/Pracownik']))
            $whereGo = $_POST['Klient/Pracownik'];
            unset($_POST['Klient/Pracownik']);
        echo '<br>HERE:'.__LINE__.'<br>';    
     $tab = $_POST;
     

//echo "<br>".__LINE__."to nie wchodzi klasa ooba!!!<br>";
try{
     $Gosc = new Osoba($tab);
     $ID = $Gosc->getId();
     $_SESSION['newID'] = $ID;
}catch(Exception $err){
    echo $err;
}
//     ?>
     <script>
        alert ('Zarejestrowana Osoba');
     </script>
     //<?php
}
     echo '<br>===============================================$whereGo: '.$whereGo;
 echo '<br>HERE:'.__LINE__.'<br>';    
switch ($whereGo){
    case 'Pracownik':
        echo '<br>Go to PRACOWNIK';
//          header("Location: ".HTTP_VIEWS_PATH.'RegPracPanel.php');
            header("Location: ".HTTP_HTDOCS.'index.php?Main_view_name=regPrac');
        break;
    
    case 'Klient':
        echo '<br>Go to MAKE LOGIN PANEL for klient';
            $_SESSION['upraw'] = 'Klient';
//          header("Location: ".HTTP_VIEWS_PATH.'RegKlienPanel.php');
            header("Location: ".HTTP_HTDOCS.'index.php?Main_view_name=MakeLogin&isFirstLog=1');
        break;
    
    default: 
            echo '<br>Go to MAKE LOGIN PANEL';
            header("Location: ".HTTP_HTDOCS.'index.php?Main_view_name=MakeLogin&isFirstLog=1');
        break;
}

?>
