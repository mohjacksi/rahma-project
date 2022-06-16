<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\DonationCategory;
use App\Models\Project;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{

    public function index()
    {
        $category_id = request()->category;

        $projects = Project::with(['category', 'media']);

        if(isset($category_id)) $projects->where('category_id', $category_id);

        $projects = $projects->paginate(9)->appends(request()->category);

        $categories = DonationCategory::all();

        return view('frontend.projects.index', compact('projects','categories'));
    }

    public function show(Project $project)
    {
        $project->load('category', 'projectPayments');

        return view('frontend.projects.show', compact('project'));
    }

}
