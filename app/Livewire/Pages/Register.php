<?php

namespace App\Livewire\Pages;

use App\Models\Enrollment;
use App\Models\State;
use Livewire\Component;

class Register extends Component
{
    public int $step = 1;
    public int $totalSteps = 4;

    // Personal Info
    public string $firstName = '';
    public string $middleName = '';
    public string $surname = '';
    public string $nickname = '';
    public string $age = '';
    public string $dobDay = '';
    public string $dobMonth = '';
    public string $dobYear = '';
    public string $height = '';
    public string $weight = '';
    public string $complexion = '';

    // Location
    public string $lga = '';
    public string $stateOfOrigin = '';
    public string $country = 'Nigeria';
    public string $region = '';

    // Background
    public string $religion = '';
    public string $tribe = '';

    // Preferences
    public string $jerseyPreference = '';
    public string $roleModel = '';
    public string $favouriteTeam = '';
    public string $favouriteLeague = '';
    public string $favouriteFood = '';
    public string $hobby = '';
    public bool $agreedToTerms = false;

    protected $rules = [
        'firstName' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'middleName' => 'nullable|string|max:255',
        'nickname' => 'nullable|string|max:255',
        'age' => 'required|integer|min:13|max:20',
        'dobDay' => 'required|integer|min:1|max:31',
        'dobMonth' => ['required', 'string', 'regex:/^(0[1-9]|1[0-2])$/'],
        'dobYear' => 'required|integer|digits:4|min:1900',
        'height' => 'required|numeric|min:100|max:250',
        'weight' => 'required|numeric|min:20|max:150',
        'complexion' => 'nullable|in:fair,dark,brown,olive,tan',
        'lga' => 'required|string|max:255',
        'stateOfOrigin' => 'required|string|max:255|exists:states,name',
        'country' => 'required|string|max:255',
        'region' => 'nullable|string|max:255',
        'religion' => 'required|in:islam,christian,traditionalist,freethinker',
        'tribe' => 'required|string|max:255',
        'jerseyPreference' => 'required|in:short,long',
        'roleModel' => 'nullable|string|max:255',
        'favouriteTeam' => 'nullable|string|max:255',
        'favouriteLeague' => 'nullable|in:epl,laliga,seriea,other',
        'favouriteFood' => 'nullable|string|max:255',
        'hobby' => 'nullable|string|max:255',
        'agreedToTerms' => 'accepted',
    ];

    protected $messages = [
        'firstName.required' => 'First name is required',
        'surname.required' => 'Surname is required',
        'age.required' => 'Age is required',
        'age.min' => 'You must be at least 13 years old',
        'age.max' => 'You must be 20 years or younger',
        'dobDay.required' => 'Day of birth is required',
        'dobMonth.required' => 'Month of birth is required',
        'dobYear.required' => 'Year of birth is required',
        'dobDay.integer' => 'Invalid day',
        'dobMonth.regex' => 'Invalid month selected',
        'dobYear.digits' => 'Year must be 4 digits (e.g., 2005)',
        'dobYear.integer' => 'Invalid year',
        'dobYear.min' => 'Year must be 1900 or later',
        'height.required' => 'Height is required',
        'weight.required' => 'Weight is required',
        'complexion.in' => 'Please select a valid complexion type',
        'agreedToTerms.accepted' => 'You must agree to the terms and conditions',
    ];

    public function nextStep()
    {
        $this->validateStep();

        if ($this->step < $this->totalSteps) {
            $this->step++;
        }
    }

    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function submitApplication()
    {
        // Validate all fields with current year
        $currentYear = date('Y');
        $rules = $this->rules;
        $rules['dobYear'] = "required|integer|min:1900|max:{$currentYear}";

        $validated = $this->validate($rules);

        if (!$this->agreedToTerms) {
            $this->addError('agreedToTerms', 'You must agree to the terms and conditions');
            return;
        }

        try {
            // Format date of birth as YYYY-MM-DD
            $dateOfBirth = sprintf('%04d-%02d-%02d', $this->dobYear, $this->dobMonth, $this->dobDay);

            // Save to database
            $enrollment = Enrollment::create([
                'first_name' => $this->firstName,
                'surname' => $this->surname,
                'age' => $this->age,
                'dob' => $dateOfBirth,
                'dob_day' => $this->dobDay,
                'dob_month' => $this->dobMonth,
                'dob_year' => $this->dobYear,
                'height' => $this->height,
                'weight' => $this->weight,
                'complexion' => $this->complexion,
                'lga' => $this->lga,
                'state_of_origin' => $this->stateOfOrigin,
                'country' => $this->country,
                'region' => $this->region,
                'religion' => $this->religion,
                'tribe' => $this->tribe,
                'jersey_preference' => $this->jerseyPreference,
                'role_model' => $this->roleModel,
                'favourite_team' => $this->favouriteTeam,
                'favourite_league' => $this->favouriteLeague,
                'favourite_food' => $this->favouriteFood,
                'hobby' => $this->hobby,
                'agreed_to_terms' => $this->agreedToTerms,
                'status' => 'submitted',
                'submitted_at' => now(),
            ]);

            $this->dispatch('notify', message: 'Registration Successful! Your application has been submitted. We\'ll contact you soon.');

            // Log the successful submission
            logger()->info('Enrollment submitted successfully', ['enrollment_id' => $enrollment->id, 'name' => $enrollment->full_name]);

            // Reset form
            $this->reset();
            $this->step = 1;
        } catch (\Exception $e) {
            logger()->error('Enrollment submission failed', ['error' => $e->getMessage()]);
            $this->addError('submit', 'An error occurred while processing your application. Please try again.');
        }
    }

    protected function validateStep()
    {
        $currentYear = date('Y');
        $rules = match ($this->step) {
            1 => [
                'firstName' => $this->rules['firstName'],
                'surname' => $this->rules['surname'],
                'age' => $this->rules['age'],
                'dobDay' => $this->rules['dobDay'],
                'dobMonth' => $this->rules['dobMonth'],
                'dobYear' => "required|integer|min:1900|max:{$currentYear}",
                'height' => $this->rules['height'],
                'weight' => $this->rules['weight'],
            ],
            2 => [
                'lga' => $this->rules['lga'],
                'stateOfOrigin' => $this->rules['stateOfOrigin'],
                'country' => $this->rules['country'],
            ],
            3 => [
                'religion' => $this->rules['religion'],
                'tribe' => $this->rules['tribe'],
            ],
            4 => [
                'jerseyPreference' => $this->rules['jerseyPreference'],
                'agreedToTerms' => $this->rules['agreedToTerms'],
            ],
        };

        $this->validate($rules);
    }

    #[\Livewire\Attributes\Layout('layouts.public')]
    public function render()
    {
        return view('livewire.pages.enrol', [
            'states' => State::all(),
        ]);
    }
}
