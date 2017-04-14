<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Store extends RESTService{
		//Retrieve list of all stores
		public function RetrieveAllStoreViews($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/store/storeViews';
			return $this->Execute($Payload);
		}
		//Retrieve list of all groups  
		public function RetrieveAllStoreGroups($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/store/storeGroups';
			return $this->Execute($Payload);
		}
		//Retrieve list of all websites
		public function RetrieveAllWebsites($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/store/websites';
			return $this->Execute($Payload);
		}
		//Response Class (Status 200)
		public function RetrieveAllStoreConfigs($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/store/storeConfigs';
			return $this->Execute($Payload);
		}
	}