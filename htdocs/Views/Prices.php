<?php
/* * ************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    newEmptyPHP.php
 * Encoding:    UTF-8
 * Created:     2014-01-11
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 * ************************************************ */

 ECHO t('  TODO:     TRZEBA ZROBIĆ ŻEBY TO  POBIERAŁO DANE Z BAZY !');

$TabTitle = t('Tytuł');
$tab = 
'<table border="1">
  <th title="'.$TabTitle.'" colspan="3">'.t("Cennik").'</th>
  <tr title="'.t("Pozycje").'" bgcolor="silver">
    <th>'.t("pozycja").'</th>
    <th>'.t("jednostka").'</th>
    <th>'.t("cena").'</th>
  </tr>
  <tr title="'.t("Zawartość").'" bgcolor="aqua">
    <td>'.t("Transport").'</td>
    <td>[km]</td>
    <td>35zł</td>
  </tr>
</table>';

echo $tab;

?>
<!--<table border="1">
  <th title="Tytuł" colspan="3">Cennik</th>
  <tr title="Pozycje" bgcolor="silver">
    <th>Pozycja</th>
    <th>jednostka</th>
    <th>cena</th>
  </tr>
  <tr title="Zawartośc" bgcolor="aqua">
    <td>Transport</td>
    <td>[km]</td>
    <td>35zł</td>
  </tr>
</table>-->