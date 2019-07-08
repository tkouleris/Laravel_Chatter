<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BOOTSTRAP CHAT EXAMPLE</title>
        <!-- BOOTSTRAP CORE STYLE CSS -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
        <script>

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('8a616bf0e905afe416d1', {
                cluster: 'eu',
                forceTLS: true
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('form-submited', function(data) {
                alert(JSON.stringify(data));
            });
            channel.bind('user_login', function(user) {
                alert(JSON.stringify(user));
            });
        </script>
    </head>

    <body style="font-family:Verdana">
        <div class="container">
            <div class="row " style="padding-top:40px;">
                <h3 class="text-center" >BOOTSTRAP CHAT EXAMPLE </h3>
                <br /><br />
                <div class="col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            RECENT CHAT HISTORY
                        </div>
                        <div class="panel-body">
                            <ul class="media-list">
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
                                </li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Message" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button">SEND</button>
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
</html>