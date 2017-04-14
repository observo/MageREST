<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Search extends RESTService{
		//Make Full Text Search and return found Documents
		public function Search($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/search';
			return $this->Execute($Payload);
		}
	}