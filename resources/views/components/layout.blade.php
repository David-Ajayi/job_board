<!doctype html>

<title>Job Board</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo-2.jpeg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">


            @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>
                    </x-slot>
                    @can('admin')

                    <x-dropdown-item href="/admin/jobs" :active="request()->is('admin/jobs')">Manage All Jobs</x-dropdown-item>
                    <x-dropdown-item href="/admin/jobs/create" :active="request()->is('admin/jobs/create')">Post new Job</x-dropdown-item>
                    @endcan
                    <x-dropdown-item href="/bookmarks">Bookmarks</x-dropdown-item>

                    {{--                    dropdown item accept a prop to set to active--}}
                    <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>
{{--                    when you click this dropdown ite href=# meaning we wont go anywhere. onclik prevent the default action--}}
{{--                    find the logout for with query selector(form id is logout form) and submit it to the logout route--}}
{{--                    x-data{} is alpine component--}}
                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>
                </x-dropdown>
            @else
                <a href="/register" class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">Register</a>
                <a href="/login" class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">Log In</a>
            @endauth

            <a href="/jobs" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                View all Jobs
            </a>
        </div>
    </nav>

{{$slot}}


</section>
<x-flash />

</body>
