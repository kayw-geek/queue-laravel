<!DOCTYPE html>
<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/4.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('acbf3e58f5954d4532f2', {
            cluster: 'ap1',
            encrypted: true
        });

        var channel = pusher.subscribe('weikai');
        channel.bind('App\\Event\\PushEvent', function(data) {
            alert(data.message);
            alert(1);
        });
    </script>
</head>
<body>
    <text>aaaaaaaa</text>
</body>