<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('sort_order')->get();
        return view('dashboard.certificates.index', compact('certificates'));
    }
    
    public function create()
    {
        return view('dashboard.certificates.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'description' => 'nullable|string',
            'certificate_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'certificate_url' => 'nullable|url',
            'sort_order' => 'nullable|integer',
        ]);
        
        $certificate = new Certificate();
        $certificate->title = $request->title;
        $certificate->issuer = $request->issuer;
        $certificate->date = $request->date;
        $certificate->description = $request->description;
        $certificate->certificate_url = $request->certificate_url;
        $certificate->sort_order = $request->sort_order ?? 0;
        
        if ($request->hasFile('certificate_image')) {
            $imagePath = $request->file('certificate_image')->store('certificates', 'public');
            $certificate->certificate_image = $imagePath;
        }
        
        $certificate->save();
        
        return redirect()->route('dashboard.certificates.index')->with('success', 'Certificate created successfully');
    }
    
    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('dashboard.certificates.edit', compact('certificate'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'description' => 'nullable|string',
            'certificate_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'certificate_url' => 'nullable',
            'sort_order' => 'nullable|integer',
        ]);
        
        $certificate = Certificate::findOrFail($id);
        $certificate->title = $request->title;
        $certificate->issuer = $request->issuer;
        $certificate->date = $request->date;
        $certificate->description = $request->description;
        $certificate->certificate_url = $request->certificate_url;
        $certificate->sort_order = $request->sort_order ?? 0;
        
        if ($request->hasFile('certificate_image')) {
            // Delete old image
            if ($certificate->certificate_image) {
                Storage::disk('public')->delete($certificate->certificate_image);
            }
            
            $imagePath = $request->file('certificate_image')->store('certificates', 'public');
            $certificate->certificate_image = $imagePath;
        }
        
        $certificate->save();
        
        return redirect()->route('dashboard.certificates.index')->with('success', 'Certificate updated successfully');
    }
    
    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);
        
        // Delete certificate image
        if ($certificate->certificate_image) {
            Storage::disk('public')->delete($certificate->certificate_image);
        }
        
        $certificate->delete();
        
        return redirect()->route('dashboard.certificates.index')->with('success', 'Certificate deleted successfully');
    }
}
