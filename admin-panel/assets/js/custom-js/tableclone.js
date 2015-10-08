
$(function(){
	var counter = 1;
	// // //select ajax call to load tee color
 //          $.ajax({
 //                   url:'<?php echo base_url();?>golfscorecard/getTeeColor',
 //                   cache:false,
 //                   success: function(data)
 //                   {
 //                     alert(data);
 //                     var teecolordata = data; 
 //                   }
 //                });
	// // //select ajax call to load tee color
	// alert(teecolordata);

	$("#holepardiv").hide();
	$('body').on('click', '#deleterow', function() {
		$('#test-table tr:last').remove();
		counter--;
		return false;
	});
	$('body').on('click', '#addrow', function() {
			var tot_holes = $('#tot_holes').val();
			new_teename = $("#table-textinputtemplate-teename").attr("name", "defaultscore[" + counter + "][teename]");
			new_teecolor = $("#table-textinputtemplate-teecolor").attr("name", "defaultscore[" + counter + "][teecolor]");
			new_sloperating = $("#table-textinputtemplate-sloperating").attr("name", "defaultscore[" + counter + "][sloperating]");
			new_courserating = $("#table-textinputtemplate-courserating").attr("name", "defaultscore[" + counter + "][courserating]");
        	for (var k = 1; k<=tot_holes; k++){
        		$("#hole_marker_distance"+ +k).attr("name", "defaultscore[" + counter + "]["+ k +"][hole_marker_distance]");
			}
			for (var k = 1; k<=tot_holes; k++){
        		$("#par"+ +k).attr("name", "defaultscore[" + counter + "]["+ k +"][par]");
			}
			for (var k = 1; k<=tot_holes; k++){
        		$("#handicap"+ +k).attr("name", "defaultscore[" + counter + "]["+ k +"][handicap]");
			}    
            new_elem = $(".addr-template").clone().appendTo("#test-table tbody").show().attr("class", "addr" + counter + " templatereset");
            counter = counter + 1; 

            $('.req-custom').each(function () {
			    $(this).rules("add", {
			        required: true
				});
			});
		 $('defaultscore[2][teename]').each(function () {
			    $(this).rules("add", {
			        required: true
				});
			});

	});

	$("#tot_holes").change(function(){
		$('#holepardiv').show();
		var totholes = $('#tot_holes').val();
		//Start Done For header Only
		
		//Start For reseting the template table adder
		$(".templatereset").empty();
		//Start For reseting the template table adder
		
		$('#header-js').empty();
		// Start Js for tee and color
			$("#header-js").append('<th>Tee Name</th>');
			$("#header-js").append('<th>Tee Color</th>');
			$("#header-js").append('<th>Slope Rating</th>');
			$("#header-js").append('<th>Course Rating</th>');
		// End Js for tee and color
		
		//Start Js For Hole Only
		for (var i = 1; i<=totholes; i++){
			$("#header-js").append('<th>Hole '+ +i +'</th>');
		}
		//End Js For Hole Only
		
		//Start Js For Par Only
		for (var i=1; i<=totholes; i++){
			$("#header-js").append('<th>Par '+ +i +'</th>');
		}
		//End Js For Par Only

		//Start Js For Handicap Only
		for (var i=1; i<=totholes; i++){
			$("#header-js").append('<th>Handicap '+ +i +'</th>');
		}
		//End Js For Handicap Only
	
		//Start For action only
		$("#header-js").append('<th>Add Tee</th>');
		$("#header-js").append('<th>Delete Tee</th>');
		//End For action only

		//End Done For header Only
		
			//Start For Input boxes Only
			$('#textinput-templatejs').empty();
			$("#textinput-templatejs").append('<td><input type="text" class="form-control tee req-custom" data-validate="required" name="defaultscore[teename]" id="table-textinputtemplate-teename" ></td>');
			$("#textinput-templatejs").append('<td><select name="defaultscore[teecolor]" class="form-control tee teecolor req-custom" data-validate="required" id="table-textinputtemplate-teecolor"><option value="">Select teecolor</option></select></td>');
			$("#textinput-templatejs").append('<td><input type="text" class="form-control tee req-custom" data-validate="required" name="defaultscore[sloperating]" id="table-textinputtemplate-sloperating" ></td>');
			$("#textinput-templatejs").append('<td><input type="text" class="form-control tee req-custom" data-validate="required" name="defaultscore[courserating]" id="table-textinputtemplate-courserating" ></td>');

			// var counter = 1;
			// Start for holes
			for(var j=1; j<=totholes; j++){
				$("#textinput-templatejs").append('<td><input type="text" class="form-control hole_marker_distance_class req-custom" data-validate="required" name="defaultscore[][][hole_marker_distance]" id="hole_marker_distance'+ +j +'" ></td>');
			}
			//End for holes

			//Start For par
			for(var j=1; j<=totholes; j++){
				$("#textinput-templatejs").append('<td><input type="text" class="form-control par_class req-custom" data-validate="required" name="defaultscore[][][par]" id="par'+ +j +'" ></td>');
			}
			//End For par

			//Start For handicap
			for(var j=1; j<=totholes; j++){
				$("#textinput-templatejs").append('<td><input type="text" class="form-control handicap_class req-custom" data-validate="required" name="defaultscore[][][handicap]" id="handicap'+ +j +'" ></td>');
			}
			//End For handicap

			// Start For Action only
				$("#textinput-templatejs").append('<td><button type="button" id="addrow" class="btn btn-default btn-icon addRow">Add Tee<i class="entypo-plus"></i></button></td>');
				$("#textinput-templatejs").append('<td><button type="button" id="deleterow" class="btn btn-default btn-icon addDelete">Delete Tee<i class="entypo-cancel"></i></button></td>');
			// End For Action only

		//End For Input boxes Only

		/** Start for addr0 
		 *  Start for Input boxes for first row*/
				
			//Start For Input boxes Only
			$('#textinput-js').empty();
			$("#textinput-js").append('<td><input type="text" class="form-control tee req-custom" data-validate="required" name="defaultscore[0][teename]" id="table-textinput-teename" ></td>');
			$("#textinput-js").append('<td><select name="defaultscore[0][teecolor]" class="form-control tee teecolor req-custom" data-validate="required" id="table-textinput-teecolor"><option value="">Select teecolor</option></select></td>');
			$("#textinput-js").append('<td><input type="text" class="form-control tee req-custom" data-validate="required" name="defaultscore[0][sloperating]"  id="table-textinput-sloperating" ></td>');
			$("#textinput-js").append('<td><input type="text" class="form-control tee req-custom" data-validate="required" name="defaultscore[0][courserating]"  id="table-textinput-courserating" ></td>');

			// Start for holes
			for(var j=1; j<=totholes; j++){
				$("#textinput-js").append('<td><input type="text" class="form-control hole_marker_distance_class req-custom" data-validate="required" name="defaultscore[0]['+j+'][hole_marker_distance]"  ></td>');
			}
			//End for holes

			//Start For par
			for(var j=1; j<=totholes; j++){
				$("#textinput-js").append('<td><input type="text" class="form-control par_class req-custom" data-validate="required" name="defaultscore[0]['+j+'][par]"  ></td>');
			}
			//End For par

			//Start For handicap
			for(var j=1; j<=totholes; j++){
				$("#textinput-js").append('<td><input type="text" class="form-control handicap_class req-custom" data-validate="required" name="defaultscore[0]['+j+'][handicap]"  ></td>');
			}
			//End For handicap

			// Start For Action only
				$("#textinput-js").append('<td><button type="button" id="addrow" class="btn btn-default btn-icon addRow">Add Tee<i class="entypo-plus"></i></button></td>');
				$("#textinput-js").append('<td><button type="button" id="deleterow" class="btn btn-default btn-icon addDelete">Delete Tee<i class="entypo-cancel"></i></button></td>');
			// End For Action only			 

		 /**End for addr0 
		 *End for Input boxes for first row
		 */
		
            $('.req-custom').each(function () {
			    $(this).rules("add", {
			        required: true
				});
			});

	});

	// function rules(){
	// 	$( ".tee" ).rules( "add", {
 //  			required: true,
 // 		});
	// }
	
	// // Starting for edit portion only
	// $('body').on('click', '#deleterowedit', function() {
	// 	$('#test-tableedit tr:last').remove();
	// 	var counteredit = counteredit  + -1;
	// });

	// $('body').on('click', '#addrowedit', function() {
	// 	var rowCount = $('#test-tableedit tbody tr').length;
	// 	var counteredit = +rowCount + -1;
	// 	var tot_holes = $('#tot_holes').val();
	// 		new_teename = $("#table-textinputtemplate-teename").attr("name", "defaultscore[" + counteredit + "][teename]");
	// 		new_teecolor = $("#table-textinputtemplate-teecolor").attr("name", "defaultscore[" + counteredit + "][teecolor]");
	// 		new_sloperating = $("#table-textinputtemplate-sloperating").attr("name", "defaultscore[" + counteredit + "][sloperating]");
 //        	for (var k = 1; k<=tot_holes; k++){
 //        		$("#hole_marker_distance"+ +k).attr("name", "defaultscore[" + counteredit + "]["+ k +"][hole_marker_distance]");
	// 		}
	// 		for (var k = 1; k<=tot_holes; k++){
 //        		$("#par"+ +k).attr("name", "defaultscore[" + counteredit + "]["+ k +"][par]");
	// 		}
	// 		for (var k = 1; k<=tot_holes; k++){
 //        		$("#handicap"+ +k).attr("name", "defaultscore[" + counteredit + "]["+ k +"][handicap]");
	// 		}    
 //            new_elem = $(".addr-template").clone().appendTo("#test-tableedit tbody").show().attr("class", "addr" + counteredit + " templatereset");
 //            counteredit = counteredit + 1; 
	// });

});