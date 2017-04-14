<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Products extends RESTService{
		//List of links with associated samples 
		public function RetrieveAllDownloadableLinks($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/downloadable-links';
			return $this->Execute($Payload);
		}
		//List of samples for downloadable product
		public function RetrieveAllDownloadableLinksSamples($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/downloadable-links/samples';
			return $this->Execute($Payload);
		}
		//Update downloadable link of the given product (link type and its resources cannot be changed)
		public function CreateDownloadableLinks($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/downloadable-links';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Update downloadable link of the given product (link type and its resources cannot be changed)
		public function UpdateDownloadableLinks($Payload){
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
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/downloadable-links/'.$Payload['id'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Delete downloadable link 
		public function RemoveDownloadableLinks($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/downloadable-links/'.$Payload['id'];
			return $this->Execute($Payload);
		}
		//Update downloadable sample of the given product
		public function CreateDownloadableLinksSamples($Payload){
			if(empty($Payload['sku'])){
				throw new Exception('sku can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/downloadable-links/samples';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Update downloadable sample of the given product
		public function UpdateDownloadableLinksSamples($Payload){
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
			$Payload['URL']='/V1/products/'.$Payload['sku'].'/downloadable-links/samples/'.$Payload['id'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Delete downloadable sample
		public function RemoveDownloadableLinksSamples($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/products/downloadable-links/samples/'.$Payload['id'];
			return $this->Execute($Payload);
		}
	}