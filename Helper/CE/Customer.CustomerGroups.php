<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class CustomerGroups extends RESTService{
		//Get customer group by group ID.   
		public function Retrieve($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customerGroups/'.$Payload['id'];
			return $this->Execute($Payload);
		}
		//Get default customer group.
		public function RetrieveDefaultByStore($Payload){
			if(empty($Payload['storeId'])){
				throw new Exception('storeId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customerGroups/default/'.$Payload['storeId'];
			return $this->Execute($Payload);
		}
		//Get default customer group.
		public function RetrieveAllDefault($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customerGroups/default';
			return $this->Execute($Payload);
		}
		//Check if customer group can be deleted.   
		public function RetrieveAllPermissions($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customerGroups/'.$Payload['id'].'/permissions';
			return $this->Execute($Payload);
		}
		//Retrieve customer groups. The list of groups can be filtered to exclude the NOT_LOGGED_IN group using the first parameter and/or it can be filtered by tax class. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#GroupRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.
		public function Search($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customerGroups/search';
			return $this->Execute($Payload);
		}
		//Save customer group.
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/customerGroups';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Save customer group.
		public function Update($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/customerGroups/'.$Payload['id'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Delete customer group by ID.
		public function Remove($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/customerGroups/'.$Payload['id'];
			return $this->Execute($Payload);
		}
	}