<section class="golfkeeper-page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <?php foreach($policies_list as $t): ?>
                <h3><?php echo $t->page_title; ?></h3>
                <p><?php echo $t->long_desc; ?></p>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>