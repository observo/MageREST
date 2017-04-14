<?php
	//REQUIRED FILES
	require_once(__DIR__.'/../vendor/autoload.php');
		
	class RESTService{
		public function GetAccessToken($Payload){
			$RequestURL=$Payload['Config']['site']['base_url'].$Payload['URL'];
			$Client= new GuzzleHttp\Client();
			$Result= $Client->request($Payload['Verb'],$RequestURL,['json'=>$Payload['Login']]);
			$Response= $Result->getBody();
			$Response= json_decode($Response, true);
			return ($Response);
		}
	
		public function Execute($Payload){
			if(isset($Payload['PageSize']) && !empty($Payload['PageSize'])){
				$Result=$this->FilteredList($Payload);
				return $Result;
			}else{
				$RequestURL=$Payload['Config']['site']['base_url'].$Payload['URL'];
				if($Payload['Verb']=='GET' || $Payload['Verb']=='DELETE'){
					$Client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer '.$Payload['AccessToken']]]);
					$Result = $Client->request($Payload['Verb'], $RequestURL);				
				}else if($Payload['Verb']=='POST'|| $Payload['Verb']=='PUT'){
					$Client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer '.$Payload['AccessToken'],'Content-Type' => 'application/json', 'Content-Legnth' => strlen($Payload['Body'])]]);
					$Result = $Client->request($Payload['Verb'], $RequestURL ,['body' => $Payload['Body']]);
				}
				return $Result;
			}					
		}
		public function FilteredList($Payload){
			$RequestURL=$Payload['Config']['site']['base_url'].$Payload['URL'];
			$RequestURL.='?searchCriteria[pageSize]='.$Payload['PageSize'];
			if($Payload['Verb']=='GET'){
				$Client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer '.$Payload['AccessToken']]]);
				$Result = $Client->request($Payload['Verb'], $RequestURL);		
			}		
			return $Result;		
		}	
	}