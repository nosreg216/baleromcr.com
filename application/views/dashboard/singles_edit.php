<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><?php echo $songInfo->song_title; ?><small>Control panel</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()."admin/";?>"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="<?php echo base_url()."admin/singles";?>">Sencillos</a></li>
      <li class="active"><?php echo $songInfo->song_title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Editar Sencillo</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="<?php echo base_url()."admin/singles/update/" . $songInfo->song_id;?>" enctype="multipart/form-data" method="POST">
            <div class="box-body">

              <div class="form-group">
                <label for="title">Titulo del Sencillo</label>
                <input type="text" class="form-control" name="song_title" value="<?php echo $songInfo->song_title;?>">
              </div>

              <div class="form-group">
                <label for="textArea">Descripción del sencillo</label>
                <textarea class="form-control" rows="3" name="song_desc"></textarea>
                <span class="help-block">Una breve descripción sobre qué trata el sencillo que se mostrará bajo la portada.</span>
              </div>

              <div class="row">
                <div class="col-xs-4">
                  <div class="form-group">
                    <label for="title">Precio del song </label>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" name="song_price" value="<?php echo $songInfo->song_price; ?>" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-8">
                  <div class="form-group pull-right">
                    <label for="file_cover">Portada (.png)</label>
                    <input type="file" name="file_cover" accept=".png">
                  </div>
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <p class="help-block pull-left">Todos los precios estan en dólares estadounidenses. (USD)</p>
              <button type="submit" class="btn btn-default pull-right">Actualizar</button>
            </div>
          </form>
        </div><!-- /.box box-primary -->
        <a class="btn btn-danger" href="<?php echo base_url()."admin/singles/delete/" . $songInfo->song_id;?>">
          Eliminar Canción
        </a>
      </div><!-- /.col -->

      <div class="col-md-6">
          <img class="img-responsive" src="<?php echo base_url()."data/music/songs/" .$songInfo->song_id."/cover.png";?>" alt="404">
      </div>

    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->