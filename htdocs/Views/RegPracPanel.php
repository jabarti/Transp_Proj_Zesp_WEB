<?php

/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    RegPracPanel.php
 * Encoding:    UTF-8
 * Created:     2014-01-17
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 * ************************************************* */
//require_once "../common.inc.php";

echo 'jestem w RegPracPanel.php'; 

if (isset($_SESSION)){
    DisplayArr($_SESSION);
}  
    
$id_os = $_SESSION['newID'];


$SESSFormName = 'RegPracForm';

$arrFormContERR = array('Pensja_brutto' => '', 
                        'data_zatrudnienia' => '');

$arrFormCont = array(   'data_zwolnienia' => '', 
                        'tel_sluzb' => '', 
                        'mail_sluzb' => '');
$arrStanOption = array('Admin','Manager', 'Spedytor', 'Kierowca');
 

Form('RegisterPrac', 'RegPracPanel_Mod.php', 'Formularz rejestracyjny', $SESSFormName, 'head');
CreateHiddenTextForm(array('ID_Pracownik'=>''));
CreateOptionForm('Stanowisko', $arrStanOption);
CreateTextForm($arrFormContERR);
?>
<th>Poniższe dane są niewymagane</th>
<?php
CreateTextForm($arrFormCont, false);
CreateHiddenTextForm(array('osoba_ID_Osoba'=>$id_os));
Form('RegisterPrac', 'RegPracPanel_Mod.php', 'Formularz rejestracyjny', $SESSFormName, 'foot');

if (isset($_SESSION[$SESSFormName.'RES'])){
    if($_SESSION[$SESSFormName.'RES']){
        echo '<p class="yellow"><b>Formularz skutecznie wysłany.</b></p>';
    }else{
        echo '<p class="red"><b>ERROR Nie udało się skutecznie wysłać formularza!!!</b></p>';
    }
}else{
    echo 'Formularz nie wysłany';
}


//$Prac = new Pracownik($OsForm);
?>
