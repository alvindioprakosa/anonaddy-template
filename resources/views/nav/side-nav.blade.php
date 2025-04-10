@auth
<div class="block md:hidden" id="burger-icon">
    <button @click="mobileNavActive = !mobileNavActive" class="flex items-center px-2 py-1 border rounded text-indigo-200 border-indigo-400 focus:outline-none">
        <!-- Menu Icon -->
        <svg class="fill-current h-4 w-4" :class="mobileNavActive ? 'hidden' : 'block'" viewBox="0 0 20 20">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
        </svg>
        <!-- Close Icon -->
        <svg class="fill-current h-4 w-4" :class="mobileNavActive ? 'block' : 'hidden'" viewBox="0 0 20 20">
            <title>Close</title>
            <path d="M14.35 14.35a1 1 0 0 1-1.41 0L10 11.41l-2.94 2.94a1 1 0 1 1-1.41-1.41L8.59 10 5.65 7.06a1 1 0 1 1 1.41-1.41L10 8.59l2.94-2.94a1 1 0 0 1 1.41 1.41L11.41 10l2.94 2.94a1 1 0 0 1 0 1.41z" />
        </svg>
    </button>
</div>

<nav class="side-nav pb-4 md:flex md:items-center md:w-auto" :class="mobileNavActive ? 'block' : 'hidden'">
    <div class="flex flex-col items-center justify-between w-full">
        @php
            $navItems = [
                ['label' => 'Aliases', 'route' => 'aliases.index', 'icon' => 'envelope.png'],
                ['label' => 'Recipients', 'route' => 'recipients.index', 'icon' => 'download-dark.png'],
                ['label' => 'Domains', 'route' => 'domains.index', 'icon' => 'globe-dark.png'],
                ['label' => 'Usernames', 'route' => 'usernames.index', 'icon' => 'user-dark.png'],
                ['label' => 'Failed Deliveries', 'route' => 'failed_deliveries.index', 'icon' => 'delete-dark.png'],
                // ['label' => 'Rules', 'route' => 'rules.index', 'icon' => 'rules.png'], // Uncomment if needed
            ];
        @endphp

        @foreach ($navItems as $item)
            <a href="{{ route($item['route']) }}"
                class="side-nav-link block mt-4 hover:text-black mr-4 {{ Route::currentRouteNamed($item['route']) ? 'text-black' : 'text-indigo-100' }}">
                <img src="{{ asset('imgs/' . $item['icon']) }}" class="inline" alt="icon"> {{ $item['label'] }}
            </a>
        @endforeach

        <div class="mt-6">
            <a href="{{ route('settings.show') }}"
                class="side-nav-link block hover:text-black mr-4 {{ Route::currentRouteNamed('settings.show') ? 'text-black' : 'text-indigo-100' }}">
                <img src="{{ asset('imgs/settings.png') }}" class="inline" alt="icon"> Settings
            </a>

            <form action="{{ route('logout') }}" method="POST" class="block">
                @csrf
                <input type="submit"
                    class="bg-transparent text-indigo-100 mt-4 hover:text-black mr-4 cursor-pointer"
                    value="{{ __('Logout') }}">
            </form>
        </div>
    </div>
</nav>
@endauth
