<div class="container">
	<div class="row">
	    <div class="col-sm-9">
            <h1 class="page-header"><?php echo $title; ?></h1>
        </div>

		<?php 
		// No Results Found validation and message
		if ($albumCount == 0 && $songCount == 0 && $albumSongCount == 0 && $videoCount == 0 ) {
			echo br();
			echo div_open('col-sm-9');
			echo heading('No se encontraron resultados.', 3);
			echo div_close();
		} else {

		// Case: Found a match in Albums
		if ($albumCount > 0) {
			echo br();
			echo div_open('col-sm-9');
			echo heading("Albums ($albumCount)", 4, array('class' => 'page-header'));

			echo div_open('list-group');
			foreach ($albumList as $album) {
				$id = $album->album_id;
				$title = $album->album_title;
				$year = $album->album_year;
				$url = base_url()."album/$id/" . strToUrl($title);
				echo a_open('list-group-item',$url);
				echo "$title ($year)";
				echo a_close();
			}
			echo div_close();
			echo div_close();
		}

		// Case: Found a match in Songs
		if ($songCount > 0) {
			echo br();
			echo div_open('col-sm-9');
			echo heading("Sencillos ($songCount)", 4, array('class' => 'page-header'));

			echo div_open('list-group');
			foreach ($songList as $song) {
				$id = $song->song_id;
				$title = $song->song_title;
				$year = $song->song_year;
				$url = base_url()."song/$id/" . strToUrl($title);
				echo a_open('list-group-item',$url);
				echo "$title ($year)";
				echo a_close();
			}
			echo div_close();
			echo div_close();
		}

		// Case: Found a match in Songs from an album
		if ($albumSongCount > 0) {
			echo br();
			echo div_open('col-sm-9');
			echo heading("Canciones ($albumSongCount)", 4, array('class' => 'page-header'));

			echo div_open('list-group');
			foreach ($albumSongList as $song) {
				$id = $song->album_id;
				$title = $song->song_title;
				$year = $song->song_year;
				$url = base_url()."album/$id/" . strToUrl($title);
				echo a_open('list-group-item',$url);
				echo "$title ($year)";
				echo a_close();
			}
			echo div_close();
			echo div_close();
		}


		}





		 ?>

	</div>


</div>