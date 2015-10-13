<div class="container">
  <div class="row">

    <div class="col-sm-12 col-md-8 col-md-offset-2">
      <h1 class="page-header">Carrito de Compra</h1>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><strong>Orden de compra</strong></h3>
        </div>

        <table class="table">
          <thead>
            <td><strong>#</strong></td>
            <td><strong>Producto</strong></td>
            <td><strong>Titulo</strong></td>
            <td class="text-right"><strong>Precio</strong></td>
            <td>&nbsp;</td>
          </thead>
          <tbody>
            <?php 
              $i = 1;
              foreach ($this->cart->contents() as $items){

                $id = $items['rowid'];
                $link = a_open('link', base_url() . "cart/delete/$id") . "eliminar" . a_close();

                $type = 'Desconocido';
                switch ($items['type']) {
                  case '1': $type = "Album"; break;
                  case '2': $type = "Cancion de Album"; break;
                  case '3': $type = "Sencillo"; break;
                  case '4': $type = "Video"; break;
                  case '5': $type = "Paquete"; break;
                }
                echo "<tr>";
                echo "<td>". $i."</td>";
                echo "<td>". $type."</td>";
                echo "<td>". $items['name']."</td>";
                echo "<td class='text-right'>".$items['price']."</td>";
                echo "<td class='text-right'>". $link ."</td>";
                echo "</tr>";
                $i++;
              }
             ?>
          </tbody>
        </table>

        <div class="panel-footer text-right">
          Total: <strong>USD <?php echo $this->cart->total(); ?></strong>
        </div>
      </div>

      <div class="pull-right">
        <div class="btn-group" role="group" aria-label="...">
          <a type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Comprar</a>
          <a type="button" class="btn btn-default" href="<?php echo base_url() . 'cart/clean'; ?>">Limpiar Carrito</a>
        </div>
      </div>
    </div><!-- end col-sm-12-->
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Genera Orden de Compra</h4>
      </div>
      <form method="POST" action="<?php echo base_url();?>checkout">
        <div class="modal-body">
          <p>Para continuar, es necesario que ingrese una dirección de correo electrónico válida.</p>
          <p>En esta dirección se le enviará el recibo de compra y el enlace de descarga.</p>
          <input type="text" class="form-control" name="email" placeholder="E-mail" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Countinuar</button>
        </div>
      </form>
    </div>
  </div>
</div>