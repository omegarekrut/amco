<?php
if(!isset($_SESSION)){
session_start();
}

function loginWithIDUser( $id_user ){
	include('connection.php');
	$query='SELECT * 
			from users  
			where id_user='.intval($id_user).' limit 1';
	$result=$conn->query($query);
	if( $result->num_rows == 0 ){
		return false;
	}
	$row=mysqli_fetch_object($result);


	$_SESSION['id_user']=$row->id_user;
	$_SESSION['nome']=$row->nome;
	$_SESSION['cognome']=$row->cognome;
	$_SESSION['email']=$row->email;
	checkChoice( $row->id_user );
	//die();
	return $id_user;
}

function checkChoice( $id_user ){
	include('connection.php');
	$sql = " SELECT COUNT(*) as num from choice where id_user = $id_user ";
	$rs = $conn->query($sql );
	if( !$rs ){
		echo $sql;
		die();
	}
	$num = $rs->fetch_object()->num;
	for( $i = $num ; $i<6; $i++ ){
		$quest = $i+1;
		$query = "INSERT INTO choice( id_user , id_question , id_answer ) VALUES ( $id_user , $quest , 0 )";
		if( !$conn->query( $query ) ){
			echo $query;
			die();
		}
	}
}

function getChoice( $id_user ){
	//echo 'ok';
	include('connection.php');
	$sql = " SELECT * from choice where id_user = $id_user and id_answer = 0 ";
	$rs = $conn->query( $sql );
	if( !$rs ){
		echo $sql;
		die();
	}
	$array = [];
	while( $obj = $rs->fetch_object() ){
		//print_r( $obj );
		$array[$obj->id_question] = getDomanda($obj->id_question);
	}
	return $array;
}


function getDomanda( $id_question ){
	include('connection.php');
	$sql = " SELECT * from questions where id_questions = $id_question  and isatt = 0 ";
	$rs = $conn->query( $sql );
	$array = $rs->fetch_array();
		//print_r( $array );
	$array['answer'] = getAnswer( $id_question );
	return $array;
}

function getAnswer( $id_question ){
	include('connection.php');
	$sql = " SELECT * from answers where id_questions = $id_question and isatt = 0 ";
	$rs = $conn->query( $sql );
	$temp = array();
	while( $array = $rs->fetch_array() ){
		$temp[] = $array;
	}
	return $temp;
}

function setEnding( $id_user ){
	include('connection.php');
	$sql = " 
			SELECT SUM( isright ) *1000 - sum( TIMESTAMPDIFF(SECOND, enterwhen, outwhen) ) as points
			from choice
					inner join answers on choice.id_answer = answers.id_answer
			where id_user = $id_user ";
	$rs = $conn->query( $sql );
	//echo $sql;
	//echo 'ok';
	$array = $rs->fetch_object();
	$point = $array->points;
	$totPoints = $point;

	$sql = " INSERT INTO rank( id_user , point ) VALUES ( $id_user , $totPoints)";
	$conn->query( $sql );
	//echo $sql;
	return $totPoints;
}

?>
