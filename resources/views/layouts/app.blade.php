<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/x-icon" href="favicon.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('minimals/assets/css/perfect-scrollbar.min.css')}}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('minimals/assets/css/style.css')}}" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="assets/css/animate.css')}}'" />
        <script src="{{asset('minimals/assets/js/perfect-scrollbar.min.js')}}"></script>
        <script defer src="{{asset('minimals/assets/js/popper.min.js')}}"></script>
        <script defer src="{{asset('minimals/assets/js/tippy-bundle.umd.min.js')}}"></script>
        <script defer src="{{asset('minimals/assets/js/sweetalert.min.js')}}"></script>
    </head>
    <body x-data="main"
          class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
          :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme, $store.app.menu, $store.app.layout,$store.app.rtlClass]">
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>

    <x-screen-loader/>

    <x-scroll-to-top/>

    <x-customize/>

    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        @include('common.admin.sidebar')

        <div class="main-content">
            @include('common.admin.header')

            <div class="animate__animated p-6" :class="[$store.app.animation]">
                {{$slot}}
            @include('common.admin.footer')
            </div>
        </div>
    </div>

    @include('common.admin.script')
    </body>
</html>
