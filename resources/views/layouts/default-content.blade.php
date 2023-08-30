@extends('layouts.app')


@section('body')
<div class="flex flex-row min-h-screen">
    <div class="py-8 flex-auto">
        <div class="max-w-[1200px] mx-auto">
                    @yield('content')
        </div>
    </div>
</div>
@endsection
