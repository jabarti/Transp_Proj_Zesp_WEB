<?php

/* * **************************************************
 * Project:     BartiLevi_WEB
 * Filename:    tranlation_panel.php
 * Encoding:    UTF-8
 * Created:     2014-04-03
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
//include 'translation.css';

//if (isset($_GET['jezyk'])) echo $_GET['jezyk'];

$Temp_em = false;
if(isset($_GET['empty'])){
    if($_GET['val']=='puste'){
        $_SESSION['empty'] = "AND `translation` = ''";
        $Temp_em = true;
    }else{
        $_SESSION['empty'] = '';
        $Temp_em = false;
    }
} else {
    if(isset($_SESSION['empty']) && $_SESSION['empty'] != ''){
        $Temp_em = true;
    }
}
$empty = $_SESSION['empty'];

if(isset($_GET['fragm'])){
    $fragm = "AND `key` LIKE '%".$_GET['fragm']."%'";
}else{
    $fragm=''; 
}

$curr_lang = isset($_GET['jezyk']) ? $_GET['jezyk'] : $_SESSION['lang']; 
//$sql = "SELECT * FROM `localization` WHERE `lang` = 'pl';";
$sql = "SELECT * FROM `localization` WHERE (`lang` = '".$curr_lang."' ".$empty." ".$fragm.") ORDER BY `localization`.`key` ASC;";
//echo '<br>SQL: '.$sql;
$res = mysql_query($sql);

?>
<div>
<form id="langchoser" action="" method="get">
    <select name=jezyk >
        <option value="pl"><?php echo t("Polski")?></option> 
        <option value="en"><?php echo t("Angielski")?></option>
        <option value="se"><?php echo t("Szwedzki")?></option>
        <!--<option value="se"><?php echo t("Hiszpański")?></option>-->
    </select>
    <input type="submit" value="<?php t("Zmień język"); ?> =>">
        
<!--    <select name=jezyk id="langchoser" onchange="self.location.href = this.value">
        <option value="?jezyk=pl"><?php echo t("Polski")?></option>      
        <option value="?jezyk=en"><?php echo t("Angielski")?></option>
        <option value="?jezyk=se"><?php echo t("Szwedzki")?></option>
        <option value="?jezyk=??"><?php echo t("Hiszpański")?></option>
    </select>-->
</form>

    <form id="zawart" action="" method="get">
        <?php if($Temp_em == false){ ?>
                    <input type="hidden" name="val" value="puste">
                    <input type="submit" name="empty" value="<?php echo t("Wyświetl tylko puste"); ?>"/>
        <?php } else { ?>
                    <input type="hidden" name="val" value="pelne">
                    <input type="submit" name="empty" value="<?php echo t("Wyświetl wszystkie"); ?>"/>
        <?php }?>
                    
    </form>

    <form id="szukacz" action="" method="get">
         <input type="text" name="fragm" >
         <input type="submit" value="<?php echo t("Znajdź"); ?>"/>          
    </form>
</div>

<table>
    <tr>
        <th><?php echo t("język"); ?></th>
        <th><?php echo t("tekst klucz"); ?></th>
        <th><?php echo t("tłumaczenie"); ?></th>
        <th><?php echo t("plik"); ?></th>
        <th><?php echo t("długość"); ?></th>
    </tr>
    <?php while($row = mysql_fetch_array($res)){ ?>
    <tr>
    <form action="Translations/translation_panel_mod.php" method="get">
            <td><input type="text" size="6" name="lang" value="<?php echo $row[0]; ?>" readonly="readonly"></td>
            <td><input type="text" size=45% name="key" value="<?php echo $row[1]; ?>" readonly="readonly"></td>
            <td><input type="text" size=45% name="translation" value="<?php echo $row[3]; ?>" ></td>
            <td><input type="text" size=17 name="file" value="<?php echo $row[4]; ?>" readonly="readonly"></td>
            <td><input  size=4 type="text" value="<?php echo strlen($row[1]).'/'.strlen($row[3]); ?>"></td> 
            <td><input name=tlum type="submit" value="<?php echo t("Zapisz"); ?> =>"></td>       
            <td><input name=del type="submit" value="<?php echo t("Usuń"); ?> =>"></td>       
  
        </form>
    </tr>
    <?php } ?>
</table>

<script>
//alert($( "#langchoser" ).val());
</script>

<?php
if(isset($_GET['tlum'])){
    echo '<br>$_GET[lang]:'.$_GET['lang'];
    echo '<br>$_GET[key]:'.$_GET['key'];
    echo '<br>$_GET[translation]:'.$_GET['translation'];
}


