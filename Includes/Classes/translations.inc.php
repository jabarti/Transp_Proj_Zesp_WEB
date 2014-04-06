<?php
/*
 * translation.inc.php
 */

/*
 * Description of osoba
 * @author  Bartek Lewiński
 * commit 
 * Date:    Fri Mar 28 17:44:24 2014 +0100
 */

// Default language=Norwegian
$defaultLangCode = 'pl';

// If we have a cooke named langCode which contains 2 letters, we override it:
if (preg_match('/^[a-z]{2}$/',$_COOKIE['langCode'])) {
	$langCode = $_COOKIE['langCode'];
}

// This is the "source" language when translating. Missing translations will have values from this language.
define('SOURCE_LANG_CODE',"pl");

// All languages we know should be in the array $allLangCodes as keys. The value should be the language name in its own language.
// (We don't translate all the language names)
$allLanguageCodes = array(
	'pl' => 'Polski',
	'en' => 'English',
	'sv' => 'Svenska'
);

$langCode = $_COOKIE['language'];
if($langCode == '') {
	$langCode = $defaultLangCode;
}

$translations = getTranslations($langCode);

function getTranslations($langCode,$useSourceLanguage=true) {
	// Validate the langCode
//	if (!preg_match('/^[a-z]{2}$/',$langCode)) {
//		return array();
//	}
//	// Require source language
//	if ($useSourceLanguage || $langCode == SOURCE_LANG_CODE) {
//		require_once(dirname(__FILE__)."/translations/".SOURCE_LANG_CODE.".inc.php");
//	} else {
//		$translations = array();
//	}
//	// Then we include the language with langCode
//	if ($langCode != SOURCE_LANG_CODE) {
//		$filename = dirname(__FILE__)."/translations/".$langCode.".inc.php";
//		if (file_exists($filename)) {
//			$sourceLangTranslations = $translations;
//			require_once($filename);
//			$translations = array_merge($sourceLangTranslations,$translations);
//		}
//	}
	// Now we overwrite the translation with values in the database
	$sql = "SELECT `key`,translation FROM localization WHERE lang='$langCode'";
	$res = db_query($sql);
	while (list($key,$translation) = mysql_fetch_array($res)) {
		$translations[$key] = $translation;
	}
	mysql_free_result($res);
	return $translations;
}

function t($text,$comment=null)
{
	global $translations, $langCode;
	// Return the translation if we know it
	if (isset($translations[$text])) {
		return $translations[$text];
	}
	// Store it in the database if not
	// 
	$translations[$text] = $text;
	$value = addslashes($text);
	db_query("INSERT INTO translations (langCode,code,value) VALUES ('en','$value','$value')");
	// If we have no comment, add the PHP script
	if (empty($comment)) {
		$comment = basename($_SERVER['SCRIPT_NAME']);
	}
	db_query("INSERT INTO translations_comments (code,comment) VALUES ('$value','$comment')");
	return $text;
}

function getTranslationPhp($langCode,$translations) 
{
	$php = "<?php\n\$translations = array(\n";
	foreach ($translations as $code => $value) {
		$php .= "\t\"".addslashes($code)."\" => \"".addslashes($value)."\",\n";
	}
	$php .= ");\n?>";
	return $php;
}

function getTranslationsComments()
{
	$sql = "SELECT * FROM translations_comments";
	$res = db_query($sql);
	$comments = array();
	while ($row = mysql_fetch_assoc($res)) {
		$comments[$row['code']] = htmlentities($row['comment'],ENT_QUOTES,'UTF-8');
	}
	mysql_free_result($res);
	return $comments;
}


?>