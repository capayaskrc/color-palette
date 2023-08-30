<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function view()
    {
        $colorTemplates = Color::all();

        return response()->json($colorTemplates);
    }

    public function save(Request $request)
    {
        $template_Name = $request->input('template_name');
        $colors = json_decode($request->input('colors'));

        // Create a new ColorPalette instance and fill the data
        $color_Palette = new Color();
        $color_Palette->template_name = $template_Name;
        $color_Palette->colors = $colors;

        // Save the color palette
        $color_Palette->save();

        return response()->json(['message' => 'Color palette saved successfully']);
    }
}