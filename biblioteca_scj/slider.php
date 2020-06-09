<div id="my-carousel" class="carousel slide hero-slide hidden-xs" data-ride="carousel">
    <!-- Indicators -->
    <?php
    $banecou = 0;
	  $sqlB="SELECT * FROM silder WHERE estado = 'A' AND visible='Visible' ORDER BY idsc DESC";
		$rsB=$linkdocu->query($sqlB);
    
    if($rsB->num_rows>0){
    	echo"<ol class='carousel-indicators'>";
      while($rwB=$rsB->fetch_array()){
      	
      	$bane1 = $rwB["idsc"];
      	$bane2 = $rwB["titulo"];
      	$bane3 = $rwB["descripcion"];
      	$bane4 = $rwB["imagen"];
      	$bane5 = $rwB["link"];
      	$bane6 = $rwB["visible"];
      	
      	if($banecou=="0"){
      		$cla = "class='active'";
      	}else{ $cla = ""; }
      	
      	echo"<li data-target='#my-carousel' data-slide-to='$banecou' $cla></li>";
        
        $banecou = $banecou + 1;
      }
    	
      echo"</ol>";
    
    }
	
  ?>

<!--     <ol class="carousel-indicators">
        <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#my-carousel" data-slide-to="1"></li>
        <li data-target="#my-carousel" data-slide-to="2"></li>
    </ol> -->

    <!-- Wrapper for slides -->
    
    <?php
    $slicou = 0;
						  $sqlide="SELECT * FROM silder WHERE estado = 'A' AND visible='Visible' ORDER BY idsc ASC";
						  $rslide=$linkdocu->query($sqlide);
  if($rslide->num_rows>0){
  	echo"<div class='carousel-inner' role='listbox'>";
    while($rwlide=$rslide->fetch_array()){
    	$slicou = $slicou + 1;
    	  $slide1 = $rwlide["idsc"];
    	  $slide2 = $rwlide["titulo"];
    	$slide3 = $rwlide["descripcion"];
    	$slide4 = $rwlide["imagen"];
    	$slide5 = $rwlide["link"];
    	$slide6 = $rwlide["visible"];
    	
    	if($slicou==1){
    		$slicla = "active";
    	}else{ $slicla = ""; }
    	
    	echo"<div class='item $slicla'>
                <img src='ctrl_admin/images/auth/$slide4'>
                <!--<div class='carousel-caption'>
                    <h1>Strategic Management</h1>
                    <p>Efficiently develop parallel e-markets through impactful outsourcing.<br>Conveniently drive prospective functionalities before.</p>
                </div>-->
            </div>";
    }
  ?>	

<!--   <div class="item">
    <img src='ctrl_admin/images/auth/banner3.jpg'>
  </div> -->

<?php
    echo"</div>";
  }
	?>
   
<!--     <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="img/hero-slide-1.jpg" alt="Hero Slide">

            <div class="carousel-caption">
                <h1>Strategic Management</h1>

                <p>Efficiently develop parallel e-markets through impactful outsourcing.<br>Conveniently drive prospective functionalities before.</p>
            </div>
        </div>
        <div class="item">
            <img src="img/hero-slide-2.jpg" alt="...">

            <div class="carousel-caption">
                <h1>Market Analyst</h1>

                <p>Synergistically enhance low-risk high-yield testing procedures<br>with clicks-and-mortar architectures.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="img/hero-slide-3.jpg" alt="...">

            <div class="carousel-caption">
                <h1>Customer Care</h1>

                <p>Monotonectally envisioneer 24/7 bandwidth with reliable imperatives. <br>Continually unleash unique
                    niches after go forward.</p>
            </div>
        </div>
    </div> -->

    <!-- Controls -->
    <a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- #my-carousel-->

<!-- <section class="section-content-left-icon">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="left-icon-wraper">
                    <div class="icon">
                        <i class="flaticon-tags"></i>
                    </div>
                    
                    <div class="content">
                    <h2>SEO Experts</h2>
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="left-icon-wraper">
                <div class="icon"><i class="flaticon-ranking"></i></div>
                
                <div class="content">
                    <h2>Great Rankings</h2>
                    <p>Distinctively cultivate granular action items with standards compliant metrics. Holisticly promote empowered.</p>
                </div>
                    
                </div>
            </div>
            <div class="col-md-4">
              <div class="left-icon-wraper">

                <div class="icon"><i class="flaticon-idea"></i></div>
                <div class="content">
                  <h2>Brand Visibility</h2>
                  <p>Assertively facilitate go forward web services whereas intuitive e-markets. Completely parallel task world.</p>
                </div>
                   
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="left-icon-wraper">
                <div class="icon"><i class="flaticon-blogging"></i></div>

                 <div class="content">
                     <h2>Content Marketing</h2>
                    <p>Efficiently monetize technically sound e-markets rather than interoperable e-services.</p>
                 </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="left-icon-wraper">
                <div class="icon"><i class="flaticon-social-media"></i></div>

                 <div class="content">
                     <h2>Social Media</h2>
                    <p>Collaboratively seize best-of-breed manufactured products for inexpensive initiatives. Dynamically repurpose.</p>
                 </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="left-icon-wraper">
                <div class="icon"><i class="flaticon-viral-marketing"></i></div>

                <div class="content">
                    <h2>Digital Marketing</h2>
                    <p>Enthusiastically promote standards compliant relationships vis-a-vis backend resources.</p>
                </div>
                   
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- /.services-left-icon -->

<!-- <section class="featured-box">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="featured-content-wrapper">
            <div class="featured-img">
                <img class="img-responsive" src="img/img-featured-1.png" alt="">
            </div>
            <div class="featured-content">
                <h1>We Improve Your Online Performance</h1>
                <p>
                    Dynamically enhance accurate methods of empowerment without interdependent applications. Appropriately e-enable synergistic platforms for visionary manufactured products. Dramatically develop state of the art relationships without enterprise-wide methodologies.
                </p>
                <a href="" class="btn btn-default btn-lg">Learn More About Us</a>
            </div>
            </div>
            </div>
        </div>
    </div>
</section> -->
<!-- /.featured-box -->