<style type="text/css" media="screen">

#demo {
  height:100%;
  position:relative;
  overflow:hidden;
}


.green{
  background-color:#6fb936;
}
        .thumb{
            margin-bottom: 30px;
        }
        
        .page-top{
            margin-top:85px;
        }

   
img.zoom {
    width: 100%;
    height: 200px;
    border-radius:5px;
    object-fit:cover;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
}
        
 
.transition {
    -webkit-transform: scale(1.2); 
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}
    .modal-header {
   
     border-bottom: none;
}
    .modal-title {
        color:#000;
    }
    .modal-footer{
      display:none;  
    }

</style>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
 


    <!-- Page Content -->
   <div class="container page-top">



        <div class="row">


            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w1.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto01.jpg" class="zoom img-fluid "  alt="">
              </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w2.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto02.jpg" class="zoom img-fluid"  alt="">
              </a>
            </div>
            
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w3.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto03.jpg" class="zoom img-fluid "  alt="">
              </a>
            </div>
            
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w4.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto04.jpg" class="zoom img-fluid "  alt="">
              </a>
            </div>
            
             <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w5.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto05.jpg" class="zoom img-fluid "  alt="">
              </a>
            </div>
            
             <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w6.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto06.jpg" class="zoom img-fluid "  alt="">
              </a>
            </div>
            
             <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w7.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto07.jpg" class="zoom img-fluid "  alt="">
              </a>
            </div>
            
             <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w8.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto08.jpg" class="zoom img-fluid "  alt="">
              </a>
            </div>
            
             <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w9.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto09.jpg" class="zoom img-fluid "  alt="">
              </a>
            </div>
            
             <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w10.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto10.jpg" class="zoom img-fluid "  alt="">
              </a>
            </div>
            
             <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w11.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto11.jpg" class="zoom img-fluid "  alt="">
              </a>
            </div>
            
             <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a href="img/galeria/galfotos/w12.jpg" class="fancybox" rel="ligthbox">
                <img src="img/galeria/foto12.jpg" class="zoom img-fluid "  alt="">
              </a>
            </div>            
           
           
       </div>

     
      

    </div>

<script type="text/javascript">
    $(document).ready(function(){
      $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
        
        $(".zoom").hover(function(){
            
            $(this).addClass('transition');
        }, function(){
            
            $(this).removeClass('transition');
        });
    });    

</script>