<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Albums<small>Control panel</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()."admin/";?>"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Albums</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Agregar album</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="<?php echo base_url()."admin/albums/add"; ?>" enctype="multipart/form-data" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label for="title">Titulo del album</label>
                <input type="text" class="form-control" name="album_title" placeholder="Nombre del album" required>
              </div>

              <div class="row">
               <div class="col-xs-3">
                  <div class="form-group">
                    <label for="title">Año</label>
                    <div class="input-group">
                      <input type="text" name="album_year" class="form-control" placeholder="ej: 2015" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-9">
                  <div class="form-group">
                    <label for="file_song">Lista de Canciones (.txt)</label>
                    <input type="file" name="file_songlist" accept=".txt" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-3">
                  <div class="form-group">
                    <label for="title">Precio</label>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" name="album_price" class="form-control" required>
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
              <p class="help-block pull-left">El nombre de los archivos será ajustado automaticamente.</p>
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
                <th>Año</th>
                <th>Opciones</th>
              </tr>
              <?php 
                foreach ($albumList as $album) {

                  $id = $album->album_id;
                  $title = $album->album_title;
                  $year = $album->album_year;
                  $edit = base_url() . "admin/albums/edit/$id";
                  $delete = base_url() . "admin/albums/delete/$id";

                  echo "<tr>";
                  echo "<td>$title</td>";
                  echo "<td>$year</td>";
                  echo "<td><a href='$edit' class='btn btn-xs btn-warning'>Editar</a>";
                  echo "&nbsp;<a href='$delete' class='btn btn-xs btn-danger'>Borrar</a></td>";
                  echo "</tr>";
                }
              ?>
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <p class="help-block"><b>Aviso: </b>Eliminar un album afectará todas las ordenes de compra activas.</p>
          </div>
        </div><!-- /.box -->
      </div>


    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->