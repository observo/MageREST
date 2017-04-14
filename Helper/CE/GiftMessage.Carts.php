<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Carts extends RESTService{
		//Return the gift message for a specified order.
		public function RetrieveAllGiftMessage($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/gift-message';
			return $this->Execute($Payload);
		}
		//Return the gift message for a specified item in a specified shopping cart.
		public function RetrieveGiftMessageItem($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['itemId'])){
				throw new Exception('itemId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/gift-message/'.$Payload['itemId'];
			return $this->Execute($Payload);
		}
		//Set the gift message for an entire order.
		public function CreateGiftMessage($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/gift-message';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Set the gift message for a specified item in a specified shopping cart.
		public function CreateGiftMessageItem($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['itemId'])){
				throw new Exception('itemId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/gift-message/'.$Payload['itemId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Return the gift message for a specified order.
		public function RetrieveMineAllGiftMessage($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/mine/gift-message';
			return $this->Execute($Payload);
		}
		//Return the gift message for a specified item in a specified shopping cart.
		public function RetrieveMineGiftMessageItem($Payload){
			if(empty($Payload['itemId'])){
				throw new Exception('itemId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/mine/gift-message/'.$Payload['itemId'];
			return $this->Execute($Payload);
		}
		//Set the gift message for an entire order.
		public function CreateMineGiftMessage($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/mine/gift-message';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Set the gift message for a specified item in a specified shopping cart.
		public function CreateMineGiftMessageItem($Payload){
			if(empty($Payload['itemId'])){
				throw new Exception('itemId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/mine/gift-message/'.$Payload['itemId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
	}