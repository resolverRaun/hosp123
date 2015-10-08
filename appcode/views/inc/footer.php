<?php 
    $this->load->model('home_model');
    $link = $this->home_model->getSocialLinks(1);
?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class='golfkeeper-nav social'>
                        <li>
                            <a href="<?php echo $link->facebook_link; ?>"><i class='icon icon26 icon-fb'></i></a>
                        </li>
                        <li>
                            <a href="<?php echo $link->twitter_link; ?>"><i class='icon icon26 icon-tw'></i></a>
                        </li>
                        <li>
                            <a href="<?php echo $link->googleplus_link; ?>"><i class='icon icon26 icon-gp'></i></a>
                        </li>
                        <li>
                            <a href="<?php echo $link->linkedin_link; ?>"><i class='icon icon26 icon-li'></i></a>
                        </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class='golfkeeper-nav'>
                    <li>
                        <a href="<?php echo base_url(); ?>about">About Us</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>faq">FAQ's</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>terms">Terms &amp; Conditions</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>policies">Privacy Policy</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class='golfkeeper-copyright'>
                    <p>Copyright (c) 2014 Golfkeeper,  All right Reserved.</p>
                    <img src="<?php echo site_url('asset/img/view9-logo.png'); ?>" alt="View 9 Logo">
                </div>
            </div>
        </div>
    </div>
</footer>