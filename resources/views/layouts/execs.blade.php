@php
    //variable to hold tooltip info
    $tips = '';

    //THis array creates the sidebar links
    $navs = array("dashboard" => "Dashboard", "requests.index" => "Requests", "members.index" => "Members");

    if(isset($toast)) {
        $title = $toast['title'];
        $message = $toast['message'];
    }
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/vendor/izitoast.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/icofont/icofont.min.css')}}">

    @if($trigger ?? '' == 'fotorama')
        <link rel="stylesheet" href="{{asset('fotorama/fotorama.css')}}">
    @endif

    @if($trigger ?? '' == 'livewire')
        @livewireStyles
    @endif

    <link rel="stylesheet" href="{{asset('css/inside.css')}}">
    <link rel="stylesheet" href="{{asset('css/shredder.css')}}">

    {{-- Javascript --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor/izitoast.min.js') }}"></script>
    <script src="{{ asset('js/inside.js') }}"></script>

    @if($trigger ?? '' == 'fotorama')
        <script src="{{ asset('fotorama/fotorama.js') }}"></script>
    @endif
</head>

<body>
@include('includes.execs.inside-nav')
@include('includes.execs.sidebar', ['navs' => $navs])

<section class="content marg">
    <div class="container marg p-lg-5 w-100 p-lg-5 m-lg-0">
        @yield('content')
    </div>
</section>
</body>
@if($trigger ?? '' == 'livewire')
    @livewireScripts
@endif

@if($trigger ?? '' == 'editor')
    <script src="{{asset('js/vendor/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: {items: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', "indent", "outdent", '|', 'undo', 'redo']},
            }).then(editor => {
            console.log(editor);
        })
            .catch(error => {
                console.error(error);
            });
    </script>
@endif

{{-- IziToast --}}
<script>
    iziToast.settings({
        layout: 1,
        resetOnHover: true,
        position: 'topCenter',
        progressBar: true,
        transitionIn: 'fadeInDown',
    });

    @if(session('toast') !== null)
    @switch(session('toast')['type'])
    @case('show')
    iziToast.show({
        message: "{{ session('toast')['message'] }}"
    });
    @break

    @case('success')
    iziToast.success({
        message: "{{ session('toast')['message'] }}"
    });
    @break

    @case('warning')
    iziToast.warning({
        message: "{{ session('toast')['message'] }}"
    });
    @break
    @endswitch
    @endif
</script>
</html>
