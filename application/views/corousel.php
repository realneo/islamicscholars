<div id="Carousel" class="carousel slide">
  <div class="carousel-inner">
    <div class="item active">
        <?php
            $image_properties = array(
                'src' => 'assets/img/slides/j1.jpg',
                'alt' => 'Register Now',
                'width' => '700',
                'height' => '350'
            );

            echo img($image_properties);
        ?> 
      <div class="container">
        <div class="carousel-caption">
          <h4>Register Now.</h4>
          <p>Register Now and Get the Latest updates of the Islamic Scholars in Tanzania.</p>
          <a class="btn btn-primary pull-right" href="register.php">Register Now</a>
        </div>
      </div>
    </div>
    <div class="item">
      <?php
            $image_properties = array(
                'src' => 'assets/img/slides/j2.jpg',
                'alt' => 'Register Now',
                'width' => '700',
                'height' => '350'
            );

            echo img($image_properties);
        ?> 
      <div class="container">
        <div class="carousel-caption">
          <h4>Sheikhs & Ulama's Library.</h4>
          <p>Now you can find an amazing library of our Local Sheikhs and Ulama with their biographies.</p>
          <a class="btn btn-primary pull-right" href="library.php">Browse Library</a>
        </div>
      </div>
    </div>
    <div class="item">
      <?php
            $image_properties = array(
                'src' => 'assets/img/slides/j3.jpg',
                'alt' => 'Register Now',
                'width' => '700',
                'height' => '350'
            );

            echo img($image_properties);
        ?> 
      <div class="container">
        <div class="carousel-caption">
          <h4>The Database</h4>
          <p>View the Database of most of the Imam's and Ulama's and their biography, school, influences and many more.</p>
          <a class="btn btn-primary pull-right" href="scholars.php">Browse Database</a>
        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#Carousel" data-slide="prev">‹</a>
  <a class="right carousel-control" href="#Carousel" data-slide="next">›</a>
</div><!-- /.carousel -->