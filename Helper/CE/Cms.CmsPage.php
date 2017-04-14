<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class CmsPage extends RESTService{
		//Retrieve page.  
		public function Retrieve($Payload){
			if(empty($Payload['pageId'])){
				throw new Exception('pageid can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/cmsPage/'.$Payload['pageId'];
			return $this->Execute($Payload);
		}
		//Retrieve pages matching the specified criteria.
		public function Search($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/cmsPage/search';
			return $this->Execute($Payload);
		}
		//Save page.  
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/cmsPage';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Save page. 
		public function Update($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/cmsPage/'.$Payload['id'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Delete page by ID.
		public function Remove($Payload){
			if(empty($Payload['pageId'])){
				throw new Exception('pageid can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/cmsPage/'.$Payload['pageId'];
			return $this->Execute($Payload);
		}
	}