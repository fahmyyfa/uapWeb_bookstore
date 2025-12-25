@if (session('success') || session('error') || session('warning'))
<div
    x-data="{ show: true }"
    x-show="show"
    x-transition
    x-init="setTimeout(() => show = false, 3500)"
    class="mb-6"
>
    @if (session('success'))
        <div class="flex items-center gap-3 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg shadow">
            <span class="text-xl">✅</span>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="flex items-center gap-3 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg shadow">
            <span class="text-xl">❌</span>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif

    @if (session('warning'))
        <div class="flex items-center gap-3 bg-yellow-100 border border-yellow-300 text-yellow-800 px-4 py-3 rounded-lg shadow">
            <span class="text-xl">⚠️</span>
            <span class="font-medium">{{ session('warning') }}</span>
        </div>
    @endif
</div>
@endif
