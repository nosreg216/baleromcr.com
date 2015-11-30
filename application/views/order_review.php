<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="page-header">
				<h1>Confirmar Orden</h1>
			</div>
			<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Detalles del pedido.</strong>
			</div>
			  <div class="panel-body">
			    <?php echo $summary; ?>
			  </div>
			  <div class="panel-footer">
			  	<a href="<?php echo base_url() ."order/cancel/$order_token";?>"
			  		class="btn btn-default btn-large pull-right">Regresar</a>
			  	<?php echo $checkout; ?>
			  </div>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col-sm-12">
			<p class="help-block">Al hacer clic en 'Ordenar' será redireccionado a PayPal para realziar el pago de su orden.</p>
			<p class="help-block">Una vez efectuado el pago, recibirá un correo electrónico con el enlace de descarga.</p>
		</div>
	</div>
</div>