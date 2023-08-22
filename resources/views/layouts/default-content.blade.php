@extends('layouts.app')

@section('header')
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-[#656565] leading-tight w-auto">{{ __($title) }}</h2>
    </div>
@endsection

@section('body')
<div class="flex flex-row min-h-screen text-gray-800">
    <div class="py-8 flex-auto">
        <div class="max-w-3xl mx-auto">
                    @yield('content')
        </div>
    </div>
</div>
@endsection
