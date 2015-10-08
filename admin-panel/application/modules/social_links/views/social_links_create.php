
<h2><?php echo $heading; ?></h2>
<br/>

<div class="row">
  <div class="col-md-12">
    
    <div class="panel panel-primary" data-collapsed="0">
    
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo $panel_title; ?>
        </div>
        
        <div class="panel-options">

        </div>
      </div>
      
      <div class="panel-body">
        
        <form role="form" class="form-horizontal form-groups-bordered validate" method="post" action="<?php echo base_url();?>social_links/create" name="createPage">
          <input type="hidden" name="id" value="<?php if(isset($list['id'])){echo $list['id'];} else {echo '';}?>">
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Facebook Link</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="facebook_link" id="facebook_link" data-validate="required,url" placeholder="Facebook URL" value="<?php if(isset($list['facebook_link'])){echo $list['facebook_link'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Twitter Link</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="twitter_link" id="twitter_link" data-validate="required,url" placeholder="Twitter URL" value="<?php if(isset($list['twitter_link'])){echo $list['twitter_link'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Linkedin Link</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="linkedin_link" id="linkedin_link" data-validate="required,url" placeholder="Twitter URL" value="<?php if(isset($list['twitter_link'])){echo $list['linkedin_link'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Google+ Link</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="googleplus_link" id="googleplus_link" data-validate="required,url" placeholder="Google+ URL" value="<?php if(isset($list['googleplus_link'])){echo $list['googleplus_link'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Google Play Store Link</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="android_store_link" id="android_store_link" data-validate="required,url" placeholder="Google Play Store Link" value="<?php if(isset($list['android_store_link'])){echo $list['android_store_link'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Ios App Store</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="ios_store_link" id="ios_store_link" data-validate="required,url" placeholder="IOS App Store Link" value="<?php if(isset($list['ios_store_link'])){echo $list['ios_store_link'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Mail Chimp API Key</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="mailchimp_api_key" id="mailchimp_api_key" data-validate="required" placeholder="Mailchimp Api Key" value="<?php if(isset($list['mailchimp_api_key'])){echo $list['mailchimp_api_key'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Mailchimp Campaign List ID</label>
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="campaign_list_id" id="campaign_list_id" data-validate="required" placeholder="Campaign List ID" value="<?php if(isset($list['campaign_list_id'])){echo $list['campaign_list_id'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Youtube Video Link</label>
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="youtube_video_link" id="youtube_video_link" data-validate="required" placeholder="About Page Video Link" value="<?php if(isset($list['youtube_video_link'])){echo $list['youtube_video_link'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
              <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-5">
              <button type="submit" class="btn btn-success" name="save">Submit</button>
              <button type="reset" class="btn">Reset</button>
            </div>
          </div>
        </form>
      </div>
    
    </div>
  
  </div>
</div>
<!-- End view9 end of the basicform -->
