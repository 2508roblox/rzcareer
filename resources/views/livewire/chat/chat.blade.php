<!-- In resources/views/livewire/chat/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    {{-- <link href="/assets_livewire/teks/css/base.min.css?v=234208153092" rel="stylesheet"> --}}

    <!-- Load CSS via Vite -->
    @vite('resources/css/chat.css')
</head>

<body>
    {{-- @livewire('inc.header') --}}
    <!-- Your Chat Component Content -->
    <div
        class=" fixed  h-full  flex bg-white border  lg:shadow-sm overflow-hidden inset-0 lg:top-16  lg:inset-x-2 m-auto lg:h-[90%] rounded-t-lg">

        <div class="hidden lg:flex relative w-full md:w-[320px] xl:w-[400px] overflow-y-auto shrink-0 h-full border">
            <livewire:chat.chat-list>
        </div>

        <div class="grid   w-full border-l h-full relative overflow-y-auto" style="contain:content">

            <livewire:chat.chat-box>

        </div>


    </div>
    <!-- Load JS via Vite -->
    @vite('resources/js/app.js')
</body>

</html>
