<?php

/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    PHP_FunctionsForm.php
 * Encoding:    UTF-8
 * Created:     2014-01-17
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
//require_once "../common.inc.php";

function Form($id, $file, $title, $name, $place, $method='post'){
    $file = HTTP_MODELS_PATH.$file;
    isset($method)?$method:'post';
    switch($place){
        case 'head':
            echo '<form id="'.$id.'" action="'.$file.'" method="'.$method.'">
                    <table>
                        <th colspan="2">'.$title.'</th>';
        break;
        case 'foot':
            echo '          <td></td>
                            <td style="text-align: right;"><input type="submit" name="'.$name.'" value="Wyślij"></td>
                        </tr>
                    </table>
                </form>';
        break;
    }
}

function CreateTextForm($array, $checkerror = true, $readonly=false, $sess=true){
    
    foreach ($array as $key => $value){
        if($readonly){
            $readonly = 'readonly=readonly';
        }else{ 
            $readonly='';
        }
        
        if ($sess && isset($_SESSION[$key])){
            $value = $_SESSION[$key];
//            unset($_SESSION[$key]);
        }
        if ($checkerror){
            echo'<tr>
                    <td><span id="red">*</span>'.$key.': </td>
                    <td><input type="text" id="'.$key.'" name="'.$key.'" value="'.$value.'" '.$readonly.' "></input> </td>
                </tr>
                <tr>
                    <td colspan="2"><div id="error'.$key.'" class="error"></div></td>
                </tr>';
        }else{
            echo'<tr>
                    <td>'.$key.': </td>
                    <td><input type="text" id="'.$key.'" name="'.$key.'" value="'.$value.'" '.$readonly.' "></input> </td>
                </tr>                
                <tr>
                    <td colspan="2"><div id="error'.$key.'"></div></td>
                </tr>';            
        }
    }
}

function CreateHiddenTextForm($array){
    foreach ($array as $key => $value){
        
        if (isset($_SESSION[$key])){
            $value = $_SESSION[$key];
//            unset($_SESSION[$key]);
        }
        echo'<tr>
                <td><input type="hidden" colspan = 2 id="'.$key.'" name="'.$key.'" value="'.$value.'"></input> </td>
             </tr>';
    }
}

function CreateTextareaForm($array, $cols, $rows){
    foreach ($array as $key => $value){
        
        if (isset($_SESSION[$key])){
            $value = $_SESSION[$key];
//            unset($_SESSION[$key]);
        }
        echo'<tr>
                <td>'.$key.'</td>
                <td><textarea id="'.$key.'"   name="'.$key.'"   cols="'.$cols.'" rows="'.$rows.'">'.$value.'</textarea></td>
             </tr>';
    }
}
//<tr>
//            <td>Użytkownik/Login:</td>
//            <!--td><input type="text" name="uzytkownik"></td--> <!-- To MA BYć w wersji WORK!!!!!!!!!!!!!!!!!!!!!!!!! -->
//            <td><select name="uzytkownik" >	 <!-- To jest absolutnie niepoprawne i ma by� USUNIETE!!!! -->
//                    <option>jabarti</option>
//                    <option>admin</option>
//                    <option>spedytor</option>
//                    <option>Alus</option>
//            </select></td>
//	</tr>
function CreateOptionForm($name, $array){
    echo'<td>'.$name.': </td>
         <td><select name="'.$name.'">';
    foreach ($array as $key => $val){
        echo'<option>'.$val.'</option>';
    }
    echo'   </select></td>
	</tr>';
}


?>
