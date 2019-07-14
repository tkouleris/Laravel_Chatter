
    @extends('layouts.chat')
    @section('content')
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
                                @foreach( $messages as $message)
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle " src="img/user.png" />
                                                </a>
                                                <div class="media-body" >
                                                    {{ $message->message }}
                                                    <br />
                                                    <small class="text-muted">{{ $message->user->name }} | {{ $message->created_at }}</small>
                                                    <hr />
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                @endforeach
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
                        <a href="{{ url('/logout') }}"> <i class="fas fa-sign-out-alt"></i>Logout </a>
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
    @endsection
