<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class StockItems extends RESTService{
		//Response Class (Status 200)   
		public function Retrieve($Payload){
			if(empty($Payload['productSku'])){
				throw new Exception('productSku can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/stockItems/'.$Payload['productSku'];
			return $this->Execute($Payload);
		}
		//Retrieves a list of SKU's with low inventory qty 
		public function RetrieveAllLowStock($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/stockItems/lowStock/';
			return $this->Execute($Payload);
		}
	}