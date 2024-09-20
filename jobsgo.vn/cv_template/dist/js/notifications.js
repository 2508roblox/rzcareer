function notify(style,position,text) {
	if(style == "error"){
		icon = "fa fa-exclamation";
	}else if(style == "warning"){
		icon = "fa fa-warning";
	}else if(style == "success"){
		icon = "fa fa-check";
	}else if(style == "info"){
		icon = "fa fa-question";
	}else{
		icon = "fa fa-circle-o";
	}
    $.notify({
        title: 'Notification',
        text: text,
        image: "<i class='"+icon+"'></i>"
    }, {
        style: 'metro',
        className: style,
        globalPosition:position,
        showAnimation: "show",
        showDuration: 0,
        hideDuration: 0,
        autoHide: false,
        clickToHide: true
    });
}

function notify2(style,position,text,btn) {
    $(btn).notify({
        text: '<i class="fa fa-comment-o"></i> '+text
    }, {
        style: 'metro',
        className: 'nonspaced',
        elementPosition:position,
        showAnimation: "show",
        showDuration: 200,
        hideDuration: 200,
        autoHideDelay: 3000,
        autoHide: true,
        clickToHide: true
    });
}


function autohidenotify(style,position,title,message) {
 	if(style == "error"){
		icon = "fa fa-exclamation";
	}else if(style == "warning"){
		icon = "fa fa-warning";
	}else if(style == "success"){
		icon = "fa fa-check";
	}else if(style == "info"){
		icon = "fa fa-question";
	}else{
		icon = "fa fa-circle-o";
	}   
    $.notify({
        title: title,
        text: message,
        image: "<i class='fa fa-warning'></i>"
    }, {
        style: 'metro',
        className: style,
        globalPosition:position,
        showAnimation: "show",
        showDuration: 200,
        hideDuration: 200,
        autoHideDelay: 4000,
        autoHide: true,
        clickToHide: true
    });
}

function nconfirm() {
    $.notify({
        title: 'Are you delete?!',
        text: 'Are you sure you want to do nothing?<div class="clearfix"></div><br><a class="btn btn-sm btn-default yes">Yes</a> <a class="btn btn-sm btn-danger no">No</a>',
        image: "<i class='fa fa-warning'></i>"
    }, {
        style: 'metro',
        className: "cool",
        globalPosition:'top center',
        showAnimation: "show",
        showDuration: 0,
        hideDuration: 0,
        autoHide: false,
        clickToHide: false
    });
}

function nconfirm2(title, text) {
    $.notify({
        title: title,
        text: text+'<div class="clearfix"></div><br><a class="btn btn-sm btn-default d_yes">Yes</a> <a class="btn btn-sm btn-danger d_no">No</a>',
        image: "<i class='fa fa-warning'></i>"
    }, {
        style: 'metro',
        className: "cool",
        globalPosition:'top right',
        showAnimation: "show",
        showDuration: 200,
        hideDuration: 200,
        autoHide: false,
        clickToHide: false
    });
}

$(function(){
	//listen for click events from this style
	$(document).on('click', '.notifyjs-metro-base .no', function() {
	  //programmatically trigger propogating hide event
	  $(this).trigger('notify-hide');
	});
	$(document).on('click', '.notifyjs-metro-base .yes', function() {
	  //show button text
	  alert($(this).text() + " clicked!");
	  //hide notification
	  $(this).trigger('notify-hide');
	});
})

function autohidenotify2(style,position,title,message,delay) {
    if(style == "error"){
        icon = "fa fa-exclamation";
    }else if(style == "warning"){
        icon = "fa fa-warning";
    }else if(style == "success"){
        icon = "fa fa-check";
    }else if(style == "info"){
        icon = "fa fa-question";
    }else{
        icon = "fa fa-circle-o";
    }   
    $.notify({
        title: title,
        text: message,
        image: "<i class='"+icon+"'></i>"
    }, {
        style: 'metro',
        className: style,
        globalPosition:position,
        showAnimation: "show",
        showDuration: 200,
        hideDuration: 200,
        autoHideDelay: delay,
        autoHide: true,
        clickToHide: true
    });
}