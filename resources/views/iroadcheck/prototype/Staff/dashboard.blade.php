<x-app-layout >
    <x-user.user-navigation  page_title="Dashboard">

        <!-- Main Content -->
        <main class="flex-1">
            <!-- Stats Cards -->
            <div class="grid md:grid-cols-4 gap-6 mb-5">

                <!-- Total Reports Card -->
                <div class="relative bg-white rounded-lg shadow-md py-0 px-2 overflow-hidden
                       hover:drop-shadow-lg transition-all duration-500 ease-out
                       transform-gpu group ">

                    <!-- Background graphic -->
                    <div class="absolute inset-x-0 bottom-0 opacity-90 transform group-hover:scale-125 transition-transform group-hover:translate-x-1 duration-700 ease-in-out">
                        <img src="{{ asset('storage/images/bg-cardGraphics-orange.png') }}"
                             class="w-full h-auto rounded-b-lg object-cover"
                             alt="Card background graphic">
                    </div>

                    <div class="flex flex-col text-[#FFAD00] pl-2 pr-3 pt-4 relative z-10">
                        <!-- Card Title -->
                        <div class="font-semibold text-md opacity-90 transform group-hover:scale-110 group-hover:translate-y-1 group-hover:translate-x-3 transition-all duration-500 ease-in-out">
                            Total <br/>Users
                        </div>
                        <!-- Card Counts with gentle scale on hover -->
                        <div class="drop-shadow px-5 py-1 -mt-1 mb-3 ml-auto text-lg text-[#FFAD00] rounded-full bg-[#FBFBFB] font-bold transform group-hover:scale-105 group-hover:translate-x-1 duration-500 ease-in-out">
                            12
                        </div>
                    </div>
                </div>


                <!-- Today's Reports Card -->
                <div class="relative bg-white rounded-lg shadow-md py-0 px-2 overflow-hidden
                       hover:drop-shadow-lg transition-all duration-500 ease-out
                       transform-gpu group ">

                    <!-- Background graphic -->
                    <div class="absolute inset-x-0 bottom-0 opacity-90 transform group-hover:scale-125 transition-transform group-hover:translate-x-1 duration-700 ease-in-out">
                        <img src="{{ asset('storage/images/bg-cardGraphics-blue.png') }}"
                             class="w-full h-auto rounded-b-lg object-cover"
                             alt="Card background graphic">
                    </div>

                    <div class="flex flex-col text-[#7E91FF] pl-2 pr-3 pt-4 relative z-10">
                        <!-- Card Title -->
                        <div class="font-semibold text-md opacity-90 transform group-hover:scale-110 group-hover:translate-y-1 group-hover:translate-x-3 transition-all duration-500 ease-in-out">
                            Today's <br/>Reports
                        </div>
                        <!-- Card Counts with gentle scale on hover -->
                        <div class="drop-shadow px-5 py-1 -mt-1 mb-3 ml-auto text-lg text-[#7E91FF] rounded-full bg-[#FBFBFB] font-bold transform group-hover:scale-105 group-hover:translate-x-1 duration-500 ease-in-out">
                            1200
                        </div>
                    </div>

                </div>

                <!-- Resolved Road Concerns Card -->
                <div class="relative bg-white rounded-lg shadow-md py-0 px-2 overflow-hidden
                       hover:drop-shadow-lg transition-all duration-500 ease-out
                       transform-gpu group ">

                    <!-- Background graphic -->
                    <div class="absolute inset-x-0 bottom-0 opacity-90 transform group-hover:scale-125 transition-transform group-hover:translate-x-1 duration-700 ease-in-out">
                        <img src="{{ asset('storage/images/bg-cardGraphics-green.png') }}"
                             class="w-full h-auto rounded-b-lg object-cover"
                             alt="Card background graphic">
                    </div>

                    <div class="flex flex-col text-[#4AA76F] pl-2 pr-3 pt-4 relative z-10">
                        <!-- Card Title -->
                        <div class="font-semibold text-md opacity-90 transform group-hover:scale-110 group-hover:translate-y-1 group-hover:translate-x-3 transition-all duration-500 ease-in-out">
                            Resolved Road <br/>Concerns
                        </div>
                        <!-- Card Counts with gentle scale on hover -->
                        <div class="drop-shadow px-5 py-1 -mt-1 mb-3 ml-auto text-lg text-[#4AA76F] rounded-full bg-[#FBFBFB] font-bold transform group-hover:scale-105 group-hover:translate-x-1 duration-500 ease-in-out">
                            250,000
                        </div>
                    </div>

                </div>

                <!-- Unresolved Road Concerns Card -->
                <div class="relative bg-white rounded-lg shadow-md py-0 px-2 overflow-hidden
                       hover:drop-shadow-lg transition-all duration-500 ease-out
                       transform-gpu group ">

                    <!-- Background graphic -->
                    <div class="absolute inset-x-0 bottom-0 opacity-90 transform group-hover:scale-125 transition-transform group-hover:translate-x-1 duration-700 ease-in-out">
                        <img src="{{ asset('storage/images/bg-cardGraphics-red.png') }}"
                             class="w-full h-auto rounded-b-lg object-cover"
                             alt="Card background graphic">
                    </div>

                    <div class="flex flex-col text-[#E26161] pl-2 pr-3 pt-4 relative z-10">
                        <!-- Card Title -->
                        <div class="font-semibold text-md opacity-90 transform group-hover:scale-110 group-hover:translate-y-1 group-hover:translate-x-3 transition-all duration-500 ease-in-out">
                            Unresolved Road <br/> Concerns
                        </div>
                        <!-- Card Counts with gentle scale on hover -->
                        <div class="drop-shadow px-5 py-1 -mt-1 mb-3 ml-auto text-lg text-[#E26161] rounded-full bg-[#FBFBFB] font-bold transform group-hover:scale-105 group-hover:translate-x-1 duration-500 ease-in-out">
                            100,000
                        </div>
                    </div>
                </div>
            </div>

            <!-- Road Maintenance Worker -->
            <div class="text-[#202020] bg-[#FBFBFB] px-4 pb-4 rounded-lg drop-shadow">

                <!--Page description-->
                <div class="flex px-0 border-b border-b-gray-300 py-2 " >
                    <div class="mt-4 mr-auto">

                        <div class="flex flex-col">
                            <!--Card Title-->
                            <div class="text-[#4D4F50] font-semibold">Road Maintenance Workers</div>
                        </div>
                    </div>
                </div>

                <!--Content-->
                <div class="mt-2 mb-2 overflow-hidden h-[55vh] ">

                    <div class="m-0 rounded-lg inset-0 p-0">

                        <!--Dropdown Filters-->
                        <div class="flex gap-2 mr-auto mb-0 py-3 pl-3 mt-4"
                             x-data="{
                             filters: {
                                 status: '',
                                 sort: '',
                                 userType: '',
                             }
                         }">
                            <!-- All Users Option -->
                            <div class="relative rounded-[4px] border transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-md"
                                 :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] ': filters.sort === '' && filters.status === ''  && filters.userType === '',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.sort !== '' || filters.status !== '' || filters.userType !== ''  /* Default and hover state */
                             }"
                                 @click="filters.sort = ''; filters.status = ''; filters.userType = '';">
                            <span class="text-[12px] block appearance-none w-full text-center px-2 py-2 rounded">
                                All Users
                            </span>
                            </div>

                            <!-- Sort Filter -->
                            <div class="relative flex rounded-[4px] border hover:shadow-md  custom-select"
                                 :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] active': filters.sort !== '',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.sort === ''  /* Default and hover state */
                             }">
                                <select x-model="filters.sort" @change="console.log('Filters:', filters)"
                                        class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-6 rounded shadow-none focus:outline-none focus:scale-105">
                                    <option value="" class="text-gray-400 text-[12px]">Sort by</option>
                                    <option value="asc" class="text-gray-700">
                                        Ascending
                                    </option>
                                    <option value="desc" class="text-gray-700">
                                        Descending
                                    </option>
                                </select>
                            </div>

                            <!-- Staff Type Filter -->
                            <div class="relative flex rounded-[4px] border hover:shadow-md  custom-select "
                                 :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] active': filters.userType !== '',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.userType === ''  /* Default and hover state */
                             }">
                                <select x-model="filters.userType" @change="console.log('Filters:', filters)"
                                        class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                                    <option value="" class="text-gray-400 text-[12px]">User Type</option>
                                    <option value="patcher" class="text-gray-700">Patcher</option>
                                    <option value="user-type-2" class="text-gray-700">User Type 2</option>
                                    <option value="user-type-3" class="text-gray-700">User Type 3</option>
                                </select>
                            </div>

                            <!-- Status Filter -->
                            <div class="relative flex rounded-[4px] border hover:shadow-md  custom-select "
                                 :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] active': filters.status !== '',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.status === ''  /* Default and hover state */
                             }">
                                <select x-model="filters.status" @change="console.log('Filters:', filters)"
                                        class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                                    <option value="" class="text-gray-400 text-[12px]">Status</option>
                                    <option value="enabled" class="text-gray-700">Enabled</option>
                                    <option value="disabled" class="text-gray-700">Disabled</option>
                                </select>
                            </div>
                        </div>

                        <!-- Road maintenance workers data -->
                        <div class="flex mb-2 px-3 pb-3 ">

                            <!-- Bar Graph for the Number of Counts of Staff types -->
                            <div class="w-7/10 max-h-[330px] overflow-auto">
                                <!-- Charts Section -->
                                <div class="rounded-full">
                                    <div class="relative h-full">
                                        <div id="chart"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- People belongs in the user types -->
                            <div class="w-3/10 mx-8 -mt-10 bg-[#FBFBFB] h-[50vh] drop-shadow relative p-2">
                                <div class="inline-block w-full min-h-[48vh] max-h-[48vh] overflow-y-auto align-middle z-0">
                                    <!-- Non-striped -->
                                    <div id="members-list" class="text-left"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            // Define the members for each user type
            const members = {
                "Patcher": ["Jane Smith", "John Doe", "John Doe", "John Doe", "John Doe", "John Doe", "John Doe", "John Doe", "John Doe", "John Doe", "John Doe", "John Doe", "John Doe", "John Doe", "John Doe"],
                "User Type 2": ["Alice Johnson", "Bob Brown"],
                "User Type 3": ["Charlie Green", "Dana White"],
                "User Type 4": ["Eve Black", "Frank White"],
                "User Type 5": ["Grace Hopper", "Ivy Ross"],
                "User Type 6": ["Jack King", "Liam Green"]
            };

            // Function to display members in the specified container
            function displayMembers(userType, memberList) {
                const membersContainer = document.getElementById('members-list');
                membersContainer.classList.add('text-md', 'text-gray-700', 'relative', 'px-4');
                membersContainer.innerHTML = '';

                // Create a sticky header for the user type label
                const userTypeLabelDiv = document.createElement('div');
                userTypeLabelDiv.classList.add('font-bold', 'text-[15px]', 'text-gray-700', 'bg-white', 'p-2', 'w-full', 'sticky', 'top-0', 'border', 'border-b-gray-500', 'border-x-transparent', 'border-t-transparent');
                userTypeLabelDiv.textContent = `All ${userType}`;
                membersContainer.appendChild(userTypeLabelDiv);

                // Create a scrollable wrapper for the list items
                const scrollableListDiv = document.createElement('div');
                scrollableListDiv.classList.add('overflow-y-auto', 'max-h-[50vh]', 'mt-2'); // Adjust max height as needed
                membersContainer.appendChild(scrollableListDiv);


                memberList.forEach(member => {
                    const memberDiv = document.createElement('div');
                    memberDiv.classList.add('hover:bg-gray-100', 'flex', 'items-center', 'py-2', 'px-4', 'leading-10', 'hover:rounded-[6px]');

                    const avatarDiv = document.createElement('div');
                    avatarDiv.classList.add('h-8', 'w-8', 'flex-shrink-0');
                    avatarDiv.innerHTML = `<img class="h-8 w-8 bg-[#4AA76F] rounded-full p-[0.4px]" src="{{ asset('storage/icons/profile-graphics.png') }}" alt="User Avatar">`;

                    const nameDiv = document.createElement('div');
                    nameDiv.classList.add('ml-3');
                    nameDiv.innerHTML = `<div class="font-normal text-gray-700  text-[12.5px]">${member}</div>`;

                    memberDiv.appendChild(avatarDiv);
                    memberDiv.appendChild(nameDiv);
                    membersContainer.appendChild(memberDiv);
                });
            }

            // Chart options
            var options = {
                series: [{
                    data: [2, 2, 2, 2, 1, 1] // The values for each bar
                }],
                chart: {
                    type: 'bar',
                    height: 400,
                    minWidth: 100,
                    maxWidth: 300,
                    events: {
                        dataPointSelection: function(event, chartContext, config) {
                            const selectedIndex = config.dataPointIndex;
                            const selectedUserType = options.xaxis.categories[selectedIndex];
                            const selectedMembers = members[selectedUserType] || [];
                            displayMembers(selectedUserType, selectedMembers);
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        barHeight: '90%',
                        borderRadius: 20,
                        borderRadiusApplication: 'end',
                        dataLabels: {
                            position: 'bottom'
                        },
                        colors: {
                            ranges: [
                                {
                                    from: 0,
                                    to: 100,
                                    color: '#4e8e3a' // Hover color
                                }
                            ]
                        }
                    }
                },
                colors: ['#FBFBFB'],
                dataLabels: {
                    enabled: true,
                    textAnchor: 'start',
                    style: {
                        colors: ['#FBFBFB'],

                    },
                    formatter: function(val, opt) {
                        return `${opt.w.globals.labels[opt.dataPointIndex]}   ${val}`;
                    },
                    offsetX: 20,
                },
                xaxis: {
                    categories: ["Patcher", "Staff Type 2", "Staff Type 3", "Staff Type 4", "Staff Type 5", "Staff Type 6"],
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

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();

            // Display the default members for the first user type after rendering the chart
            document.addEventListener("DOMContentLoaded", function() {
                const defaultUserType = options.xaxis.categories[0];
                const defaultMembers = members[defaultUserType] || [];
                displayMembers(defaultUserType, defaultMembers);
            });
        </script>

    </x-user.user-navigation>

</x-app-layout>
