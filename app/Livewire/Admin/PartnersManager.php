<?php

namespace App\Livewire\Admin;

use App\Models\Partner;
use Livewire\Component;
use Livewire\WithFileUploads;

class PartnersManager extends Component
{
    use WithFileUploads;

    public $partners;
    public $showModal = false;
    public $editMode = false;
    public $partnerId = null;

    // Form fields
    public $name = '';
    public $description = '';
    public $website_url = '';
    public $logo = null;
    public $status = 'active';

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
        'website_url' => 'nullable|url|max:255',
        'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        'status' => 'required|in:active,inactive',
    ];

    protected $messages = [
        'name.required' => 'Partner name is required',
        'logo.image' => 'Logo must be an image file',
        'logo.max' => 'Logo must not exceed 2MB',
        'website_url.url' => 'Please enter a valid URL',
    ];

    public function mount()
    {
        $this->loadPartners();
    }

    public function loadPartners()
    {
        $this->partners = Partner::orderBy('order')->get();
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->editMode = false;
        $this->showModal = true;
    }

    public function openEditModal($partnerId)
    {
        $partner = Partner::findOrFail($partnerId);

        $this->partnerId = $partner->id;
        $this->name = $partner->name;
        $this->description = $partner->description;
        $this->website_url = $partner->website_url;
        $this->status = $partner->status;
        $this->editMode = true;
        $this->showModal = true;
    }

    public function save()
    {
        if ($this->editMode) {
            // Logo is optional when editing
            $this->validate();
        } else {
            // Logo is required when creating
            $this->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:500',
                'website_url' => 'nullable|url|max:255',
                'logo' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
                'status' => 'required|in:active,inactive',
            ]);
        }

        if ($this->editMode) {
            $this->update();
        } else {
            $this->create();
        }
    }

    private function create()
    {
        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'website_url' => $this->website_url,
            'status' => $this->status,
            'order' => Partner::max('order') + 1,
        ];

        // Handle logo upload
        if ($this->logo) {
            $filename = time() . '_' . $this->logo->getClientOriginalName();
            $path = $this->logo->storeAs('partners', $filename, 'public');
            $data['logo_path'] = $path;
        }

        Partner::create($data);

        $this->loadPartners();
        $this->showModal = false;
        $this->resetForm();

        session()->flash('success', 'Partner added successfully!');
    }

    private function update()
    {
        $partner = Partner::findOrFail($this->partnerId);

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'website_url' => $this->website_url,
            'status' => $this->status,
        ];

        // Handle logo upload
        if ($this->logo) {
            // Delete old logo
            if ($partner->logo_path) {
                \Storage::disk('public')->delete($partner->logo_path);
            }

            $filename = time() . '_' . $this->logo->getClientOriginalName();
            $path = $this->logo->storeAs('partners', $filename, 'public');
            $data['logo_path'] = $path;
        }

        $partner->update($data);

        $this->loadPartners();
        $this->showModal = false;
        $this->resetForm();

        session()->flash('success', 'Partner updated successfully!');
    }

    public function delete($partnerId)
    {
        $partner = Partner::findOrFail($partnerId);

        // Delete logo
        if ($partner->logo_path) {
            \Storage::disk('public')->delete($partner->logo_path);
        }

        $partner->delete();

        $this->loadPartners();

        session()->flash('success', 'Partner deleted successfully!');
    }

    public function toggleStatus($partnerId)
    {
        $partner = Partner::findOrFail($partnerId);
        $partner->update([
            'status' => $partner->status === 'active' ? 'inactive' : 'active'
        ]);

        $this->loadPartners();

        session()->flash('success', 'Partner status updated!');
    }

    public function updateOrder($partners)
    {
        foreach ($partners as $partner) {
            Partner::where('id', $partner['value'])->update(['order' => $partner['order']]);
        }

        $this->loadPartners();

        session()->flash('success', 'Partners reordered successfully!');
    }

    private function resetForm()
    {
        $this->partnerId = null;
        $this->name = '';
        $this->description = '';
        $this->website_url = '';
        $this->logo = null;
        $this->status = 'active';
        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.admin.partners-manager');
    }
}
