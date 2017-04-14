<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Products extends RESTService{
		//Create product
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Create(should be UPDATE) product
		public function Update($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/products/'.$Payload['sku'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Response Class (Status 200)
		public function Remove($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/'.$Payload['sku'];
			return $this->Execute($Payload);
		}
		//Get product list
		public function RetrieveAll($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products';
			return $this->Execute($Payload);
		}
		//Get info about product by product SKU
		public function Retrieve($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/'.$Payload['sku'];
			return $this->Execute($Payload);
		}
		//Retrieve list of product attribute types
		public function RetrieveAllAttributeTypes($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/attributes/types';
			return $this->Execute($Payload);
		}
		//Retrieve specific attribute 
		public function RetrieveAttributes($Payload){
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/attributes/'.$Payload['attributeCode'];
			return $this->Execute($Payload);
		}
		//Retrieve all attributes for entity type
		public function RetrieveAllAttributes($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/attributes';
			return $this->Execute($Payload);
		}
		//Save attribute data 
		public function CreateAttributes($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/attributes';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Save attribute data   
		public function UpdateAttributes($Payload){
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/products/attributes/'.$Payload['attributeCode'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Delete Attribute by id
		public function RemoveAttributes($Payload){
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/attributes/'.$Payload['attributeCode'];
			return $this->Execute($Payload);
		}
		//Retrieve available product types
		public function RetrieveAllTypes($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/types';
			return $this->Execute($Payload);
		}
		//Retrieve list of Attribute Sets    
		public function RetriveAllAttributeSetsSets($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/attribute-sets/sets/list';
			return $this->Execute($Payload);
		}
		//Retrieve attribute set information based on given ID
		public function RetriveAttributeSets($Payload){
			if(empty($Payload['attributeSetId'])){
				throw new Exception('attributeSetId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/attribute-sets/'.$Payload['attributeSetId'];
			return $this->Execute($Payload);
		}
		//Remove attribute set by given ID
		public function RemoveAttributeSets($Payload){
			if(empty($Payload['attributeSetId'])){
				throw new Exception('attributeSetId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/attribute-sets/'.$Payload['attributeSetId'];
			return $this->Execute($Payload);
		}
		//Create attribute set from data   
		public function CreateAttributeSets($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/attribute-sets';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Save attribute set data   
		public function UpdateAttributeSets($Payload){
			if(empty($Payload['attributeSetId'])){
				throw new Exception('attributeSetId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/products/attribute-sets/'.$Payload['attributeSetId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Retrieve related attributes based on given attribute set ID
		public function RetriveAllAttributeSetsAttributes($Payload){
			if(empty($Payload['attributeSetId'])){
				throw new Exception('attributeSetId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/attribute-sets/'.$Payload['attributeSetId'].'/attributes';
			return $this->Execute($Payload);
		}
		//Assign attribute to attribute set
		public function CreateAttributeSetsAttributes($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/attribute-sets/attributes';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Remove attribute from attribute set
		public function RemoveAttributeSetsAttributes($Payload){
			if(empty($Payload['attributeSetId'])){
				throw new Exception('attributeSetId can not be empty.');
			}
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/attribute-sets/'.$Payload['attributeSetId'].'/attributes/'.$Payload['attributeCode'];
			return $this->Execute($Payload);
		}
		//Retrieve list of attribute groups
		public function RetrieveAllAttributeSetsGroups($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/attribute-sets/groups/list';
			return $this->Execute($Payload);
		}
		//Save attribute group
		public function CreateAttributeSetsGroups($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/attribute-sets/groups';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Save attribute group
		public function UpdateAttributeSetsGroups($Payload){
			if(empty($Payload['attributeSetId'])){
				throw new Exception('attributeSetId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/products/attribute-sets/'.$Payload['attributeSetId'].'/groups';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Remove attribute group by id
		public function RemoveAttributeSetsGroups($Payload){
			if(empty($Payload['groupId'])){
				throw new Exception('groupId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/attribute-sets/groups/'.$Payload['groupId'];
			return $this->Execute($Payload);
		}
		//Retrieve list of attribute options
		public function RetrieveAllAttributesOptions($Payload){
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/attributes/'.$Payload['attributeCode'].'/options';
			return $this->Execute($Payload);
		}
		//Add option to attribute
		public function CreateAttributesOptions($Payload){
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/attributes/'.$Payload['attributeCode'].'/options';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Delete option from attribute
		public function RemoveAttributesOptions($Payload){
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			if(empty($Payload['optionId'])){
				throw new Exception('optionId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/attributes/'.$Payload['attributeCode'].'/options/'.$Payload['optionId'];
			return $this->Execute($Payload);
		}
		//Retrieve the list of media attributes (fronted input type is media_image) assigned to the given attribute set.
		public function RetriveMediaTypes($Payload){
			if(empty($Payload['attributeSetName'])){
				throw new Exception('attributeSetName can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/media/types/'.$Payload['attributeSetName'];
			return $this->Execute($Payload);
		}
		//Return information about gallery entry
		public function RetrieveMedia($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['entryId'])){
				throw new Exception('entryId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/media/'.$Payload['entryId'];
			return $this->Execute($Payload);
		}
		//Create new gallery entry
		public function CreateMedia($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/media';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Update gallery entry
		public function UpdateMedia($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['entryId'])){
				throw new Exception('entryId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/media/'.$Payload['entryId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Remove gallery entry
		public function RemoveMedia($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['entryId'])){
				throw new Exception('entryId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/media/'.$Payload['entryId'];
			return $this->Execute($Payload);
		}
		//Retrieve the list of gallery entries associated with given product
		public function RetrieveAllMedia($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/media';
			return $this->Execute($Payload);
		}
		//Get tier price of product
		public function RetrieveAllGroupPricesTiers($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['customerGroupId'])){
				throw new Exception('customerGroupId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/group-prices/'.$Payload['customerGroupId'].'/tiers';
			return $this->Execute($Payload);
		}
		//Create tier price for product  
		public function CreateGroupPricesTiersPrice($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['customerGroupId'])){
				throw new Exception('customerGroupId can not be empty.');
			}
			if(empty($Payload['qty'])){
				throw new Exception('qty can not be empty.');
			}
			if(empty($Payload['price'])){
				throw new Exception('price can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/group-prices/'.$Payload['customerGroupId'].'/tiers/'.$Payload['qty'].'/price/'.$Payload['price'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Remove tier price from product
		public function RemoveGroupPricesTiers($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['customerGroupId'])){
				throw new Exception('customerGroupId can not be empty.');
			}
			if(empty($Payload['qty'])){
				throw new Exception('qty can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/group-prices/'.$Payload['customerGroupId'].'/tiers/'.$Payload['qty'];
			return $this->Execute($Payload);
		}
		//Get custom option types
		public function RetrieveAllOptionsTypes($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/options/types';
			return $this->Execute($Payload);
		}
		//Get the list of custom options for a specific product
		public function RetrieveAllOptions($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/options';
			return $this->Execute($Payload);
		}
		//Get custom option for a specific product 
		public function RetrieveOptions($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['optionId'])){
				throw new Exception('optionId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/options/'.$Payload['optionId'];
			return $this->Execute($Payload);
		}
		//Save Custom Option
		public function CreateOptions($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/options';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Save Custom Option
		public function UpdateOptions($Payload){
			if(empty($Payload['optionId'])){
				throw new Exception('optionId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/products/options/'.$Payload['optionId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Response Class (Status 200)
		public function RemoveOptions($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['optionId'])){
				throw new Exception('optionId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/options/'.$Payload['optionId'];
			return $this->Execute($Payload);
		}
		//Retrieve information about available product link types
		public function RetrieveAllLinksTypes($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/links/types';
			return $this->Execute($Payload);
		}
		//Provide a list of the product link type attributes  
		public function RetrieveAllLinksAttributes($Payload){
			if(empty($Payload['type'])){
				throw new Exception('type can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/links/'.$Payload['type'].'/attributes';
			return $this->Execute($Payload);
		}
		//Provide the list of links for a specific product
		public function RetriveLinks($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['type'])){
				throw new Exception('type can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/links/'.$Payload['type'];
			return $this->Execute($Payload);
		}
		//Assign a product link to another product
		public function CreateLinks($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/links';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Response Class (Status 200)
		public function RemoveLinks($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['type'])){
				throw new Exception('type can not be empty.');
			}
			if(empty($Payload['linkedProductSku'])){
				throw new Exception('linkedProductSku can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/links/'.$Payload['type'].'/'.$Payload['linkedProductSku'];
			return $this->Execute($Payload);
		}
		//Save product link
		public function UpdateLinks($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/links';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Assign a product to the website
		public function CreateWebsites($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/websites';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Assign a product to the website
		public function UpdateWebsites($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/websites';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Remove the website assignment from the product by product sku
		public function RemoveWebsites($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['websiteId'])){
				throw new Exception('websiteId can not be empty.');
			}
			$Payload['Verb']='1DELETE';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/websites/'.$Payload['websiteId'];
			return $this->Execute($Payload);
		}
		//Response Class (Status 200)
		public function RetrieveStockItems($Payload){
			if(empty($Payload['productSku'])){
				throw new Exception('productSku can not be empty.');
			}
			if(empty($Payload['itemId'])){
				throw new Exception('itemId can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/products/'.$Payload['productSku'].'/stockItems/'.$Payload['itemId'];
			return $this->Execute($Payload);
		}
	}