<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class StockStatuses extends RESTService{
		//Response Class (Status 200)
		public function Retrieve($Payload){
			if(empty($Payload['productSku'])){
				throw new Exception('productSku can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/stockStatuses/'.$Payload['productSku'];
			return $this->Execute($Payload);
		}
	}