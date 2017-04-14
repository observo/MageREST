<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Eav extends RESTService{
		//Retrieve list of Attribute Sets This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#AttributeSetRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.
		public function RetriveAllAttributeSets($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/eav/attribute-sets/list';
			return $this->Execute($Payload);
		}
		//Retrieve attribute set information based on given ID
		public function RetriveAttributeSets($Payload){
			if(empty($Payload['attributeSetId'])){
				throw new Exception('attributeSetId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/eav/attribute-sets/'.$Payload['attributeSetId'];
			return $this->Execute($Payload);
		}
		//Remove attribute set by given ID		 
		public function RemoveAttributeSets($Payload){
			if(empty($Payload['attributeSetId'])){
				throw new Exception('attributeSetId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/eav/attribute-sets/'.$Payload['attributeSetId'];
			return $this->Execute($Payload);
		}
		//Create attribute set from data
		public function CreateAttributeSets($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/eav/attribute-sets';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Save attribute set data  
		public function UpdateAttributeSets($Payload){
			if(empty($Payload['attributeSetId'])){
				throw new Exception('attributeSetId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/eav/attribute-sets/'.$Payload['attributeSetId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
	}