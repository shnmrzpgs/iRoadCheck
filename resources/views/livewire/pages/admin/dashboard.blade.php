<x-Admin.admin-navigation page_title="Dashboard" action="{{ route('admin.dashboard') }}" placeholder="Search..." name="search">

    <!-- Main Content -->
    <main class="flex-1 -mt-2 overflow-y-scroll h-[83vh] md:h-[85vh] xl:h-full xl:overflow-hidden pb-5">

        <!-- Stats Cards -->
        <div class="grid md:grid-cols-3 gap-6 mb-5">

            <!-- Total Reports Card -->
            <a href="{{ route('admin.manage-users-table') }}"
                class="relative bg-white rounded-lg shadow-md py-0 px-2 overflow-hidden w-auto min-h-[115px]
               hover:drop-shadow-lg transition-all duration-500 ease-out
               transform-gpu group ">

                <!-- Background graphic -->
                <div class="absolute inset-x-0 bottom-0 opacity-90 transform group-hover:scale-125 transition-transform group-hover:translate-x-1 duration-700 ease-in-out">
                    <img src="{{ asset('storage/images/bg-cardGraphics-orange.png') }}"
                        class="w-full h-auto rounded-b-lg object-cover"
                        alt="Card background graphic">
                </div>

                <div class="flex flex-col text-[#FFAD00] pl-2 pr-3 pt-7 relative z-10">
                    <!-- Card Title -->
                    <div class="font-semibold text-md opacity-90 transform group-hover:scale-110 group-hover:translate-y-1 group-hover:translate-x-4 transition-all duration-500 ease-in-out">
                        Total Staff Accounts
                    </div>
                    <!-- Card Counts with gentle scale on hover -->
                    <div class="px-5 py-1 mt-2 mb-3 ml-auto text-lg text-[#FFAD00] rounded-full bg-[#FBFBFB] font-bold transform group-hover:scale-105 group-hover:translate-x-1 duration-500 ease-in-out">
                        {{ $totalStaff }}
                    </div>
                </div>
            </a>


            <!-- Active Accounts Card -->
            <a href="{{ route('admin.manage-users-table') }}"
                class="relative bg-white rounded-lg shadow-md p-0 overflow-hidden w-auto min-h-[115px]
               hover:drop-shadow-lg transition-all duration-500 ease-out
               transform-gpu group ">

                <!-- Background graphic -->
                <div class="absolute inset-x-0 bottom-0 opacity-90 transform group-hover:scale-125 transition-transform group-hover:translate-x-1 duration-700 ease-in-out">
                    <img src="{{ asset('storage/images/bg-cardGraphics-green.png') }}"
                        class="w-full h-auto rounded-b-lg object-cover"
                        alt="Card background graphic">
                </div>

                <div class="flex flex-col text-[#4AA76F] px-5 pt-7 relative z-10">
                    <!-- Card Title -->
                    <div class="font-semibold text-md opacity-90 transform group-hover:scale-105 group-hover:translate-y-1 group-hover:translate-x-1 transition-all duration-500 ease-in-out">
                        Active Accounts
                    </div>

                    <!-- Card Counts -->
                    <div class="px-5 py-1 mt-2 mb-3 ml-auto text-lg text-[#4AA76F] rounded-full bg-[#FBFBFB] font-bold transform group-hover:scale-105 group-hover:translate-x-1 duration-500 ease-in-out">
                        {{ $activeStaffCount }}
                    </div>
                </div>

            </a>

            <!-- Inactive Accounts Card -->
            <a href="{{ route('admin.manage-users-table') }}"
                class="relative bg-white rounded-lg shadow-md p-0 overflow-hidden w-auto min-h-[115px]
               hover:drop-shadow-lg transition-all duration-500 ease-out
               transform-gpu group ">

                <!-- Background graphic -->
                <div class="absolute inset-x-0 bottom-0 opacity-90 transform group-hover:scale-125 transition-transform group-hover:translate-x-1 duration-700 ease-in-out">
                    <img src="{{ asset('storage/images/bg-cardGraphics-red.png') }}"
                        class="w-full h-auto rounded-b-lg object-cover"
                        alt="Card background graphic">
                </div>

                <div class="flex flex-col text-[#E26161] px-5 pt-7 relative z-10">
                    <!-- Card Title -->
                    <div class="font-semibold text-md opacity-90 transform group-hover:scale-105 group-hover:translate-y-1 group-hover:translate-x-1 transition-all duration-500 ease-in-out">
                        Inactive Accounts
                    </div>

                    <!-- Card Counts -->
                    <div class="px-5 py-1 mt-2 mb-3 ml-auto text-lg text-[#E26161] rounded-full bg-[#FBFBFB] font-bold transform group-hover:scale-105 group-hover:translate-x-1 duration-500 ease-in-out">
                        {{ $inactiveStaffCount }}
                    </div>
                </div>
            </a>
        </div>

        <!-- Road Maintenance Worker -->
        <div class="flex flex-col text-[#202020] bg-[#FBFBFB] px-4 pb-4 rounded-lg drop-shadow">

            <!-- Page Description -->
            <div class="flex px-0 border-b border-b-gray-300 py-2">
                <div class="mt-4 mr-auto">
                    <div class="flex flex-col">
                        <!-- Card Title -->
                        <div class="text-[#4D4F50] font-semibold text-lg sm:text-xl">
                            Road Maintenance Workers
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="mt-2 mb-2 overflow-hidden h-auto xl:h-[55vh]">

                <div class="m-0 rounded-lg inset-0 p-0">

                    <!-- Dropdown Filters -->
                    <div class="flex flex-wrap gap-2 mb-4 mt-4"
                        x-data="{
                        filters: {
                            status: '',
                            sort: '',
                            staffRole: '',
                        }
                    }">
                        <!-- All Users Option -->
                        <div class="relative inline-flex rounded-[4px] border text-center transition-all duration-200 transform hover:scale-105 hover:shadow-md"
                            :class="{
                            'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': filters.sort === '' && filters.status === ''  && filters.staffRole === '',
                            'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.sort !== '' || filters.status !== '' || filters.staffRole !== ''
                        }"
                            @click="filters.sort = ''; filters.status = ''; filters.staffRole = '';">
                            <span class="text-[12px] block w-full px-2 py-2 rounded">
                                All Staffs
                            </span>
                        </div>

                        <!-- Sort Filter -->
                        <div class="relative inline-flex rounded-[4px] border hover:shadow-md custom-select"
                            :class="{
                            'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': filters.sort !== '',
                            'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.sort === ''
                        }">
                            <select x-model="filters.sort" @change="console.log('Filters:', filters)"
                                class="text-[12px] block w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-6 rounded">
                                <option value="" class="text-gray-400">Sort by</option>
                                <option value="asc" class="text-gray-700">Ascending</option>
                                <option value="desc" class="text-gray-700">Descending</option>
                            </select>
                        </div>

                        <!-- User Type Filter -->
                        <div class="relative inline-flex rounded-[4px] border hover:shadow-md custom-select"
                            :class="{
                            'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': filters.staffRole !== '',
                            'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.staffRole === ''
                        }">
                            <select x-model="filters.staffRole" @change="console.log('Filters:', filters)"
                                class="text-[12px] block w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-6 rounded">
                                <option value="" class="text-gray-400">Staff Roles</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <!-- Road Maintenance Workers Data -->
                    <div class="flex flex-col xl:flex-row mb-2 px-3 pb-3 gap-2">
                        <!-- Bar Graph Section -->
                        <div class="w-full xl:w-7/10 max-h-[330px] overflow-auto">
                            <div class="rounded-lg">
                                <div class="relative h-auto">
                                    <div id="chart"><h1>Dahboard</h1></div>
                                </div>
                            </div>
                        </div>

                        <!-- User Types Section -->
                        <div class="w-full xl:w-3/10 mx-0 xl:mx-4 bg-[#FBFBFB] h-[50vh] drop-shadow p-2 mt-4 xl:-mt-8">
                            <div class="inline-block w-full min-h-[48vh] max-h-[48vh] overflow-y-auto align-middle z-0">
                                <div id="members-list" class="text-left"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script>
        document.addEventListener('livewire:load', function() {

            // Get the data from Livewire component
            const rolesData = @json($staffRolesData ?? []);


            // Prepare data for ApexCharts
            const categories = rolesData.map(role => role.name);
            const counts = rolesData.map(role => role.count);

            // Store members data for the list view
            const members = {};
            rolesData.forEach(role => {
                members[role.name] = role.members.map(member => member.name);
            });

            // Chart options
            var options = {
                series: [{
                    data: counts
                }],
                chart: {
                    type: 'bar',
                    height: 'auto',
                    minWidth: 100,
                    maxWidth: 300,
                    events: {
                        dataPointSelection: function(event, chartContext, config) {
                            const selectedIndex = config.dataPointIndex;
                            const selectedstaffRole = categories[selectedIndex];
                            const selectedMembers = members[selectedstaffRole] || [];
                            displayMembers(selectedstaffRole, selectedMembers);
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        barHeight: 80,
                        borderRadius: 20,
                        borderRadiusApplication: 'end',
                        dataLabels: {
                            position: 'bottom'
                        },
                        colors: {
                            ranges: [{
                                from: 0,
                                to: 100,
                                color: '#4e8e3a'
                            }]
                        }
                    }
                },
                colors: ['#FBFBFB'],
                dataLabels: {
                    enabled: true,
                    style: {
                        colors: ['#FBFBFB'],
                        fontSize: '14px',
                    },
                    formatter: function(val, opt) {
                        return `${categories[opt.dataPointIndex]}   ${val}`;
                    },
                    position: 'end',
                    offsetX: 0,
                    align: 'right',
                },
                xaxis: {
                    categories: categories,
                    labels: {
                        show: false
                    }
                },
                yaxis: {
                    labels: {
                        show: false
                    }
                },
                grid: {
                    show: false
                },
                tooltip: {
                    enabled: false
                },
                title: {
                    text: undefined
                },
                subtitle: {
                    text: undefined
                },
                stroke: {
                    width: 0
                }
            };

            var chart = new ApexCharts(document.querySelector("chart"), options);
            chart.render();

            // Display initial members list
            if (categories.length > 0) {
                displayMembers(categories[0], members[categories[0]] || []);
            }

            // Function to display members in the list
            function displayMembers(staffRole, memberList) {
                const membersContainer = document.getElementById('members-list');
                membersContainer.classList.add('text-md', 'text-gray-700', 'relative', 'px-4');
                membersContainer.innerHTML = '';

                const staffRoleLabelDiv = document.createElement('div');
                staffRoleLabelDiv.classList.add('font-bold', 'text-[15px]', 'text-gray-700', 'bg-white', 'p-2', 'w-full', 'sticky', 'top-0', 'border', 'border-b-gray-500', 'border-x-transparent', 'border-t-transparent');
                staffRoleLabelDiv.textContent = `All ${staffRole}`;
                membersContainer.appendChild(staffRoleLabelDiv);

                memberList.forEach(member => {
                    const memberDiv = document.createElement('div');
                    memberDiv.classList.add('hover:bg-gray-100', 'flex', 'items-center', 'py-2', 'px-4', 'leading-10', 'hover:rounded-[6px]');

                    const avatarDiv = document.createElement('div');
                    avatarDiv.classList.add('h-8', 'w-8', 'flex-shrink-0');
                    avatarDiv.innerHTML = `<img class="h-8 w-8 bg-[#4AA76F] rounded-full p-[0.4px]" src="{{ asset('storage/icons/profile-graphics.png') }}" alt="User Avatar">`;

                    const nameDiv = document.createElement('div');
                    nameDiv.classList.add('ml-3');
                    nameDiv.innerHTML = `<div class="font-normal text-gray-700 text-[12.5px]">${member}</div>`;

                    memberDiv.appendChild(avatarDiv);
                    memberDiv.appendChild(nameDiv);
                    membersContainer.appendChild(memberDiv);
                });
            }
        });
    </script>

</x-Admin.admin-navigation>