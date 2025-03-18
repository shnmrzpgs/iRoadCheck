<div x-data="{
        open: false,
        notificationCount: @entangle('notifications_count').live,
        showRedDot() {
            return this.notificationCount > 0;
        },
        redirectTo(url) {
            window.location.href = url;
        }
    }"
     class="relative">

    <a href="{{ route('resident.notifications') }}">
        <svg
            x-ref="content"
            :class="'cursor-pointer rounded-[4px] text-[#6AA76F]'"
            class="lazyload cursor-pointer w-6 h-6 hover:text-[#4AA76F] {{ request()->routeIs('resident.notifications') ? 'text-[#4AA76F]' : 'text-gray-400' }}"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"
            fill="{{ request()->routeIs('resident.notifications') ? '#4AA76F' : 'currentColor' }}"
            stroke="{{ request()->routeIs('resident.notifications') ? '#4AA76F' : 'currentColor' }}">
            <path
                fill="fillCurrent"
                d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
        </svg>

        <!-- Notifications Count (Red Dot) -->
        <span x-cloak
              x-show="showRedDot()"
              class="lazyload absolute scale-90 -top-0.5 -right-0.5 grid min-h-[24px] min-w-[24px] max-h-[34px] max-w-[34px] translate-x-2/4 -translate-y-2/4 place-items-center rounded-full border-1 border-[#202020] bg-red-600 py-0.5 px-0.5 text-xs text-white pointer-events-none">
            {{ $notifications_count }}
        </span>
    </a>
</div>
