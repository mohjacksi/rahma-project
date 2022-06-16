<?php

namespace App\Http\Controllers\Frontend;

use App\Models\DonationCategory;
use App\Models\Project;

class HomeController
{
    public function index()
    {
        $category_id = request()->category;

        $projects = Project::with(['category', 'media'])->limit(9);

        if(isset($category_id)) $projects->where('category_id', $category_id);

        $projects = $projects->get();

        $categories = DonationCategory::all();


        return view('frontend.home',compact('projects','categories'));
    }
}
