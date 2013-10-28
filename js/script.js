$(document).ready(function() {
	initWizard();	

	$("ul.droptrue").sortable({
			connectWith: 'ul',
			opacity: 0.6,
			update : updatePostOrder
		});

	$("#sortable1, #sortable2").disableSelection();
	$("#sortable1, #sortable2").css('minHeight',$("#sortable1").height()+"px");
	$("#sortable1, #sortable2").css('height',$("#sortable1").height()+"px");
});

function updatePostOrder()
{
	var arr = [];
  	$("#sortable2 li").each(function(){
    	arr.push($(this).attr('id'));
  	});
  	$('#selectedHooks').val(arr.join(','));
}

nbr_steps = 3;

function initWizard()
{
	$("#wizard").smartWizard({		
		'labelNext' : labelNext,
		'labelPrevious' : labelPrevious,
		'labelFinish' : labelFinish,
		'fixHeight' : 0,		
    'transitionEffect': 'slideleft',
    // Events
    onLeaveStep: onLeaveStepCallback, // triggers when leaving a step
    onShowStep: null,  // triggers when showing a step
    onFinish: onFinishStepCallback  // triggers when Finish button is clicked
	});
}

function onLeaveStepCallback(obj, context)
{			
	return validateSteps(context.fromStep); // return false to stay on step and true to continue navigation 
}

function onFinishStepCallback(obj, context)
{
	$.ajax({
		type: "POST",
		url : "ajax.php",
		async: false,
		dataType: 'json',
		data : $('input, select').serialize() + '&action=finish_step&ajax=1',
		success : function(data) {
			if (data.has_error)
			{				
				displayError(data.errors, context.fromStep);
			}
			else
				$(location).attr('href', 'download.php?file=' + data.file + '&file_name=' + data.file_name);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
		}
	});
}

function validateSteps(step_number)
{
	var is_ok = true;
	
	if(step_number == 1)
	{
		fields = new Array(3);
		fields[0] = "moduleName";
		fields[1] = "moduleDescription";
		fields[2] = "moduleVersion";
		fields[3] = "moduleAuthor";
		fields[4] = "moduleDisplayName";
		
		for(field in fields)
		{
			if ($('#'+fields[field]+'').val() == '')
			{
				$('label[for='+fields[field]+'] span').css('color', 'red');
				is_ok = false;
			}
			else
				$('label[for='+fields[field]+'] span').css('color', '#999999');	
		}
	}	
	
	return is_ok;
}

function setError(step_number){
  $('#wizard').smartWizard('setError',{stepnum:step_number,iserror:true});
}