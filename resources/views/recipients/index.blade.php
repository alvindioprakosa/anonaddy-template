@extends('layouts.app')

@section('breadcrumb')
@endsection

@section('content')
    <div class="container py-8">
        @include('shared.status')

        @php
            $anonaddyDomain = config('anonaddy.domain');
        @endphp

        <recipients 
            :user='@json($user)'
            :initial-recipients='@json($recipients)'
            :aliases-using-default='@json($aliasesUsingDefault)'
            :aliases-using-default-count="{{ $aliasesUsingDefaultCount }}"
            domain="{{ $anonaddyDomain }}"
        />
    </div>
@endsection
