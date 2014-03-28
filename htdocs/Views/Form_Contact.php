<?php
/***********************************************
 * Filename: Form_Contact.php
 * 
 * Created:  2014-01-09
 *
 * @author   Bartosz M. Lewiński <jabarti@wp.pl>
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 ***********************************************/
$SESSFormName = 'ContactForm';
Form('Contact', 'Form_Contact_Mod.php', 'Formularz zgłoszeniowy', 'ContactForm', 'head');
CreateTextForm($arrFormContUR, false, true);
CreateTextForm($arrFormCont);
CreateHiddenTextForm($arrFormContHidd);
CreateTextareaForm($arrFormContTArea, 25, 5);
?>
        <tr>
            <!--<td>To może regDate!</td>-->
            <td colspan="2"><input type="hidden" name="regData" value=" <?php echo date('Y-m-d, H:i:s'); ?>" readonly/><td>
        </tr>
<?php
Form('Contact', 'Form_Contact_Mod.php', 'Formularz zgłoszeniowy', $SESSFormName, 'foot');
if (isset($_SESSION[$SESSFormName.'RES'])){
    if($_SESSION[$SESSFormName.'RES']){
        echo '<p class="yellow"><b>Formularz skutecznie wysłany.</b></p>';
    }else{
        echo '<p class="red"><b>ERROR Nie udało się skutecznie wysłać formularza!!!</b></p>';
    }
    unset($_SESSION[$SESSFormName.'RES']);
}else{
    echo 'Formularz nie wysłany';
}
?>        
