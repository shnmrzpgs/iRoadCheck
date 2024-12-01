<x-app-layout>

    <!-- Sidebar -->
    <div
        x-data="{ open: false }"
        class="relative z-50"
    >
        <!-- Overlay (for small screens) -->
        <div
            class="fixed inset-0 bg-black bg-opacity-50 md:hidden"
            x-show="open"
            x-transition.opacity
            @click="open = false"
            style="display: none;"
        ></div>

        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-gray-100 transform transition-transform duration-300 md:translate-x-0"
            :class="{ '-translate-x-full': !open }"
        >
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between px-4 py-4 border-b border-gray-700">
                <h1 class="text-lg font-bold">Brand Logo</h1>
                <!-- Close Button (for small screens) -->
                <button
                    class="md:hidden text-gray-100"
                    @click="open = false"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-4">
                <a href="#" class="flex items-center p-2 space-x-2 rounded hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 2a1 1 0 00-1 1v4H5a1 1 0 00-.707 1.707l7 7a1 1 0 001.414 0l7-7A1 1 0 0019 7h-4V3a1 1 0 00-1-1h-4z" />
                        <path d="M3 13.5V18a1 1 0 001 1h4v-2.5a1.5 1.5 0 013 0V19h4a1 1 0 001-1v-4.5a1 1 0 00-.293-.707l-6-6a1 1 0 00-1.414 0l-6 6A1 1 0 003 13.5z" />
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center p-2 space-x-2 rounded hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 3a1 1 0 00-.894.553l-3 6a1 1 0 000 .894l3 6A1 1 0 004 16h12a1 1 0 00.894-.553l3-6a1 1 0 000-.894l-3-6A1 1 0 0016 3H4z" />
                    </svg>
                    <span>Projects</span>
                </a>
                <a href="#" class="flex items-center p-2 space-x-2 rounded hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7 3h6a2 2 0 012 2v1a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zm-2 7h10a2 2 0 012 2v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1a2 2 0 012-2z" />
                    </svg>
                    <span>Settings</span>
                </a>
            </nav>
        </aside>

        <!-- Hamburger Button -->
        <!-- Hamburger Button -->
        <button
            class="fixed z-50 p-2 bg-gray-800 text-red-500 rounded-md block md:hidden top-4 left-4"
            @click="open = !open"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold">Responsive Navigation Sidebar</h1>
        <p class="mt-4 text-gray-700">Resize the screen or click the hamburger menu to see the sidebar in action!</p>
    </div>
</x-app-layout>

