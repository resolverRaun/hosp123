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
        
        <form role="form" class="form-horizontal form-groups-bordered validate" method="post" action="<?php echo base_url();?>district/save" name="createPage">
          <input type="hidden" name="id" value="<?php if(isset($list['id'])){echo $list['id'];} else {echo '';}?>">
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">District Name</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" data-validate="required" data-message-required="District name is required" name="district_name" id="district_name" value="<?php if(isset($list['district_name'])){echo $list['district_name'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
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
