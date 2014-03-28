<?php

/**
 * Filename: Paths.php
 * 
 * Created: 2014-01-10
 *
 * @author Bartosz M. Lewiński <jabarti@wp.pl>
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 */

//??? >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//ECHO '<BR><BR> DEFINE DIRECTORIES OLD Way<BR><BR>';
define('BASE_PATH', dirname(__FILE__));
define('INCLUDE_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'includes');
define('CLASSES_PATH', INCLUDE_PATH . DIRECTORY_SEPARATOR . 'classes');
define('FILES_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'files');
define('PICTURES_PATH', FILES_PATH . DIRECTORY_SEPARATOR . 'pictures');
define('STYLES_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'styles');

//echo 'linia: '.__LINE__.' BASE_PATH: '.BASE_PATH.'<br>';
//echo 'linia: '.__LINE__.' INCLUDE_PATH: '.INCLUDE_PATH.'<br>';
//echo 'linia: '.__LINE__.' CLASSES_PATH: '.CLASSES_PATH.'<br>';
//echo 'linia: '.__LINE__.' FILES_PATH: '.FILES_PATH.'<br>';
//echo 'linia: '.__LINE__.' PICTURES_PATH: '.PICTURES_PATH.'<br>';
//echo 'linia: '.__LINE__.' STYLES_PATH: '.STYLES_PATH.'<br>';
//??? >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//ECHO '<BR><BR> DEFINE DIRECTORIES<BR><BR>';

if (!defined('DIR_SEP'))
    define('DIR_SEP', '/');
//echo 'linia: '.__LINE__.' DIRECTORY_SEPARATOR: '.DIRECTORY_SEPARATOR.'<br>';
//echo 'linia: '.__LINE__.' DIR_SEP: '.DIR_SEP.'<br>';

//echo 'linia: '.__LINE__.'$_SERVER[\'PHP_SELF\']: '.$_SERVER['PHP_SELF'].'<br><br>';

//var_dump(explode(DIR_SEP, $_SERVER['PHP_SELF']));
//echo '<br>';

//=============================================================================
//ECHO '<BR><BR>// HTTP Directories  //<BR><BR>';
//echo __FILE__."<br>";
//explode("\\",__FILE__);
//echo "<br>";
$arrTRY = explode(DIR_SEP,__FILE__);
//var_dump($arr);
//echo count($arr);
//echo $arrTRY[count($arrTRY)-1];

$arr = explode(DIR_SEP, $_SERVER['PHP_SELF']);
$arr2 = explode(DIR_SEP, $_SERVER['PHP_SELF']);
//echo '<br>'.$arr[1];
//echo '<br>'.$arr2[2].'<br>';
if (!defined('ROOT'))    define('ROOT', 'http://'.$_SERVER['HTTP_HOST']);
if (!defined('PRO_NAME'))    define('PRO_NAME', $arr[1]);
if (!defined('HTTP_HTDOCS'))    define('HTTP_HTDOCS', DIR_SEP.PRO_NAME.DIR_SEP.$arr2[2].DIR_SEP);
if (!defined('HTTP_MODELS_PATH'))    define('HTTP_MODELS_PATH', HTTP_HTDOCS.'Models'.DIR_SEP);
if (!defined('HTTP_STYLES_PATH'))    define('HTTP_STYLES_PATH', HTTP_HTDOCS.'Styles'.DIR_SEP);
if (!defined('HTTP_BACKGROUND_PATH'))    define('HTTP_BACKGROUND_PATH', HTTP_STYLES_PATH.'background'.DIR_SEP);
if (!defined('HTTP_VIEWS_PATH'))    define('HTTP_VIEWS_PATH', HTTP_HTDOCS.'Views'.DIR_SEP);
if (!defined('HTTP_STABLEVIEWS_PATH'))    define('HTTP_STABLEVIEWS_PATH', HTTP_VIEWS_PATH.'StableViews'.DIR_SEP);
if (!defined('HTTP_PICTURES_PATH'))    define('HTTP_PICTURES_PATH', HTTP_HTDOCS.'pictures'.DIR_SEP);
if (!defined('HTTP_SCRIPTS_PATH'))    define('HTTP_SCRIPTS_PATH', HTTP_HTDOCS.'scripts'.DIR_SEP);
if (!defined('HTTP_ROOT_PATH'))    define('HTTP_ROOT_PATH', DIR_SEP.PRO_NAME.DIR_SEP);
if (!defined('HTTP_INCLUDES_PATH'))    define('HTTP_INCLUDES_PATH', HTTP_ROOT_PATH.'Includes'.DIR_SEP);
if (!defined('HTTP_CLASSES_PATH'))    define('HTTP_CLASSES_PATH', HTTP_INCLUDES_PATH.'Classes'.DIR_SEP);
if (!defined('HTTP_FILES_PATH'))    define('HTTP_FILES_PATH', HTTP_ROOT_PATH.'files'.DIR_SEP);
if (!defined('HTTP_IMG_PATH'))    define('HTTP_IMG_PATH', HTTP_FILES_PATH.'Img'.DIR_SEP);
if (!defined('ROOT_SERV')){    define('ROOT_SERV', $_SERVER['PHP_SELF']);}

//echo 'linia: '.__LINE__.' ROOT_SERV: '.ROOT_SERV.'<br>';
//echo 'linia: '.__LINE__.' HTTP_IMG_PATH: '.HTTP_IMG_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_FILES_PATH: '.HTTP_FILES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_CLASSES_PATH: '.HTTP_CLASSES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_INCLUDES_PATH: '.HTTP_INCLUDES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_ROOT_PATH: '.HTTP_ROOT_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_SCRIPTS_PATH: '.HTTP_SCRIPTS_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_PICTURES_PATH: '.HTTP_PICTURES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_BACKGROUND_PATH: '.HTTP_BACKGROUND_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_VIEWS_PATH: '.HTTP_VIEWS_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_STABLEVIEWS_PATH: '.HTTP_STABLEVIEWS_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_STYLES_PATH: '.HTTP_STYLES_PATH.'<br>';
//echo 'linia: '.__LINE__.' ROOT: '.ROOT.'<br>';
//echo 'linia: '.__LINE__.' PRO_NAME: '.PRO_NAME.'<br>----------------------<br>';
//echo 'linia: '.__LINE__.' HTTP_HTDOCS:'.HTTP_HTDOCS.'<br>';
//echo 'linia: '.__LINE__.' HTTP_MODELS_PATH: '.HTTP_MODELS_PATH.'<br>';
//==============================================================================
//ECHO '<BR><BR>// HDD Directories //<BR><BR>';

if (!defined('HDD_PATH'))    define('HDD_PATH', implode(DIRECTORY_SEPARATOR, explode(DIRECTORY_SEPARATOR, dirname(__FILE__))).DIRECTORY_SEPARATOR);
if (!defined('HDD_ROOT_PATH'))    define('HDD_ROOT_PATH', substr(HDD_PATH, 0, strrpos(HDD_PATH, DIRECTORY_SEPARATOR, -2)) . DIRECTORY_SEPARATOR);
if (!defined('HDD_INCLUDES_PATH'))    define('HDD_INCLUDES_PATH',  HDD_ROOT_PATH  . 'Includes' . DIRECTORY_SEPARATOR);
if (!defined('HDD_CLASSES_PATH'))    define('HDD_CLASSES_PATH', HDD_INCLUDES_PATH . 'Classes'. DIRECTORY_SEPARATOR);
if (!defined('HDD_FILES_PATH'))    define('HDD_FILES_PATH', HDD_ROOT_PATH  . 'files'. DIRECTORY_SEPARATOR);
if (!defined('HDD_IMG_PATH'))    define('HDD_IMG_PATH', HDD_FILES_PATH  . 'Img'. DIRECTORY_SEPARATOR);
if (!defined('HDD_MODELS_PATH'))    define('HDD_MODELS_PATH', HDD_PATH  . 'Models'. DIRECTORY_SEPARATOR);
if (!defined('HDD_STYLES_PATH'))    define('HDD_STYLES_PATH', HDD_PATH  . 'Styles'. DIRECTORY_SEPARATOR);
if (!defined('HDD_VIEWS_PATH'))    define('HDD_VIEWS_PATH', HDD_PATH  . 'Views'. DIRECTORY_SEPARATOR);
if (!defined('HDD_STABLEVIEWS_PATH'))    define('HDD_STABLEVIEWS_PATH', HDD_VIEWS_PATH  . 'StableViews'. DIRECTORY_SEPARATOR);
if (!defined('HDD_PICTURES_PATH'))    define('HDD_PICTURES_PATH', HDD_PATH  . 'pictures'. DIRECTORY_SEPARATOR);
if (!defined('HDD_SCRIPT_PATH'))    define('HDD_SCRIPT_PATH', HDD_PATH  . 'scripts'. DIRECTORY_SEPARATOR);

//echo 'linia: '.__LINE__.' HDD_SCRIPT_PATH: '.HDD_SCRIPT_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_PICTURES_PATH: '.HDD_PICTURES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_VIEWS_PATH: '.HDD_VIEWS_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_STABLEVIEWS_PATH: '.HDD_STABLEVIEWS_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_STYLES_PATH: '.HDD_STYLES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_MODELS_PATH: '.HDD_MODELS_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_IMG_PATH: '.HDD_IMG_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_FILES_PATH: '.HDD_FILES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_CLASSES_PATH: '.HDD_CLASSES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_INCLUDES_PATH: '.HDD_INCLUDES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_ROOT_PATH: '.HDD_ROOT_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_PATH: '.HDD_PATH.'<br>';
//echo 'linia: '.__LINE__.' =============================================<br>';

//echo '<br>$_SERVER[\'HTTP_HOST\']: '.$_SERVER['HTTP_HOST'];
//echo '<br>$_SERVER[\'SCRIPT_NAME\']: '.$_SERVER['SCRIPT_NAME'];
//echo '<br>$_SERVER[\'REQUEST_URI\']: '.$_SERVER['REQUEST_URI'];
//echo '<br>$_SERVER[\'PHP_SELF\']: '.$_SERVER['PHP_SELF'];
//echo '<br>__FILE__: '.__FILE__;
/**/

