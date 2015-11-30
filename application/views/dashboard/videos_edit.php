<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><?php echo $videoInfo->video_title; ?><small>Control panel</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()."admin/";?>"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="<?php echo base_url()."admin/videos";?>">Videos</a></li>
      <li class="active"><?php echo $videoInfo->video_title; ?></li>
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
            <h3 class="box-title">Editar Video</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="<?php echo base_url()."admin/videos/update/" . $videoInfo->video_id;?>" enctype="multipart/form-data" method="POST">
            <div class="box-body">
                <div class="col-xs-4">
                  <div class="form-group">
                    <label for="title">Precio del video </label>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" name="video_price" value="<?php echo $videoInfo->video_price; ?>" class="form-control" required>
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
        <a class="btn btn-danger" href="<?php echo base_url()."admin/videos/delete/" . $videoInfo->video_id;?>">
          Eliminar Video
        </a>
      </div><!-- /.col -->


    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->