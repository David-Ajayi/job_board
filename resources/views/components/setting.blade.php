@props(['heading'])
{{--accept a prop--}}
{{--then push it out below--}}

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    <a href="/admin/jobs" class="{{ request()->is('admin/jobs') ? 'text-blue-500' : '' }}">All Jobs</a>
                </li>

                <li>
                    <a href="/admin/jobs/create" class="{{ request()->is('admin/jobs/create') ? 'text-blue-500' : '' }}">Post new Job</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
