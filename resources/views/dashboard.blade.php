@extends('layouts.default-content')

<?php
$title = "JUAN'S AUTO PAINT";
?>

@section('header')
    <div class="flex justify-center">
        <h1 class="font-bold text-5xl text-gray-800  leading-tight w-auto">{{ __($title) }}</h1>
    </div>
@endsection
@section('content')
    <style>

        .custom-select::after {
            content: "▼";
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }
        .custom-select::-ms-expand {
            display: none;
        }

        .select-arrow {
            content: "▼";
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 6px solid #333; /* Adjust color as needed */
        }
    </style>

    <div>
        <h2 class="flex pb-9 mb-0.5 text-2xl font-bold tracking-wide justify-center text-gray-900 uppercase ">New Paint Job</h2>
    </div>


    <div class="">
        <div class="flex justify-center items-center mb-12">
            <div>
                <img id="current-car" src="{{ asset('img/gray_car.png') }}" alt="Current Car">
            </div>
            <div class="px-14 mx-1">
                @include('svgs.arrow_right')
            </div>
            <div>
                <img id="target-car" src="{{ asset('img/gray_car.png') }}" alt="Target Car">
            </div>
        </div>
    </div>

    <div>
        <h4 class="font-bold text-base mb-5">Car Details</h4>
        <form class="w-5/12">
            <div class="flex flex-col space-y-1">
                <div class="flex justify-between items-center">
                    <label for="name">Plate No.</label>
                    <input type="text" class="form-control border border-gray-500 w-3/5" id="name" name="name" required>
                </div>
                <div class="flex justify-between items-center">
                    <label for="current-color">Current Color</label>
                    <select class="form-control border border-gray-500 w-3/5 appearance-none custom-select" id="current-color" name="current-color">
                        <option value="Gray"></option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                        <option value="Green">Green</option>
                    </select>
{{--                    <div class="select-arrow"></div>--}}
                </div>
                <div class="flex justify-between items-center">
                    <label for="target-color">Target</label>
                    <select class="form-control border border-gray-500 w-3/5 appearance-none custom-select" id="target-color" name="target-color">
                        <option value="Gray"></option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                        <option value="Green">Green</option>
                    </select>
                    <div class="select-arrow absolute right-3 top-1/2 transform -translate-y-1/2"></div>
                </div>
                <div class="pt-3.5 flex">
                    <button type="submit" class="w-36 h-10 bg-[#ea6a5b] font-bold text-sm text-white rounded-0">
                        Submit
                    </button>
                </div>

            </div>
        </form>
    </div>


@endsection
