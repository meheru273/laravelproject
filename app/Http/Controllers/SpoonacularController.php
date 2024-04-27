<?php

namespace App\Http\Controllers;

use App\Services\SpoonacularService;
use Illuminate\Http\Request;

class SpoonacularController extends Controller
{
    protected $spoonacularService;

    public function __construct(SpoonacularService $spoonacularService)
    {
        $this->spoonacularService = $spoonacularService;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $recipes = $this->spoonacularService->searchRecipes($query);

        return view('recipes', compact('recipes'));
    }
}
