<?php 
/*
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 */
//$name = sha1('login');
//$name = 'login';
//function CreateButton($file, $title, $direction = '',$path = HTTP_HTDOCS){
//    if ($file && $title){
// ?>   
    <!--<a href="<?php //echo $path.$file.'?Main_view_name='.$direction ?>" class="myButton"><?php //echo $title ?></a>-->
 <?php  
//    }
//    else{
//?>
        <!--<a href="/.." class="myButton">localhost</a>-->
<?php
//    }
//}

if (isset($_SESSION['upraw_user'])){
    switch($_SESSION['upraw_user']){
        case 'admin':
?>
            <div class="guziki">
                <a href="../../" class="myButton"><?php echo t("Do")?> BartiLevi <?php echo t("Strona Główna")?></a>
                <a href="/.." class="myButton">localhost</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php' ?>" class="myButton"><?php echo t("Do")?> index</a>
<!--                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=login' ?>" class="myButton">Zaloguj</a>-->
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=register' ?>" class="myButton"><?php echo t("Zarejestruj")?> <?php t("osobę")?></a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=MakeLogin' ?>" class="myButton"><?php echo t("Zmień hasło")?></a>
                <a href="<?php echo ROOT.HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton"><?php echo t("Wyloguj")?></a>
            </div>  
<?php
        break;
    
        case 'pracownik':
?>      
            <div class="guziki">
                <a href="../../" class="myButton"><?php echo t("Do")?> BartiLevi <?php echo t("Strona Główna")?></a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php' ?>" class="myButton"><?php echo t("Do")?> index</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=register' ?>" class="myButton"><?php echo t("Zarejestruj")?> <?php echo t("osobę")?></a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=MakeLogin' ?>" class="myButton"><?php echo t("Zmień hasło")?></a>
                <a href="<?php echo ROOT.HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton"><?php echo t("Wyloguj")?></a>
            </div>
<?php
        break;
    
        case 'klient':
?>      
            <div class="guziki">
                <a href="../../" class="myButton"><?php echo t("Do")?> BartiLevi <?php echo t("Strona Główna")?></a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php' ?>" class="myButton"><?php t("Do")?> index</a>
                <!--<a href="<?php echo ROOT.HTTP_VIEWS_PATH.'MakeLoginPanel.php?MakeLogin=change' ?>" class="myButton">Zmień hasło</a>-->
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=MakeLogin' ?>" class="myButton"><?php echo t("Zmień hasło")?></a>
                <a href="<?php echo ROOT.HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton"><?php echo t("Wyloguj")?></a>
            </div>
<?php            
        break;
    
        default:
?>      
            <div class="guziki">
                <!--<a href="/.." class="myButton">localhost</a>-->
                <?php echo ROOT?>
                <a href="../../" class="myButton"><?php t("Do")?> BartiLevi <?php echo t("Strona Główna")?></a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php' ?>" class="myButton"><?php echo t("Do")?> index</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=login' ?>" class="myButton"><?php echo t("Zaloguj się")?></a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=register' ?>" class="myButton"><?php echo t("Zarejestruj się")?></a>
                <a href="<?php echo ROOT.HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton"><?php echo t("Wyloguj")?></a>
            </div>
<?php 
        break;
    }
}else{

?>      
<div class="guziki">
	<!--<a href="/.." class="myButton">localhost</a>-->
        <a href="../../" class="myButton"><?php echo t("Do")?> BartiLevi <?php echo t("Strona Główna")?></a>
	<a href="<?php echo ROOT.HTTP_HTDOCS.'index.php' ?>" class="myButton"><?php echo t("Do")?> <?php echo t("Strony Głównej")?></a>
	<a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=login' ?>" class="myButton"><?php echo t("Zaloguj się")?></a>
	<a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=register' ?>" class="myButton"><?php echo t("Zarejestruj się")?></a>
	<a href="<?php echo ROOT.HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton"><?php echo t("Wyloguj")?></a>
</div>
<?php 
}
?>
