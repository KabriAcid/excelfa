<?php

namespace App\Livewire\Admin;

use App\Models\GalleryImage;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('layouts.dashboard')]
class AdminGallery extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $image;
    public string $title = '';
    public string $description = '';
    public string $category = 'general';
    public bool $isPublished = true;
    public string $search = '';
    public string $filterCategory = 'all';

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'category' => 'required|string',
        'image' => 'required|image|max:5120', // 5MB
        'isPublished' => 'boolean',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function uploadImage()
    {
        $this->validate();

        try {
            $path = $this->image->store('gallery', 'public');

            GalleryImage::create([
                'title' => $this->title,
                'description' => $this->description,
                'category' => $this->category,
                'image_path' => $path,
                'is_published' => $this->isPublished,
                'display_order' => GalleryImage::max('display_order') + 1 ?? 1,
                'mime_type' => $this->image->getMimeType(),
                'file_size' => $this->image->getSize(),
            ]);

            $this->resetForm();

            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'Image uploaded successfully!',
            ]);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('toast', [
                'type' => 'error',
                'message' => 'Failed to upload image: ' . $e->getMessage(),
            ]);
        }
    }

    public function publishImage(int $id)
    {
        $gallery = GalleryImage::find($id);
        if ($gallery) {
            $gallery->publish();
            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'Image published successfully!',
            ]);
        }
    }

    public function unpublishImage(int $id)
    {
        $gallery = GalleryImage::find($id);
        if ($gallery) {
            $gallery->unpublish();
            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'Image unpublished successfully!',
            ]);
        }
    }

    public function deleteImage(int $id)
    {
        $gallery = GalleryImage::find($id);
        if ($gallery) {
            $gallery->delete();
            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'Image deleted successfully!',
            ]);
        }
    }

    public function resetForm()
    {
        $this->image = null;
        $this->title = '';
        $this->description = '';
        $this->category = 'general';
        $this->isPublished = true;
    }

    public function render()
    {
        $query = GalleryImage::query();

        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%");
        }

        if ($this->filterCategory !== 'all') {
            $query->where('category', $this->filterCategory);
        }

        $galleryImages = $query->paginate(12);
        $categories = GalleryImage::getCategories();
        $totalImages = GalleryImage::count();
        $publishedImages = GalleryImage::where('is_published', true)->count();

        return view('livewire.admin.admin-gallery', [
            'galleryImages' => $galleryImages,
            'categories' => $categories,
            'totalImages' => $totalImages,
            'publishedImages' => $publishedImages,
        ]);
    }
}
