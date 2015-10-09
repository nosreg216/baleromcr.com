<?php 
/* Define global variables*/
$artistId = $albumArtist->artist_id;
$albumId = $albumInfo->album_id;
?>

<div class="container">
	<div class="row">
	<div class="col-sm-12">
<div class="page-header">
<h2><span class="glyphicon glyphicon-link"></span>
Material Relacionado<a href="">
<small>Albums y Sencillos</small></a>
</h2>
</div>

<div class="thumnb-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1}'>
<?php 
	// Gets the list of featured albums and outputs its content in the slider
	$query = $this->db->order_by('album_year DESC');
	$query = $this->db->get_where('db_album', array('album_artist' => $artistId));
	foreach ($query->result_array() as $album) {

		$id = $album['album_id'];
		$title = $album['album_title'];
		$year = $album['album_year'];

		if ($id !== $albumId) {
		echo div_open("col-xs-6 col-md-3 hvr-underline-from-center");
			echo a_open("thumbnail", base_url()."album/$id");
				echo img("data/music/albums/$id/cover.png");
			echo a_close();
			echo heading($title . nbs(3) . $year, 5);
		echo div_close();
		}
	}
?>
</div>

</div>
	</div>
</div>