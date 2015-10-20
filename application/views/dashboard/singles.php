<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Sencillos<small>Control panel</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-music"></i> Inicio</a></li>
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
          <form role="form" action="add" method="POST">
            <div class="box-body">

              <div class="form-group">
                <label for="title">Titulo del Sencillo</label>
                <input type="text" class="form-control" name="title" placeholder="Nombre de la canción" required>
              </div>

              <div class="row">
               <div class="col-xs-3">
                  <div class="form-group">
                    <label for="title">Año</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="ej: 2015" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-9">
                  <div class="form-group">
                    <label for="file_song">Archivo (.mp3)</label>
                    <input type="file" name="file_song" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-3">
                  <div class="form-group">
                    <label for="title">Precio</label>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-9">
                  <div class="form-group">
                    <label for="file_cover">Portada (.png)</label>
                    <input type="file" name="file_cover" required>
                  </div>
                </div>
              </div>
              <p class="help-block">El nombre de los archivos será ajustado automaticamente.</p>
            </div><!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-default">Agregar</button>
            </div>
          </form>

        </div><!-- /.box box-primary -->
      </div><!-- /.col -->


      <!-- right column -->
      <div class="col-xs-6">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Todos los sencillos</h3>
          </div><!-- /.box-header -->

          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>Titulo</th>
                <th>Año</th>
                <th>Eliminar</th>
              </tr>
              <tr>
                <td>John Doe</td>
                <td>2014</td>
                <td><a href="" class="btn btn-xs btn-danger">Eliminar</a></td>
              </tr>
              <tr>
                <td>Alexander Pierce</td>
                <td>2014</td>
                <td><a href="" class="btn btn-xs btn-danger">Eliminar</a></td>
              </tr>
              <tr>
                <td>Bob Doe</td>
                <td>2014</td>
                <td><a href="" class="btn btn-xs btn-danger">Eliminar</a></td>
              </tr>
              <tr>
                <td>Mike Doe</td>
                <td>2014</td>
                <td><a href="" class="btn btn-xs btn-danger">Eliminar</a></td>
              </tr>
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <p class="help-block"><b>Aviso: </b>Eliminar una canción afectará todas las ordenes de compra activas.</p>
          </div>
        </div><!-- /.box -->
      </div>


    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->