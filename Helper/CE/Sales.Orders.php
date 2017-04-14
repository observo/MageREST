<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Orders extends RESTService{
		//Loads a specified order.    
		public function Retrieve($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/orders/'.$Payload['id'];
			return $this->Execute($Payload);
		}
		//Lists orders that match specified search criteria. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#OrderRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.   
		public function RetrieveAll($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/orders';
			return $this->Execute($Payload);
		}
		//Gets the status for a specified order.
		public function RetrieveAllStatuses($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/orders/'.$Payload['id'].'/statuses';
			return $this->Execute($Payload);
		}
		//Cancels a specified order.
		public function Cancel($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/orders/'.$Payload['id'].'/cancel';
			return $this->Execute($Payload);
		}
		//Emails a user a specified order.  
		public function CreateEmails($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/orders/'.$Payload['id'].'/emails';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Holds a specified order.
		public function Hold($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/orders/'.$Payload['id'].'/hold';
			return $this->Execute($Payload);
		}
		//Releases a specified order from hold status.  
		public function Unhold($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/orders/'.$Payload['id'].'/unhold';
			return $this->Execute($Payload);
		}
		//Adds a comment to a specified order.
		public function CreateComments($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/orders/'.$Payload['id'].'/comments';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Lists comments for a specified order.   
		public function RetrieveAllComments($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/orders/'.$Payload['id'].'/comments';
			return $this->Execute($Payload);
		}
		//Performs persist operations for a specified order.
		public function UpdateCreate($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/orders/create';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Performs persist operations for a specified order address.
		public function UpdateOrders($Payload){
			if(empty($Payload['parent_id'])){
				throw new Exception('parent_id can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/orders/'.$Payload['parent_id'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Loads a specified order item.
		public function RetrieveItems($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/orders/items/'.$Payload['id'];
			return $this->Execute($Payload);
		}
		//Lists order items that match specified search criteria. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#OrderItemRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.
		public function RetrieveAllItems($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/orders/items';
			return $this->Execute($Payload);
		}
		//Performs persist operations for a specified order.
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/orders/';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Response Class (Status 200)
		public function CreateInvoice($Payload){
			if(empty($Payload['orderId'])){
				throw new Exception('orderId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/order/'.$Payload['orderId'].'/invoice';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Creates new Shipment for given Order.
		public function Ship($Payload){
			if(empty($Payload['orderId'])){
				throw new Exception('orderId can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/order/'.$Payload['orderId'].'/ship';
			return $this->Execute($Payload);
		}
		//Create offline refund for order
		public function Refund($Payload){
			if(empty($Payload['orderId'])){
				throw new Exception('orderId can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/order/'.$Payload['orderId'].'/refund';
			return $this->Execute($Payload);
		}
	}