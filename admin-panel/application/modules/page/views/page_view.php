<form role="form" method="post" action="<?php echo base_url();?>page/handler">

<input type="submit" name="add_new" value="Add New" class="btn btn-primary add-new"/>
<br />

<table class="table table-bordered datatable datatable-single" id="table-1">
  <thead>
    <tr>
      <th>Title</th>
      <th>Category</th>
      <th>State</th>
      <th>Created Date</th>
      <th>Modified Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <? foreach($list as $r):?>
        <tr class="test">
          <td><?= $r->page_title ?></td>
           <td>
              <?php foreach($cat_list as $c){
                  if($c->id == $r->cat_id){
                    echo $c->cat_title;
                  }
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
          <td><?= $r->created_date ?></td>
          <td ><?= $r->modified_date ?></td>
          <td><a href='<?php echo base_url()?>page/edit/<?php echo $r->id ?>' class="btn btn-default btn-sm btn-icon icon-left">
              <i class="entypo-pencil"></i>
              Edit
            </a>
            
            <a href="javascript:void(0)" onClick="alertDelete('<?php echo $r->id; ?>','<?php echo base_url();?>','page','page')" class="btn btn-danger btn-sm btn-icon icon-left">
              <i class="entypo-cancel"></i>
              Delete
            </a> </td>
        </tr>
    <? endforeach; ?>
   </tbody>
</table>
</form>



 