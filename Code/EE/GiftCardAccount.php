<?php
	/*
	GiftCardAccount
	===============
	GET    /V1/carts/:quoteId/giftCards
	PUT    /V1/carts/:cartId/giftCards
	DELETE /V1/carts/:quoteId/giftCards/:giftCardCode
	POST   /V1/carts/mine/giftCards
	POST   /V1/carts/guest-carts/:cartId/giftCards
	GET    /V1/carts/guest-carts/:cartId/checkGiftCard/:giftCardCode
	GET    /V1/carts/mine/checkGiftCard/:giftCardCode
	*/
	class Carts{
		    
		function RetrieveAllGiftCards($Payload){
			if(empty($Payload['quoteId'])){
				throw new Exception('quoteId can not be empty.');
			}
			$Verb='GET';
			$URL='/V1/carts/'.$Payload['quoteId'].'/giftCards';
		};
		    
		function UpdateGiftCards($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['body'])){
				throw new Exception('body can not be empty.');
			}
			$Verb='PUT';
			$URL='/V1/carts/'.$Payload['cartId'].'/giftCards';
		};
		 
		function Remove($Payload){
			if(empty($Payload['quoteId'])){
				throw new Exception('quoteId can not be empty.');
			}
			if(empty($Payload['giftCardCode'])){
				throw new Exception('giftCardCode can not be empty.');
			}
			$Verb='DELETE';
			$URL='/V1/carts/'.$Payload['quoteId'].'/giftCards/'.$Payload['giftCardCode'];
		};
		   
		function CreateMineGiftCards($Payload){
			if(empty($Payload['body'])){
				throw new Exception('body can not be empty.');
			}
			$Verb='POST';
			$URL='/V1/carts/mine/giftCards';
		};
		   
		function CreateGuestCartsGiftCards($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['body'])){
				throw new Exception('body can not be empty.');
			}
			$Verb='POST';
			$URL='/V1/carts/guest-carts/'.$Payload['cartId'].'/giftCards';
		};
		    
		function RetrieveGuestCartsGiftCard($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['giftCardCode'])){
				throw new Exception('giftCardCode can not be empty.');
			}
			$Verb='GET';
			$URL='/V1/carts/guest-carts/'.$Payload['cartId'].'/checkGiftCard/'.$Payload['giftCardCode'];
		};
		    
		function RetrieveMineCheckCartsGiftCard($Payload){
			if(empty($Payload['giftCardCode'])){
				throw new Exception('giftCardCode can not be empty.');
			}
			$Verb='GET';
			$URL='/V1/carts/mine/checkGiftCard/'.$Payload['giftCardCode'];
		};
	}