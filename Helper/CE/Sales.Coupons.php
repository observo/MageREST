<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../RESTService.php');
	
	class Coupons extends RESTService{
		//Get coupon by coupon id.
		public function Retrieve($Payload){
			if(empty($Payload['couponId'])){
				throw new Exception('couponId can not be empty.');
			}
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/coupons/'.$Payload['couponId'];
			return $this->Execute($Payload);
		}
		//Retrieve a coupon using the specified search criteria. This call returns an array of objects, but detailed information about each object’s attributes might not be included. See http://devdocs.magento.com/codelinks/attributes.html#CouponRepositoryInterface to determine which call to use to get detailed information about all attributes for an object.
		public function Search($Payload){
			$Payload['Verb']='GET';
			$Payload['URL']='/V1/coupons/search';
			return $this->Execute($Payload);
		}
		//Save a coupon.
		public function Create($Payload){
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/coupons';
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Save a coupon.
		public function Update($Payload){
			if(empty($Payload['couponId'])){
				throw new Exception('couponId can not be empty.');
			}
			if(empty($Payload['Body'])){
				throw new Exception('body can not be empty.');
			}
			$Payload['Verb']='PUT';
			$Payload['URL']='/V1/coupons/'.$Payload['couponId'];
			$Payload['Body']=json_encode($Payload['Body']);
			return $this->Execute($Payload);
		}
		//Delete coupon by coupon id.
		public function Remove($Payload){
			if(empty($Payload['couponId'])){
				throw new Exception('couponId can not be empty.');
			}
			$Payload['Verb']='DELETE';
			$Payload['URL']='/V1/coupons/'.$Payload['couponId'];
			return $this->Execute($Payload);
		}
		//Generate coupon for a rule   
		public function Generate($Payload){
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/coupons/generate';
			return $this->Execute($Payload);
		}
		//Delete coupon by coupon ids.
		public function DeleteByIds($Payload){
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/coupons/deleteByIds';
			return $this->Execute($Payload);
		}
		//Delete coupon by coupon codes.
		public function DeleteByCodes($Payload){
			$Payload['Verb']='POST';
			$Payload['URL']='/V1/coupons/deleteByCodes';
			return $this->Execute($Payload);
		}
	}