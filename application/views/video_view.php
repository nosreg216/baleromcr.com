<?php 

/* Define global variables*/
$videoId = $videoInfo->video_id;
$title = $videoInfo->video_title;
$year = $videoInfo->video_year;
$price = $videoInfo->video_price;
$cover = base_url()."data/music/videos/$videoId/cover.png";

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
                    href='<?php echo base_url()."cart/add/video/$videoId";?>'>
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
    </div>
    <hr>
    <!-- /.row -->
</div><!-- /.container -->