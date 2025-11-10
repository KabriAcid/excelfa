<div class="min-h-screen pt-20">
    <!-- Hero -->
    <section class="py-20 gradient-hero text-primary-foreground">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-6 animate-fade-in">Contact Us</h1>
            <p class="text-xl max-w-3xl mx-auto opacity-90 animate-slide-up">
                Get in touch with Excel Football Academy - we're here to answer your questions
            </p>
        </div>
    </section>

    <!-- Contact Info & Form -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div class="space-y-6 animate-fade-in">
                    <!-- Location -->
                    <div class="bg-white shadow-lg rounded-lg border-0 p-6">
                        <div class="flex items-center space-x-3 mb-4">
                            <span class="text-3xl">📍</span>
                            <h3 class="text-xl font-bold">Our Location</h3>
                        </div>
                        <div class="text-muted-foreground">
                            <p>Excel Football Academy</p>
                            <p>Jalingo, Taraba State</p>
                            <p>Nigeria</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="bg-white shadow-lg rounded-lg border-0 p-6">
                        <div class="flex items-center space-x-3 mb-4">
                            <span class="text-3xl">📞</span>
                            <h3 class="text-xl font-bold">Phone</h3>
                        </div>
                        <div class="text-muted-foreground">
                            <p>+234 803 456 7890</p>
                            <p>+234 809 123 4567</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="bg-white shadow-lg rounded-lg border-0 p-6">
                        <div class="flex items-center space-x-3 mb-4">
                            <span class="text-3xl">✉️</span>
                            <h3 class="text-xl font-bold">Email</h3>
                        </div>
                        <div class="text-muted-foreground">
                            <p>info@excelfa.com</p>
                            <p>admissions@excelfa.com</p>
                        </div>
                    </div>

                    <!-- Office Hours -->
                    <div class="bg-white shadow-lg rounded-lg border-0 p-6">
                        <div class="flex items-center space-x-3 mb-4">
                            <span class="text-3xl">🕐</span>
                            <h3 class="text-xl font-bold">Office Hours</h3>
                        </div>
                        <div class="text-muted-foreground">
                            <p>Monday - Friday: 8:00 AM - 5:00 PM</p>
                            <p>Saturday: 9:00 AM - 2:00 PM</p>
                            <p>Sunday: Closed</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white shadow-lg rounded-lg border-0 p-6 animate-slide-up">
                    <h3 class="text-xl font-bold mb-6">Send Us a Message</h3>
                    <form wire:submit="submit" class="space-y-4">
                        <!-- Full Name -->
                        <div>
                            <label class="block text-sm font-medium mb-2">Full Name <span class="text-red-500">*</span></label>
                            <input
                                type="text"
                                wire:model="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                placeholder="Your full name"
                                required />
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Email and Phone -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-2">Email <span class="text-red-500">*</span></label>
                                <input
                                    type="email"
                                    wire:model="email"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="your@email.com"
                                    required />
                                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Phone</label>
                                <input
                                    type="tel"
                                    wire:model="phone"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="+234..." />
                                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Subject -->
                        <div>
                            <label class="block text-sm font-medium mb-2">Subject <span class="text-red-500">*</span></label>
                            <input
                                type="text"
                                wire:model="subject"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                placeholder="Message subject"
                                required />
                            @error('subject') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="block text-sm font-medium mb-2">Message <span class="text-red-500">*</span></label>
                            <textarea
                                wire:model="message"
                                rows="6"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                placeholder="Your message..."
                                required></textarea>
                            @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold py-3 rounded-lg hover:shadow-lg transition">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-muted">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold mb-4">Find Us</h2>
                <p class="text-xl text-muted-foreground">Visit our academy in Jalingo, Taraba State</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg max-w-4xl mx-auto overflow-hidden">
                <div class="aspect-video bg-gray-100 flex items-center justify-center">
                    <div class="text-center p-8">
                        <span class="text-6xl mb-4 block">📍</span>
                        <p class="text-muted-foreground">Map integration available</p>
                        <p class="text-sm text-muted-foreground mt-2">Jalingo, Taraba State, Nigeria</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>