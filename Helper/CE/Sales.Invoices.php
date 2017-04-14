<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Invoices extends RESTService{
		//Loads a specified invoice.
		public function Retrieve($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/invoices/'.$Payload['id'];
			return $this->Execute($Payload);
		}
		//Lists invoices that match specified search criteria. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#InvoiceRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.
		public function RetrieveAll($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/invoices';
			return $this->Execute($Payload);
		}
		//Lists comments for a specified invoice.
		public function RetrieveAllComments($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/invoices/'.$Payload['id'].'/comments';
			return $this->Execute($Payload);
		}
		//Emails a user a specified invoice.
		public function CreateEmails($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/invoices/'.$Payload['id'].'/emails';
			return $this->Execute($Payload);
		}
		//Voids a specified invoice.
		public function Invalidate($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/invoices/'.$Payload['id'].'/void';
			return $this->Execute($Payload);
		}
		//Sets invoice capture. 
		public function Capture($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/invoices/'.$Payload['id'].'/capture';
			return $this->Execute($Payload);
		}
		//Performs persist operations for a specified invoice comment.
		public function CreateComments($Payload){
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/invoices/comments';
			return $this->Execute($Payload);
		}
		//Performs persist operations for a specified invoice.
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/invoices/';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Create refund for invoice
		public function Refund($Payload){
			if(empty($Payload['invoiceId'])){
				throw new Exception('invoiceId can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/invoice/'.$Payload['invoiceId'].'/refund';
			return $this->Execute($Payload);
		}
	}