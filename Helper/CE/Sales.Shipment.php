<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Shipment extends RESTService{
		//Loads a specified shipment.
		public function Retrieve($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/shipment/'.$Payload['id'];
			return $this->Execute($Payload);
		}
		//Lists shipments that match specified search criteria. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#ShipmentRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.
		public function RetrieveAll($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/shipments';
			return $this->Execute($Payload);
		}
		//Lists comments for a specified shipment.
		public function RetrieveAllComments($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/shipment/'.$Payload['id'].'/comments';
			return $this->Execute($Payload);
		}
		//Performs persist operations for a specified shipment comment.
		public function CreateComments($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/shipment/'.$Payload['id'].'/comments';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Emails user a specified shipment.
		public function CreateEmails($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/shipment/'.$Payload['id'].'/emails';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Performs persist operations for a specified shipment track.
		public function CreateTrack($Payload){
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/shipment/track';
			return $this->Execute($Payload);
		}
		//Deletes a specified shipment track by ID.
		public function RemoveTrack($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/shipment/track/'.$Payload['id'];
			return $this->Execute($Payload);
		}
		//Performs persist operations for a specified shipment.
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/shipment/';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Gets a specified shipment label. 
		public function RetrieveAllLabel($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/shipment/'.$Payload['id'].'/label';
			return $this->Execute($Payload);
		}
	}