<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Directory extends RESTService{
		//Get currency information for the store.
		public function RetrieveAllCurrency($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/directory/currency';
			return $this->Execute($Payload);
		}
		//Get all countries and regions information for the store. 
		public function RetrieveAllCountries($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/directory/countries';
			return $this->Execute($Payload);
		}
		//Get country and region information for the store.
		public function RetrieveCountries($Payload){
			if(empty($Payload['countryId'])){
				throw new Exception('countryId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/directory/countries/'.$Payload['countryId'];
			return $this->Execute($Payload);
		}
	}