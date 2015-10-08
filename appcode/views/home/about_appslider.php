<?php if($about_app) : ?>
<section class="golfkeeper-about">
<?php foreach($about_app as $p): ?>
    <h2 class="hide"><?php echo $p->page_title ;?></h2>
    <div class="container">
            <div class="row">
                <div class="col-lg-12 golfkeeper-content">
                    <p class="lead"><?php echo word_limiter($p->short_desc,40); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 golfkeeper-screenshot">
                    <div id="golfkeeper-carousel" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                        	<?php $i=0; ?>
                    		<?php foreach($slides as $s): ?>
                            <?php if($i==0){ ?>
                            <div class="item active">
                                <img src="<?php echo base_url(); echo $s->image; ?>" alt="...">
                            </div>
                            <?php $i=1; ?>
                        	<?php } ?>
                        	<?php if($i==1) { ?>
                            <div class="item">
                                <img src="<?php echo base_url(); echo $s->image; ?>" alt="...">
                            </div>
                            <?php } ?>
                        	<?php endforeach; ?>
                        </div>
                        
                        <a class="left carousel-control" href="#golfkeeper-carousel" role="button" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left icon icon68 icon-arrow-down"></span>
                        </a>
                        <a class="right carousel-control" href="#golfkeeper-carousel" role="button" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right icon icon68 icon-arrow-down"></span>
                        </a>
                    </div>
                </div>
            </div>
    </div>
<?php endforeach; ?>
</section>
<?php endif; ?>