<form role="form" method="post" action="<?php echo base_url();?>courses/handler">

<input type="submit" name="add_new" value="Add New" class="btn btn-primary add-new"/>

<br />

<table class="table table-bordered datatable datatable-single" id="table-1">
  <thead>
    <tr>
      <th>Course Name</th>
      <th>state</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <? foreach($list as $r):?>
        <tr class="test">
          <td><?= $r->course_name ?></td>
          <td>
              <?php 
                    if($r->graduation_type == 1)
                    {
                        echo 'Master';
                    }
                    else
                    {
                       echo 'Bachelor';
                    }
                ?>
          </td>
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
          <td><a href='<?php echo base_url()?>courses/edit/<?php echo $r->id ?>' class="btn btn-default btn-sm btn-icon icon-left">
              <i class="entypo-pencil"></i>
              Edit
            </a>
            
            <a href="javascript:void(0)" onClick="alertDelete('<?php echo $r->id; ?>','<?php echo base_url();?>','courses','course')" class="btn btn-danger btn-sm btn-icon icon-left">
              <i class="entypo-cancel"></i>
              Delete
            </a></td>
        </tr>
    <? endforeach; ?>
   </tbody>
</table>
</form>



 