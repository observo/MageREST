<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Customers extends RESTService{
		//Get customer by customer ID.
		public function Retrieve($Payload){
			if(empty($Payload['customerId'])){
				throw new Exception('customerId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customers/'.$Payload['customerId'];
			return $this->Execute($Payload);
		}
		//Create customer account. Perform necessary business operations like sending email.
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/customers';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Create or update a customer.    
		public function Update($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/customers/'.$Payload['id'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Create or update a customer.
		public function UpdateMe($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/customers/me';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Get customer by me.
		public function RetrieveAllMine($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customers/me';
			return $this->Execute($Payload);
		}
		//Activate a customer account using a key that was sent in a confirmation email.
		public function ActivateMe($Payload){
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/customers/me/activate';
			return $this->Execute($Payload);
		}
		//Retrieve customers which match a specified criteria. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#CustomerRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.
		public function Search($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customers/search';
			return $this->Execute($Payload);
		}
		//Activate a customer account using a key that was sent in a confirmation email.
		public function Activate($Payload){
			if(empty($Payload['email'])){
				throw new Exception('email can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/customers/'.$Payload['email'].'/activate';
			return $this->Execute($Payload);
		}
		//Change customer password. 
		public function UpdateMinePassword($Payload){
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/customers/me/password';
			return $this->Execute($Payload);
		}
		//Check if password reset token is valid.   
		public function RetrievePasswordResetLinkToken($Payload){
			if(empty($Payload['customerId'])){
				throw new Exception('customerId can not be empty.');
			}
			if(empty($Payload['resetPasswordLinkToken'])){
				throw new Exception('resetPasswordLinkToken can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customers/'.$Payload['customerId'].'/password/resetLinkToken/'.$Payload['resetPasswordLinkToken'];
			return $this->Execute($Payload);
		}
		//Send an email to the customer with a password reset link.
		public function UpdatePassword($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/customers/password';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Gets the account confirmation status.   
		public function RetrieveAllConfirm($Payload){
			if(empty($Payload['customerId'])){
				throw new Exception('customerId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customers/'.$Payload['customerId'].'/confirm';
			return $this->Execute($Payload);
		}
		//Resend confirmation email.
		public function Confirm($Payload){
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/customers/confirm';
			return $this->Execute($Payload);
		}
		//Validate customer data. 
		public function Validate($Payload){
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/customers/validate';
			return $this->Execute($Payload);
		}
		//Check if customer can be deleted.
		public function RetrieveAllPermissionsReadonly($Payload){
			if(empty($Payload['customerId'])){
				throw new Exception('customerId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customers/'.$Payload['customerId'].'/permissions/readonly';
			return $this->Execute($Payload);
		}
		//Delete customer by ID.
		public function RemoveCustomer($Payload){
			if(empty($Payload['customerId'])){
				throw new Exception('customerId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/customers/'.$Payload['customerId'];
			return $this->Execute($Payload);
		}
		//Check if given email is associated with a customer account in given website.
		public function CreateIsEmailAvailable($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/customers/isEmailAvailable';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Retrieve customer address.
		public function RetrieveAddresses($Payload){
			if(empty($Payload['addressId'])){
				throw new Exception('addressId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customers/addresses/'.$Payload['addressId'];
			return $this->Execute($Payload);
		}
		//Retrieve default billing address for the given customerId.  
		public function RetrieveAllMineBillingAddress($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customers/me/billingAddress';
			return $this->Execute($Payload);
		}
		//Retrieve default billing address for the given customerId.
		public function RetrieveAllBillingAddress($Payload){
			if(empty($Payload['customerId'])){
				throw new Exception('customerId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customers/'.$Payload['customerId'].'/billingAddress';
			return $this->Execute($Payload);
		}
		//Retrieve default shipping address for the given customerId.
		public function RetrieveAllMineShippingAddress($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customers/me/shippingAddress';
			return $this->Execute($Payload);
		}
		//Retrieve default shipping address for the given customerId.
		public function RetrieveAllShippingAddress($Payload){
			if(empty($Payload['customerId'])){
				throw new Exception('customerId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/customers/'.$Payload['customerId'].'/shippingAddress';
			return $this->Execute($Payload);
		}
	}