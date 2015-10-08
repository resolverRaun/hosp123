
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
        
        <form role="form" class="form-horizontal form-groups-bordered validate" method="post" action="<?php echo base_url(); ?>user/save" name="createPage">
          <input type="hidden" name="id" value="<?php if(isset($list['id'])){echo $list['id'];} else {echo '';}?>">
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Fullname</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" data-validate="required" data-message-required="Fullname is required" name="fullname" id="fullname" value="<?php if(isset($list['fullname'])){echo $list['fullname'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Useremail</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" data-validate="required,email" data-message-required="Useremail is required" name="useremail" id="useremail" value="<?php if(isset($list['useremail'])){echo $list['useremail'];} else {echo '';}?>">
            </div>
          </div>

          <?php if(!isset($list['id'])) : ?>

          <div class="form-group">
            <label for="field-3" class="col-sm-3 control-label">Password</label>
            
            <div class="col-sm-5">
              <input type="password" class="form-control" data-validate="required" name="password" id="password">
            </div>
          </div>

          <div class="form-group">
            <label for="field-4" class="col-sm-3 control-label">Confirm Password</label>
            
            <div class="col-sm-5">
              <input type="password" class="form-control" data-validate="required,equalTo[#password]" data-message-equal-to="Passwords doesn't match." name="conf_password" id="conf_password">
            </div>
          </div>

          <?php endif; ?>

          <div class="form-group">
            <label for="field-3" class="col-sm-3 control-label">Usertype</label>
            <div class="col-sm-5">
              <select name="user_type_id" class="form-control" data-validate="required">
                  <option value="">Select usertype</option>
                <?php foreach($usertype_list as $s): ?>
                  <option value="<?php echo $s->position_id; ?>" <?php if(isset($list['user_type_id'])){ if($s->position_id == $list['user_type_id']){echo "selected";}} ?>><?php echo $s->usertype; ?></option>
                <?php endforeach; ?>
              </select>
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
<!-- End view9 end of the basicform -->
