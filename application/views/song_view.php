<?php 

/* Define global variables*/
$songId = $songInfo->song_id;
$title = $songInfo->song_title;
$year = $songInfo->song_year;
$price = $songInfo->song_price;
$desc = $songInfo->song_desc;
$cover = base_url()."data/music/songs/$songId/cover.png";

?>
<!--================================================================================================================-->
<header class="cover" style="background-image: url(<?php echo $cover; ?>);">
    <h1><?php echo $title . ' ' .$year; ?></h1>
</header>

<ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Inicio</a></li>
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
            src="<?php echo $cover;?>" alt="404">
        </div>
        <div class="col-md-6">
            <div class="well">
                <?php echo "$desc"; ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header">Otros Sencillos de Balerom</h3>
            <div class="thumnb-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 2}'>
                <?php song_list_thumbnail($songList); ?>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container -->