
<div class="callout callout-info">
  <h4>Announcement!</h4> 
  <?php foreach($pemberitahuan_peserta as $p): ?>
  <p> <?php echo $p->isi; ?> </p>
  <?php endforeach; ?>
</div>


 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="<?php echo base_url("assets/dist/img/photo1.jpg"); ?>" alt="Photo1" width="100%">
      </div>

      <div class="item">
        <img src="<?php echo base_url("assets/dist/img/photo2.jpg"); ?>" alt="Photo2" width="100%">
      </div>

      <div class="item">
        <img src="<?php echo base_url("assets/dist/img/photo3.jpg"); ?>" alt="Photo3" width="100%">
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
	</div>