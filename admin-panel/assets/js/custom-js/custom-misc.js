$(document).ready(function(){
       
    $(".datatable-single").dataTable({
      "sPaginationType": "bootstrap",
      "bSort": false,
      "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      "bStateSave": true
    });
    
    $(".dataTables_wrapper select").select2({
      minimumResultsForSearch: -1
    });

    alertify.defaults.glossary.title="Golfkeeper";
});

function alertDelete(id,base_url,controller_name,title){
	 alertify.confirm('Are you sure you want to delete '+ title +'?', function () {
     alertify.defaults.glossary.title= title;
           window.location.href= base_url + controller_name +'/delete/'+id;
      }); 
    return false;
}

  function alert_course(id){
      alertDelete(id,base_url,'golfscorecard','golf scorecard');
  }
