<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects
     */
    public function index()
    {
        $projects = Project::with('media')->orderBy('order')->paginate(20);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'client_name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'service_type' => 'required|string|max:255',
            'technology_stack' => 'nullable|string',
            'challenge' => 'required|string',
            'solution' => 'required|string',
            'results' => 'nullable|string',
            'featured' => 'boolean',
            'status' => 'required|in:draft,published,archived',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Set order to last
        $validated['order'] = Project::max('order') + 1;
        $validated['featured'] = $request->boolean('featured');

        $project = Project::create($validated);

        return redirect()
            ->route('admin.projects.show', $project)
            ->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified project
     */
    public function show(Project $project)
    {
        $project->load('media');
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified project
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified project
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'client_name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'service_type' => 'required|string|max:255',
            'technology_stack' => 'nullable|string',
            'challenge' => 'required|string',
            'solution' => 'required|string',
            'results' => 'nullable|string',
            'featured' => 'boolean',
            'status' => 'required|in:draft,published,archived',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['featured'] = $request->boolean('featured');

        $project->update($validated);

        return redirect()
            ->route('admin.projects.show', $project)
            ->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified project
     */
    public function destroy(Project $project)
    {
        // Delete all associated media
        foreach ($project->media as $media) {
            if ($media->type === 'image' && $media->path) {
                Storage::disk('public')->delete($media->path);
            }
            $media->delete();
        }

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }

    /**
     * Upload media for a project
     */
    public function uploadMedia(Request $request, Project $project)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480',
            'type' => 'required|in:image,video',
            'caption' => 'nullable|string|max:255',
        ]);

        $file = $request->file('file');
        $type = $request->input('type');

        if ($type === 'image') {
            $path = $this->uploadImage($file);
        } else {
            $path = $this->uploadVideo($file);
        }

        $order = $project->media()->max('order') + 1;

        $media = $project->media()->create([
            'type' => $type,
            'path' => $path,
            'caption' => $request->input('caption'),
            'order' => $order,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Media uploaded successfully!',
            'media' => $media,
        ]);
    }

    /**
     * Delete project media
     */
    public function deleteMedia(ProjectMedia $media)
    {
        if ($media->type === 'image' && $media->path) {
            Storage::disk('public')->delete($media->path);
        }

        $media->delete();

        return response()->json([
            'success' => true,
            'message' => 'Media deleted successfully!',
        ]);
    }

    /**
     * Update media caption
     */
    public function updateMediaCaption(Request $request, ProjectMedia $media)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
        ]);

        $media->update([
            'caption' => $request->input('caption'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Caption updated successfully!',
        ]);
    }

    /**
     * Reorder project media
     */
    public function reorderMedia(Request $request)
    {
        $request->validate([
            'media' => 'required|array',
            'media.*.id' => 'required|exists:project_media,id',
            'media.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->media as $item) {
            ProjectMedia::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Media reordered successfully!',
        ]);
    }

    /**
     * Upload and optimize image
     */
    private function uploadImage($file)
    {
        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = 'projects/' . $filename;

        // Resize and optimize image
        $image = Image::read($file)
            ->scaleDown(width: 1200)
            ->toJpeg(quality: 85);

        Storage::disk('public')->put($path, (string) $image);

        return $path;
    }

    /**
     * Upload video
     */
    private function uploadVideo($file)
    {
        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = 'projects/videos/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($file));

        return $path;
    }
}
