@if (session('status'))
    <div 
        class="mb-4 rounded border-t-8 border-green-500 bg-green-100 px-3 py-4 text-sm text-green-600" 
        role="alert"
    >
        {{ session('status') }}
    </div>
@endif
