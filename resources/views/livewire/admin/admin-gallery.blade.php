<div>
    <x-slot name="header">
        Gallery
    </x-slot>

    <!-- Header with Stats -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-2 mb-8">
        <x-dashboard.stat-card
            icon="images"
            title="Total Images"
            :value="$totalImages"
            trend="up"
            trendValue="15%" />

        <x-dashboard.stat-card
            icon="images"
            title="Published"
            :value="$publishedImages"
            trend="up"
            trendValue="10%" />
    </div>

    <!-- Upload Section -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-premium border-2 border-dashed border-gray-300 dark:border-gray-600 p-8 mb-8">
        <form wire:submit="uploadImage" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Title</label>
                    <input 
                        wire:model="title"
                        type="text"
                        placeholder="Enter image title"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('title') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Category</label>
                    <select 
                        wire:model="category"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        @foreach($categories as $cat)
                        <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Description</label>
                <textarea 
                    wire:model="description"
                    placeholder="Enter image description"
                    rows="3"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
            </div>

            <!-- File Upload -->
            <div class="text-center">
                <div class="flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Drag & drop image here</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">or click to browse from your computer</p>
                <label class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Select Files</span>
                    <input 
                        wire:model="image"
                        type="file"
                        accept="image/*"
                        class="hidden">
                </label>
                @error('image') <span class="text-red-600 text-sm mt-2 block">{{ $message }}</span> @enderror
            </div>

            @if($image)
            <div class="flex items-center justify-between bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-900/50 rounded-lg p-4">
                <span class="text-sm text-blue-900 dark:text-blue-400">{{ $image->getClientOriginalName() }}</span>
                <button type="button" wire:click="$set('image', null)" class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @endif

            <!-- Publish Checkbox -->
            <div class="flex items-center gap-3">
                <input 
                    wire:model="isPublished"
                    type="checkbox"
                    id="isPublished"
                    class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-2 focus:ring-primary">
                <label for="isPublished" class="text-sm font-medium text-gray-700 dark:text-gray-300">Publish immediately</label>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit"
                class="w-full px-4 py-2 bg-primary hover:bg-primary/90 text-white font-medium rounded-lg transition-colors">
                Upload Image
            </button>
        </form>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-premium border border-gray-200 dark:border-gray-700 p-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <!-- Search -->
            <div class="flex-1 relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input 
                    wire:model.debounce.300ms="search"
                    type="search"
                    placeholder="Search images..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>

            <!-- Category Filter -->
            <select 
                wire:model="filterCategory"
                class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="all">All Categories</option>
                @foreach($categories as $cat)
                <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($galleryImages as $gallery)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-premium overflow-hidden border border-gray-200 dark:border-gray-700 hover:shadow-premium-lg transition-all duration-300 group">
            <!-- Image -->
            <div class="relative aspect-video bg-gray-100 dark:bg-gray-700 overflow-hidden">
                @if($gallery->image_path)
                <img 
                    src="{{ asset('storage/' . $gallery->image_path) }}" 
                    alt="{{ $gallery->title }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                <div class="w-full h-full flex items-center justify-center bg-gray-200 dark:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                @endif

                <!-- Overlay Actions -->
                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                    <button class="p-2 bg-white hover:bg-gray-200 text-gray-900 rounded-lg transition-colors" title="View">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                    @if($gallery->is_published)
                    <button 
                        wire:click="unpublishImage({{ $gallery->id }})"
                        class="p-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-colors" title="Unpublish">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                    @else
                    <button 
                        wire:click="publishImage({{ $gallery->id }})"
                        class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors" title="Publish">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                    @endif
                    <button 
                        wire:click="deleteImage({{ $gallery->id }})"
                        class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors" title="Delete">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>

                <!-- Status Badge -->
                <div class="absolute top-2 right-2">
                    @if($gallery->is_published)
                    <span class="px-2 py-1 bg-green-500 text-white text-xs font-semibold rounded-full">Published</span>
                    @else
                    <span class="px-2 py-1 bg-gray-500 text-white text-xs font-semibold rounded-full">Draft</span>
                    @endif
                </div>
            </div>

            <!-- Info -->
            <div class="p-4">
                <h3 class="font-semibold text-gray-900 dark:text-white text-sm mb-1 truncate">{{ $gallery->title }}</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 truncate mb-2">{{ $gallery->description ?? 'No description' }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded capitalize">{{ $gallery->category }}</span>
                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ $gallery->created_at->format('M d') }}</span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 dark:text-gray-600 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <p class="text-gray-500 dark:text-gray-400 text-sm">No images found</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($galleryImages->hasPages())
    <div class="mt-8 flex justify-center">
        {{ $galleryImages->links() }}
    </div>
    @endif
</div>
