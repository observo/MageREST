<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class GuestCarts extends RESTService{
		//Enable a guest user to return information for a specified cart.
		public function Retrieve($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'];
			return $this->Execute($Payload);
		}
		//Enable an customer or guest user to create an empty cart and quote for an anonymous customer.
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/guest-carts';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Assign a specified customer to a specified shopping cart.
		public function Update($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Place an order for a specified cart.
		public function UpdateOrder($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/order';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//List applicable shipping methods for a specified quote.
		public function RetrieveAllShippingMethods($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/shipping-methods';
			return $this->Execute($Payload);
		}
		//Estimate shipping by address and return list of available shipping methods
		public function CreateEstimateShippingMethods($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/estimate-shipping-methods';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//List items that are assigned to a specified cart. 
		public function RetrieveAllItems($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/items';
			return $this->Execute($Payload);
		}
		//Add the specified item to the specified cart.
		public function CreateItems($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/items';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Add the specified item to the specified cart.    
		public function UpdateItems($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['itemId'])){
				throw new Exception('itemId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/items/'.$Payload['itemId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Remove the specified item from the specified cart.
		public function RemoveItems($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['itemId'])){
				throw new Exception('itemId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/items/'.$Payload['itemId'];
			return $this->Execute($Payload);
		}
		//Return the payment method for a specified shopping cart.
		public function RetrieveAllSelectedPaymentMethod($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/selected-payment-method';
			return $this->Execute($Payload);
		}
		//Add a specified payment method to a specified shopping cart.
		public function UpdateSelectedPaymentMethod($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/selected-payment-method';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//List available payment methods for a specified shopping cart. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#GuestPaymentMethodManagementInterface to determine which call to use to get detailed information about all attributes for an object.
		public function RetrieveAllPaymentMethods($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/payment-methods';
			return $this->Execute($Payload);
		}
		//Return the billing address for a specified quote.
		public function RetrieveAllBillingAddress($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/billing-address';
			return $this->Execute($Payload);
		}
		//Assign a specified billing address to a specified cart.
		public function CreateBillingAddress($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/billing-address';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Return information for a coupon in a specified cart.  
		public function RetrieveAllCoupons($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/coupons';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Add a coupon by code to a specified cart. 
		public function UpdateCoupons($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['couponCode'])){
				throw new Exception('couponCode can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/coupons/'.$Payload['couponCode'];
			return $this->Execute($Payload);
		}
		//Delete a coupon from a specified cart.
		public function RemoveCoupons($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/coupons';
			return $this->Execute($Payload);
		}
		//Set shipping/billing methods and additional data for cart and collect totals for guest.
		public function UpdateCollectTotals($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/collect-totals';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Return quote totals data for a specified cart.
		public function RetrieveAllTotals($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/guest-carts/'.$Payload['cartId'].'/totals';
			return $this->Execute($Payload);
		}
	}