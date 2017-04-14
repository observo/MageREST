<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Carts{
		//Enables an administrative user to return information for a specified cart.
		public function Retrieve($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'];
			return $this->Execute($Payload);
		}
		//Enables administrative users to list carts that match specified search criteria. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#CartRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.  
		public function Search($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/search';
			return $this->Execute($Payload);
		}
		//Creates an empty cart and quote for a guest.
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Assigns a specified customer to a specified shopping cart.
		public function Update($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Creates an empty cart and quote for a specified customer.
		public function CreateMine($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/mine';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Returns information for the cart for a specified customer.   
		public function RetrieveAllMine($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/mine';
			return $this->Execute($Payload);
		}
		//Save quote
		public function UpdateMine($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/carts/mine';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Places an order for a specified cart. 
		public function UpdateMineOrder($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/carts/mine/order';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Lists items that are assigned to a specified cart.
		public function RetrieveAllItemsByCartId($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/items';
			return $this->Execute($Payload);
		}
		//Add/update the specified cart item.
		public function CreateItemsByQuoteId($Payload){
			if(empty($Payload['quoteId'])){
				throw new Exception('quoteId can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/'.$Payload['quoteId'].'/items';
			return $this->Execute($Payload);
		}
		//Add/update the specified cart item.
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
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/items/'.$Payload['itemId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Removes the specified item from the specified cart.
		public function RemoveItems($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['itemId'])){
				throw new Exception('itemId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/items/'.$Payload['itemId'];
			return $this->Execute($Payload);
		}
		//Lists items that are assigned to a specified cart.
		public function RetrieveAllMineItems($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/mine/items';
			return $this->Execute($Payload);
		}
		//Add/update the specified cart item.
		public function CreateMineItems($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/mine/items';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Add/update the specified cart item.
		public function UpdateMineItems($Payload){
			if(empty($Payload['itemId'])){
				throw new Exception('itemId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/carts/mine/items/'.$Payload['itemId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Removes the specified item from the specified cart.
		public function RemoveMineItems($Payload){
			if(empty($Payload['itemId'])){
				throw new Exception('itemId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/carts/mine/items/'.$Payload['itemId'];
			return $this->Execute($Payload);
		}
		//Returns the payment method for a specified shopping cart.
		public function RetrieveAllSelectedPaymentMethod($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/selected-payment-method';
			return $this->Execute($Payload);
		}
		//Adds a specified payment method to a specified shopping cart. 
		public function UpdateSelectedPaymentMethod($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/selected-payment-method';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Lists available payment methods for a specified shopping cart. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#PaymentMethodManagementInterface to determine which call to use to get detailed information about all attributes for an object. 
		public function RetrieveAllPaymentMethods($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/payment-methods';
			return $this->Execute($Payload);
		}
		//Returns the payment method for a specified shopping cart.
		public function RetrieveAllMineSelectedPaymentMethod($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/mine/selected-payment-method';
			return $this->Execute($Payload);
		}
		//Adds a specified payment method to a specified shopping cart.  
		public function UpdateMineSelectedPaymentMethod($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/carts/mine/selected-payment-method';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Lists available payment methods for a specified shopping cart. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#PaymentMethodManagementInterface to determine which call to use to get detailed information about all attributes for an object.   
		public function RetrieveAllMinePaymentMethods($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/mine/payment-methods';
			return $this->Execute($Payload);
		}
		//Returns the billing address for a specified quote.
		public function RetrieveAllBillingAddress($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/billing-address';
			return $this->Execute($Payload);
		}
		//Assigns a specified billing address to a specified cart.
		public function CreateBillingAddress($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/billing-address';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Returns the billing address for a specified quote.
		public function RetrieveAllMineBillingAddress($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/mine/billing-address';
			return $this->Execute($Payload);
		}
		//Assigns a specified billing address to a specified cart. 
		public function CreateMineBillingAddress($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/mine/billing-address';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Returns information for a coupon in a specified cart.
		public function RetrieveAllCoupons($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/coupons';
			return $this->Execute($Payload);
		}
		//Adds a coupon by code to a specified cart.
		public function UpdateCoupons($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['couponCode'])){
				throw new Exception('couponCode can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/coupons/'.$Payload['couponCode'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Deletes a coupon from a specified cart.
		public function RemoveCoupons($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/coupons';
			return $this->Execute($Payload);
		}
		//Returns information for a coupon in a specified cart.
		public function RetrieveAllMineCoupons($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/mine/coupons';
			return $this->Execute($Payload);
		}
		//Adds a coupon by code to a specified cart.
		public function UpdateMineCoupons($Payload){
			if(empty($Payload['couponCode'])){
				throw new Exception('couponCode can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/carts/mine/coupons/'.$Payload['couponCode'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Deletes a coupon from a specified cart.
		public function RemoveAllMineCoupons($Payload){
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/carts/mine/coupons';
			return $this->Execute($Payload);
		}
		//Places an order for a specified cart.
		public function UpdateOrder($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/order';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Returns quote totals data for a specified cart.
		public function RetrieveTotals($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/totals';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Returns quote totals data for a specified cart.   
		public function RetrieveAllMineTotals($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/mine/totals';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Set shipping/billing methods and additional data for cart and collect totals.  
		public function UpdateMineCollectTotals($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/carts/mine/collect-totals';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Lists applicable shipping methods for a specified quote.
		public function RetrieveAllShippingMethods($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/shipping-methods';
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
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/estimate-shipping-methods';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Estimate shipping
		public function CreateEstimateShippingMethodsByAddressId($Payload){
			if(empty($Payload['cartId'])){
				throw new Exception('cartId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/'.$Payload['cartId'].'/estimate-shipping-methods-by-address-id';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Lists applicable shipping methods for a specified quote.   
		public function RetrieveAllMineShippingMethods($Payload){
			$Verb='GET';
			$URL='/V1/carts/mine/shipping-methods';
			return $this->Execute($Payload);
		}
		//Estimate shipping by address and return list of available shipping methods
		public function CreateMineEstimateShippingMethods($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/mine/estimate-shipping-methods';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Estimate shipping
		public function CreateMineEstimateShippingMethodsByAddressId($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/carts/mine/estimate-shipping-methods-by-address-id';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
	}