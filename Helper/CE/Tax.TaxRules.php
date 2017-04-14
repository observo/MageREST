<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class TaxRules extends RESTService{
		//Save TaxRule
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/taxRules';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Save TaxRule
		public function Update($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/taxRules';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Delete TaxRule
		public function Remove($Payload){
			if(empty($Payload['ruleId'])){
				throw new Exception('ruleId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/taxRules/'.$Payload['ruleId'];
			return $this->Execute($Payload);
		}
		//Get TaxRule
		public function Retrieve($Payload){
			if(empty($Payload['ruleId'])){
				throw new Exception('ruleId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/taxRules/'.$Payload['ruleId'];
			return $this->Execute($Payload);
		}
		//Search TaxRules This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#TaxRuleRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.
		public function Search($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/taxRules/search';
			return $this->Execute($Payload);
		}
	}