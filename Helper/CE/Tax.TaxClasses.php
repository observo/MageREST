<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class TaxClasses extends RESTService{
		//Create a Tax Class
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/taxClasses';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Get a tax class with the given tax class id.
		public function Retrieve($Payload){
			if(empty($Payload['taxClassId'])){
				throw new Exception('taxClassId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/taxClasses/'.$Payload['taxClassId'];
			return $this->Execute($Payload);
		}
		//Create a Tax Class
		public function Update($Payload){
			if(empty($Payload['classId'])){
				throw new Exception('classId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/taxClasses/'.$Payload['classId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Delete a tax class with the given tax class id.
		public function Remove($Payload){
			if(empty($Payload['taxClassId'])){
				throw new Exception('taxClassId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/taxClasses/'.$Payload['taxClassId'];
			return $this->Execute($Payload);
		}
		//Retrieve tax classes which match a specific criteria. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#TaxClassRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.
		public function Search($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/taxClasses/search';
			return $this->Execute($Payload);
		}
	}