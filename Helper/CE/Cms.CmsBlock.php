<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class CmsBlock extends RESTService{
		
		//Retrieve block.
		public function Retrieve($Payload){
			if(empty($Payload['blockId'])){
				throw new Exception('blockId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/cmsBlock/'.$Payload['blockId'];
			return $this->Execute($Payload);
		}
		//Retrieve blocks matching the specified criteria.   
		public function Search($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/cmsBlock/search';
			return $this->Execute($Payload);
		}
		//Save block.
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/cmsBlock';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Save block.
		public function Update($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/cmsBlock/'.$Payload['id'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Delete block by ID.
		public function Remove($Payload){
			if(empty($Payload['blockId'])){
				throw new Exception('blockId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/cmsBlock/'.$Payload['blockId'];
			return $this->Execute($Payload);
		}
	}