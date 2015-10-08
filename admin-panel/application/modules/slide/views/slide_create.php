
<h2>Slide</h2>
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
        
        <form role="form" class="form-horizontal form-groups-bordered validate" method="post" action="<?php echo base_url();?>slide/save" name="createPage">
          <input type="hidden" name="id" value="<?php if(isset($list['id'])){echo $list['id'];} else {echo '';}?>">
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Title</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" data-validate="required" data-message-required="Title is required" name="title" id="title" value="<?php if(isset($list['title'])){echo $list['title'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-2" class="col-sm-3 control-label">Alias</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" data-validate="required" name="alias" id="alias" value="<?php if(isset($list['alias'])){echo $list['alias'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-3" class="col-sm-3 control-label">Order</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" data-validate="number" name="order" id="field-3" value="<?php if(isset($list['order'])){echo $list['order'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-4" class="col-sm-3 control-label">Browse Image</label>
            
            <div class="col-sm-5">
                <input id="xFilePath" class="form-control" name="image" type="text" value="<?php if(isset($list['image'])){echo $list['image'];} else {echo '';}?>"/>
                <!-- <input id="xFilePath" name="FilePath" type="text" value=""/> -->
                <input type="button" value="Browse Image" class="btn btn-info btn-file" onclick="BrowseServer();" />
            </div>
          </div>

          <div class="form-group">
            <label for="field-3" class="col-sm-3 control-label">Slide Category</label>
            <div class="col-sm-5">
              <select name="scat_id" class="form-control">
                  <option value="">Select Slide Category</option>
                <?php foreach($dropdownlist as $s): ?>
                  <option value="<?php echo $s->id; ?>" <?php if(isset($list['scat_id'])){ if($s->id == $list['scat_id']){echo "selected";}} ?>><?php echo $s->title; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="field-3" class="col-sm-3 control-label">Width</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" data-validate="number" name="width" id="field-3" value="<?php if(isset($list['width'])){echo $list['width'];} else {echo '';}?>">
            </div>
          </div>

           <div class="form-group">
            <label for="field-3" class="col-sm-3 control-label">Height</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" data-validate="number" name="height" id="field-3" value="<?php if(isset($list['height'])){echo $list['height'];} else {echo '';}?>">
            </div>
          </div>

           <div class="form-group">
            <label for="field-3" class="col-sm-3 control-label">Alt Text</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="alt_text" id="field-3" value="<?php if(isset($list['alt_text'])){echo $list['alt_text'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-3" class="col-sm-3 control-label">Link</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="link" id="field-3" value="<?php if(isset($list['link'])){echo $list['link'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-ta_fd" class="col-sm-3 control-label">Description</label>
            
            <div class="col-sm-8">
              <textarea class="form-control autogrow" name="intro_desc" id="content" placeholder=""><?php if(isset($list['intro_desc'])){echo $list['intro_desc'];} else {echo '';}?></textarea>
               <?php echo display_ckeditor($ckeditor); ?>
            </div>
          </div>
          
          <div class="form-group">
            <!-- <div class="col-sm-offset-3 col-sm-5"> -->
            <label for="field-6" class="col-sm-3 control-label">State</label>
            <div class="col-sm-5">
              <div class="radio">
                <label>
                  <input type="radio" name="state" id="optionsRadios1" value="1" <?php if(isset($list['state'])){ if($list['state']==1) {echo "checked";}}else{echo "checked";} ?>>Yes
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="state" id="optionsRadios2" value="0" <?php if(isset($list['state'])){ if($list['state']==0) echo "checked";} ?>>No
                </label>
              </div>
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
