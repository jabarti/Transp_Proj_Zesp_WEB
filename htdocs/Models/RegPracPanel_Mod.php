<?php
/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    RegPracPanel_Mod.php
 * Encoding:    UTF-8
 * Created:     2014-01-17
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * commit       e6f329a919e0bf91cd35513d51722adfedeb18c0  fixing1
 * Date:        Fri Mar 28 23:42:59 2014 +0100
 * ************************************************* */
require_once "../common.inc.php";
echo '<br>'.__FILE__.'================$_SESSION=========================='.__LINE__.'<br>';
DisplayArr($_SESSION);
echo '<br>'.__FILE__.'================$_POST=========================='.__LINE__.'<br>';
DisplayArr($_POST);
echo '<br>'.__FILE__.'================$_GET=========================='.__LINE__.'<br>';
DisplayArr($_GET);


$PracForm = $_POST;

$Prac = new Pracownik($PracForm);

header("Location: ".HTTP_HTDOCS.'index.php?Main_view_name=MakeLogin&isFirstLog=1');
?>
