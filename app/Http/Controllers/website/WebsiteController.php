<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Project;
use App\Models\ProjectCategories;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return view('website.home');
    }
    public function about(){
        return view('website.about');
    }
    public function resume(){
        $certificates = Certificate::orderBy('date', 'desc')->get();
        return view('website.resume', compact('certificates'));
    }
    public function project(){
        $projects = Project::with('category')->orderBy('sort_order')->get();
        $categories = ProjectCategories::all();
        
        return view('website.project', compact('projects', 'categories'));
    }
    public function contact(){
        return view('website.contact');
    }
}
