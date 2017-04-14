<?php
	/*
	GiftRegistry
	============
	POST   /V1/giftregistry/mine/estimate-shipping-methods
	POST   /V1/guest-giftregistry/:cartId/estimate-shipping-methods
	*/
	class GiftRegistry{
		   
		function CreateMineEstimateShippingMethods($Payload){
			if(empty($Payload['body'])){
				throw new Exception('body can not be empty.');
			}
			$Verb='POST';
			$URL='/V1/giftregistry/mine/estimate-shipping-methods';
		};		
	}
	class GuestGiftRegistry{
		   
		function CreateEstimateShippingMethods($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['body'])){
				throw new Exception('body can not be empty.');
			}
			$Verb='POST';
			$URL='/V1/guest-giftregistry/'.$Payload['cartId'].'/estimate-shipping-methods';
		};
	}