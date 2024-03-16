<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusher Event Listener</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Pusher Event Listener</h1>
    <div>
        <label for="apiKey">API Key:</label>
        <input type="text" id="apiKey" placeholder="Enter Pusher API Key">
    </div>
    <div>
        <label for="cluster">Cluster:</label>
        <input type="text" id="cluster" placeholder="Enter Pusher Cluster">
    </div>
    <div>
        <label for="channelName">Channel Name:</label>
        <input type="text" id="channelName" placeholder="Enter Channel Name">
    </div>
    <button id="connectBtn">Connect</button>
    <button id="disconnectBtn">Disconnect</button>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        const connectBtn = document.getElementById('connectBtn');
        const disconnectBtn = document.getElementById('disconnectBtn');

        let pusher;

        connectBtn.addEventListener('click', () => {
            const apiKey = document.getElementById('apiKey').value;
            const cluster = document.getElementById('cluster').value;
            const channelName = document.getElementById('channelName').value;

            pusher = new Pusher(apiKey, {
                cluster: cluster,
                encrypted: true
            });

            const channel = pusher.subscribe(channelName);

            channel.bind('event', function(data) {
                console.log('Event Received:', data);
            });
        });

        disconnectBtn.addEventListener('click', () => {
            if (pusher) {
                pusher.disconnect();
                console.log('Disconnected from Pusher');
            }
        });
    </script>
</body>
</html>
