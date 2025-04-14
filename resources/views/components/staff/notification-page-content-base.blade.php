<div class="text-[#202020] bg-[#F9F9F9] p-8 h-full rounded-lg drop-shadow">

    <div class="w-full relative mx-auto bg-none rounded-[6px]">

        <div class="flex mb-4">
            <div class="flex flex-col mr-auto">
                <!--Page description-->
                <div class="sm:flex-auto">
                    {{ $page_description }}
                </div>
            </div>
        </div>

        <!--Notifications Tabs-->
        <div class="lazyload bg-none rounded-[6px]">
            <div loading="lazy"
                 x-data="{
                    activeTab: 'all', // Default active tab
                    activeTabWidth: 0,
                    activeTabPosition: 0,
                    setActiveTab(tab, event) {
                        this.activeTab = tab;
                        const tabElement = event.currentTarget;
                        this.activeTabWidth = tabElement.offsetWidth;
                        this.activeTabPosition = tabElement.offsetLeft;
                    },
                     initializeTabs() {
                        this.$nextTick(() => {
                            const initialTab = this.$refs.allTab;
                        if (initialTab) {
                        console.log('Initializing All Tab:', initialTab); // Debugging
                        this.activeTabWidth = initialTab.offsetWidth;
                        this.activeTabPosition = initialTab.offsetLeft;
                        } else {
                        console.error('All Tab not found in $refs.');
                        }
                     });
                }
            }"
                 x-init="initializeTabs()"
                 class="flex justify-start relative">

                <!-- Active Tab Indicator -->
                <div loading="lazy"
                     class="lazyload absolute bottom-0 left-0 h-[2px] bg-[#6AA76F] transition-all duration-300"
                     :style="{ width: activeTabWidth + 'px', transform: `translateX(${activeTabPosition}px)` }">
                </div>

                {{ $notification_tabs }}

            </div>
        </div>
    </div>
    <!-- Notifications Lists -->
    <div class="w-full rounded-[4px] bg-none border border-gray-200 h-[480px] overflow-auto">
        {{-- Active: bg-gray-100 font-semibold, not active: bg:none --}}
        {{ $notification_lists }}
    </div>
</div>
