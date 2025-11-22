<?php

namespace App\Livewire\Public;

use App\Mail\NewQuotationAlert;
use App\Mail\QuotationReceived;
use App\Models\Quotation;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class QuotationForm extends Component
{
    public $currentStep = 1;
    public $totalSteps = 3;

    // Form fields
    public $name = '';
    public $company = '';
    public $email = '';
    public $phone = '';
    public $service_type = '';
    public $budget = '';
    public $timeline = '';
    public $description = '';

    public $submissionSuccess = false;

    protected function rules()
    {
        return [
            'name' => 'required|min:2',
            'company' => 'required|min:2',
            'email' => 'required|email',
            'phone' => 'required',
            'service_type' => 'required',
            'budget' => 'required',
            'timeline' => 'required',
            'description' => 'required|min:20',
        ];
    }

    protected function getStepRules()
    {
        return match ($this->currentStep) {
            1 => [
                'name' => 'required|min:2',
                'company' => 'required|min:2',
                'email' => 'required|email',
                'phone' => 'required',
            ],
            2 => [
                'service_type' => 'required',
                'budget' => 'required',
                'timeline' => 'required',
            ],
            3 => [
                'description' => 'required|min:20',
            ],
            default => [],
        };
    }

    public function nextStep()
    {
        $this->validate($this->getStepRules());
        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function submit()
    {
        // Validate all fields
        $this->validate();

        try {
            // Create quotation
            $quotation = Quotation::create([
                'name' => $this->name,
                'company' => $this->company,
                'email' => $this->email,
                'phone' => $this->phone,
                'service_type' => $this->service_type,
                'budget' => $this->budget,
                'timeline' => $this->timeline,
                'description' => $this->description,
                'status' => 'new',
            ]);

            // Send confirmation email to client
            Mail::to($this->email)->send(new QuotationReceived($quotation));

            // Send alert to sales team
            $salesEmail = env('SALES_EMAIL', 'sales@techdomain.com');
            Mail::to($salesEmail)->send(new NewQuotationAlert($quotation));

            // Show success
            $this->submissionSuccess = true;
            $this->currentStep = 4; // Success step
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error submitting your quotation. Please try again.');
        }
    }

    public function resetForm()
    {
        $this->reset([
            'name',
            'company',
            'email',
            'phone',
            'service_type',
            'budget',
            'timeline',
            'description',
            'submissionSuccess',
            'currentStep',
        ]);
    }

    public function render()
    {
        return view('livewire.public.quotation-form');
    }
}
