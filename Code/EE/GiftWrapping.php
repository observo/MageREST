<?php
	/*
	GiftWrapping
	============
	GET    /V1/gift-wrappings/:id
	POST   /V1/gift-wrappings
	PUT    /V1/gift-wrappings/:wrappingId
	GET    /V1/gift-wrappings
	DELETE /V1/gift-wrappings/:id
	*/
	class GiftWrapping{
		    
		function Retrieve($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Verb='GET';
			$URL='/V1/gift-wrappings/'.$Payload['id'];
		};
		   
		function Create($Payload){
			if(empty($Payload['body'])){
				throw new Exception('body can not be empty.');
			}
			$Verb='POST';
			$URL='/V1/gift-wrappings';
		};
		    
		function Update($Payload){
			if(empty($Payload['wrappingId'])){
				throw new Exception('wrappingId can not be empty.');
			}
			if(empty($Payload['body'])){
				throw new Exception('body can not be empty.');
			}
			$Verb='PUT';
			$URL='/V1/gift-wrappings/'.$Payload['wrappingId'];
		};
		    
		function RetrieveAll($Payload){
			$Verb='GET';
			$URL='/V1/gift-wrappings';
		};
		 
		function Remove($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Verb='DELETE';
			$URL='/V1/gift-wrappings/'.$Payload['id'];
		};
	}