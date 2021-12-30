@php
    //variable to hold tooltip info
    $tips = '';

    //THis array creates the sidebar links
    $navs = array("dashboard" => "Dashboard", "requests.index" => "Benefit Requests", "members.index" => "Members");

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

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/vendor/izitoast.min.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('css/fontawesome/fontawesome.min.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{asset('css/boxicons/css/boxicons.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/icofont/icofont.min.css')}}">

    @if($trigger ?? '' == 'fotorama')
        <link rel="stylesheet" href="{{asset('fotorama/fotorama.css')}}">
    @endif

    <link rel="stylesheet" href="{{asset('css/inside.css')}}">

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
    <div class="w-100 p-lg-5 m-lg-0">
        @include('includes.messages')
        @yield('content')
    </div>
</section>

{{-- Text Editor, only on request --}}
{{--@if($trigger ?? '' == 'editor')--}}
{{--    <script src="{{asset('ckeditor5/ckeditor.js')}}"></script>--}}
{{--    <script>--}}
{{--        var allEditors = document.querySelectorAll( '#editor' );--}}

{{--        for (var i = 0; i < allEditors.length; i++) {--}}
{{--            ClassicEditor.create(allEditors[i], {--}}
{{--                toolbar: {items: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', "indent", "outdent", "|", 'insertTable', '|', 'undo', 'redo']},--}}
{{--                table: {contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']}--}}
{{--            }).then(editor => {--}}
{{--                console.log(editor);--}}
{{--            }).catch(error => {--}}
{{--                console.error(error);--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
{{--@endif--}}

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
    })
    @break

    @case('warning')
    iziToast.warning({
        message: "{{ session('toast')['message'] }}"
    })
    @break
    @endswitch
    @endif
</script>
</body>
</html>
