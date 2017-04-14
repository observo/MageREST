<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class GuestCarts extends RESTService{
		//Response Class (Status 200)  
		public function CreateShippingInformation($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/shipping-information';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Calculate quote totals based on address and shipping method.
		public function CreateTotalsInformation($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/totals-information';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Set payment information and place order for a specified cart.
		public function CreatePaymentInformation($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/payment-information';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Get payment information
		public function RetrieveAllPaymentInformation($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/payment-information';
			return $this->Execute($Payload);
		}
		//Set payment information for a specified cart. 
		public function SetPaymentInformation($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/set-payment-information';
			return $this->Execute($Payload);
		}
	}