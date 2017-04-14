<?php
	/*
	Rma
	===
	POST   /V1/returns/:id/tracking-numbers
	DELETE /V1/returns/:id/tracking-numbers/:trackId
	GET    /V1/returns/:id
	DELETE /V1/returns/:id
	POST   /V1/returns/:id/comments
	POST   /V1/returns
	PUT    /V1/returns/:id
	GET    /V1/returns/:id/comments
	GET    /V1/returns
	GET    /V1/returnsAttributeMetadata/:attributeCode
	GET    /V1/returnsAttributeMetadata/form/:formCode
	GET    /V1/returnsAttributeMetadata
	GET    /V1/returnsAttributeMetadata/custom
	GET    /V1/returns/:id/tracking-numbers
	GET    /V1/returns/:id/labels
	*/
	class Returns{
		   
		function CreateTrackingNumbers($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['body'])){
				throw new Exception('body can not be empty.');
			}
			$Verb='POST';
			$URL='/V1/returns/'.$Payload['id'].'/tracking-numbers';
		};
		 
		function RemoveTrackingNumbers($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Verb='DELETE';
			$URL='/V1/returns/'.$Payload['id'].'/tracking-numbers/'.$Payload['trackId'];
		};
		    
		function Retrieve($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Verb='GET';
			$URL='/V1/returns/'.$Payload['id'];
		};
		 
		function Remove($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Verb='DELETE';
			$URL='/V1/returns/'.$Payload['id'];
		};
		   
		function CreateComments($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['body'])){
				throw new Exception('body can not be empty.');
			}
			$Verb='POST';
			$URL='/V1/returns/'.$Payload['id'].'/comments';
		};
		   
		function Create($Payload){
			if(empty($Payload['body'])){
				throw new Exception('body can not be empty.');
			}
			$Verb='POST';
			$URL='/V1/returns';
		};
		    
		function Update($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			if(empty($Payload['body'])){
				throw new Exception('body can not be empty.');
			}
			$Verb='PUT';
			$URL='/V1/returns/'.$Payload['id'];
		};
		    
		function RetrieveAllComments($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Verb='GET';
			$URL='/V1/returns/'.$Payload['id'].'/comments';
		};
		    
		function RetrieveAll($Payload){
			$Verb='GET';
			$URL='/V1/returns';
		};
		    
		function RetrieveAllTrackingNumbers($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Verb='GET';
			$URL='/V1/returns/'.$Payload['id'].'/tracking-numbers';
		};
		    
		function RetrieveAllLabels($Payload){
			if(empty($Payload['id'])){
				throw new Exception('id can not be empty.');
			}
			$Verb='GET';
			$URL='/V1/returns/'.$Payload['id'].'/labels';
		};
	}
	class ReturnsAttributeMetadata{
		    
		function Retrieve($Payload){
			if(empty($Payload['attributeCode'])){
				throw new Exception('attributeCode can not be empty.');
			}
			$Verb='GET';
			$URL='/V1/returnsAttributeMetadata/'.$Payload['attributeCode'];
		};
		    
		function RetrieveForm($Payload){
			if(empty($Payload['formCode'])){
				throw new Exception('formCode can not be empty.');
			}
			$Verb='GET';
			$URL='/V1/returnsAttributeMetadata/form/'.$Payload['formCode'];
		};
		    
		function RetrieveAll($Payload){
			$Verb='GET';
			$URL='/V1/returnsAttributeMetadata';
		};
		    
		function RetrieveAllCustom($Payload){
			$Verb='GET';
			$URL='/V1/returnsAttributeMetadata/custom';
		};
	}