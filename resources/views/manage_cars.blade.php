@extends('layouts.default-content')

<?php
$title = "JUAN'S AUTO PAINT";
?>

@section('header')
    <div class="flex justify-center ">
        <h1 class="font-bold text-5xl text-[#656565] content-center leading-tight w-auto">{{ __($title) }}</h1>
    </div>
@endsection

@section('content')
    <div>
        <h2 class="flex pb-9 mb-0.5 text-2xl font-bold tracking-wide justify-center text-gray-900 uppercase ">New Paint Job</h2>
    </div>
    <div>
    <div class="flex flex-wrap items-stretch justify-between">
        <div class="w-full md:w-2/3 pr-4 h-80">
            <div>
                <h2 class="text-lg font-semibold">Paint Jobs in Progress</h2>
            </div>
            <div class="overflow-auto">
                <table class="w-full border-collapse border">
                    <thead class="text-xs text-black bg-[#dddddd]">
                    <tr>
                        <th class="py-2 ">Paint No.</th>
                        <th class="py-2 ">Current Color</th>
                        <th class="py-2 ">Target Color</th>
                        <th class="py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div>
        <div class=" mt-7 w-60 bg-white shadow-md">
            <h2 class="text-xs p-3 bg-[#ea6a5b] font-bold text-white uppercase ">Shop Performance</h2>
            <div class="p-3 text-sm bg-[#dddddd]">
                        <p class="mb-2 mx-2 font-semibold flex justify-between">Total Cars Painted:
                            <span class="font-semibold">150</span>
                        </p>
                        <p class="mb-2 mx-2 font-semibold">Breakdown:</p>
                        <ul class="list-none ml-4 mx-2 font-semibold ">
                            <li class="flex justify-between items-center">
                                <span>Red:</span>
{{--                                <span>{{ $redCount }}</span>--}}
                            </li>
                            <li class="flex justify-between items-center">
                                <span>Blue:</span>
{{--                                <span>{{ $blueCount }}</span>--}}
                            </li>
                            <li class="flex justify-between items-center">
                                <span>Blue:</span>
{{--                                <span>{{ $blueCount }}</span>--}}
                            </li>
                        </ul>
                 </div>
            </div>
        </div>
    </div>

    <div class="sticky w-full md:w-2/3 py-4 pr-4 ab overflow-y-auto">
            <h2 class="text-lg font-semibold">Paint Queues</h2>
            <div class="overflow-auto">
                <table class="w-full border-collapse border">
                    <thead class="text-xs text-black bg-[#dddddd]">
                    <tr>
                        <th class="py-2 ">Paint No.</th>
                        <th class="py-2 ">Current Color</th>
                        <th class="py-2 ">Target Color</th>
                        <th class="py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="py-2 px-4 border">1</td>
                        <td class="py-2 px-4 border">Red</td>
                        <td class="py-2 px-4 border">Blue</td>
                        <td class="py-2 px-4 border">
                            <button class="text-blue-500 hover:text-blue-700">Edit</button>
                            <button class="text-red-500 hover:text-red-700">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border">1</td>
                        <td class="py-2 px-4 border">Red</td>
                        <td class="py-2 px-4 border">Blue</td>
                        <td class="py-2 px-4 border">
                            <button class="text-blue-500 hover:text-blue-700">Edit</button>
                            <button class="text-red-500 hover:text-red-700">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border">1</td>
                        <td class="py-2 px-4 border">Red</td>
                        <td class="py-2 px-4 border">Blue</td>
                        <td class="py-2 px-4 border">
                            <button class="text-blue-500 hover:text-blue-700">Edit</button>
                            <button class="text-red-500 hover:text-red-700">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border">1</td>
                        <td class="py-2 px-4 border">Red</td>
                        <td class="py-2 px-4 border">Blue</td>
                        <td class="py-2 px-4 border">
                            <button class="text-blue-500 hover:text-blue-700">Edit</button>
                            <button class="text-red-500 hover:text-red-700">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border">1</td>
                        <td class="py-2 px-4 border">Red</td>
                        <td class="py-2 px-4 border">Blue</td>
                        <td class="py-2 px-4 border">
                            <button class="text-blue-500 hover:text-blue-700">Edit</button>
                            <button class="text-red-500 hover:text-red-700">Delete</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
