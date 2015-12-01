<?php 
    /* Define global variables*/
    $albumId = $albumInfo->album_id;
    $title = $albumInfo->album_title;
    $year = $albumInfo->album_year;
    $price = $albumInfo->album_price;
    $desc = $albumInfo->album_desc;
    $cover = base_url()."data/music/albums/$albumId/cover.png";
?>
<!--================================================================================================================-->
<header class="cover" style="background-image: url(<?php echo $cover; ?>);">
    <h1><?php echo $title . ' ' .$year; ?></h1>
</header>

<ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Inicio</a></li>
  <li class="active"><?php echo $title;?> </li>
</ol>

<!-- Page Content -->
<div class="container">

    <!-- Album Header Row -->
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"><?php echo $title; ?>
                <small><?php echo $year; ?></small>
                <a class="btn btn-success pull-right" href='<?php echo base_url()."cart/add/album/$albumId";?>'>
                    <strong>Agregar al carrito&nbsp;</strong>
                    <span class='badge'>$<?php echo "$price" ?></span>
                </a>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Song list Row -->
    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive" src="<?php echo $cover; ?>" alt="404">
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <div class="list-group-item list-group-item-success">
                    <h4 class="list-group-item-heading">Lista de Canciones</h4>
                    <p class="list-group-item-text">Puede comprar las canciones por separado dando clic en la etiqueta del precio.</p>               
                </div>
                <?php album_song_list($songList)?>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <?php echo "$desc"; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header">Otros Álbumes de Balerom</h3>
            <div class="thumnb-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 2}'>
                <?php album_list_thumbnail($albumList); ?>
            </div>
        </div>
    </div>
</div><!-- /.container -->