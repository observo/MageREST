<?php
	//SCRIPT VARIABLES
	set_time_limit(0);
	ini_set('memory_limit', '-1');
	
	//REQUIRED FILES
	require_once(__DIR__.'/../../../Config/Config.php');
	require_once(__DIR__.'/../../../Helper/Helper.php');
	require_once(__DIR__.'/../../../Helper/CE/Integration.Integration.php');
	
	//CONFIG VARIABLES
	$Payload['Config']=$Config;
	
	//PAYLOAD DATA
	$Login = array('username'=>$Config['credentials']['username'], 'password'=>$Config['credentials']['password']);
	$Payload['Login']=$Login;
	
	$Integration=new Integration();
	$AccessToken=$Integration->AdminToken($Payload);
	print_r($AccessToken);
	