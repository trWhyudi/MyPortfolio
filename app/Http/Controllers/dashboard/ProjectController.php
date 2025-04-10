<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectCategories;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->orderBy('sort_order')->get();
        $categories = ProjectCategories::all();
        return view('dashboard.projects.index', compact('projects', 'categories'));
    }
    
    public function create()
    {
        $categories = ProjectCategories::all();
        return view('dashboard.projects.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:project_categories,id',
            'description' => 'required|string',
            'project_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'technologies' => 'required|string',
            'date' => 'nullable|string|max:255',
            'client' => 'nullable|string|max:255',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'sort_order' => 'nullable|integer',
        ]);
        
        $project = new Project();
        $project->title = $request->title;
        $project->category_id = $request->category_id;
        $project->description = $request->description;
        $project->technologies = $request->technologies;
        $project->date = $request->date;
        $project->client = $request->client;
        $project->demo_url = $request->demo_url;
        $project->github_url = $request->github_url;
        $project->sort_order = $request->sort_order ?? 0;
        
        if ($request->hasFile('project_image')) {
            $imagePath = $request->file('project_image')->store('projects', 'public');
            $project->project_image = $imagePath;
        }
        
        $project->save();
        
        return redirect()->route('dashboard.projects.index')->with('success', 'Project created successfully');
    }
    
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $categories = ProjectCategories::all();
        return view('dashboard.projects.edit', compact('project', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:project_categories,id',
            'description' => 'required|string',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'technologies' => 'required|string',
            'date' => 'nullable|string|max:255',
            'client' => 'nullable|string|max:255',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'sort_order' => 'nullable|integer',
        ]);
        
        $project = Project::findOrFail($id);
        $project->title = $request->title;
        $project->category_id = $request->category_id;
        $project->description = $request->description;
        $project->technologies = $request->technologies;
        $project->date = $request->date;
        $project->client = $request->client;
        $project->demo_url = $request->demo_url;
        $project->github_url = $request->github_url;
        $project->sort_order = $request->sort_order ?? 0;
        
        if ($request->hasFile('project_image')) {
            // Delete old image
            if ($project->project_image) {
                Storage::disk('public')->delete($project->project_image);
            }
            
            $imagePath = $request->file('project_image')->store('projects', 'public');
            $project->project_image = $imagePath;
        }
        
        $project->save();
        
        return redirect()->route('dashboard.projects.index')->with('success', 'Project updated successfully');
    }
    
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        
        // Delete project image
        if ($project->project_image) {
            Storage::disk('public')->delete($project->project_image);
        }
        
        $project->delete();
        
        return redirect()->route('dashboard.projects.index')->with('success', 'Project deleted successfully');
    }
}
