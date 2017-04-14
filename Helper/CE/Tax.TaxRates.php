<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class TaxRates extends RESTService{
		//Create or update tax rate
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/taxRates';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Get tax rate
		public function Retrieve($Payload){
			if(empty($Payload['rateId'])){
				throw new Exception('rateId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/taxRates/'.$Payload['rateId'];
			return $this->Execute($Payload);
		}
		//Create or update tax rate
		public function Update($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/taxRates';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Delete tax rate
		public function Remove($Payload){
			if(empty($Payload['rateId'])){
				throw new Exception('rateId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/taxRates/'.$Payload['rateId'];
			return $this->Execute($Payload);
		}
		//Search TaxRates This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#TaxRateRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.
		public function Search($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/taxRates/search';
			return $this->Execute($Payload);
		}
	}