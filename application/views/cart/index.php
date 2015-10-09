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
            case '1': $type = "Sencillo"; break;
            case '2': $type = "Album"; break;
            case '4': $type = "Paquete"; break;
            case '3': $type = "Video"; break;
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
    <a type="button" class="btn btn-success" href="<?php echo base_url() . 'checkout'; ?>">Finalizar Compra</a>
    <a type="button" class="btn btn-default" href="<?php echo base_url() . 'cart/clean'; ?>">Limpiar Carrito</a>
  </div>
</div>

</div>
<?php $this->load->view('home/featured'); ?>
</div>
</div>