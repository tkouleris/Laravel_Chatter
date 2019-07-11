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
        <div class="container">
            <div class="row " style="padding-top:40px;">
                <h3 class="text-center" >Laravel Chatter App </h3>
                <br /><br />
                <div class="col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            RECENT CHAT HISTORY
                        </div>
                        <div class="panel-body">
                            <ul class="media-list" id='messages'>
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle " src="img/user.png" />
                                            </a>
                                            <div class="media-body" >
                                                Donec sit amet ligula enim. Duis vel condimentum massa.
                                                Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
                                                Duis vel condimentum massa.
                                                Donec sit amet ligula enim. Duis vel condimentum massa.
                                                <br />
                                                <small class="text-muted">Alex Deo | 23rd June at 5:00pm</small>
                                                <hr />
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                {{-- <li class="media">
                                    <div class="media-body">
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle " src="img/user.gif" />
                                            </a>
                                            <div class="media-body" >
                                                Donec sit amet ligula enim. Duis vel condimentum massa.
                                                Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
                                                Duis vel condimentum massa.
                                                Donec sit amet ligula enim. Duis vel condimentum massa.
                                                <br />
                                                <small class="text-muted">Jhon Rexa | 23rd June at 5:00pm</small>
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle " src="img/user.png" />
                                            </a>
                                            <div class="media-body" >
                                                Donec sit amet ligula enim. Duis vel condimentum massa.

                                                Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
                                                Duis vel condimentum massa.
                                                Donec sit amet ligula enim. Duis vel condimentum massa.
                                                <br />
                                                <small class="text-muted">Alex Deo | 23rd June at 5:00pm</small>
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle " src="img/user.gif" />
                                            </a>
                                            <div class="media-body" >
                                                Donec sit amet ligula enim. Duis vel condimentum massa.

                                                Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
                                                Duis vel condimentum massa.
                                                Donec sit amet ligula enim. Duis vel condimentum massa.
                                                <br />
                                                <small class="text-muted">Jhon Rexa | 23rd June at 5:00pm</small>
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Message" id="txt_chat_message" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" id="btn_send_message">SEND</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ONLINE USERS
                        </div>
                        <div class="panel-body">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" style="max-height:40px;" src="img/user.png" />
                                            </a>
                                            <div class="media-body" >
                                                <h5>Alex Deo | User </h5>
                                                <small class="text-muted">Active From 3 hours</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" style="max-height:40px;" src="img/user.gif" />
                                            </a>
                                            <div class="media-body" >
                                                <h5>Jhon Rexa | User </h5>
                                                <small class="text-muted">Active From 3 hours</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" style="max-height:40px;" src="img/user.png" />
                                            </a>
                                            <div class="media-body" >
                                                <h5>Alex Deo | User </h5>
                                                <small class="text-muted">Active From 3 hours</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            channel.bind('form-submited', function(data) {
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