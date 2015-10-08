
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
        
        <form role="form" class="form-horizontal form-groups-bordered validate" method="post" action="<?php echo base_url();?>contact/create" name="createPage">
          <input type="hidden" name="id" value="<?php if(isset($list['id'])){echo $list['id'];} else {echo '';}?>">
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Company Name</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="company_name" id="company_name" value="<?php if(isset($list['company_name'])){echo $list['company_name'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">First Name</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="first_name" id="first_name" value="<?php if(isset($list['first_name'])){echo $list['first_name'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Middle Name</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="middle_name" id="middle_name" value="<?php if(isset($list['middle_name'])){echo $list['middle_name'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Last Name</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="last_name" id="last_name" value="<?php if(isset($list['last_name'])){echo $list['last_name'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Permanent Address</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="permanent_address" id="permanent_address" value="<?php if(isset($list['permanent_address'])){echo $list['permanent_address'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Temproary Address</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="temproary_address" id="temproary_address" value="<?php if(isset($list['temproary_address'])){echo $list['temproary_address'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Telephone</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="telephone" id="telephone" value="<?php if(isset($list['telephone'])){echo $list['telephone'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Mobile</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="mobile" id="mobile" value="<?php if(isset($list['mobile'])){echo $list['mobile'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Fax</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="fax" id="fax" value="<?php if(isset($list['fax'])){echo $list['fax'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Zip Code</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="zipcode" id="zipcode" value="<?php if(isset($list['zipcode'])){echo $list['zipcode'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Country</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="country" id="country" value="<?php if(isset($list['country'])){echo $list['country'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">State</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  name="c_state" id="c_state" value="<?php if(isset($list['c_state'])){echo $list['c_state'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Email 1</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" data-required = "email"  name="email1" id="email1" value="<?php if(isset($list['email1'])){echo $list['email1'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Email 2</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" data-required = "email"  name="email2" id="email2" value="<?php if(isset($list['email2'])){echo $list['email2'];} else {echo '';}?>">
            </div>
          </div>

          <div class="form-group">
            <label for="field-ta_fd" class="col-sm-3 control-label">About Company</label>
            
            <div class="col-sm-8">
              <textarea class="form-control autogrow" name="about_company" id="content" placeholder=""><?php if(isset($list['about_company'])){echo $list['about_company'];} else {echo '';}?></textarea>
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
