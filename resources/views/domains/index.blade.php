@extends('layouts.app')

@section('content')
    <div class="container py-8">
        @include('shared.status')

        @php
            $user = Auth::user();
            $verifiedRecipients = $user->verifiedRecipients()->select(['id', 'email'])->get();
            $domainCount = $user->domains->count();
            $anonaddyConfig = config('anonaddy');
            $aaVerify = sha1($anonaddyConfig['secret'] . $user->id . $domainCount);
        @endphp

        <domains
            :initial-domains='@json($domains)'
            domain-name="{{ $anonaddyConfig['domain'] }}"
            hostname="{{ $anonaddyConfig['hostname'] }}"
            :recipient-options='@json($verifiedRecipients)'
            aa-verify="{{ $aaVerify }}"
        />
    </div>
@endsection
