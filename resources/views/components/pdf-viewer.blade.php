@if ($getState() instanceof \Livewire\TemporaryUploadedFile)
    @php
        $temporaryUrl = $getState()->temporaryUrl();
    @endphp
    <iframe src="{{ $temporaryUrl }}" style="width:100%; height:40svh;" frameborder="0"></iframe>
@endif
