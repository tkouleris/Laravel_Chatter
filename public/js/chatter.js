
$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
	$("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
	$("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
	$("#profile-img").removeClass();
	$("#status-online").removeClass("active");
	$("#status-away").removeClass("active");
	$("#status-busy").removeClass("active");
	$("#status-offline").removeClass("active");
	$(this).addClass("active");

	if($("#status-online").hasClass("active")) {
		$("#profile-img").addClass("online");
	} else if ($("#status-away").hasClass("active")) {
		$("#profile-img").addClass("away");
	} else if ($("#status-busy").hasClass("active")) {
		$("#profile-img").addClass("busy");
	} else if ($("#status-offline").hasClass("active")) {
		$("#profile-img").addClass("offline");
	} else {
		$("#profile-img").removeClass();
	};

	$("#status-options").removeClass("active");
});

function newMessage(message) {

  $.ajaxSetup({
    headers:
    {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  jQuery.ajax({
    url: "send",
    method: 'post',
    data: {
      message: message
    },
    success: function(result)
    {

    },
    error: function (data)
    {

    }
  });


};

$('.submit').click(function(e) {
  message = $(".message-input input").val();
  newMessage(message);

});

$(window).on('keydown', function(e) {

  if (e.which == 13) {

    message = $(".message-input input").val();

    if($.trim(message) == '') {
      return false;
    }

    newMessage(message);
    return false;
  }
});
//# sourceURL=pen.js

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;
var pusher = new Pusher('8a616bf0e905afe416d1', {
                cluster: 'eu',
                forceTLS: true
              });

var channel = pusher.subscribe('my-channel');

// new message handler
channel.bind('message_sent', function(data) {
  var message = data.message.message
  var created_at = data.message.created_at
  var user = data.message.user.name
  var avatar = data.message.user.avatar
  var msg_user_id = data.message.user.id
  var logged_in_user_id = $('input[name=user_id]').val();

  if( logged_in_user_id == msg_user_id){
    $('<li class="sent"><img src="storage/avatars/'+avatar+'" alt="" /><p>'
        + message +
      '</p></li>').appendTo($('.messages ul'));
  }

  if( logged_in_user_id != msg_user_id){
    $('<li class="replies"><img src="storage/avatars/'+avatar+'" alt="" /><p>'
        + message +
      '</p></li>').appendTo($('.messages ul'));
  }

	$('.message-input input').val(null);
	$('.contact.active .preview').html('<span>You: </span>' + message);
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
});

// status change handler
channel.bind('status_changed', function(data) {

  var el_user_status = $('[name=user_' + data.user.id + '_status]') ;

  if(el_user_status.length > 0)
  {
    var el_user_last_activity = $('[name=last_activity_user_' + data.user.id + ']');

    el_user_last_activity.html(''); // clear
    el_user_last_activity.html(data.user.time_since_last_activity_readable); // rewrite


    if( !el_user_status.hasClass("online")){
      el_user_status.removeClass("away");
      el_user_status.addClass("online");
    }
  }else{

    $('#contacts_list_status').append(
                            "<li class='contact'>" +
                            "<div class='wrap'>" +
                            "<span class='contact-status online' name='user_"
                              + data.user.id +"_status'  ></span>" +
                            "<img src='storage/avatars/"+data.user.avatar+"' alt='' />" +
                            "<div class='meta'>" +
                            "<p class='name'>"+data.user.name+"</p>" +
                            "<p class='preview' name='last_activity_user_"
                            +data.user.id+"'>"+data.user.time_since_last_activity_readable+"</p>" +
                            "</div>" +
                            "</div>" +
                            "</li>"
    );
  }
});

// status change handler
channel.bind('user_login', function(data) {
  var el_user_status = $('[name=user_' + data.user.id + '_status]') ;

  if(el_user_status.length == 0){

    $('#contacts_list_status').append(
                            "<li class='contact'>" +
                            "<div class='wrap'>" +
                            "<span class='contact-status online' name='user_"
                              + data.user.id +"_status'  ></span>" +
                            "<img src='storage/avatars/"+data.user.avatar+"' alt='' />" +
                            "<div class='meta'>" +
                            "<p class='name'>"+data.user.name+"</p>" +
                            "<p class='preview' name='last_activity_user_"
                            +data.user.id+"'>"+data.user.time_since_last_activity_readable+"</p>" +
                            "</div>" +
                            "</div>" +
                            "</li>");
  }
});