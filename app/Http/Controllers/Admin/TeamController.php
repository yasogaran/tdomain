<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class TeamController extends Controller
{
    /**
     * Display a listing of team members
     */
    public function index()
    {
        $teamMembers = TeamMember::orderBy('order')->paginate(20);
        return view('admin.team.index', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new team member
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created team member
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $this->uploadPhoto($request->file('photo'));
        }

        // Set order to last
        $validated['order'] = TeamMember::max('order') + 1;

        TeamMember::create($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member added successfully!');
    }

    /**
     * Display the specified team member
     */
    public function show(TeamMember $team)
    {
        return view('admin.team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified team member
     */
    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified team member
     */
    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($team->photo_path) {
                Storage::disk('public')->delete($team->photo_path);
            }
            $validated['photo_path'] = $this->uploadPhoto($request->file('photo'));
        }

        $team->update($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member updated successfully!');
    }

    /**
     * Remove the specified team member
     */
    public function destroy(TeamMember $team)
    {
        // Delete photo
        if ($team->photo_path) {
            Storage::disk('public')->delete($team->photo_path);
        }

        $team->delete();

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member deleted successfully!');
    }

    /**
     * Reorder team members
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'members' => 'required|array',
            'members.*.id' => 'required|exists:team_members,id',
            'members.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->members as $item) {
            TeamMember::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Team members reordered successfully!',
        ]);
    }

    /**
     * Upload and optimize photo
     */
    private function uploadPhoto($file)
    {
        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = 'team/' . $filename;

        // Resize and optimize photo
        $image = Image::read($file)
            ->cover(400, 400)
            ->toJpeg(quality: 85);

        Storage::disk('public')->put($path, (string) $image);

        return $path;
    }
}
