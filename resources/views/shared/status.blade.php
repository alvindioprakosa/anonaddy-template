@if (session('status'))
    <div class="text-sm border-t-8 rounded text-green-600 border-green-500 bg-green-100 px-3 py-4 mb-4" role="alert">
        {{ session('status') }}
    </div>
@endif