<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets_livewire/logo-light.svg" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

@livewireStyles

<body>
    <div class="loading-screen" id="loadingScreen" wire:navigating>
        <div class="loading-spinner"></div>
    </div>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Loading Screen Styles */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 1);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Ensure it is on top of other content */
        }

        .loading-spinner {
            border: 8px solid #f3f3f3;
            /* Light grey */
            border-top: 8px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <script>
        document.addEventListener('livewire:navigated', function() {
            // Re-enable scroll after loading
            document.getElementById('loadingScreen').remove();
        });

    </script>
    {{ $slot }}
</body>

@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />

</html>
