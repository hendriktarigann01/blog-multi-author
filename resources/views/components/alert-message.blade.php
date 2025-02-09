@props(['type' => 'info', 'message'])

@php
$alertTypes = [
'info' => 'text-blue-600 bg-white border border-blue-300',
'danger' => 'text-red-600 bg-white border border-red-300',
'success' => 'text-green-600 bg-white border border-green-300',
'warning' => 'text-yellow-600 bg-white border border-yellow-300',
'dark' => 'text-gray-600 bg-white border border-gray-300',
];
$iconColor = $alertTypes[$type] ?? $alertTypes['info'];
@endphp

@if ($message)
<div id="alert-message"
    class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 p-4 text-sm rounded-lg {{ $iconColor }} opacity-0 transition-opacity duration-500 ease-in-out"
    role="alert">
    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">{{ ucfirst($type) }} alert!</span> {{ $message }}
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const alertBox = document.getElementById('alert-message');
        if (alertBox) {
            setTimeout(() => {
                alertBox.classList.remove('opacity-0');
            }, 100); // Delay kecil untuk memastikan efek transisi
            setTimeout(() => {
                alertBox.classList.add('opacity-0');
            }, 5000); // Menghilangkan setelah 5 detik
        }
    });
</script>
@endif
