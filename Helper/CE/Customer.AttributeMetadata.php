<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class AttributeMetadata extends RESTService{
		//Retrieve attribute metadata.
		public function RetrieveCustomerAttributeByAttribute($Payload){
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/attributeMetadata/customer/attribute/'.$Payload['attributeCode'];
			return $this->Execute($Payload);
		}
		//Retrieve all attributes filtered by form code
		public function RetrieveCustomerForm($Payload){
			if(empty($Payload['formCode'])){
				throw new Exception('formCode can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/attributeMetadata/customer/form/'.$Payload['formCode'];
			return $this->Execute($Payload);
		}
		//Get all attribute metadata.
		public function RetrieveAllCustomer($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/attributeMetadata/customer';
			return $this->Execute($Payload);
		}
		//Get custom attributes metadata for the given data interface.
		public function RetrieveAllCustomerCustom($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/attributeMetadata/customer/custom';
			return $this->Execute($Payload);
		}
		//Retrieve attribute metadata.
		public function RetrieveCustomerAddressAttribute($Payload){
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/attributeMetadata/customerAddress/attribute/'.$Payload['attributeCode'];
			return $this->Execute($Payload);
		}
		//Retrieve all attributes filtered by form code   
		public function RetrieveCustomerAddressForm($Payload){
			if(empty($Payload['formCode'])){
				throw new Exception('formCode can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/attributeMetadata/customerAddress/form/'.$Payload['formCode'];
			return $this->Execute($Payload);
		}
		//Get all attribute metadata.  
		public function RetrieveAllCustomerAddress($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/attributeMetadata/customerAddress';
			return $this->Execute($Payload);
		}
		//Get custom attributes metadata for the given data interface.
		public function RetrieveAllCustomerAddressCustom($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/attributeMetadata/customerAddress/custom';
			return $this->Execute($Payload);
		}
	}