<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class BundleProducts extends RESTService{
		//Add child product to specified Bundle option by product sku
		public function CreateLinks($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['optionId'])){
				throw new Exception('optionId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/bundle-products/'.$Payload['sku'].'/links/'.$Payload['optionId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Response Class (Status 200)
		public function UpdateLinks($Payload){
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
			$Payload['URL']='/V1/bundle-products/'.$Payload['sku'].'/links/'.$Payload['id'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Get all children for Bundle product
		public function RetriveAllChildren($Payload){
			if(empty($Payload['productSku'])){
				throw new Exception('productSku can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/bundle-products/'.$Payload['productSku'].'/children';
			return $this->Execute($Payload);
		}
		//Remove product from Bundle product option
		public function RemoveOptionsChildren($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['optionId'])){
				throw new Exception('optionId can not be empty.');
			}
			if(empty($Payload['childSku'])){
				throw new Exception('childSku can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/bundle-products/'.$Payload['sku'].'/options/'.$Payload['optionId'].'/children/'.$Payload['childSku'];
			return $this->Execute($Payload);
		}
		//Get all options for bundle product  
		public function RetrieveAllOptionsAll($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/bundle-products/'.$Payload['sku'].'/options/all';
			return $this->Execute($Payload);
		}
		//Get all types for options for bundle products   
		public function RetrieveAllOptionsTypes($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/bundle-products/options/types';
			return $this->Execute($Payload);
		}
		//Get option for bundle product   
		public function RetrieveOptions($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['optionId'])){
				throw new Exception('optionId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/bundle-products/'.$Payload['sku'].'/options/'.$Payload['optionId'];
			return $this->Execute($Payload);
		}
		//Add new option for bundle product 
		public function CreateOptionsAdd($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/bundle-products/options/add';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Add new option for bundle product    
		public function UpdateOptions($Payload){
			if(empty($Payload['optionId'])){
				throw new Exception('optionId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/bundle-products/options/'.$Payload['optionId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Remove bundle option
		public function RemoveOptions($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['optionId'])){
				throw new Exception('optionId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/bundle-products/'.$Payload['sku'].'/options/'.$Payload['optionId'];
			return $this->Execute($Payload);
		}
	}