<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Integration extends RESTService{
		//Create access token for admin given the admin credentials.
		public function AdminToken($Payload){
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/integration/admin/token';
			$AccessToken=$this->GetAccessToken($Payload);
			return $AccessToken;
		}
		//Create access token for admin given the customer credentials.
		public function CustomerToken($Payload){
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/integration/customer/token';
			$AccessToken=$this->GetAccessToken($Payload);
			return $AccessToken;
		}
	}
	