<?php
/* * *********************************************
 * Filename:    LogInPanel.php
 * 
 * Created:     2014-01-11
 *
 * @author      Bartosz M. Lewiński <jabarti@wp.pl>
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 * ********************************************* */

//require_once "common.inc.php";
//require VIEWS_PATH.DIRECTORY_SEPARATOR.'header.php';$sql = "SELECT `login` FROM `login` LIMIT 0, 30 ";

$SQL = sprintf ('SELECT `login` FROM `Login`;');
$licz = mysql_num_rows(mysql_query($SQL));
for($i = 0; $i<$licz; $i++){
//    echo '<br>'.mysql_result(mysql_query($SQL),$i);
    $arr[$i] = mysql_result(mysql_query($SQL),$i);
}
if (!isset($_SESSION['wrongLogg']) ){
    $_SESSION['wrongLogg']=0;
}
//echo "_SESSION['wrongLogg']: ".$_SESSION['wrongLogg'];
//if (isset($_COOKIE['przerwa'])) echo "COOKIE['przerwa'] is SET";
//
//if ($_SESSION['wrongLogg'] < 3 && !isset($_COOKIE['przerwa'])){
//    echo '<br>TRUE';
//}else{
//    echo '<br>FALSE';
//}

if ($_SESSION['wrongLogg'] < 3 && !isset($_COOKIE['przerwa'])){
?>

<h4 style="text-align: center">Proszę się zalogować<br>Dalsza praca tylko dla zalogowanych użytkowników
    <br>To jest <?php echo $_SESSION['wrongLogg'] ?> próba logowania, pozostało <span class="red" style="color:red;"><?php echo 3-$_SESSION['wrongLogg'] ?> 
    </span>
</h4>
<?php 
//echo '<br>linia: '.__LINE__.' '.$BASE_FILE;

//$_SESSION['title'] = 'Logowanie';

//echo '<br>'.$_SESSION['count'].'<br>';
?>   
<form action='<?php echo HTTP_MODELS_PATH."LogInPanel_Mod.php"; ?>' method="POST">       
    <table>
        <tr>
            <td>Użytkownik/Login:</td>
            <!--td><input type="text" name="uzytkownik"></td--> <!-- To MA BYć w wersji WORK!!!!!!!!!!!!!!!!!!!!!!!!! -->
            <td><select name="uzytkownik" >	 <!-- To jest absolutnie niepoprawne i ma by� USUNIETE!!!! -->
<?php
            foreach($arr as $k => $v){
                ?>
                    <option><?php echo $v ?></option>
                <?php
            }
?>
            </select></td>
	</tr>
	<tr>
            <td>Hasło:</td>
            <!--  Remove 'haslo" in Workable!!!!-->
            <td><input type="password" name="pass" value="haslo"></td>
            <!--</td> <WORKABLE>-->
            <!--<td><input type="password" name="pass" value="*****"></td>-->
	</tr>
        <tr>
            <!--<td>To może być last login!</td>-->
            <td colspan="2"><input type="hidden" name="lastLogin" value=" <?php echo date('Y-m-d, H:i:s'); ?>" readonly/><td>
        </tr>
    </table>
    <input type="submit" value="Zaloguj"/>
</form>
<?php                // SIMPLE 1
} else { 
    echo '<p style ="color:yellow"><b>Musisz poczekać 10sek na kolejne logowanie</b></p?';
    unset($_SESSION['wrongLogg']);
}

