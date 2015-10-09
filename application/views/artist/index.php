<?php 
	/* Define global variables*/
	$artistId = $artistInfo->artist_id;
?>

<ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Inicio</a></li>
  <li class="active"><?php echo "$title";?></li>
</ol>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-header">
				<h2><span class="glyphicon glyphicon-cd"></span>&nbsp;Discos de Estudio</h2>
			</div>
			<?php 
				// Gets the list of featured albums and outputs its content in the slider
				$query = $this->db->order_by('album_year DESC');
				$query = $this->db->get_where('db_album', array('album_artist' => $artistId));
				foreach ($query->result_array() as $album) {

					$id = $album['album_id'];
					$title = $album['album_title'];
					$year = $album['album_year'];

					echo div_open("col-xs-6 col-md-2 hvr-underline-from-center");
						echo a_open("thumbnail", base_url()."album/$id");
							echo img("data/music/albums/$id/cover.png");
						echo a_close();
						echo heading($title . nbs(3) . $year, 5);
					echo div_close();
				}
			?>	
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="page-header">
				<h2><span class="glyphicon glyphicon-cd"></span>&nbsp;Sencillos</h2>
			</div>
			<?php 
				// Gets the list of featured albums and outputs its content in the slider
				$query = $this->db->order_by('song_year DESC');
				$query = $this->db->get_where('db_song', array('song_artist' => $artistId, 'isSingle' => 1));
				foreach ($query->result_array() as $song) {

					$id = $song['song_id'];
					$title = $song['song_title'];
					$year = $song['song_year'];
					$url = strToUrl($title);

					echo div_open("col-xs-6 col-md-4 hvr-underline-from-center");
						echo a_open("thumbnail", base_url()."song/$id/$url");
							echo img("data/music/songs/$id/cover.png");
						echo a_close();
						echo heading($title . nbs(3) . $year, 5);
					echo div_close();
				}
			?>	
		</div>
		<div class="col-sm-6">
			<div class="page-header">
				<h2><span class="glyphicon glyphicon-cd"></span>&nbsp;Videos Musicales</h2>
			</div>
			<?php 
			/*
				// Gets the list of featured albums and outputs its content in the slider
				$query = $this->db->order_by('album_year DESC');
				$query = $this->db->get_where('db_album', array('album_artist' => $artistId));
				foreach ($query->result_array() as $album) {

					$id = $album['album_id'];
					$title = $album['album_title'];
					$year = $album['album_year'];
					$url = str_replace(array(' ','.'),array('_',''),$album['album_title']);

					echo div_open("col-xs-6 col-md-4 hvr-underline-from-center");
						echo a_open("thumbnail", base_url()."album/$id/$url");
							echo img("data/music/albums/$id/cover.png");
						echo a_close();
						echo heading($title . nbs(3) . $year, 5);
					echo div_close();
				}
				*/
			?>	
		</div>
	</div>
</div>
