<div class="flex justify-between md:hidden cursor-pointer text-white w-full">
    <div>
        <a href="#" id="goBackButton">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
</a>
    </div>
    <div id="sidebarToggle">
        <i class="fa-solid fa-bars"></i>
    </div>
</div>

@if (session('error'))
<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition
    class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-600 text-sm px-4 py-2 rounded shadow z-50 flex items-center space-x-2">
    <i class="fa-solid fa-triangle-exclamation w-4 h-4"></i>
    <span>{{ session('error') }}</span>
</div>
@endif

@if (session('success'))
<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition
    class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-600 text-sm px-4 py-2 rounded shadow z-50 flex items-center space-x-2">
    <i class="fa-solid fa-check w-4 h-4"></i>
    <span>{{ session('success') }}</span>
</div>
@endif