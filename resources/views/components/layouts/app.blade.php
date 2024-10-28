<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://fastly.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        var userId = {{ Auth::user()->id }}; // Corrected the syntax to access user ID

        Pusher.logToConsole = true;

        var pusher = new Pusher('827c74b29880dbe97c43', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('banknotification');

        channel.bind('user.' + userId, function(data) {
            var content = data.content; // Adjust this field according to the actual structure of data.bank
            var type = data.type; // Adjust this field according to the actual structure of data.bank


            Swal.fire({
                icon: type, // Change the icon type based on your needs (e.g., 'info', 'warning', 'error')
                title: 'Thông báo',
                text: content,
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            });
        });
    </script>
</head>
@livewireStyles

<body>

    {{ $slot }}
</body>
 
@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />

</html>
