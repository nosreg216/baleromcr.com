<div class="page-header">
	<h2><span class="glyphicon glyphicon-heart-empty"></span>Lo más vendido</h2>
</div>

<div class="list-group">
<a class="list-group-item active">Albums</a>
	<?php 
		// Get list of most selled albums
		$query = $this->db->order_by('album_year DESC');
		$query = $this->db->get('db_album');
		$topAlbum = $query->result();

		foreach ($topAlbum as $album) {
			$id = $album->album_id;
			$title = $album->album_title;
			$year = $album->album_year;
			$price = $album->album_price;
			$url = base_url()."album/$id/".strToUrl($title);
			echo a_open("list-group-item", "$url");
			echo "$title ($year)";
			echo "<span class='badge'>$$price</span>";
			echo a_close();
		}
	 ?>
</div>

<div class="list-group">
<a class="list-group-item active">Sencillos</a>
	<?php 
		// Get list of most selled albums
		$query = $this->db->order_by('song_year DESC');
		$query = $this->db->get('db_song');
		$topsong = $query->result();

		foreach ($topsong as $song) {
			$id = $song->song_id;
			$title = $song->song_title;
			$year = $song->song_year;
			$price = $song->song_price;
			$url = base_url()."song/$id/".strToUrl($title);
			echo a_open("list-group-item", "$url");
			echo "$title ($year)";
			echo "<span class='badge'>$$price</span>";
			echo a_close();
		}
	 ?>
</div>