<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Laravel Chatter App</title>
        <!-- BOOTSTRAP CORE STYLE CSS -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://js.pusher.com/4.4/pusher.min.js"></script>


    </head>

    <body style="font-family:Verdana">
        @yield('content')
    </body>
    <script>
        $(document).ready(function() {
            function clear_message_input()
            {
                $('#txt_chat_message').val('');
            }
            $('#btn_send_message').click(function(e){
                e.preventDefault();

                var message = $('#txt_chat_message').val();


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
                        clear_message_input()
                    },
                    error: function (data)
                    {
                    // TODO: error message
                    }
                });
            });
        });
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('8a616bf0e905afe416d1', {
                cluster: 'eu',
                forceTLS: true
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('message_sent', function(data) {
                console.log(data)
                var message = data.message.message
                var created_at = data.message.created_at
                var user = data.message.user.name

                $('#messages').append(
                                "<li class='media'>"
                                    + "<div class='media-body'>"
                                        + "<div class='media' >"
                                            + "<a class='pull-left' href='#'"
                                                + "<img class='media-object img-circle' src='img/user.png' />"
                                            + "</a>"
                                            + "<div class='media-body'>"
                                            + message
                                            + "<br />"
                                            + "<small class='text-muted'>" + user + " | " + created_at + "</small>"
                                            + "</div>"
                                        + "</div>"
                                    + "</div>"
                                + "</li>"
                );
            });

        </script>
</html>