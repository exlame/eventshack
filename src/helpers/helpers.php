<?php
use Medoo\Medoo;
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'eventshack',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
		'charset' => 'utf8'
]);



	function card($data){ ?>
		<div class="col s12 m6 l3">
			<div class="card" data-id="<?= $data['id'] ?>">
				<div class="card-image">
					<img src="https://dummyimage.com/600x400/000/fff">
					
					<a class="btn-floating halfway-fab waves-effect waves-light"><i class="material-icons">favorite</i></a>
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?= $data['name'] ?><i class="material-icons right">more_vert</i></span>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4"><?= $data['name'] ?><i class="material-icons right">close</i></span>
					
					<p><?= $data['description'] ?></p>
				</div>
				<div class="card-action">
					<a href="<?= $data['href'] ?>">Événement <i class="fab fa-facebook-square"></i></a>
					<?php foreach (explode(' ',$data['categorie']) as $cat) { ?>
							<span class="badge"><?= $cat ?></span>
						<?php } ?>
				</div>
			</div>
		</div>
	<?php }
	
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
	
	if ($where){
		$where = ' WHERE '. implode(' AND ',$where);
	}
	
	$query = $database->query(
							"SELECT *, "
					. "3956*2*ASIN(SQRT(POWER(SIN(({$pos['lat']} - latitude)*pi()/180/2),2)+COS(19.286558 * pi()/180) *COS(latitude * pi()/180)*POWER(SIN(({$pos['long']} -longitude)* pi()/180/2),2)))
as distance 
					FROM organisedevent  $where
					having distance < 1  
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
	
	function display_events ($filters = null, $pos = null){
		$events = get_events($filters,$pos);
		foreach($events as $event){
			card($event);
		}
	}
	
	function display_my_events (){
		display_events();
	}
	
	function set_session_default(){
		if(!isset($_SESSION['params'])){
			$_SESSION['params'] = array(
					'notif_day' => true,
					'notif_weekend' => false,
					'notif_week' => false,
					'cat_art' => true,
					'cat_musique' => true,
					'cat_humour' => true,
					'cat_theatre' => true,
					'dispo_night' => true,
					'dispo_day' => false,
					'dispo_week' => false,
					'dispo_weekend' => false
			);
		}
	}
	
	function set_config($key, $value){
		$_SESSION['params'][$key] = $value;
		return $_SESSION['params'];
	}
?>
