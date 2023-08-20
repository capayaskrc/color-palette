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
        <div class=" col-span-3">
            <table class=w-full">
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
        </div>
        <!-- Card -->
        <div class="bg-white shadow-md col-span-1">
            <h2 class="text-lg p-3 bg-red-300 font-bold text-white uppercase mb-1">Shop Performance</h2>
            <div class="p-3 ">
                <p class="mb-2 font-semibold flex justify-between">Total Cars Painted:
                    <span class="font-semibold">150</span>
                </p>
                <p class="mb-2 font-semibold">Breakdown:</p>
                <ul class="list-none ml-6 mb-4 font-semibold ">
                    <li class="flex justify-between items-center">
                        <span class="mr-2">Red:</span>
                        <span>40</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="mr-2">Blue:</span>
                        <span>35</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="mr-2">Green:</span>
                        <span>45</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
