<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    /** @use HasFactory<\Database\Factories\EnrollmentFactory> */
    use HasFactory;

    protected $fillable = [
        // Personal information
        'first_name',
        'surname',
        'age',
        'dob',
        'dob_day',
        'dob_month',
        'dob_year',

        // Biometrics
        'height',
        'weight',
        'complexion',

        // Location
        'lga',
        'state_of_origin',
        'country',
        'region',

        // Background
        'religion',
        'tribe',

        // Preferences
        'jersey_preference',
        'role_model',
        'favourite_team',
        'favourite_league',
        'favourite_food',
        'hobby',

        // Terms
        'agreed_to_terms',

        // Metadata
        'status',
    ];

    protected $casts = [
        'age' => 'integer',
        'height' => 'decimal:2',
        'weight' => 'decimal:2',
        'agreed_to_terms' => 'boolean',
        'submitted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the full date of birth from components
     */
    public function getDateOfBirthAttribute(): ?\DateTime
    {
        if ($this->dob_day && $this->dob_month && $this->dob_year) {
            try {
                return new \DateTime("{$this->dob_year}-{$this->dob_month}-{$this->dob_day}");
            } catch (\Exception $e) {
                return null;
            }
        }
        return null;
    }

    /**
     * Get the full name
     */
    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->surname}");
    }

    /**
     * Mark as submitted
     */
    public function markAsSubmitted(): void
    {
        $this->update([
            'status' => 'submitted',
        ]);
    }

    /**
     * Check if enrollment is pending
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Check if enrollment is approved
     */
    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    /**
     * Approve enrollment
     */
    public function approve(): void
    {
        $this->update(['status' => 'approved']);
    }

    /**
     * Reject enrollment
     */
    public function reject(): void
    {
        $this->update(['status' => 'rejected']);
    }
}
