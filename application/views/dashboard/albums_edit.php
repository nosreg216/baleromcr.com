<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><?php echo $albumInfo->album_title; ?><small>Control panel</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()."admin/";?>"><i class="fa fa-music"></i> Inicio</a></li>
      <li class="active">Albums</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Agregar canción al album</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="<?php echo base_url()."admin/albums/add_track"; ?>" enctype="multipart/form-data" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label for="title">Titulo de la canción</label>
                <input type="text" class="form-control" name="track_title" placeholder="Nombre de la canción" required>
              </div>
              <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                    <label for="title"># Pista</label>
                    <div class="input-group">
                      <input type="text" name="track_number" class="form-control" placeholder="Ej: 01" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-3">
                  <div class="form-group">
                    <label for="title">Precio</label>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" name="track_price" class="form-control" value="2.00" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-7">
                  <div class="form-group">
                    <label for="song_file">Archivo (.mp3)</label>
                    <input type="file" name="song_file" accept=".mp3" required>
                  </div>
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <p class="help-block pull-left">El nombre de los archivos será ajustado automaticamente.</p>
              <input type="hidden" name="track_album" value="<?php echo $albumInfo->album_id ?>">
              <button type="submit" class="btn btn-default pull-right">Agregar</button>
            </div>
          </form>
        </div><!-- /.box box-primary -->

 <!-- general form elements -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Editar album</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="<?php echo base_url()."admin/albums/add"; ?>" enctype="multipart/form-data" method="POST">
            <div class="box-body">
                <div class="col-xs-4">
                  <div class="form-group">
                    <label for="title">Precio del Album </label>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" name="album_price" value="<?php echo $albumInfo->album_price; ?>" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-8">
                  <div class="form-group">
                    <label for="file_cover">Portada (.png)</label>
                    <input type="file" name="file_cover" accept=".png">
                  </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <p class="help-block pull-left">Todos los precios estan en dólares estadounidenses. (USD)</p>
              <button type="submit" class="btn btn-default pull-right">Actualizar</button>
            </div>
          </form>
        </div><!-- /.box box-primary -->
      </div><!-- /.col -->


      <!-- right column -->
      <div class="col-xs-6">
        <div class="box box-success box-scroll">
          <div class="box-header">
            <h3 class="box-title">Canciones en el Album</h3>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding" >
            <table class="table table-hover">
              <tr>
                <th>Titulo</th>
              </tr>
              <?php 
                foreach ($trackList as $track) {

                  $id = $track->track_id;
                  $title = $track->track_title;

                  echo "<tr>";
                  echo "<td>$title</td>";
                  echo "</tr>";
                }
              ?>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>


    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->