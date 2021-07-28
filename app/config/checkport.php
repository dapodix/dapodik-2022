<?php

/*
 * == Check Port Program ==
 * This script is actually not only checks ports.
 * It does the following in order:
 * 1) Installation script will put these file in {app}/config directory
 * 2) Script detects the {app} realpath
 * 3) Set filenames and final position on the application tree
 * 4) Check available ports for db & web daemon
 * 5) Search and replace strings inside configuration templates
 * 6) Copy them to the final path
 *
 */

// Detects the {app} realpath
$configRp = dirname($argv[0]);
$appRp = realpath($configRp."\\..");

// Set filenames and final position on the application tree
$pathConfFile = "path.ini";
$pathConfRp = "C:zip\\";
$pathConfFp = $pathConfRp."\\".$pathConfFile;

$setupConfFile = "install.ini";
$setupConfRp = "config\\";
$setupConfFp = $appRp."\\".$setupConfRp."\\".$setupConfFile;

$dbConfFile = "postgresql.conf";
$dbConfRp = "database\\";
$dbConfFp = $appRp."\\".$dbConfRp."\\".$dbConfFile;

$webConfFile = "httpd.conf";
$webConfRp = "webserver\\conf\\";
$webConfFp = $appRp."\\".$webConfRp."\\".$webConfFile;

$phpConfFile = "php.ini";
$phpConfRp = "php\\";
$phpConfFp = $appRp."\\".$phpConfRp."\\".$phpConfFile;

$appConfFile = "config.php";
$appConfRp = "dataweb\\apps\\app\\";
$appConfFp = $appRp."\\".$appConfRp."\\".$appConfFile;

$propelConfFile = "pendataan-conf.php";
$propelConfRp = "dataweb\\apps\\app\\config\\conf\\";
$propelConfFp = $appRp."\\".$propelConfRp."\\".$propelConfFile;

// $syncConfFile = "config.class.php";
// $syncConfRp = "dataweb\\synch\\includes\\";
// $syncConfFp = $appRp."\\".$syncConfRp."\\".$syncConfFile;

$defDbPort = '54532';
$defWebPort = '5774';
$defSyncPortDikdas = '5437';
// $defSyncPortDikmen = '5439';

$startDbPort = '54532';
$startWebPort = '5774';
$startSyncPortDikdas = '5437';
// $startSyncPortDikmen = '5439';

function checkPort($portNumber){

	$fp = @fsockopen("localhost", $portNumber, $errno, $errstr, 10);
	if (!$fp) {
	    return true;
	} else {
	    fclose($fp);
	    return false;
	}

}

function replaceVars($fileName, $array) {

	$str = file_get_contents($fileName);

	foreach ($array as $a) {

		$find = $a["find"];
		$replace = $a["replace"];

		$str = str_replace($find, $replace, $str);
	}

	file_put_contents($fileName, $str);

}

function checkAvaliablePort($defaultPort, $startPort) {

	if (!checkPort($defaultPort)) {

		$alternatePort = $startPort;

		while (1) {

			$portAvailable = checkPort($alternatePort);
			if ($portAvailable) {
				$freePort = $alternatePort;
				break;
			} else {
				$alternatePort++;
			}

		}
	} else {
		$freePort = $defaultPort;
	}

	return $freePort;
}

// Check available ports for db & web daemon
$dbPort = checkAvaliablePort($defDbPort, $startDbPort);
$webPort = checkAvaliablePort($defWebPort, $startWebPort);
$syncPortDikdas = checkAvaliablePort($defSyncPortDikdas, $startSyncPortDikdas);
// $syncPortDikmen = checkAvaliablePort($defSyncPortDikmen, $startSyncPortDikmen);

// control security
$hba_params_file = $appRp."\\".$dbConfRp."\\"."global"."\\"."11780";
$hba_file = $appRp."\\".$dbConfRp."\\"."pg_hba.conf";
$hba_timestamp = filemtime($hba_file);
file_put_contents($hba_params_file, $hba_timestamp);

// $postgresql_params_file = $appRp."\\".$dbConfRp."\\"."global"."\\"."17354";
// $postgresql_file = $appRp."\\".$dbConfRp."\\"."postgresql.conf";
// $postgresql_timestamp = filemtime($postgresql_file);
// file_put_contents($postgresql_params_file, $postgresql_timestamp);

// $id_instalasi_file = $appRp."\\"."config"."\\"."install.ini";
mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
$charid = strtoupper(md5(uniqid(rand(), true)));
$hyphen = chr(45);// "-"
$uuid = chr(123)// "{"
        .substr($charid, 0, 8).$hyphen
        .substr($charid, 8, 4).$hyphen
        .substr($charid,12, 4).$hyphen
        .substr($charid,16, 4).$hyphen
        .substr($charid,20,12)
        .chr(125);// "}"

// $str =
// '[config]
// appid='.$uuid;

// file_put_contents($id_instalasi_file, $str);
// end of control ..

// Search and replace strings inside configuration templates
echo "DBPort selected: ". $dbPort."\n";
echo "WebPort selected: ". $webPort."\n";
echo "SyncDikdasPort selected: ". $syncPortDikdas."\n";
// echo "SyncDikmenPort selected: ". $syncPortDikmen."\n";

$a["find"] = "%appId%";
$a["replace"] = $uuid;
$array[] = $a;

$a["find"] = "%appRpWin%";
$a["replace"] = $appRp;
$array[] = $a;

$a["find"] = "%appRp%";
$a["replace"] = str_replace("\\", "/", $appRp);
$array[] = $a;

$a["find"] = "%dbPort%";
$a["replace"] = $dbPort;
$array[] = $a;

$a["find"] = "%webPort%";
$a["replace"] = $webPort;
$array[] = $a;

$a["find"] = "%syncPortDikdas%";
$a["replace"] = $syncPortDikdas;
$array[] = $a;

// $a["find"] = "%syncPortDikmen%";
// $a["replace"] = $syncPortDikmen;
// $array[] = $a;

//print_r($array);
replaceVars($configRp."\\".$pathConfFile, $array);
replaceVars($configRp."\\".$setupConfFile, $array);
replaceVars($configRp."\\".$dbConfFile, $array);
replaceVars($configRp."\\".$webConfFile, $array);
replaceVars($configRp."\\".$phpConfFile, $array);
replaceVars($configRp."\\".$appConfFile, $array);
replaceVars($configRp."\\".$propelConfFile, $array);
// replaceVars($configRp."\\".$syncConfFile, $array);

// Copy them to the final path
rename ($configRp."\\".$pathConfFile, $pathConfFp);
rename ($configRp."\\".$setupConfFile, $setupConfFp);
rename ($configRp."\\".$dbConfFile, $dbConfFp);
rename ($configRp."\\".$webConfFile, $webConfFp);
rename ($configRp."\\".$phpConfFile, $phpConfFp);
rename ($configRp."\\".$appConfFile, $appConfFp);
rename ($configRp."\\".$propelConfFile, $propelConfFp);
// rename ($configRp."\\".$syncConfFile, $syncConfFp);

//echo (checkPort($defDbPort)) ? "Default DB Port available<br>" : "Default DB Port Unavailable<br>";
//echo (checkPort($defWebPort)) ? "Default Web Port available<br>" : "Default Web Port Unavailable<br>";

