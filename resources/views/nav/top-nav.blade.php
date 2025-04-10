@auth
<div class="bg-white shadow p-4 flex justify-between items-center">
    <div class="flex items-center space-x-4">
        <a href="{{ route('aliases.index') }}">
            <img class="h-6" alt="AnonAddy Logo" src="/svg/icon-logo.svg">
        </a>
    </div>

    <div class="block md:hidden">
        <button @click="mobileNavActive = !mobileNavActive"
            class="flex items-center px-3 py-2 border rounded text-indigo-200 border-indigo-400 hover:text-white hover:border-white focus:outline-none">
            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
    </div>

    <div class="hidden md:flex items-center space-x-6">
        <span class="px-4 py-2 upgrade-btn">Upgrade</span>

        <dropdown username="{{ user()->username }}">
            <ul>
                <li>
                    <a href="{{ route('settings.show') }}"
                        class="block px-4 py-2 hover:bg-indigo-500 hover:text-white">Settings</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="block">
                        @csrf
                        <input type="submit"
                            class="w-full px-4 py-2 bg-transparent hover:bg-indigo-500 hover:text-white cursor-pointer text-left"
                            value="{{ __('Logout') }}">
                    </form>
                </li>
            </ul>
        </dropdown>
    </div>
</div>

<!-- Responsive Mobile Menu -->
<nav class="bg-indigo-900 py-4 shadow md:hidden" :class="mobileNavActive ? 'block' : 'hidden'">
    <div class="text-base px-4">
        @php
            $navItems = [
                ['label' => 'Aliases', 'route' => 'aliases.index'],
                ['label' => 'Recipients', 'route' => 'recipients.index'],
                ['label' => 'Domains', 'route' => 'domains.index'],
                ['label' => 'Usernames', 'route' => 'usernames.index'],
                ['label' => 'Failed Deliveries', 'route' => 'failed_deliveries.index'],
                ['label' => 'Rules', 'route' => 'rules.index'],
            ];
        @endphp

        @foreach ($navItems as $item)
            <a href="{{ route($item['route']) }}"
                class="block mt-2 hover:text-white {{ Route::currentRouteNamed($item['route']) ? 'text-white' : 'text-indigo-100' }}">
                {{ $item['label'] }}
            </a>
        @endforeach

        <a href="{{ route('settings.show') }}"
            class="block mt-4 hover:text-white {{ Route::currentRouteNamed('settings.show') ? 'text-white' : 'text-indigo-100' }}">
            Settings
        </a>

        <form action="{{ route('logout') }}" method="POST" class="block">
            @csrf
            <input type="submit"
                class="bg-transparent text-indigo-100 mt-4 hover:text-white cursor-pointer"
                value="{{ __('Logout') }}">
        </form>
    </div>
</nav>
@endauth
