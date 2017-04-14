<?php
	//REQUIRED FILES
	require_once(__DIR__.'/CE/Integration.Integration.php');
	
	
	function TrimString(&$Item, $Key){
		$Item = trim($Item);
	}
	
	function EscapeString(&$Item, $Key){
		global $Con;
		$Item = mysqli_real_escape_string($Con, $Item);
	}
	
	//EXISTS
	function Exists($Con, $TableName, $Condition){
		$RowID=0;
		$SelectStatement = "SELECT * FROM `".$TableName."`  WHERE ";
		foreach($Condition as $CKey=>$CValue){
			$SelectStatement.="`".$CKey."`='".$CValue."' AND ";
		}
		$SelectStatement=rtrim($SelectStatement, ' AND ');
		$SelectStatement.=" LIMIT 1;";
		echo 'SELECT STATEMENT: '.$SelectStatement.PHP_EOL;
		echo $SelectStatement.PHP_EOL;
		$Resultset=mysqli_query($Con, $SelectStatement);
		if($Resultset->num_rows){
			while($Result=mysqli_fetch_assoc($Resultset)){
				if(!empty($Result)){
					$RowID=$Result['row_id'];
				}
			}
		}
		return $RowID;
	}
	
	//RETRIVE
	function Retrieve($Con, $TableName, $Condition, $Projection=null){
		$Associative=array();
		$SelectStatement = "SELECT * FROM `".$TableName."`  WHERE ";
		foreach($Condition as $CKey=>$CValue){
			$SelectStatement.="`".$CKey."`='".$CValue."' AND ";
		}
		$SelectStatement=rtrim($SelectStatement, ' AND ');
		$SelectStatement.=";";
		echo 'SELECT STATEMENT: '.$SelectStatement.PHP_EOL;
		echo $SelectStatement.PHP_EOL;
		$Resultset=mysqli_query($Con, $SelectStatement);
		if($Resultset->num_rows){
			while($Result=mysqli_fetch_assoc($Resultset)){
				if(!empty($Result)){
					if(!empty($Projection)){
						$Individual=array();
						foreach($Projection as $PValue){
							$Individual[$PValue]=$Result[$PValue];
						}
						$Associative[]=$Individual;
					}else{
						$Associative[]=$Result;
					}					
				}
			}
		}
		return $Associative;
	}
	
	//INSERT
	function Insert($Con, $TableName, $Entity){
		//DATA PRUNING
		array_walk_recursive($Entity, 'TrimString');
		array_walk_recursive($Entity, 'EscapeString');
		$InsertStatement="INSERT INTO `".$TableName."`(";
		foreach($Entity as $EKey=>$EValue){
			$InsertStatement.="`".$EKey."`, ";
		}
		$InsertStatement.="`row_created`)VALUES(";
		foreach($Entity as $EKey=>$EValue){
			$InsertStatement.="'".$EValue."', ";
		}
		$InsertStatement.="now());";
		echo 'INSERT STATEMENT: '.$InsertStatement.PHP_EOL;
		mysqli_query($Con, $InsertStatement);
		echo $TableName.' Inserted Successfully'.PHP_EOL;
	}
	
	//UPDATE
	function Update($Con, $TableName, $ID, $Entity){
		//DATA PRUNING
		array_walk_recursive($Entity, 'TrimString');
		array_walk_recursive($Entity, 'EscapeString');
		
		$UpdateStatement="UPDATE `".$TableName."` SET ";
		foreach($Entity as $EKey=>$EValue){
			$UpdateStatement.="`".$EKey."`='".$EValue."', ";
		}
		$UpdateStatement.="`row_modified`=now()";
		$UpdateStatement.=" WHERE `row_id`=".$ID.";";
		echo 'UPDATE STATEMENT: '.$UpdateStatement.PHP_EOL;
		mysqli_query($Con, $UpdateStatement);
		echo $TableName.' Updated Successfully'.PHP_EOL;
	}
	
	//UPDATE
	function VUpdate($Con, $TableName, $ID, $Entity, $Step=1, $Operation='Increment'){
		//DATA PRUNING
		array_walk_recursive($Entity, 'TrimString');
		array_walk_recursive($Entity, 'EscapeString');
		
		$UpdateStatement="UPDATE `".$TableName."` SET ";
		foreach($Entity as $EKey=>$EValue){
			if($Operation=='Increment'){
				$UpdateStatement.="`".$EValue."`=`".$EValue."`+".$Step.", ";
			}else{
				$UpdateStatement.="`".$EValue."`=`".$EValue."`-".$Step.", ";
			}			
		}
		$UpdateStatement.="`row_modified`=now()";
		$UpdateStatement.=" WHERE `row_id`=".$ID.";";
		echo 'UPDATE STATEMENT: '.$UpdateStatement.PHP_EOL;
		mysqli_query($Con, $UpdateStatement);
		echo $TableName.' Updated Successfully'.PHP_EOL;
	}
	
	//REMOVE
	function Remove($Con, $TableName, $ID){
		$RemoveStatement="DELETE FROM  `".$TableName."` WHERE `row_id`=".$ID.";";
		echo 'REMOVE STATEMENT: '.$RemoveStatement.PHP_EOL;
		mysqli_query($Con, $RemoveStatement);
		echo $TableName.' Data Removed Successfully'.PHP_EOL;
	}
	//GET TOKEN
	function GetAccessToken($Con, $TokenTable){
		global $Config;
		global $Payload;
		//TOKEN PROJECTION
		$Projection=array(
			'AccessToken'
		);
	
		//TOKEN CONDITION
		$Condition=array(
			'username'=>$Config['credentials']['username'],
			'password'=>$Config['credentials']['password']		
		);
		
		$ID=Exists($Con, $TokenTable, $Condition);
		if(!$ID){
			//PAYLOAD DATA
			$Login = array('username'=>$Config['credentials']['username'], 'password'=>$Config['credentials']['password']);
			$Payload['Login']=$Login;
	
			$Integration=new Integration();
			$AccessToken=$Integration->AdminToken($Payload);
			//TOKENENTITY
			$Entity=array(
				'AccessToken'=>$AccessToken
			);
			//INSERT
			Insert($Con, $TokenTable, array_merge($Entity, $Condition));
			return $Entity['AccessToken'];
		}else{
			$Result=Retrieve($Con, $TokenTable, $Condition, $Projection);
			return $Result[0]['AccessToken'];
		}		
	}