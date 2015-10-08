<section class="golfkeeper-page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="responsive-accordion responsive-accordion-default bm-larger">
                    <?php $i=0; ?>
                    <?php foreach($faqs_list as $f): ?>
                    <?php if($i==0): ?>
                    <li>
                        <div class="responsive-accordion-head active"><strong>Q:</strong> <?php echo $f->page_title; ?> <i class="icon icon-arrow-right responsive-accordion-plus"></i><i class="icon icon-arrow-up responsive-accordion-minus"></i></div>
                        <div class="responsive-accordion-panel active">
                            <p>
                               <?php echo $f->long_desc; ?>
                            </p> 
                        </div>
                    </li>
                    <?php $i=1; ?>
                    <?php else: ?>
                    <li>
                        <div class="responsive-accordion-head"><strong>Q:</strong> <?php echo $f->page_title; ?> <i class="icon icon-arrow-right responsive-accordion-plus"></i><i class="icon icon-arrow-up responsive-accordion-minus"></i></div>
                        <div class="responsive-accordion-panel">
                            <p>
                                <?php echo $f->long_desc; ?>
                            </p>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>