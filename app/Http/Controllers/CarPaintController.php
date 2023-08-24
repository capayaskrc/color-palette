<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CarPaint;
use Illuminate\Http\Request;

class CarPaintController extends Controller
{
    public function store(Request $request)
    {


        $order = CarPaint::count() + 1; // Calculate the next order

        CarPaint::create(array_merge($validatedData, ['order' => $order]));

        return redirect()->back()->with('success', 'Paint job saved successfully.');
    }

}
