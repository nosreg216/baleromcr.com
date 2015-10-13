<?php 

/* Define global variables*/

/*Artist*/
$artistId = $artistInfo->artist_id;
$artistName = $artistInfo->artist_name;

/*Song*/
$songId = $songInfo->song_id;

$title = $songInfo->song_title;
$year = $songInfo->song_year;
$price = $songInfo->song_price;

?>

<ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Inicio</a></li>
  <li><a href="<?php echo base_url()."artist/$artistId";?>"><?php echo $artistName;?></a></li>
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
                    href='<?php echo base_url()."cart/add/single/$songId";?>'>
                    <strong>Agregar al carrito&nbsp;</strong>
                    <span class='badge'>$<?php echo $price ?></span>
                </a>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive"
            src="<?php echo base_url()."data/music/balerom/singles/$songId/cover.png";?>" alt="404">
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container -->