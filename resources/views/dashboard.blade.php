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






    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h4 class="font-bold text-base">Car Details</h4>
                <form action="submit.php" method="post">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Plate No.</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="age" class="col-sm-4 col-form-label">Current Color</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="current-color" name="current-color">
                                <option value="Gray"></option>
                                <option value="Red">Red</option>
                                <option value="Blue">Blue</option>
                                <option value="Green">Green</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-4 col-form-label">Target</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="target-color" name="target-color">
                                <option value="Gray"></option>
                                <option value="Red">Red</option>
                                <option value="Blue">Blue</option>
                                <option value="Green">Green</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger rounded-0" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: 18px;">
                                Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
