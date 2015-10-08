<form role="form" method="post" action="<?php echo base_url();?>user/handler">

<input type="submit" name="add_new" value="Add New" class="btn btn-primary add-new"/>

<br />

<table class="table table-bordered datatable datatable-single" id="table-1">
  <thead>
    <tr>
      <th>Name</th>
      <th>Usertype</th>
      <th>Email</th>
      <th>State</th>
      <th>Created Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <? foreach($list as $r):?>
      <?php if(!($r->user_type_id == '1')): ?>
        <tr class="test">
          <td><?php if($r->fullname) {echo $r->fullname;} else { echo '';}?></td>
          <td>
              <?php foreach($usertype_list as $s){
                  if($s->position_id == $r->user_type_id){
                    echo $s->usertype;
                  }
                }
              ?>
          </td>
          <td><?= $r->useremail ?></td>
          <td>
              <?php 
                    if($r->state == 1)
                    {
                        $publish = array(
                        'src'=>'assets/images/publish_g.png',
                        'title'=>'your article has been published',
                        );
                        echo img($publish);
                    }
                    else
                    {
                        $unpublish = array(
                        'src'=>'assets/images/publish_x.png',
                        'title'=>'your article has been unpublished',
                        );
                    echo img($unpublish);
                    }
                ?>
          </td>
          <td><?= $r->created_date ?></td>
          <td><a href='<?php echo base_url()?>user/edit/<?php echo $r->id ?>' class="btn btn-default btn-sm btn-icon icon-left">
              <i class="entypo-pencil"></i>
              Edit
            </a>
            <a href="javascript:void(0)" onClick="alertDelete('<?php echo $r->id; ?>','<?php echo base_url();?>','user','delete users')" class="btn btn-danger btn-sm btn-icon icon-left">
              <i class="entypo-cancel"></i>
              Delete
            </a>
          </td>
        </tr>
      <?php endif; ?>
    <? endforeach; ?>
   </tbody>
</table>
</form>




 