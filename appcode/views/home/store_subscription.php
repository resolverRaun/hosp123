
<section class="golfkeeper-store golfkeeper-row-container">
    <h2 class="hide">Store and Subscription</h2>
    <div class="golfkeeper-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <header>
                        <h3>Stay tuned!</h3>
                        <p>Get regular email notifications for every updates</p>
                    </header>
                    <div class="golfkeeper-subscription-form">
                        <form id="golfkeeper_subscription_form">
                            <div class="input-group">
                               <input class="form-control" name="subscribe_email" id="email" type="email" placeholder="Enter your email..." required>
                               <button class="btn btn-info btn-lg" id="btnSubmit" type="submit">Subscribe</button>
                            </div>
                            <div class="subscription_form_msg">
                            </div>
                            <div class="auto-validate">
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="golfkeeper-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <header>
                        <h3 title="Get golf app on your smartphone">Get this app <span>on your smartphone</span></h3>
                    </header>
                    <div class="golfkeeper-store-links">
                        <ul class="golfkeeper-verticle-list">
                            <li class="btn btn-lg btn-primary"><a href="<?php echo $link->ios_store_link; ?>"><div class="app-logo-container"><i class="icon icon32 icon-apple"></i></div> <span>Available on the <br><strong>App Store</strong></span></a></li>
                            <li class="btn btn-lg btn-info"><a href="<?php echo $link->android_store_link; ?>"><div class="app-logo-container"><i class="icon icon32 icon-android"></i></div> <span>Android app on <br><strong>Google Play</strong></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

