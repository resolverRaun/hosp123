<form role="form" method="post" action="<?php echo base_url();?>seo/handler">
<br />

<table class="table table-bordered datatable datatable-single" id="table-1">
  <thead>
    <tr>
      <th>Page Title</th>
      <th>Site Title</th>
      <th>Created Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <? foreach($list as $r):?>
        <tr class="test">
          <td><?= $r->page_title ?></td>
          <td><?= $r->site_title ?></td>
          <td><?= $r->created_date ?></td>
          <td><a href='<?php echo base_url()?>seo/edit/<?php echo $r->id ?>' class="btn btn-default btn-sm btn-icon icon-left">
              <i class="entypo-pencil"></i>
              Edit
            </a>
          </td>
        </tr>
    <? endforeach; ?>
   </tbody>
</table>
</form>



 