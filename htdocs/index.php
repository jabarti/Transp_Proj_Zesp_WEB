<?php
require_once "common.inc.php";
//require_once HDD_STABLEVIEWS_PATH.'header.php';

if (isset($_SESSION['count'])){
    $_SESSION['count']++;
}


echo '<div id="glowny_index">';
echo ('$Main_view_name: '.$Main_view_name);
include LoadMainView($Main_view_name);
echo '</div>';


/*   
echo '<br>linia: '.__LINE__.' =============================================<br>';
//    require_once("common.inc.php");
//    require_once VIEWS_PATH.DIRECTORY_SEPARATOR."head.php";
//    echo PICTURES_PATH.DIRECTORY_SEPARATOR.'favicon_no_euro.ico';
    
    $SQL1a = 'SELECT * FROM `osoba` WHERE `PESEL` = "75050106655";';

    echo '<br>linia: '.__LINE__.' '.'$SQL1a: '.$SQL1a.'<br>';

    $result = mysql_query($SQL1a);

    $row = mysql_fetch_row($result);

    print_r($row) or die('Pusto');
    
echo '<br>linia: '.__LINE__.' =============================================<br>';

$Gosc = new Osoba(null, '1111111113', 'Jurij', 'Wiktor', 'Gagarin',"Kosmonautów 12", '42-212', "Warszawa")or die('NIe moge utworzyc takiej osoby');
echo '<br>';

echo '<br>linia: '.__LINE__.' =============================================<br>';
$Gosc2 = new Osoba(1);
$row = $Gosc;
var_dump($row);

echo '<br>linia: '.__LINE__.' =============================================<br>';
$Gosc3 = new Osoba();
$row = $Gosc3->GetOsobaById(3);

var_dump($row);


//$Gosc->setFullName('Barti', "Levi");

//echo $Gosc->name.'<br>';
/**/
//echo "<br>END header.php<br>=================================<br>";
require_once HDD_STABLEVIEWS_PATH.'footer.php';
?>

