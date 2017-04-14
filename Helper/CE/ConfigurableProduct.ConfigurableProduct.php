<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class ConfigurableProduct extends RESTService{
		//Get all children for Configurable product  
		public function RetrieveAllChildren($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/configurable-products/'.$Payload['sku'].'/children';
			return $this->Execute($Payload);
		}
		//Remove configurable product option
		public function RemoveChildren($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['childSku'])){
				throw new Exception('childSku can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/configurable-products/'.$Payload['sku'].'/children/'.$Payload['childSku'];
			return $this->Execute($Payload);
		}
		//Generate variation based on same product    
		public function UpdateVariation($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/configurable-products/variation';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Response Class (Status 200)   
		public function CreateChild($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/configurable-products/'.$Payload['sku'].'/child';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Get option for configurable product   
		public function RetrieveOptions($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/configurable-products/'.$Payload['sku'].'/options/'.$Payload['id'];
			return $this->Execute($Payload);
		}
		//Get all options for configurable product    
		public function RetrieveAllOptionsAll($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/configurable-products/'.$Payload['sku'].'/options/all';
			return $this->Execute($Payload);
		}
		//Save option 
		public function CreateOptions($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/configurable-products/'.$Payload['sku'].'/options';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Save option    
		public function UpdateOptions($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/configurable-products/'.$Payload['sku'].'/options/'.$Payload['id'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Remove option from configurable product
		public function RemoveOptions($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/configurable-products/'.$Payload['sku'].'/options/'.$Payload['id'];
			return $this->Execute($Payload);
		}
	}