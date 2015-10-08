<!-- <section class="golfkeeper-page-about golfkeeper-features golfkeeper-row-container"> -->

<section class="golfkeeper-features golfkeeper-row-container">
    <h2 class="hide">Features</h2>
    <div class="golfkeeper-row colored create">
        <div class="container">
            <div class="row">
                <?php foreach($create as $c): ?>
                <div class="col-lg-6 col-md-6 col-sm-6 alt-screenshot">
                    <figure>
                        <img src="<?php echo base_url(); echo $c->image; ?>" alt="<?php echo $c->title; ?>">
                    </figure>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 alt-content">
                    <h3><?php echo $c->title; ?></h3>
                    <p><?php echo word_limiter($c->short_desc,20); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="golfkeeper-row manage">
        <div class="container">
            <div class="row">
                <?php foreach($manage as $m): ?>
                <div class="col-lg-6 col-md-6 col-sm-6 alt-content">
                    <h3><?php echo $m->title; ?></h3>
                    <p><?php echo word_limiter($m->short_desc,20); ?></p>     
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 alt-screenshot">
                    <figure>
                        <img src="<?php echo base_url(); echo $m->image; ?>" alt="<?php echo $m->title; ?>">
                    </figure>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="golfkeeper-row colored share">
        <div class="container">
            <div class="row">
             <?php foreach($share as $s): ?>
                <div class="col-lg-6 col-md-6 col-sm-6 alt-screenshot">
                    <figure>
                        <img src="<?php echo base_url(); echo $s->image; ?>" alt="<?php echo $s->title; ?>">
                    </figure>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 alt-content">
                   <h3><?php echo $s->title; ?></h3>
                   <p><?php echo word_limiter($s->short_desc,20); ?></p>   
                </div>
             <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>