@extends('layouts.default-content')

<?php
$title = "JUAN'S AUTO PAINT";
?>

@section('header')
    <div class="flex justify-center">
        <h1 class="font-bold  text-5xl text-[#656565]  leading-tight w-auto">{{ __($title) }}</h1>
    </div>
@endsection
@section('content')
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
                    <input type="text" class="form-control px-1 border border-gray-500 w-3/5" id="plate-no" name="plate-no" placeholder="ABC123" required>
                </div>
                <div class="flex justify-between items-center">
                    <label for="current-color">Current Color</label>
                    <select class="form-control px-1 border border-gray-500 w-3/5  custom-select" id="current-color" name="current-color">
                        <option value="Gray"></option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                        <option value="Green">Green</option>
                    </select>
                </div>
                <div class="flex justify-between items-center">
                    <label for="target-color">Target</label>
                    <select class="form-control px-1 border border-gray-500 w-3/5 custom-select" id="target-color" name="target-color">
                        <option value="Gray"></option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                        <option value="Green">Green</option>
                    </select>
                </div>
                <div class="pt-3.5 flex">
                    <button type="submit" class="w-36 h-10 bg-[#ea6a5b] font-bold text-sm text-white rounded-0">
                        Submit
                    </button>
                </div>

            </div>
        </form>
    </div>
    <script>
        const currentCarImage = document.getElementById('current-car');
        const targetCarImage = document.getElementById('target-car');
        const currentColorDropdown = document.getElementById('current-color');
        const targetColorDropdown = document.getElementById('target-color');

        const colorImageMap = {
            'Gray': 'gray_car.png',
            'Red': 'red_car.png',
            'Blue': 'blue_car.png',
            'Green': 'green_car.png',
        };

        function updateCarImages() {
            const selectedCurrentColor = currentColorDropdown.value;
            const selectedTargetColor = targetColorDropdown.value;

            const currentCarImagePath = `{{ asset('img/') }}/${colorImageMap[selectedCurrentColor]}`;
            const targetCarImagePath = `{{ asset('img/') }}/${colorImageMap[selectedTargetColor]}`;

            currentCarImage.src = currentCarImagePath;
            targetCarImage.src = targetCarImagePath;
        }

        currentColorDropdown.addEventListener('change', updateCarImages);
        targetColorDropdown.addEventListener('change', updateCarImages);
    </script>


@endsection
