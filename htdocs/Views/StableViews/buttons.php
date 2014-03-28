<?php 
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
                <a href="../../" class="myButton">Do BartiLevi Main</a>
                <a href="/.." class="myButton">localhost</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php' ?>" class="myButton">Do Głównej</a>
<!--                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=login' ?>" class="myButton">Zaloguj</a>-->
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=register' ?>" class="myButton">Zarejestruj Osobe</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=MakeLogin' ?>" class="myButton">Zmień hasło</a>
                <a href="<?php echo ROOT.HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton">Wyloguj</a>
            </div>  
<?php
        break;
    
        case 'pracownik':
?>      
            <div class="guziki">
                <a href="../../" class="myButton">Do BartiLevi Main</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php' ?>" class="myButton">Do Głównej</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=register' ?>" class="myButton">Zarejestruj osobe</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=MakeLogin' ?>" class="myButton">Zmień hasło</a>
                <a href="<?php echo ROOT.HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton">Wyloguj</a>
            </div>
<?php
        break;
    
        case 'klient':
?>      
            <div class="guziki">
                <a href="../../" class="myButton">Do BartiLevi Main</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php' ?>" class="myButton">Do Głównej</a>
                <!--<a href="<?php echo ROOT.HTTP_VIEWS_PATH.'MakeLoginPanel.php?MakeLogin=change' ?>" class="myButton">Zmień hasło</a>-->
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=MakeLogin' ?>" class="myButton">Zmień hasło</a>
                <a href="<?php echo ROOT.HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton">Wyloguj</a>
            </div>
<?php            
        break;
    
        default:
?>      
            <div class="guziki">
                <!--<a href="/.." class="myButton">localhost</a>-->
                <?php echo ROOT?>
                <a href="../../" class="myButton">Do BartiLevi Main</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php' ?>" class="myButton">Do Głównej</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=login' ?>" class="myButton">Zaloguj</a>
                <a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=register' ?>" class="myButton">Zarejestruj się</a>
                <a href="<?php echo ROOT.HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton">Wyloguj</a>
            </div>
<?php 
        break;
    }
}else{

?>      
<div class="guziki">
	<!--<a href="/.." class="myButton">localhost</a>-->
        <a href="../../" class="myButton">Do BartiLevi Main</a>
	<a href="<?php echo ROOT.HTTP_HTDOCS.'index.php' ?>" class="myButton">Do Głównej</a>
	<a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=login' ?>" class="myButton">Zaloguj</a>
	<a href="<?php echo ROOT.HTTP_HTDOCS.'index.php?Main_view_name=register' ?>" class="myButton">Zarejestruj się</a>
	<a href="<?php echo ROOT.HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton">Wyloguj</a>
</div>
<?php 
}
?>
