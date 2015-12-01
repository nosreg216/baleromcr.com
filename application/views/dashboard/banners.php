<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Banners <small>Control panel</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Banners</li>
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
            <h3 class="box-title">Agregar Banner</h3>
          </div><!-- /.box-header -->

          <!-- form start -->
          <form role="form" action="<?php echo base_url()."admin/banners/add"; ?>" enctype="multipart/form-data" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label for="title">Descripción del Banner</label>
                <input type="text" class="form-control" name="banner_desc" placeholder="Descripción" required>
              </div>
              <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                    <label for="select">Tipo</label>
                      <select class="form-control" name="banner_type" required>
                        <option value="1">Imagen</option>
                        <option value="2">Video</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="file_banner">Archivo (.jpg | .mp4)</label>
                    <input type="file" accept=".jpg, .mp4" name="banner_file" required>
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
            <h3 class="box-title">Todos los Banners</h3>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding" >
            <table class="table table-hover">
              <tr>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Opciones</th>
              </tr>
              <?php 
                foreach ($bannerList as $banner) {

                  $banner_id = $banner->banner_id;
                  $banner_desc = $banner->banner_desc;
                  $delete = base_url() . "admin/banners/delete/$banner_id";
                  $type = null;
                  switch ($banner->banner_type) {
                    case '1': $type = 'Imagen'; break;
                    case '2': $type = 'Video'; break;
                  }
                  
                  echo "<tr>";
                  echo "<td>$banner_desc</td>";
                  echo "<td>$type</td>";
                  echo "<td><a href='$delete' class='btn btn-xs btn-danger'>Borrar</a></td>";
                  echo "</tr>";
                }
              ?>
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <p class="help-block"><b>IMPORTANTE: </b>No se recomienda tener más de 1 banner del tipo Video.</p>
          </div>
        </div><!-- /.box -->
      </div>


    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->