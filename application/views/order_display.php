<div class="container">
  <div class="row">

    <div class="col-sm-12 col-md-8 col-md-offset-2">
      <h1 class="page-header"><?php echo $title;?></h1>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><strong>Detalle de la orden</strong></h3>
        </div>

        <table class="table">
          <thead>
            <td><strong>Producto</strong></td>
            <td><strong>Titulo</strong></td>
          </thead>
          <tbody>
          <?php 
            foreach ($itemList as $item){

              /* Define local variables */
              $item_type =  $item->item_type;
              $item_id =    $item->item_id;
              $order_id =   $item->order_id;
              $downloaded = $item->downloaded;
              
              /* Display the corresponding text for the item type */
              $type = 'Desconocido';
              switch ($item_type) {
                case '1': $type = "Album";            break;
                case '2': $type = "Cancion de Album"; break;
                case '3': $type = "Sencillo";         break;
                case '4': $type = "Video";            break;
                case '5': $type = "Paquete";          break;
              }

              /* Download button Style */
              $btn = '<button class="btn btn-success btn-sm" type="submit">Descargar</button>';

              /*Validate if the item can be downloaded */
              if ($downloaded >= ITEM_MAX_DOWNLOADS) {
                $btn = '<button class="btn btn-danger btn-sm disabled" type="submit">Excedido</button>';
              }

              /* Output the table */
              echo '<tr>';
              echo '<form action="download" method="POST">';

              /* Form data (do not modify) */
              echo "<input type='hidden' name='order_token' value='$order_token'>";
              echo "<input type='hidden' name='item_type' value='$item_type'>";
              echo "<input type='hidden' name='item_id' value='$item_id'>";
              echo "<input type='hidden' name='order_id' value='$order_id'>";

              echo "<td>". $type."</td>";
              echo "<td>". $item->item_name."</td>";
              echo "<td class='text-right'>". $btn ."</td>";
              echo "</form>";
              echo "</tr>";
            }
          ?>
          </tbody>
        </table>

      </div>
    </div><!-- end col-sm-12-->
  </div>
</div>