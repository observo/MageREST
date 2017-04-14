<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Transactions extends RESTService{
		//Loads a specified transaction.  
		public function Retrieve($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/transactions/'.$Payload['id'];
			return $this->Execute($Payload);
		}
		//Lists transactions that match specified search criteria. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#TransactionRepositoryInterface to determine which call to use to get detailed information about all attributes for an object. 
		public function RetrieveAll($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/transactions';
			return $this->Execute($Payload);
		}
	}