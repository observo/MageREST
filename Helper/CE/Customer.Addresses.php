<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Addresses extends RESTService{
		//Delete customer address by ID.
		public function RemoveAddress($Payload){
			if(empty($Payload['addressId'])){
				throw new Exception('addressId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/addresses/'.$Payload['addressId'];
			return $this->Execute($Payload);
		}
	}