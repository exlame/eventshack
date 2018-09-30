<?php


function get_my_events(){
	global $database;
	if(isset($_SESSION['favorite']) && count($_SESSION['favorite'])){
	$query = $database->query("SELECT * FROM organisedevent WHERE id IN (".implode(',',$_SESSION['favorite']).") ORDER BY start_time" );
$datas = [];
$index=0;
	while ($data = $query->fetch(PDO::FETCH_ASSOC))
		{
			$datas[ $index ] = $data;
			$index++;
		}
	
		return $datas;
	} else {
		return false;
	}
}
function get_events($filters = null, $pos = null){
	global $database;
	
	$cat = [];
	$dispos = [];
	foreach($filters as $key => $value){
		$datas = explode('_',$key);
		if($datas[0] == 'cat' && $value){
			$cat[] = $datas[1];
		}
		else if($datas[0] == 'dispo' && $value){
			$dispos[] = $datas[1];
		}
	}
	
	$where = [];
	if($cat){
		$where[] = 'categorie REGEXP \'' . implode('|',$cat ) .'\'';
	}
	
	
	if(array_search('day', $dispos) > -1 && array_search('night', $dispos) === false){
		$where[] = 'HOUR(start_time) BETWEEN 4 AND 16';
	} else if(array_search('day', $dispos) === false && array_search('night', $dispos) > -1){
		$where[] = '((HOUR(start_time) BETWEEN 16 AND 23) OR (HOUR(start_time) BETWEEN 0 AND 4))';
	}
	
	if(array_search('week', $dispos) > -1 && array_search('weekend', $dispos) === false){
		$where[] = 'DAYOFWEEK(start_time) BETWEEN 2 AND 6';
	} else if(array_search('week', $dispos) === false && array_search('weekend', $dispos) > -1){
		$where[] = '((DAYOFWEEK(start_time) BETWEEN 6 AND 7 OR DAYOFWEEK(start_time) = 1 ) OR DAYOFWEEK(start_time) = 6 AND HOUR(start_time) BETWEEN 16 AND 23)';
	}
	
	if(!isset($filters['when']) || $filters['when'] == 1 ){
		$where[] = 'CURDATE() = DATE(start_time)';
	} elseif($filters['when'] == 2){
		$where[] = 'CURDATE()+ INTERVAL 1 DAY = DATE(start_time)';
	} else {
		$where[] = 'DATE(start_time) BETWEEN CURDATE()+ INTERVAL 1 DAY AND CURDATE()+ INTERVAL 7 DAY';
	}
	
	
	if ($where){
		$where = ' WHERE '. implode(' AND ',$where);
	} else {
		$where = '';
	}
	$query = $database->query(
							"SELECT *, "
					. "3956*2*ASIN(SQRT(POWER(SIN(({$pos['lat']} - latitude)*pi()/180/2),2)+COS(19.286558 * pi()/180) *COS(latitude * pi()/180)*POWER(SIN(({$pos['long']} -longitude)* pi()/180/2),2)))
as distance 
					FROM organisedevent  $where
					having distance < {$filters['distance']} 
					ORDER BY distance;");
$datas = [];
$index=0;
	while ($data = $query->fetch(PDO::FETCH_ASSOC))
		{
			$datas[ $index ] = $data;
			$index++;
		}
	
	return $datas;
	}