<!DOCTYPE html>
<html>

    <head>
        <title>Pusher Test</title>
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

    <body>

        <h1>Pusher Test</h1>
        <p>
            Try publishing an event to channel <code>my-channel</code>
            with event name <code>my-event</code>.
        </p>
    </body>
</html>