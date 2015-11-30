<?php 
    /* Define global variables*/
    $albumId = $albumInfo->album_id;
    $title = $albumInfo->album_title;
    $year = $albumInfo->album_year;
    $price = $albumInfo->album_price;
    $cover = base_url()."data/music/albums/$albumId/cover.png";
?>

<!-- Page-Specific  CSS -->
<style type="text/css">
    .album-banner {
        position: relative;
        height: 50vh;
        margin-top: -50px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 50% 25%;
        background-image: url(<?php echo $cover; ?>);
    }
    .album-banner h1{
        position: absolute;
        font-size: 5em;
        color: #eee;
        bottom: 0;
        right: 0;
    }
</style>
<!--================================================================================================================-->

<header class="album-banner">
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
        
    </div>

</div><!-- /.container -->