<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    /** @use HasFactory<\Database\Factories\ContactInquiryFactory> */
    use HasFactory;

    protected $table = 'contact_inquiries';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'ip_address',
        'response_note',
        'responded_at',
    ];

    protected $casts = [
        'responded_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Statuses available for contact inquiries
     */
    public const STATUS_NEW = 'new';
    public const STATUS_VIEWED = 'viewed';
    public const STATUS_RESPONDED = 'responded';
    public const STATUS_CLOSED = 'closed';

    public static function getStatuses(): array
    {
        return [
            self::STATUS_NEW,
            self::STATUS_VIEWED,
            self::STATUS_RESPONDED,
            self::STATUS_CLOSED,
        ];
    }

    /**
     * Mark as viewed
     */
    public function markAsViewed(): void
    {
        if ($this->status === self::STATUS_NEW) {
            $this->update(['status' => self::STATUS_VIEWED]);
        }
    }

    /**
     * Mark as responded with optional response note
     */
    public function markAsResponded(string $responseNote = ''): void
    {
        $this->update([
            'status' => self::STATUS_RESPONDED,
            'response_note' => $responseNote,
            'responded_at' => now(),
        ]);
    }

    /**
     * Mark as closed
     */
    public function close(): void
    {
        $this->update(['status' => self::STATUS_CLOSED]);
    }

    /**
     * Check if inquiry is new
     */
    public function isNew(): bool
    {
        return $this->status === self::STATUS_NEW;
    }

    /**
     * Check if inquiry has been responded to
     */
    public function hasResponded(): bool
    {
        return $this->status === self::STATUS_RESPONDED;
    }

    /**
     * Get unresponded inquiries
     */
    public static function unresponded()
    {
        return static::whereIn('status', [self::STATUS_NEW, self::STATUS_VIEWED]);
    }
}
