<?php 

/* Define global variables*/

/*Artist*/
$artistId = $albumArtist->artist_id;
$artistName = $albumArtist->artist_name;

/*Album*/
$albumId = $albumInfo->album_id;
$title = $albumInfo->album_title;
$year = $albumInfo->album_year;
$price = $albumInfo->album_price;

?>

<ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Inicio</a></li>
  <li><a href="<?php echo base_url()."balerom/";?>"><?php echo $artistName;?></a></li>
  <li class="active"><?php echo $title; ?></li>
</ol>

<!-- Page Content -->
<div class="container">
    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"><?php echo $title; ?>
                <small><?php echo $year; ?></small>
                <a class="btn btn-success pull-right"
                href='<?php echo base_url()."cart/add/album/$albumId";?>'>
                    <strong>Agregar al carrito&nbsp;</strong>
                    <span class='badge'>$<?php echo "$price" ?></span>
                </a>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive" src="<?php echo base_url()."data/music/albums/$albumId/cover.png";?>" alt="404">
        </div>
        <div class="col-md-6">
            <div class="list-group">
            <?php 
            $number = 1;
            foreach ($songList as $song) {
                $title = $song->song_title;
                $price = $song->song_price;
                echo a_open("list-group-item", "#");
                echo "<span class='badge '>Agregar $$price</span>";
                echo $number ." - $title";
                echo a_close();
                $number++;
            }
             ?>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container -->