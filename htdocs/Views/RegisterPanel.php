<?php
/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    RegisterPanel.php
 * Encoding:    UTF-8
 * Created:     2014-01-11
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */

$SESSFormName = 'RegisterForm';

$arrFormContERR = array(
//                        'PESEL' => '', 
                        'Imie' => 'Alabama', 
                        'Nazwisko' => 'Kućko', 
                        'Adres_Ulica' => 'OW1211',
                        'Adres_Kod' => '42-200',
                        'Adres_Miasto' => 'Czewa', 
                        'telefon_kom' => '122212212212', 
                        'email' => 'mail@mail.pl');

$arrFormCont = array(   'Imie2' => '', 
                        'Adres_Kraj' => '', 
                        'telefon_kom2' => '', 
                        'telefon_stacjonarny' => '',
                        'FAX' => '', 
                        'Data_urodzenia' => '');
$arrPlecOption = array('M','K');

//echo '<br> Leci foreach';
//DisplayArr($arrPlecOption);
//echo '<br>=================';
 

Form('Register', 'RegisterPanel_Mod.php', 'Formularz rejestracyjny', $SESSFormName, 'head');
CreateHiddenTextForm(array('ID_Osoba'=>''));
            echo'<tr>
                    <td><span id="red">*</span>PESEL: </td>
                    <td><input type="text" id="PESEL" maxlength="11" name="PESEL" ></input> </td>
                </tr>
                <tr>
                    <td colspan="2"><div id="errorPESEL" class="error"></div></td>
                </tr>';
CreateTextForm($arrFormContERR);
?>
<th>Poniższe dane są niewymagane</th>
<?php
CreateTextForm($arrFormCont, false);
CreateOptionForm('Plec', $arrPlecOption);
?>
<!--<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
</script>
        <tr>
            <td>Data urodzenia</td>
            <td ><input type="text" id="datepicker" name="data_czas" /><td>
        </tr>-->
<!--        <tr>
            <td>Select your favorite color: </td>
            <td><input type="color" name="favcolor"></td>
        </tr>-->
<!--        <tr>
          <td>E-mail: </td>
          <td><input type="email" name="e-mail2"></td>
        </tr>-->
<!--        <tr>
          <td>Quantity (between 1 and 5): </td>
          <td><input type="number" name="quantity" min="1" max="5"></td>
        </tr>-->
<!--        <tr>
          <td>range(between 1 and 10): </td>
          <td>0<input type="range" name="points" min="1" max="10">10</td>
        </tr>-->
<!--        <tr>
          <td>Select a time: </td>
          <td><input type="time" name="usr_time"></td>
        </tr>-->
<?php
//    echo "<br>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>".$_SESSION['upraw_user'];
    if (isset($_SESSION['upraw_user'])){
       if($_SESSION['upraw_user'] == 'admin'){
           CreateOptionForm('Klient/Pracownik', array('Pracownik', 'Klient'));
        }
    }

?>
        <tr>
            <td>To może RegDate!</td>
            <td ><input type="date" name="RegDate" value=" <?php echo date('Y-m-d, H:i:s'); ?>" readonly/><td>
        </tr>
<?php

Form('Register', 'RegisterPanel_Mod.php', 'Formularz rejestracyjny', $SESSFormName, 'foot');

if (isset($_SESSION[$SESSFormName.'RES'])){
    if($_SESSION[$SESSFormName.'RES']){
        echo '<p class="yellow"><b>Formularz skutecznie wysłany.</b></p>';
    }else{
        echo '<p class="red"><b>ERROR Nie udało się skutecznie wysłać formularza!!!</b></p>';
    }
}else{
    echo 'Formularz nie wysłany';
}

?>
