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
          <!-- <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
          <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
          <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
          <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> -->
        </div>
      </div>
      
      <div class="panel-body">
        
        <form role="form" class="form-horizontal form-groups-bordered validate" method="post" action="<?php echo base_url();?>seo/save" name="createPage">
          <input type="hidden" name="id" value="<?php if(isset($list['id'])){echo $list['id'];} else {echo '';}?>">
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Page Title</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" data-validate="required" data-message-required="Page Title is required" name="page_title" id="page_title" value="<?php if(isset($list['page_title'])){echo $list['page_title'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-4" class="col-sm-3 control-label">Site Title</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" name="site_title" id="field-4" placeholder="" value="<?php if(isset($list['site_title'])){echo $list['site_title'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-ta" class="col-sm-3 control-label">Meta Description</label>
            
            <div class="col-sm-5">
              <textarea class="form-control autogrow" name="metadesc" id="field-ta" placeholder=""><?php if(isset($list['metadesc'])){echo $list['metadesc'];} else {echo '';}?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="field-5" class="col-sm-3 control-label">Meta key</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" name="metakey" id="field-5" placeholder="" value="<?php if(isset($list['metakey'])){echo $list['metakey'];} else {echo '';}?>">
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
