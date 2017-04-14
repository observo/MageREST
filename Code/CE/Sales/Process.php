<?php
	require_once(__DIR__.'/../../../Config/Config.php');
    require_once(__DIR__.'/../../../Helper/class.curl.php');
	require_once(__DIR__.'/../../../Helper/class.db.php');
	require_once(__DIR__.'/../../../Helper/include.classloader.php');
//	require_once(__DIR__.'/../../../Helper/MagentoAPI/class.MagOrder.php');
	require_once(__DIR__.'/../../../Helper/MagentoAPI/class.MagProduct.php');
//	require_once(__DIR__.'/../../../Helper/MagentoAPI/class.MagCategory.php');
	require_once(__DIR__."/XML/Converter.php");

	$classLoader->addToClasspath(ROOT);

	$File='SDC.XML';
	$XML=simplexml_load_file($File);

	$mysql = new MySQLConn(DATABASE_HOST, DATABASE_NAME, DATABASE_USER, DATABASE_PASS);
	$db = new JSONtoMYSQL($mysql);

//	$order_data = new \GreenCape\Xml\Converter($XML);



	$order_data = json_encode($XML);
	$decode_data = json_decode($order_data, true);

 	 $json = '{"name":"jack","school":"colorado state","city":"NJ","id":null}';// You can get it from database,or Request parameter like $_GET,$_POST or $_REQUEST or something :p
	 $json_array = json_decode($json);
	 echo ( $json_array["name"] );

	 echo $json_array["school"];
	 echo $json_array["city"];
	 echo $json_array["id"];

 //	print_r($order_data);
//	$jsArray = array("a"=>$order_data);

//	$db->saveRecursive($order_data, "ppxml");
//	$db->savePlus($order_data, "ppxml");

//	$errors         = array();      // array to hold validation errors
//    $data           = array();      // array to pass back data
//	$dbFunc          = new DB_Functions();
// 	$tokenArr        = $dbFunc->getAllTokens();
//
//
//	$productData = '{
//							 "product": {
//							"sku": "24-MB02",
//							"name": "TestProduct",
//							"attribute_set_id": 15,
//							"price": 43,
//							"status": 1,
//							"visibility": 4,
//							"type_id": "simple",
//							"weight": 1
//						}}';
//
//
//   foreach($tokenArr as $token){
////	   $MagCategory = new MagCategory($token['AccessToken'], REQUEST_URL);
////	   print_r(($MagCategory->AddCategory($body)));
////	   print_r(json_encode($MagCategory->GetCatagories()));
////	   $MagCategory->AddCategory($body);
//	   $MagProduct = new MagProduct($token['AccessToken'], REQUEST_URL);
//		print_r(($MagProduct->UplodProduct($productData)));
////		print_r(json_encode($MagProduct->GetProduct()));
//// 		$mgorder = new MagOrders($token['AccessToken'], REQUEST_URL);
//
//		//print_r($mgorder);
////		$order_data = $mgorder->Retrieve(1);
////		$db->saveRecursive($order_data, "orders");
//
//	}

