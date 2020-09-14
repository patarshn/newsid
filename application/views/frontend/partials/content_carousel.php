
<!-- CAROUSEL -->
<section id="intro">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    
        <ol class="carousel-indicators">
            <?php
            $cLen = count($carousel);
            for($i=0;$i<$cLen;$i++){
                if($i == 0){
                    echo '<li data-target="#carouselExampleCaptions" data-slide-to="'.$i.'" class="active"></li>';
                }
                else{
                    echo '<li data-target="#carouselExampleCaptions" data-slide-to="'.$i.'"></li>';
                }
                
            }
            ?>
            
            
        </ol>
        <!--
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        -->
        <div class="carousel-inner">
            
            <?php 
            $count = 0;
            foreach($carousel as $c): 
            if($count == 0){
                echo '<div class="carousel-item active">';
            }
            else{
                echo '<div class="carousel-item">';
            }
            $count++;
            ?>
                <img src="<?=base_url('assets/'.$c->image)?>" class="d-block myw-100" alt="">
                <div class="black-overlay">
                    <div class="carousel-caption d-md-block">
                        <h5><?=$c->title?></h5>
                        <p><?=$c->description?></p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <!--
            <div class="carousel-item">
                <img src="<?=base_url('assets/my/img/carousel/2.jpg')?>" class="d-block myw-100" alt="">
                <div class="black-overlay">
                    <div class="carousel-caption d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?=base_url('assets/my/img/carousel/3.jpg')?>" class="d-block myw-100" alt="">
                <div class="black-overlay">
                    <div class="carousel-caption d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<!-- END CAROUSEL -->