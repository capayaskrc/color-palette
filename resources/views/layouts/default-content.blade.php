@extends('layouts.app')


@section('body')
<div class="flex flex-row min-h-screen text-gray-800">
    <div class="py-8 flex-auto">
        <div class="max-w-3xl mx-auto">
                    @yield('content')
        </div>
    </div>
</div>
@endsection
