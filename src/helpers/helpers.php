<?php
	function card($data){ ?>
		<div class="col s12 m6 l3">
			<div class="card">
				<div class="card-image">
					<img src="<?= $data['img'] ?>">
					
					<a class="btn-floating halfway-fab waves-effect waves-light"><i class="material-icons">favorite</i></a>
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?= $data['title'] ?><i class="material-icons right">more_vert</i></span>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4"><?= $data['title'] ?><i class="material-icons right">close</i></span>
					
					<p><?= $data['desc'] ?></p>
				</div>
				<div class="card-action">
					<a href="<?= $data['href'] ?>">Événement <i class="fab fa-facebook-square"></i></a>
					<?php foreach ($data['category'] as $cat) { ?>
							<span class="badge"><?= $cat ?></span>
						<?php } ?>
				</div>
			</div>
		</div>
	<?php }
	
	
	function get_events(){
	return 
		[
			[
				'title'=> 'Titre...',
				'img'=> 'https://dummyimage.com/600x400/000/fff',
				'desc'=> 'I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.',
				'type' => 'facebook',
				'href' => '#',
				'category' => ['Musique', 'Théatre']
			],
			[
				'title'=> 'Titre...',
				'img'=> 'https://dummyimage.com/600x400/000/fff',
				'desc'=> 'I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.',
				'type' => 'facebook',
				'href' => '#',
				'category' => ['Musique', 'Théatre']
			]
		];
	}
	
	function display_events (){
		$events = get_events();
		foreach($events as $event){
			card($event);
		}
	}
	
?>
