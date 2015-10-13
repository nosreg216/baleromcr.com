<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
  </ol>
  
  <?php 
  //$imgURL = 'https://ununsplash.imgix.net/photo-1416339134316-0e91dc9ded92?q=75&fm=jpg&s=883a422e10fc4149893984019f63c818';
  $img = array('assets/img/christmas.jpg', 'assets/img/christmas.jpg');
   ?>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-img" style="background-image: url(<?php echo $img[0]; ?>);"></div>
      <div class="hero">
        <hgroup>
            <h1>Feliz Navidad</h1>        
            <h3>Regalale algo especial a tus seres queridos</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg hvr-grow-shadow" role="button">Ver promociones</button>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-img" style="background-image: url(<?php echo $img[1]; ?>););"></div>
      <div class="hero">        
        <hgroup>
            <h1>¡Promociones Navideñas!</h1>
            <h3>descuentos increibles en articulos seleccionados</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg hvr-grow-shadow" role="button">Ver todo</button>
      </div>
    </div>
  </div> 
</div>