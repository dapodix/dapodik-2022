<?php
	/**
	*  Setting all desktop and sync application
	**/
	require_once 'functions.php';

	define ('APPNAME', 'DataDikdas');
	define ('APPNAME_VIEW', 'Admin');

	define ('DBNAME', 'pendataan');
    define ('DBPRT', getReadConfig("DbPort"));
	define ('SERVERURL', 'https://dapo.kemdikbud.go.id');

	$syncPortDikdas = getReadConfig("SyncPortDikdas");
	$syncPortDikmen = getReadConfig("SyncPortDikdas");

	define ('URLSYNC_DIKMEN', 'http://'.$_SERVER["SERVER_NAME"].':'.$syncPortDikmen.'/index.php');
	define ('URLPUSHPREFILL_DIKMEN', 'http://'.$_SERVER["SERVER_NAME"].':'.$syncPortDikmen.'/prefill/push_prefill.php');
	define ('URLPUSHPREFILLRAPOR_DIKMEN', 'http://'.$_SERVER["SERVER_NAME"].':'.$syncPortDikmen.'/prefill/push_prefill_rapor.php');

	define ('URLSYNC_DIKDAS', 'http://'.$_SERVER["SERVER_NAME"].':'.$syncPortDikdas.'/index.php');
	define ('URLPUSHPREFILL_DIKDAS', 'http://'.$_SERVER["SERVER_NAME"].':'.$syncPortDikdas.'/prefill/push_prefill.php');
	define ('URLPUSHPREFILLRAPOR_DIKDAS', 'http://'.$_SERVER["SERVER_NAME"].':'.$syncPortDikdas.'/prefill/push_prefill_rapor.php');


	/**
	*  End
	**/
?>