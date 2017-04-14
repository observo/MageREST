<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Creditmemo extends RESTService{
		//Lists comments for a specified credit memo.
		public function RetrieveAllComments($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/creditmemo/'.$Payload['id'].'/comments';
			return $this->Execute($Payload);
		}
		//Lists credit memos that match specified search criteria. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#CreditmemoRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.
		public function RetrieveAll($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/creditmemos';
			return $this->Execute($Payload);
		}
		//Loads a specified credit memo.
		public function Retrieve($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/creditmemo/'.$Payload['id'];
			return $this->Execute($Payload);
		}
		//Cancels a specified credit memo.   
		public function Update($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/creditmemo/'.$Payload['id'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Emails a user a specified credit memo.
		public function CreateEmails($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/creditmemo/'.$Payload['id'].'/emails';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Prepare creditmemo to refund and save it.
		public function Refund($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/creditmemo/refund';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Performs persist operations for a specified entity.
		public function CreateComments($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/creditmemo/'.$Payload['id'].'/comments';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Performs persist operations for a specified credit memo.
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/creditmemo';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
	}