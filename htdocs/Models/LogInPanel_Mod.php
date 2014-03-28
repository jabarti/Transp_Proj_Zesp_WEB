<?php
/* * *********************************************
 * Filename:    LogInPanel_Mod.php
 * 
 * Created:     2014-01-11
 *
 * @author      Bartosz M. Lewiński <jabarti@wp.pl>
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 * ********************************************* */

require_once "../common.inc.php";

$_SESSION['title'] = 'Main | Główna';

if(isset($_POST['uzytkownik'])&& isset($_POST['pass'])){
//    echo 'linia: '.__LINE__.' '.'Krok0: OK<br>';
    $uzy = $_POST['uzytkownik'];
//    echo 'linia: '.__LINE__.' '.$uzy;
	$has = $_POST['pass'];
	$hah = sha1($has);
	//echo $hah."<br>";
	if(!empty($uzy)&&!empty($has)){
//		echo '<br>linia: '.__LINE__.' '.'Krok1: OK<br>';
/*SQL 01*/      $SQL_Log_001 = sprintf("SELECT `ID_Osoba` FROM `Login` WHERE `login` ='".mysql_real_escape_string($uzy)."'AND `Password`='".mysql_real_escape_string($hah)."'");

		echo '<br>linia: '.__LINE__.' '.'Krok2: OK<br>'.$SQL_Log_001."<br>";
		echo '<br>linia: '.__LINE__.' '."Polaczony z baza: ".$dbname;
                echo "<br>".$DBConn;
                $mq_Log_001 = mysql_query($SQL_Log_001,$DBConn) or die ('<br>linia: '.__LINE__.'<br>sorry zły sql') or die(mysql_error());
                                                     
                if($mq_Log_001){
//                    echo '<br>__FILE__: '.__FILE__.' | linia: '.__LINE__.' '.'Krok3: OK<br>';
                    echo '<br>linia: '.__LINE__.' '."mysql_query: ".$mq_Log_001;
                    echo '<br>linia: '.__LINE__.' '."\$mq_Log_001= ".$mq_Log_001."<br>";

                    $mnr_Log_001 = mysql_num_rows($mq_Log_001);
                    if($mnr_Log_001 == 0){	
//			echo '<br>linia: '.__LINE__.' '.'Krok4: NO!!<br>';
//			echo '<br>linia: '.__LINE__.' '."Zła nazwa użytkownika lub hasło!";
//                        echo '$_COOKIE[\'user\']: '.$_COOKIE['user'];
                        unset($_COOKIE['user']);
                        
//                        session_destroy();
                        
//                        echo '$_COOKIE[\'user\']: '.$_COOKIE['user'];
                        unset($_GET['Main_view_name']);
                        $_SESSION['wrongLogg']++;
                        if ($_SESSION['wrongLogg'] >=3) setcookie('przerwa','Y',time()+60);
                        header('Location: '.$ref);   	// - wróci do strony z której było logowanie.
                    }
                    else if($mnr_Log_001 == 1){
//                        echo '<br>linia: '.__LINE__.' '.'Krok4: OK<br>';
//			echo '<br>linia: '.__LINE__.' '.'Sukces<br>';
			//=================  POBIERA UPRAWNIENIA =====================''
/*SQL 02*/		$SQL_Log_002 = sprintf("SELECT `Uprawnienie` FROM `Login` WHERE `ID_Osoba` = '".mysql_result($mq_Log_001, 0, 0)."'");

                        echo 'linia: '.__LINE__.' '.$SQL_Log_002."<br>";
                        $mq_Log_002 = mysql_query($SQL_Log_002, $DBConn) or die('<br>linia: '.__LINE__.' Wykonanie zapytania nie powiodło się : ' . mysql_error());
                        $mr_Log_002 = mysql_result($mq_Log_002, 0, 0);
                        $_SESSION['upraw_user'] = $mr_Log_002;
                        echo $_SESSION['upraw_user'];
//// czy to SQL 3 w ogóle potrzebne???
///*SQL 03*/		$SQL_Log_003 = sprintf("SELECT CONCAT(`imie`,' ', `nazwisko`) FROM `osoba` os join `pracownik` pr ON (os.`ID_Osoba` = pr.`osoba_ID_Osoba`)
//						WHERE `ID_Osoba` = '".mysql_result($mq_Log_001, 0, 0)."'");
//
//                        echo '<br>linia: '.__LINE__.$SQL_Log_003."<br>";
//                        $mq_Log_003 = mysql_query($SQL_Log_003, $DBConn) or die('<br>linia: '.__LINE__.' Wykonanie zapytania nie powiodło się : ' . mysql_error());
//                        $mr_Log_003 = mysql_result($mq_Log_003, 0, 0);
//                        $_SESSION['user'] = $mr_Log_003;
//                        echo '<br>Session user: '.$_SESSION['user']."<br>";
//                        
                        //================= to bedzie klucz sesji!!
                        $uzytk = mysql_result($mq_Log_001, 0, 0);
                        $_SESSION['uzytkID'] = $uzytk;
                        echo '<br>SESION uzytk: '.$_SESSION['uzytkID'];
                        
                                                   
/*SQL 04*/		$SQL_Log_004 = sprintf("SELECT * FROM `osoba` WHERE `ID_Osoba` = '".mysql_result($mq_Log_001, 0, 0)."'");
                        echo '<br>linia: '.__LINE__.$SQL_Log_004."<br>";
                        $mq_Log_004 = mysql_query($SQL_Log_004, $DBConn) or die('<br>linia: '.__LINE__.' Wykonanie zapytania nie powiodło się : ' . mysql_error());
                        $mfr_Log_004 = mysql_fetch_array($mq_Log_004);
                        
//                        var_dump($mfr_Log_004);
                        
                        foreach ($mfr_Log_004 as $key => $val){
//                            echo '<br>KEY: '.$key.'   VAL='.$val;
                        }
//                        Pomocnicze info!! Do Formularza!!
                        
                         $_SESSION['imie'] = $mfr_Log_004['Imie'];
                         $_SESSION['nazwisko'] = $mfr_Log_004['Nazwisko'];
                         $_SESSION['email'] = $mfr_Log_004['email'];
                         $_SESSION['phone'] = $mfr_Log_004['telefon_kom'];
                         $_SESSION['userLogin'] = $_POST['uzytkownik'];
                         
                        //================= to bedzie Imie i Nazwisko usera
                         $_SESSION['user'] = $mfr_Log_004['Imie'].' '.$mfr_Log_004['Nazwisko'];
                         echo '<br>SESION user'.$_SESSION['user'];
                         
                          
                        echo '<br>linia: '.__LINE__."\$uzytk: ".$uzytk;
                        echo '<br>linia: '.__LINE__."\$_SESSION\[\'uzytkID\'\]: ".$_SESSION['uzytkID'];
                        echo '<br>linia: '.__LINE__."\$_SESSION\[\'user'\]: ".$_SESSION['user'];
                        echo '<br>linia: '.__LINE__.$ref;
                        
/*SQL 05*/              $SQL_Log_005 = sprintf('UPDATE `Login` SET `lastLogin`= "'.$_POST['lastLogin'].'" WHERE `ID_Osoba` = '.$_SESSION["uzytkID"].';');
                        echo '<br>$SQL_Log_005: '.$SQL_Log_005;
                        mysql_query($SQL_Log_005);
                        unset($_GET['Main_view_name']);
                        unset($_SESSION['wrongLogg']);
                        header('Location: '.$ref.'?Main_view_name=main');   	// - wróci do strony z której było logowanie.
                    }
		}
		else{
                    echo '<br>linia: '.__LINE__.' '.'Krok3: NO!<br>';
		}		
	}
	else{
            echo '<br>linia: '.__LINE__.' '."Musisz wypełnić wszystkie pola";
	}
	}
	//else
	//{
	//echo 'Krok0: NO<br>';
	//_CheckConnection($DBConn);
	//}
?>
