<?php
/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    RegPracPanel_Mod.php
 * Encoding:    UTF-8
 * Created:     2014-01-17
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * commit       e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:        Fri Mar 28 17:44:24 2014 +0100
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
