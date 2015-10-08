<form role="form" method="post" action="<?php echo base_url();?>slidecategory/handler">
<br />

<table class="table table-bordered datatable datatable-single" id="table-1">
  <thead>
    <tr>
      <th>Title</th>
      <th>State</th>
      <th>Created Date</th>
      <th>Modified Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <? foreach($list as $r):?>
        <tr class="test">
          <td><?= $r->title ?></td>
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
          <td><?= $r->order ?></td>
          <td><?= $r->created_date ?></td>
          <td ><?= $r->modified_date ?></td>
          <td><a href='<?php echo base_url()?>slidecategory/edit/<?php echo $r->id ?>' class="btn btn-default btn-sm btn-icon icon-left">
              <i class="entypo-pencil"></i>
              Edit
            </a>
            
            <a href="javascript:void(0)" onClick="alertDelete('<?php echo $r->id; ?>','<?php echo base_url();?>','slidecategory','slide category')" class="btn btn-danger btn-sm btn-icon icon-left">
              <i class="entypo-cancel"></i>
              Delete
            </a></td>
        </tr>
    <? endforeach; ?>
   </tbody>
</table>
</form>