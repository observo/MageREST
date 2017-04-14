<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Carts extends RESTService{
		//Lists active checkout agreements.
		public function RetrieveAllLicense($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/licence';
			return $this->Execute($Payload);
		}
		//Response Class (Status 200)
		public function CreateMineShippingInformation($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/mine/shipping-information';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Response Class (Status 200)
		public function CreateShippingInformation($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/shipping-information';
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
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/totals-information';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Calculate quote totals based on address and shipping method.   
		public function CreateMineTotalsInformation($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/mine/totals-information';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Get payment information
		public function RetriveAllMinePaymentInformation($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/mine/payment-information';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Set payment information and place order for a specified cart.
		public function CreateMinePaymentInformation($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/mine/payment-information';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Set payment information for a specified cart.
		public function SetMinePaymentInformation($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/mine/set-payment-information';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
	}