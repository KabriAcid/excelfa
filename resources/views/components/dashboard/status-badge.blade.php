@props(['status' => 'pending'])

@php
$classes = match($status) {
'approved' => 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400',
'rejected' => 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400',
'pending' => 'bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-400',
'new' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400',
'archived' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
'read' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
'unread' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400',
'responded' => 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400',
default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
};
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium capitalize $classes"]) }}>
    {{ $slot ?: $status }}
</span>