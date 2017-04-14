<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Backend extends RESTService{
		//Returns an array of enabled modules
		public function Modules(){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/modules';
			return $this->Execute($Payload);
		}
	}