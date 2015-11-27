<?php 

/*==================== Thumnails ====================*/

/* Displays a Thumbnail list of the albums*/
function album_list_thumbnail($albumList)
{
	foreach ($albumList as $album) {
		$id = $album['album_id'];
		$title = $album['album_title'];
		$year = $album['album_year'];
		echo div_open("col-md-6");
			echo a_open("thumbnail", base_url()."album/$id");
				echo img("data/music/albums/$id/cover.png");
			echo a_close();
		echo div_close();
	}
}

/* Displays a Thumbnail list of the albums*/
function song_list_thumbnail($albumList)
{
	foreach ($albumList as $album) {
		$id = $album['album_id'];
		$title = $album['album_title'];
		$year = $album['album_year'];
		echo div_open("col-md-6");
			echo a_open("thumbnail", base_url()."album/$id");
				echo img("data/music/albums/$id/cover.png");
			echo a_close();
		echo div_close();
	}
}

/* Displays a Thumbnail list of the albums*/
function video_list_thumbnail($albumList)
{
	foreach ($albumList as $album) {
		$id = $album['album_id'];
		$title = $album['album_title'];
		$year = $album['album_year'];
		echo div_open("col-md-6");
			echo a_open("thumbnail", base_url()."album/$id");
				echo img("data/music/albums/$id/cover.png");
			echo a_close();
		echo div_close();
	}
}



function album_song_list($songList)
{
    /* Load the Song list */
    foreach ($songList as $song) {
        
        $title = $song->track_title;
        $trackId = $song->track_id;

        echo a_open("list-group-item", base_url() . "cart/add/track/$trackId");
        echo "<span class='badge'>&nbsp;Agregar&nbsp;</span>";
        echo $title;
        echo a_close();
    }
}











 ?>