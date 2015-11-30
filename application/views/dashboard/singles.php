<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Sencillos<small>Control panel</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Sencillos</li>
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
            <h3 class="box-title">Agregar Sencillo</h3>
          </div><!-- /.box-header -->

          <!-- form start -->
          <form role="form" action="<?php echo base_url()."admin/singles/add"; ?>" enctype="multipart/form-data" method="POST">
            <div class="box-body">

              <div class="form-group">
                <label for="title">Titulo del Sencillo</label>
                <input type="text" class="form-control" name="song_title" placeholder="Nombre de la canción" required>
              </div>

              <div class="row">
               <div class="col-xs-3">
                  <div class="form-group">
                    <label for="title">Año</label>
                    <div class="input-group">
                      <input type="text" name="song_year" class="form-control" placeholder="ej: 2015" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-9">
                  <div class="form-group">
                    <label for="file_song">Archivo (.mp3)</label>
                    <input type="file" name="song_file" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-3">
                  <div class="form-group">
                    <label for="title">Precio</label>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" name="song_price" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-9">
                  <div class="form-group">
                    <label for="file_cover">Portada (.png)</label>
                    <input type="file" name="file_cover" accept=".png" required>
                  </div>
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <p class="help-block pull-left" >El nombre de los archivos será ajustado automaticamente.</p>
              <button type="submit" class="btn btn-default pull-right">Agregar</button>
            </div>
          </form>
        </div><!-- /.box box-primary -->
      </div><!-- /.col -->


      <!-- right column -->
      <div class="col-xs-6">
        <div class="box box-success box-scroll">
          <div class="box-header">
            <h3 class="box-title">Todos los Albums</h3>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding" >
            <table class="table table-hover">
              <tr>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Opciones</th>
              </tr>
              <?php 
                foreach ($songList as $song) {

                  $id = $song->song_id;
                  $title = $song->song_title;
                  $price = $song->song_price;
                  $edit = base_url() . "admin/singles/edit/$id";
                  $delete = base_url() . "admin/singles/delete/$id";

                  echo "<tr>";
                  echo "<td>$title</td>";
                  echo "<td>$ $price .00</td>";
                  echo "<td><a href='$edit' class='btn btn-xs btn-warning'>Editar</a>";
                  echo "&nbsp;<a href='$delete' class='btn btn-xs btn-danger'>Borrar</a></td>";
                  echo "</tr>";
                }
              ?>
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <p class="help-block"><b>Aviso: </b>Eliminar un sencillo afectará todas las ordenes de compra activas.</p>
          </div>
        </div><!-- /.box -->
      </div>


    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->