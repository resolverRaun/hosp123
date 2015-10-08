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
        
        <form role="form" class="form-horizontal form-groups-bordered validate" method="post" action="<?php echo base_url();?>courses/save" name="createPage">
          <input type="hidden" name="id" value="<?php if(isset($list['id'])){echo $list['id'];} else {echo '';}?>">
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Courses Name</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" data-validate="required" data-message-required="Course name is required" name="course_name" id="course_name" value="<?php if(isset($list['course_name'])){echo $list['course_name'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-3" class="col-sm-3 control-label">Graduation Type</label>
            <div class="col-sm-5">
              <select name="graduation_type" class="form-control" data-validate="required">
                  <option value="">Select</option>
                <?php foreach($sectionlist as $s): ?>
                  <option value="0" <?php if(isset($list['graduation_type'])){ if($list['graduation_type'] == 0){echo "selected";}} ?>>Bachelor</option>
                  <option value="1" <?php if(isset($list['graduation_type'])){ if($list['graduation_type'] == 1){echo "selected";}} ?>>Master</option>
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
