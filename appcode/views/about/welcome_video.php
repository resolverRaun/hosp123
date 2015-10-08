<section class="golfkeeper-page-about golfkeeper-row-container">
    <div class='alt-element'>
        <div class='container'>
            <div class='golfkeeper-row'>
                <?php foreach($welcome_app as $p): ?>
                <div class="col-xs-12 col-md-4">
                    <figure>
                        <img src="<?php echo base_url(); echo $p->image; ?>" alt="<?php echo $p->title; ?>" class="welcome-image">
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <h3><span>Welcome to</span><?php echo $p->title; ?></h3>
                    <p><?php echo word_limiter($p->short_desc,60); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class='alt-element alt-element-video'>
        <div class='container' id="videoInfo" style="opacity:1; z-index:9;">
            <div class='golfkeeper-row'>
                <?php foreach($using_app as $u): ?>
                <h3><?php echo $u->title; ?></h3>
                <p><?php echo word_limiter($u->short_desc,60); ?></p>
                <a class="playvideo" href="javascript:;" onClick="toggleVideo();">Play Video</a>
                <?php endforeach; ?>
            </div>
        </div>
        <div id="yTvid" style="display:none">
            <iframe id="golfkeeperapp_vid" frameborder="0" allowfullscreen="1" width="720" height="405" src="<?php echo $links->youtube_video_link; ?>"></iframe>
        </div>
        <a class="closeyt" id="closeYT" href="javascript:;" onClick="toggleVideo('hide');" style="opacity:0; z-index:-1;">close</a>
    </div>
</section>
