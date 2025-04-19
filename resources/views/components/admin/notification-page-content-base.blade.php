<div class="w-full flex-1 -mt-5 lg:mt-0 overflow-y-scroll h-[70vh] md:h-[85vh] lg:h-full lg:overflow-hidden pb-8 rounded-lg drop-shadow">

    <div class="mx-auto bg-[#FBFBFB] w-9/10 lg:w-full px-4 py-2  mb-2 block md:hidden text-center text-[22px] text-md md:text-lg font-semibold text-[#4AA76F] md:mr-3">
        Notifications
    </div>

    <div class="w-9/10 lg:w-full relative mx-auto text-[#202020] bg-[#F9F9F9] p-4 flex flex-col justify-center items-center md:justify-start md:items-start rounded-lg drop-shadow">

        <div class="flex mb-2">
            <!--Page description-->
            <div class="sm:flex-auto">
                {{ $page_description }}
            </div>
        </div>

        <!--Notifications Tabs-->
        <div class="lazyload bg-none rounded-[6px] w-full flex flex-col justify-center items-center md:justify-start md:items-start">
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
                 class="flex justify-start md:w-full relative">

                <!-- Active Tab Indicator -->
                <div loading="lazy"
                     class="lazyload absolute bottom-0 left-0 h-[2px] bg-[#6AA76F] transition-all duration-300"
                     :style="{ width: activeTabWidth + 'px', transform: `translateX(${activeTabPosition}px)` }">
                </div>

                {{ $notification_tabs }}

            </div>
        </div>

        <!-- Notifications Lists -->
        <div class="w-full mx-auto rounded-[4px] bg-none border border-gray-200 h-[480px] overflow-auto">
            {{-- Active: bg-gray-100 font-semibold, not active: bg:none --}}
            {{ $notification_lists }}
        </div>
    </div>
</div>
