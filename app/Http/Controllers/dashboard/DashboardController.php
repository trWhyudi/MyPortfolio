<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get counts for dashboard overview
        $projectCount = \App\Models\Project::count();
        $categoryCount = \App\Models\ProjectCategories::count();
        $certificateCount = \App\Models\Certificate::count();
        
        return view('dashboard.index', compact('projectCount', 'categoryCount', 'certificateCount'));
    }
    
    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }
    
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            $user->image = $imagePath;
        }
        
        $user->save();
        
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
