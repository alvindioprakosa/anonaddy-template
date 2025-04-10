@auth
    <aside class="bg-indigo-900 w-1/4 h-screen flex flex-col justify-between">
        <div class="py-4">
            @php
                $links = [
                    ['label' => 'Aliases', 'route' => 'aliases.index'],
                    ['label' => 'Recipients', 'route' => 'recipients.index'],
                    ['label' => 'Domains', 'route' => 'domains.index'],
                    ['label' => 'Usernames', 'route' => 'usernames.index'],
                    ['label' => 'Failed Deliveries', 'route' => 'failed_deliveries.index'],
                    ['label' => 'Rules', 'route' => 'rules.index'],
                ];
            @endphp

            @foreach ($links as $link)
                <a href="{{ route($link['route']) }}" class="block px-6 py-3 text-white hover:bg-indigo-800">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>

        <div class="px-6 py-3">
            <button class="badge badge-success">Upgrade</button>
        </div>

        <div class="px-6 py-3">
            <a href="{{ route('settings.show') }}" class="block text-white hover:bg-indigo-800">
                Settings
            </a>
            <form action="{{ route('logout') }}" method="POST" class="block mt-3">
                @csrf
                <input type="submit" class="w-full px-6 py-3 bg-transparent text-white hover:bg-indigo-800 cursor-pointer"
                    value="{{ __('Logout') }}">
            </form>
        </div>
    </aside>
@endauth
