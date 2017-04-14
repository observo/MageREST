<?php
	require_once(__DIR__.'/../../../Config/Config.php');
    require_once(__DIR__.'/../../../Helper/class.curl.php');
	require_once(__DIR__.'/../../../Helper/class.db.php');	
	require_once(__DIR__.'/../../../Helper/include.classloader.php');   
//	require_once(__DIR__.'/../../../Helper/MagentoAPI/class.MagOrder.php');
//	require_once(__DIR__.'/../../../Helper/MagentoAPI/class.MagProduct.php');
	require_once(__DIR__.'/../../../Helper/MagentoAPI/class.MagCategory.php');

	$classLoader->addToClasspath(ROOT);
    $mysql = new MySQLConn(DATABASE_HOST, DATABASE_NAME, DATABASE_USER, DATABASE_PASS);
	$db = new JSONtoMYSQL($mysql);
	$errors         = array();      // array to hold validation errors
    $data           = array();      // array to pass back data
	$dbFunc          = new DB_Functions();
 	$tokenArr        = $dbFunc->getAllTokens();


//	$body = '{
//			  "product": {
//				"id": 0,
//				"sku": "AAAA",
//				"name": "BBBBB",
//				"attribute_set_id": 0,
//				"price": 36,
//				"status": 0,
//				"visibility": 1,
//				"type_id": "TEST",
//				"created_at": "2017-02-1",
//				"updated_at": "2017-03-7",
//				"weight": 0
//			  },
//			  "saveOptions": true
//			}';

	/*$body = '{
			  "category": {
				"id": 45,
				"parent_id": 42,
				"name": "CategoryTest",
				"is_active": true,
				"position": 2,
				"level": 4
			  }

			}';
	*/		
	$body = '{
			  "category": {				
				"parent_id": 42,
				"name": "CategoryTest",
				"is_active": true,
				"position": 2,
				"level": 4
			  }

			}';

   foreach($tokenArr as $token){
	   $MagCategory = new MagCategory($token['AccessToken'], REQUEST_URL);
	   print_r(($MagCategory->AddCategory($body)));
	   print_r(json_encode($MagCategory->GetCatagories()));
//	   $MagCategory->AddCategory($body);
//	   $MagProduct = new MagProduct($token['AccessToken'], REQUEST_URL);
//		$MagProduct->UplodProduct($body);
// 		$mgorder = new MagOrders($token['AccessToken'], REQUEST_URL);

		//print_r($mgorder);
//		$order_data = $mgorder->Retrieve(1);
//		$db->saveRecursive($order_data, "orders");

	}

