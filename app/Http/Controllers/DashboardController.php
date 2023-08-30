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

        $updatedTemplates = Color::all();
        return response()->json($updatedTemplates);
    }

    public function destroy($id)
    {
        $colorTemplate = Color::find($id);
        if ($colorTemplate) {
            $colorTemplate->delete();
            return response()->json(['message' => 'Color template deleted successfully']);
        } else {
            return response()->json(['error' => 'Color template not found'], 404);
        }
    }

    public function select($id)
    {
        $colorTemplate = Color::findOrFail($id);
        $colorTemplate->is_selected = !$colorTemplate->is_selected;
        $colorTemplate->save();

        $updatedTemplates = Color::all();
        return response()->json($updatedTemplates);
    }
}
