<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>





 <!--  
        If you want to change #bootstrap-touch-slider id then you have to change Carousel-indicators and Carousel-Control  #bootstrap-touch-slider slide as well
        Slide effect: slide, fade
        Text Align: slide_style_center, slide_style_left, slide_style_right
        Add Text Animation: https://daneden.github.io/animate.css/
        -->


        <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- Third Slide -->
                <div class="item active">

                    <!-- Slide Background -->
                    <img src="<?php echo base_url()?>assets/img/children.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>

                    <div class="container">
                        <div class="row">
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_left">
                                <h1 data-animation="animated zoomInRight">FAMHEALTH</h1>
                                <p data-animation="animated fadeInLeft">Education is a powerful tool.</p>
                                <a href="#"  class="btn btn-default" data-animation="animated fadeInLeft">Our Courses</a>
                                <a href="#"   class="btn btn-primary" data-animation="animated fadeInRight">The Students</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Second Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="<?php echo base_url()?>assets/img/courses.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                        <h1 data-animation="animated flipInX">FAMHEALTH</h1>
                        <p data-animation="animated lightSpeedIn">Make the world a better place.</p>
                        <a href="#"  class="btn btn-default" data-animation="animated fadeInUp">Our Awards</a>
                        <a href="#"   class="btn btn-primary" data-animation="animated fadeInDown">Our Events</a>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Third Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="<?php echo base_url()?>assets/img/nature.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_right">
                        <h1 data-animation="animated zoomInLeft">FAMHEALTH</h1>
                        <p data-animation="animated fadeInRight">Changes lives today for a better tomorrow.</p>
                        <a href="#"  class="btn btn-default" data-animation="animated fadeInLeft">Who Are We?</a>
                        <a href="#"  class="btn btn-primary" data-animation="animated fadeInRight">What We do</a>
                    </div>
                </div>
                <!-- End of Slide -->


            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div> <!-- End  bootstrap-touch-slider Slider -->
        
        
        
             
          <div style="text-align: center;margin-top: 150px; margin-bottom:100px">

          <h3>WHO ARE WE?</h3>  

          </div>
          
          <div style="text-align: center;margin-top: 150px; margin-bottom:100px"> 

          | <a href="#" > CTA sytem </a> |

          </div>
          