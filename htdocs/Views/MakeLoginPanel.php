<?php

/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    MakeLoginPanel.php
 * Encoding:    UTF-8
 * Created:     2014-01-14
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
//require_once "common.inc.php";
echo '<br>================GET==========================<br>';
DisplayArr($_GET);


if (isset($_GET["isFirstLog"])){
    echo '<br>Get is first log = '.$_GET["isFirstLog"];
    $isFirstLog = $_GET["isFirstLog"];
    $NewPass1 = $NewPass2 = '12345';
}else{
//    echo '<br>Get is first log = '.$_GET["isFirstLog"];
    $isFirstLog = 0;
    // In work version //
//    $NewPass1 = $NewPass2 = '*****';
    $NewPass1 = $NewPass2 = 'haslo'; // remove in WORK version
}

if ($isFirstLog == 0){
    echo '<br>KROK 0 isFirstLog == 0';
    if (isset($_SESSION['userLogin'])){         // Utworzona sesja userlogin - tzn jest zalogowany pracownik!!! może zarej. klienta albo innego pracownika
        echo '<br>KROK 1 isFirstLog == 0 && SESS userLog SET<br>Zmienia SWOJE HASŁO!!!';
        $_SESSION['RegOsCase'] = 1;
        
        $login = $_SESSION['userLogin'];
        $type = 'password';
        $readonly = 'readonly = readonly';
        $readonly2 = '';
        $OldPass = 'haslo';   // MA BYC PUSTE!!!!
    $upraw = '        
        <tr>
            <td colspan="2"><input type="hidden" id="upraw" name="upraw" value="'.$_SESSION["upraw"].'" ></input></td>
	</tr>';
    }else{
        echo '<br>KROK 2 isFirstLog == 0 && SESS userLog NIE SET';
        $_SESSION['RegOsCase'] = 2;
        $login = '';
        $type = 'hidden';
        $readonly = '';
        $readonly2 = '';
        $OldPass = '123456789WqX%';   // Jest zmienione, takie jest tylko do walidacji nowych haseł - nie ma to znaczenia!
        $upraw = '        
        <tr>
            <td colspan="2"><input type="hidden" id="upraw" name="upraw" value="Klient" ></input></td>
	</tr>';
    }
} else {  // Pracownik rejestruje pracownika!!!
    echo '<br>KROK 3 isFirstLog == 1';
    if (isset($_SESSION['userLogin'])){
        if ($_SESSION['upraw'] == 'Klient'){
            echo '<br> ************TO KLIENT';
            $_SESSION['RegOsCase'] = 3;
            echo '<br> **************TO nie KLIENT';
            echo '<br>KROK 3a isFirstLog == 1 && SESS userLog SET<br>Nowy KLIENT - hasło 12345';
            $login = '';
            $type = 'hidden';
            $readonly = '';
            $readonly2 = 'readonly=readonly';
            $OldPass = '123456789WqX%';   // Jest zmienione, takie jest tylko do walidacji nowych haseł - nie ma to znaczenia!
            $upraw = '        
                <tr>
                    <td colspan="2"><input type="hidden" id="upraw" name="upraw" value="Klient" ></input></td>
                </tr>';
        }else{
            echo '<br> **************TO nie KLIENT';
            $_SESSION['RegOsCase'] = 4;
            echo '<br>KROK 3b isFirstLog == 1 && SESS userLog SET<br>Nowy Pracownik - hasło 12345';
            $login = '';
            $type = 'hidden';
            $readonly = '';
            $readonly2 = 'readonly=readonly';
            $OldPass = '123456789WqX%';   // Jest zmienione, takie jest tylko do walidacji nowych haseł - nie ma to znaczenia!
            $upraw = '        
                <tr>
                    <td colspan="2"><input type="hidden" id="upraw" name="upraw" value="Pracownik" ></input></td>
                </tr>';
        }
} else {
    echo '<br>KROK 5 isFirstLog == 1 && SESS userLog NIE SET<br>//NOWY klient, Pierwszy LOG';  //NOWY klient, Pierwszy LOG
    $_SESSION['RegOsCase'] = 5;
            $login = '';
            $type = 'hidden';
            $readonly = '';
            $readonly2 = '';
            $OldPass = '123456789WqX%';   // Jest zmienione, takie jest tylko do walidacji nowych haseł - nie ma to znaczenia!
            $upraw = '        
                <tr>
                    <td colspan="2"><input type="hidden" id="upraw" name="upraw" value="Klient" ></input></td>
                </tr>';
}
}

//     else 
//        if ($isFirstLog == 1){
//            echo '<br>case 3 NIE Utworzona sesja userLogin oraz $isFirstLog == 1';
//                $login = '';
//                $type = 'hidden';
//                $readonly = '';
//                $OldPass = '123456789WqX%';   // Jest zmienione, takie jest tylko do walidacji nowych haseł - nie ma to znaczenia!
//                $upraw = '        
//                    <tr>
//                        <td colspan="2"><input type="text" id="upraw" name="upraw" value="Klient" ></input></td>
//                    </tr>';
                //    $upraw = '       
//                      <tr>
//                          <td>Uprawnienia:</td>
//                          <td><select id="upraw" name="upraw">
//                              <option>admin</option>
//                              <option>manager</option>
//                              <option>pracownik</option>
//                              <option>klient</option>
//                          </select>
//                          </td>
//                      </tr>';
//    }

if(isset($_GET['MakeLogin'])){
    echo $_GET['MakeLogin'];
    
    switch($_GET['MakeLogin']){
        case 'first':
            echo '<br>$_GET[\'MakeLogin\'] == first';
            break;
        
        case 'change':
            echo '<br>$_GET[\'MakeLogin\'] == change';
            break;
        
        default:
            echo '<br>$_GET[\'MakeLogin\'] == default';
            break;
    }
}
//    echo HTTP_MODELS_PATH;
    $Path = HTTP_MODELS_PATH.'MakeLoginPanel_Mod.php';
    
      echo '<br>$login: '.$login;
      echo '<br>$type: '.$type;
      echo '<br>$readonly: '.$readonly;
      echo '<br>$readonly2: '.$readonly2;
      echo '<br>$OldPass: '.$OldPass;
      echo '<br>$NewPass1: '.$NewPass1;
      echo '<br>$NewPass2: '.$NewPass2;
echo '  
<form id="MakeLogin" action='.$Path.' method="POST">       
    <table>
        <tr>
            <td>Użytkownik/Login:</td>
            <td><input type="text" id="uzytkownik" name="uzytkownik" '.$readonly.' value='.$login.'></td>
	</tr>
        <tr>
            <td colspan="2"><div id="erroruzytkownik" class="error"></div></td>
	</tr>
        <tr>
            <td>Stare hasło:</td>
            <td><input type="'.$type.'" id="haslo1" name="haslo1" value="'.$OldPass.'"></td>
	</tr>
        <tr>
            <td colspan="2"><div  id="errorhaslo1" class="error"></div></td>
	</tr>
	<tr>
            <td>Utwórz hasło:</td>
            <td><input type="password" id="haslo2" name="haslo2" '.$readonly2.' value="'.$NewPass1.'"></td>
	</tr>
        <tr>
            <td colspan="2"><div id="errorhaslo2" class="error"></div></td>
	</tr>
        <tr>
            <td>Powtórz hasło:</td>
            <td><input type="password" id="haslo3" name="haslo3" '.$readonly2.' value="'.$NewPass2.'"></td>
	</tr>
        <tr>
            <td colspan="2"><div id="errorhaslo3" class="error"></div></td>
	</tr>
        '.$upraw.'
    </table>
    <input type="submit" value="Zaloguj"/>
</form>
';
  
    
?>