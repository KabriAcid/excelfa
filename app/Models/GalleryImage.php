<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryImageFactory> */
    use HasFactory;

    protected $table = 'gallery_images';

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'category',
        'width',
        'height',
        'mime_type',
        'file_size',
        'is_published',
        'display_order',
        'uploaded_at',
    ];

    protected $casts = [
        'width' => 'integer',
        'height' => 'integer',
        'file_size' => 'integer',
        'is_published' => 'boolean',
        'display_order' => 'integer',
        'uploaded_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Categories for organizing gallery images
     */
    public const CATEGORY_TEAM = 'team';
    public const CATEGORY_TRAINING = 'training';
    public const CATEGORY_EVENTS = 'events';
    public const CATEGORY_TOURNAMENTS = 'tournaments';
    public const CATEGORY_GENERAL = 'general';

    public static function getCategories(): array
    {
        return [
            self::CATEGORY_TEAM,
            self::CATEGORY_TRAINING,
            self::CATEGORY_EVENTS,
            self::CATEGORY_TOURNAMENTS,
            self::CATEGORY_GENERAL,
        ];
    }

    /**
     * Scope to only published images
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope to filter by category
     */
    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Get images ordered by display order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('created_at', 'desc');
    }

    /**
     * Get full URL to the image
     */
    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image_path);
    }

    /**
     * Format file size in human-readable format
     */
    public function getFormattedFileSizeAttribute(): string
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $i < count($units) && $bytes >= 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    /**
     * Check if image is landscape
     */
    public function isLandscape(): bool
    {
        return $this->width > $this->height;
    }

    /**
     * Check if image is portrait
     */
    public function isPortrait(): bool
    {
        return $this->height > $this->width;
    }

    /**
     * Check if image is square
     */
    public function isSquare(): bool
    {
        return $this->width === $this->height;
    }

    /**
     * Publish the image
     */
    public function publish(): void
    {
        $this->update(['is_published' => true]);
    }

    /**
     * Unpublish the image
     */
    public function unpublish(): void
    {
        $this->update(['is_published' => false]);
    }
}
