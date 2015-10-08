<form role="form" method="post" action="<?php echo base_url();?>category/handler">

<br />

<table class="table table-bordered datatable datatable-single" id="table-1">
  <thead>
    <tr>
      <th>Title</th>
      <th>Section</th>
      <th>State</th>
      <th>Created Date</th>
      <th>Modified Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <? foreach($list as $r):?>
        <tr class="test">
          <td><?= $r->cat_title ?></td>
          <td>
              <?php foreach($section_list as $s){
                  if($s->id == $r->sec_id){
                    echo $s->sec_title;
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
          <td><a href='<?php echo base_url()?>category/edit/<?php echo $r->id ?>' class="btn btn-default btn-sm btn-icon icon-left">
              <i class="entypo-pencil"></i>
              Edit
            </a>
          </tr>
    <? endforeach; ?>
   </tbody>
</table>
</form>



 