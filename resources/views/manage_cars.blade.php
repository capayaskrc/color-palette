@extends('layouts.default-content')

<?php
$title = "JUAN'S AUTO PAINT";
?>

@section('header')
    <div class="flex justify-center">
        <h1 class="font-bold text-6xl text-gray-800 content-center leading-tight w-auto">{{ __($title) }}</h1>
    </div>
@endsection

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Table -->
            <table class="w-full col-span-3">
                <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-100">Paint No.</th>
                    <th class="py-2 px-4 bg-gray-100">Current Color</th>
                    <th class="py-2 px-4 bg-gray-100">Target Color</th>
                    <th class="py-2 px-4 bg-gray-100">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="py-2 px-4">1</td>
                    <td class="py-2 px-4">Red</td>
                    <td class="py-2 px-4">Blue</td>
                    <td class="py-2 px-4">
                        <button class="text-blue-500 hover:text-blue-700">Edit</button>
                        <button class="text-red-500 hover:text-red-700">Delete</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
                </tbody>
            </table>

        <!-- Card -->
        <div class="bg-white p-6 shadow-md col-span-1">
            <!-- Card content -->
        </div>
    </div>
@endsection
