<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Customers extends RESTService{
		//Creates an empty cart and quote for a specified customer.
		public function CreateCarts($Payload){
			if(empty($Payload['customerId'])){
				throw new Exception('customerId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/customers/'.$Payload['customerId'].'/carts';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
	}