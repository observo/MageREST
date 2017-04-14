<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Categories extends RESTService{
		//Retrieve specific attribute
		public function RetriveAttributes($Payload){
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/categories/attributes/'.$Payload['attributeCode'];
			return $this->Execute($Payload);
		}
		//Retrieve all attributes for entity type
		public function RetriveAllAttributes($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/categories/attributes';
			return $this->Execute($Payload);
		}
		//Retrieve list of attribute options
		public function RetrieveAllAttributesOptions($Payload){
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/categories/attributes/'.$Payload['attributeCode'].'/options';
			return $this->Execute($Payload);
		}
		//Delete category by identifier
		public function Remove($Payload){
			if(empty($Payload['categoryId'])){
				throw new Exception('categoryId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/categories/'.$Payload['categoryId'];
			return $this->Execute($Payload);
		}
		//Get info about category by category id
		public function Retrieve($Payload){
			if(empty($Payload['categoryId'])){
				throw new Exception('categoryId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/categories/'.$Payload['categoryId'];
			return $this->Execute($Payload);
		}
		//Create category service
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/categories';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Retrieve list of categories
		public function RetrieveAll($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/categories';
			return $this->Execute($Payload);
		}
		//Create category service  
		public function Update($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/categories/'.$Payload['id'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Move category
		public function Move($Payload){
			if(empty($Payload['categoryId'])){
				throw new Exception('categoryId can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/categories/'.$Payload['categoryId'].'/move';
			return $this->Execute($Payload);
		}
		//Get products assigned to category
		public function RetrieveAllProducts($Payload){
			if(empty($Payload['categoryId'])){
				throw new Exception('categoryId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/categories/'.$Payload['categoryId'].'/products';
			return $this->Execute($Payload);
		}
		//Assign a product to the required category
		public function CreateProducts($Payload){
			if(empty($Payload['categoryId'])){
				throw new Exception('categoryId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/categories/'.$Payload['categoryId'].'/products';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Assign a product to the required category
		public function UpdateProducts($Payload){
			if(empty($Payload['categoryId'])){
				throw new Exception('categoryId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/categories/'.$Payload['categoryId'].'/products';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Remove the product assignment from the category by category id and sku
		public function RemoveProducts($Payload){
			if(empty($Payload['categoryId'])){
				throw new Exception('categoryId can not be empty.');
			}
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/categories/'.$Payload['categoryId'].'/products/'.$Payload['sku'];
			return $this->Execute($Payload);
		}
	}