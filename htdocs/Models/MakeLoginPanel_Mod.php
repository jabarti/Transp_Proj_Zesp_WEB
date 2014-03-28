<?php

/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    MakeLoginPanel_Mod.php
 * Encoding:    UTF-8
 * Created:     2014-01-14
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once "../common.inc.php";

echo '<br>============== $_SESSION ============================<br>';
DisplayArr($_SESSION);
echo '<br>================$$POST==========================<br>';
DisplayArr($_POST);
$login = $_POST['uzytkownik'];
$upraw = $_POST['upraw'];
if($upraw){
    echo '<br>'.$upraw;
}

if(isset($_SESSION['newID'])){
    $ID_Osoba = $_SESSION['newID'];
} else {
    $SQL = sprintf('SELECT `ID_Osoba` FROM `Login` WHERE `login` = "'.$login.'";');
    echo '<br>SQL:'.$SQL;
    $ID_Osoba = mysql_result(mysql_query($SQL), 0);
}
echo '<br>sha(haslo) =  ff12bbd8c907af067070211d87bdf098be17375b';
echo '<br>==========================================<br>';
echo '<br>haslo1: '.$_POST['haslo1'].', sha1(haslo1): '.sha1($_POST['haslo1']);
$passOLD = sha1($_POST['haslo1']);
echo '<br>haslo2: '.$_POST['haslo2'].', sha1(haslo2): '.sha1($_POST['haslo2']);
$passNEW = sha1($_POST['haslo2']);


//echo '<br>'.$_SESSION['user'];
//if ($_SESSION['user'] == 'Bartosz Lewiński'){
//    echo '<br>$_SESSION[user] == Bartosz Lewiński = true';
//}else{
//    echo '<br>$_SESSION[user] == Bartosz Lewiński = false';
//}
if (isset($_SESSION['userLogin'])){
    $SQL = sprintf('SELECT `Password` FROM `Login` WHERE `login` = "'.$_SESSION['userLogin'].'";');

    echo '<br>SQL: '.$SQL;
    $passDB = mysql_result(mysql_query($SQL), 0);
    echo '<br>$passDB): '.$passDB;
} else {
    $passDB = 0;
    echo '<br>sztuczne $passDB): '.$passDB;
}

echo '<br>$passOLD: '.$passOLD;
echo '<br>$passNEW: '.$passNEW;

if (isset($_SESSION['RegOsCase'])){
    switch($_SESSION['RegOsCase']){
        
        case 1:   // ZMIANA HASŁA
            echo '<BR>========================<BR>CASE'.$_SESSION["RegOsCase"].' ZMIANA HASŁA<BR>========================<BR>';
                
                echo '<br>//******************************<br>
                Tymczasowo ustalone hasło na sztywno wpisywane do BD!!!!!! usunąć!!!!<br>//******************************';
                // PONIŻSZE USUNĄĆ (Wystarczy zakomentować)!!!!!!!!!!!!!!!!!!!!!!!!!!!
                $passNEW = sha1('haslo');
            
                echo '<br>TO ZMIENIAM hasło z BD (Update)!';
                $SQL = sprintf('UPDATE `Login` SET `Password`="'.$passNEW.'" WHERE `login` = "'.$login.'";');
                echo '<br>SQL:'.$SQL;
                mysql_query($SQL) or die('<br>===============<br>NIE udało sie ZMIENIĆ hasła<br>===============<br>');
                $_SESSION['title'] = 'Przelogowanie | Re-Loggin';
                ECHO "<br>POWINIEN IŚĆ SIE PRZELOGOWAC";
//                header("Location: ".HTTP_HTDOCS.'index.php?Main_view_name=login');
            echo '<br>===============================================================<br>';
            break;
        
        case 2:
            echo '<BR>========================<BR>CASE'.$_SESSION["RegOsCase"].'<BR>========================<BR>';
            echo '<br>===============================================================<br>';
            break;
        
        case 3:  // NOWY PRACOWNIK by ADMIN, NOWE HASLO, czyli hasło będzie 12345
            echo '<BR>========================<BR>CASE'.$_SESSION["RegOsCase"].' NOWY KLIENT by ADMIN<BR>========================<BR>';
                        // $passOLD jest równe fikcyjnemu haslu z MakeLoginPanel.php i != $passNEW
            echo $passOLD;
            if ($passOLD == sha1('123456789WqX%')) echo 'OK';
            echo '<br>'.$passNEW;
            if ($passNEW != sha1('12345')) echo 'OK';
            
            if ($passOLD == sha1('123456789WqX%') && $passNEW == sha1('12345')){
                
                echo '<br>//******************************<br>
                Tymczasowo ustalone hasło na sztywno wpisywane do BD!!!!!! usunąć!!!!<br>//******************************';
                // PONIŻSZE USUNĄĆ (Wystarczy zakomentować)!!!!!!!!!!!!!!!!!!!!!!!!!!!
                $passNEW = sha1('haslo');                
                
                
                echo '<br>1TO TWORZE NOWE HASŁO!!!!! hasło!';
                $SQL = sprintf('INSERT INTO `Login`(`ID_Osoba`, `login`, `Password`, `Uprawnienie`, `lastLogin`) 
                        VALUES ("'.$ID_Osoba.'", "'.$login.'", "'.$passNEW.'", "'.$upraw.'", "'.time().'");');
                echo '<br>SQL:'.$SQL;
//                mysql_query($SQL) or die('<br>===============<br>1NIE udało sie UTWORZYĆ hasła<br>===============<br>');
                try{
                    mysql_query($SQL);
                } catch (Exception $ex) {
                    echo "<br>|1ERROR: ".$ex;
                }
                // Ponieważ to klient zapiszmy go jako klienta //
                $SQL = sprintf('SELECT `ID_Klient` FROM `klient` WHERE `osoba_ID_Osoba` = '.$ID_Osoba.';');
                if (mysql_result(mysql_query($SQL),0)){
                    echo '<br>JEST JUŻ TAKI KLIENT!!!';
                }else{
                    echo '<br>NIE MA TAKIego KLIENTa, zapisuje!!!';
                    $SQL = sprintf('INSERT INTO `klient`(`osoba_ID_Osoba`) VALUES ("'.$ID_Osoba.'");');
                    echo '<br>SQL: '.$SQL;
                    mysql_query($SQL) or die ('<br>===============<br>NIE udało sie UTWORZYĆ Klienta why???<br>===============<br>');
                }
            }else{
                echo '<br>COŚ NIE TAK!!!';
            }
            $_SESSION['title'] = 'Przelogowanie | Re-Loggin';
            ECHO "<br>POWINIEN IŚĆ SIE PRZELOGOWAC";
//            header("Location: ".HTTP_HTDOCS.'index.php?Main_view_name=login');  // DZIAŁA!!!!
            
            echo '<br>===============================================================<br>';
            break;
        
        case 4:  // NOWY PRACOWNIK
            echo '<BR>========================<BR>CASE'.$_SESSION["RegOsCase"].' NOWY PRACOWNIK<BR>========================<BR>';
            // stare hasło default (nowy) i nowe hasło default (nowy) - czyli admin!!!!        
            if ($passOLD == sha1('123456789WqX%') && $passNEW == sha1('12345')){
                
                echo '<br> jeden';
                
                echo '<br>//******************************<br>
                Tymczasowo ustalone hasło na sztywno wpisywane do BD!!!!!! usunąć!!!!<br>//******************************';
                // PONIŻSZE USUNĄĆ (Wystarczy zakomentować)!!!!!!!!!!!!!!!!!!!!!!!!!!!
                $passNEW = sha1('haslo'); 
                
                echo '<br>2TO TWORZE NOWE HASŁO!!!!! hasło!';
                $SQL = sprintf('INSERT INTO `Login`(`ID_Osoba`, `login`, `Password`, `Uprawnienie`, `lastLogin`) 
                    VALUES ("'.$ID_Osoba.'", "'.$login.'", "'.$passNEW.'", "'.$upraw.'", "'.time().'");');
                echo '<br>SQL:'.$SQL;
                
                if(mysql_query($SQL)){
                    echo "<br>>>>>>>>>>>>>>>>>>>>".__LINE__.' 2 UDAŁO się UTWORZYĆ hasło';
                }else{
                    echo "<br>>>>>>>>>>>>>>>>>>>>".__LINE__.' 2NIE udało sie UTWORZYĆ hasła';
                }
                
//                mysql_query($SQL) or die('<br>===============<br>2NIE udało sie UTWORZYĆ hasła<br>===============<br>'); 

                
//                $_SESSION['title'] = 'Przelogowanie | Re-Loggin';
                ECHO "<br>NIE POWINIEN IŚĆ SIE PRZELOGOWAC, utworzył pracownika i super / <br> POWINIEN WYSŁAĆ MAILA!!!!";
                header("Location: ".HTTP_HTDOCS.'index.php');
                
            }else{
                echo '<br> dwa';
            }
            
            echo '<br>===============================================================<br>';
            break;
            
        case 5:  // NOWY KLIENT NOWE HASŁO ale sam - więc hasło != 12345
            echo '<BR>========================<BR>CASE'.$_SESSION["RegOsCase"].' NOWY KLI 1 LOG - SAM<BR>========================<BR>';
            //===========================================
            // $passOLD jest równe fikcyjnemu haslu z MakeLoginPanel.php i != $passNEW
            echo $passOLD;
            if ($passOLD == sha1('123456789WqX%')) echo 'OK';
            echo '<br>'.$passNEW;
            if ($passNEW == sha1('12345')) echo 'OK';
            
            if ($passOLD == sha1('123456789WqX%') && $passNEW != sha1('12345')){
                
                echo '<br>//******************************<br>
                Tymczasowo ustalone hasło na sztywno wpisywane do BD!!!!!! usunąć!!!!<br>//******************************';
                // PONIŻSZE USUNĄĆ (Wystarczy zakomentować)!!!!!!!!!!!!!!!!!!!!!!!!!!!
                $passNEW = sha1('haslo');                
                
                
                echo '<br>3TO TWORZE NOWE HASŁO!!!!! hasło!';
                $SQL = sprintf('INSERT INTO `Login`(`ID_Osoba`, `login`, `Password`, `Uprawnienie`, `lastLogin`) 
                        VALUES ("'.$ID_Osoba.'", "'.$login.'", "'.$passNEW.'", "'.$upraw.'", "'.time().'");');
                echo '<br>SQL:'.$SQL;
                mysql_query($SQL) or die('<br>===============<br>3NIE udało sie UTWORZYĆ hasła<br>===============<br>');
    
                // Ponieważ to klient zapiszmy go jako klienta //
                $SQL = sprintf('SELECT `ID_Klient` FROM `klient` WHERE `osoba_ID_Osoba` = '.$ID_Osoba.';');
                if (mysql_result(mysql_query($SQL),0)){
                    echo '<br>JEST JUŻ TAKI KLIENT!!!';
                }else{
                    echo '<br>NIE MA TAKIego KLIENTa, zapisuje!!!';
                    $SQL = sprintf('INSERT INTO `klient`(`osoba_ID_Osoba`) VALUES ("'.$ID_Osoba.'");');
                    mysql_query($SQL) or die ('<br>===============<br>NIE udało sie UTWORZYĆ Klienta why???<br>===============<br>');
                }
            }else{
                echo '<br>COŚ NIE TAK!!!';
            }
            $_SESSION['title'] = 'Przelogowanie | Re-Loggin';
            ECHO "<br>POWINIEN IŚĆ SIE PRZELOGOWAC";
//            header("Location: ".HTTP_HTDOCS.'index.php?Main_view_name=login');  // DZIAŁA!!!!

            //===========================================
            echo '<br>===============================================================<br>';
            break;
            
        case 6:
            echo '<BR>========================<BR>CASE'.$_SESSION["RegOsCase"].'<BR>========================<BR>';
            echo '<br>===============================================================<br>';
            break;
        
        default:
            echo '<BR>========================<BR>CASE default<BR>========================<BR>';
            echo '<br>===============================================================<br>';
            break;
    }
}

?>
