<?php 

/*==================== Thumnails ====================*/

/* Displays a Thumbnail list of the albums*/
function album_list_thumbnail($albumList)
{
	foreach ($albumList as $album) {
		$id = $album->album_id;
		$title = $album->album_title;
		$year = $album->album_year;
		echo "<div class='col-md-6' data-toggle='tooltip' data-placement='top' title='$title'> ";
			echo a_open("thumbnail", base_url()."album/$id");
				echo img("data/music/albums/$id/cover.png");
			echo a_close();
		echo div_close();
	}
}


/* Displays a Thumbnail list of the albums*/
function song_list_thumbnail($songList)
{
	foreach ($songList as $song) {
		$id = $song->song_id;
		$title = $song->song_title;
		$year = $song->song_year;
		echo "<div class='col-md-6' data-toggle='tooltip' data-placement='top' title='$title'> ";
			echo a_open("thumbnail", base_url()."song/$id");
				echo img("data/music/songs/$id/cover.png");
			echo a_close();
		echo div_close();
	}
}

/* Displays a Thumbnail list of the albums*/
function video_list_thumbnail($videoList)
{
	foreach ($videoList as $video) {
		$id = $video->video_id;
		$title = $video->video_title;
		$year = $video->video_year;
		echo "<div class='col-md-6' data-toggle='tooltip' data-placement='top' title='$title'> ";
			echo a_open("thumbnail", base_url()."video/$id");
				echo img("data/music/videos/$id/cover.png");
			echo a_close();
		echo div_close();
	}
}

function display_all_banners($banner_list)
{
	$isFirst = TRUE;
	foreach ($banner_list as $banner) {
		$active = "";
		/* The fist item must be of the class active */
		if ($isFirst) {
			$active = "active";
			$isFirst = FALSE;
		}
		switch ($banner->banner_type ) {
			# Case: is Image
			case '1':
				$id = $banner->banner_id;
				echo "<div class='item $active'>";
        		echo "<img src='data/banners/$id.jpg'>";
        		echo "</div>";
				break;
			# Case: is Video
			case '2':
				$id = $banner->banner_id;
				echo "<div class='item $active'>";
				echo "<video autoplay>";
        		echo "<source src='data/banners/$id.mp4' type='video/mp4'>";
        		echo "</video>";
        		echo "</div>";
				break;
		}
	}
}

function album_song_list($songList)
{
    /* Load the Song list */
    foreach ($songList as $song) {
        
        $title = $song->track_title;
        $trackId = $song->track_id;
        $price = $song->track_price;

        echo a_open("list-group-item", base_url() . "cart/add/track/$trackId");
        echo "<span class='badge'>$$price.00</span>";
        echo $title;
        echo a_close();
    }
}



 ?>