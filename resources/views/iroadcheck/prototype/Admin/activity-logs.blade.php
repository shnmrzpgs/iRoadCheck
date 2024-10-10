<x-app-layout>
    <x-admin.navigation>
        <div class="text-[#202020] bg-white pt-4 px-4 h-full rounded-lg drop-shadow" x-data="{ addUserModal: false, editUserModal: false, successAddModal: false, successEditModal: false, errorModal: false }">

            <!--Page description and Add button-->
            <div class="px-4">
                <div class="flex sm:flex sm:items-baseline">

                    <div class="flex flex-col mr-auto">
                        <!--Page Title-->
                        <div class="text-[#4D4F50] font-semibold">Activity Logs</div>
                        <!--Page description-->
                        <div class="sm:flex-auto">
                            <p class="mt-2 text-[12px] text-primary-800">
                                A record of activities made by all users in iRoadCheck System.
                            </p>
                        </div>
                    </div>

                    <!--Export Button-->
                    <div class="mt-5 sm:ml-16 sm:mt-0 sm:flex-none">
                        <div class="flex w-full items-center px-4 py-2 md:mx-auto md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
                            <div class="w-full">
                                <div @click="addUserModal = true" class="relative">

                                    <button type="submit" name="addUser" id="addUser" value="addUser"
                                            class="flex gap-x-[8px] w-auto text-[12px] bg-opacity-90 px-[12px] py-[8px] font-normal tracking-wider text-white bg-[#63CF57] rounded-md hover:drop-shadow hover:bg-[#63CF57]">
                                        <p class="mt-[2px]">Export</p>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Table Content-->
            <div class="mt-8 px-5">
                <div class="overflow-x-auto m-0 rounded-t-lg rounded-b-lg inset-0 drop-shadow-lg p-0">
                    <div class="min-w-full inline-block max-h-[45vh] min-h-[45vh] overflow-y-auto align-middle p-0 z-0">
                        <table class="min-w-full min-h-full divide-y divide-gray-300 gap-y-5">

                            <thead class="drop-shadow-md">
                            <tr>
                                <th scope="col"
                                    class="sticky top-0 z-10 border-white bg-white py-3.5 pl-4 pr-3 text-left text-[12px] font-semibold text-[#757575] rounded-tl-lg">
                                    Transaction ID</th>
                                <th scope="col"
                                    class="sticky top-0 z-10 border-white bg-white py-3.5 pl-4 pr-3 text-left text-[12px] font-semibold text-[#757575]">
                                    Type of Activity</th>
                                <th scope="col"
                                    class="sticky top-0 z-10 border-white bg-white py-3.5 pl-4 pr-3 text-left text-[12px] font-semibold text-[#757575]">
                                    Date and Time</th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 bg-white">

                            <!-- Non-striped -->
                            <tr class="bg-white hover:bg-slate-200 text-left">

                                <td class="whitespace-nowrap py-5 pl-4">
                                    <div class="flex items-center">
                                        <div class="ml-2">
                                            <div class="font-medium text-primary-800 text-[12px]">
                                                001
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap py-5 text-[12px]">
                                    <div class="ml-4">
                                        <div class="mt-[1px] text-[12px]">
                                            Updated reports
                                        </div>
                                    </div>
                                </td>

                                <td class="whitespace-nowrap py-5 text-[12px]">
                                    <div class="font-medium ml-4">
                                        24 Aug 2024 at 12:50 pm
                                    </div>
                                </td>

                            </tr>

                            <!-- Striped -->
                            <tr class="bg-slate-100 hover:bg-slate-200">

                                <td class="whitespace-nowrap py-5 pl-4">
                                    <div class="flex items-center">
                                        <div class="ml-2">
                                            <div class="font-medium text-primary-800 text-[12px]">
                                                001
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap py-5 text-[12px]">
                                    <div class="ml-4">
                                        <div class="mt-[1px] text-[12px]">
                                            Updated reports
                                        </div>
                                    </div>
                                </td>

                                <td class="whitespace-nowrap py-5 text-[12px]">
                                    <div class="font-medium ml-4">
                                        24 Aug 2024 at 12:50 pm
                                    </div>
                                </td>

                            </tr>

                            <!-- More list... -->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-7">
                <nav aria-label="Page navigation example" class="flex flex-col items-center justify-center leading-8">
                    <div>
                        <ul class="inline-flex items-center -space-x-px text-sm">
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 text-green-600 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 text-[12px]">
                                    First
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 text-green-600 bg-white border border-gray-300 hover:bg-gray-100 text-[12px]">
                                    &lt; Previous
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 text-[12px]">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 text-[12px]">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-green-600 border border-gray-300 bg-green-100 text-[12px]">
                                    3
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 text-[12px]">4</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 text-[12px]">5</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 text-green-600 bg-white border border-gray-300 hover:bg-gray-100 text-[12px]">
                                    Next &gt;
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 text-green-600 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 text-[12px]">
                                    Last
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <span class="ml-2 text-gray-500 text-[12px]">3 of 20 pages</span>
                    </div>
                </nav>
            </div>

            <!--Add Verifier Modal -->
            <div x-show="addVerifierModal" class="main-modal fixed w-full h-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn slow"
                 style="background: rgba(0,0,0,.7);" x-data="{confirmDisableAccount: false}" :class="{'overflow-y-hidden': confirmDisableAccount}">

                <div class="drop-shadow modal-container bg-white w-[500px] rounded shadow-lg z-50 overflow-hidden">


                    <div class="modal-content pt-4 text-left px-6">

                        <!-- header -->
                        <h1 class="float-left text-primary font-semibold text-[18px]">Add Verifier</h1>
                        <div class="flex justify-between items-center pb-3 float-right">
                            <div class="modal-close cursor-pointer z-50" @click="addVerifierModal = false">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                     viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <hr class="w-full mb-2"/>


                        <!-- Body -->
                        <div class="w-full grid grid-cols-1 max-h-[500px] overflow-auto px-3 mb-2">

                            <!--Profile-->
                            <div class="w-full h-[120px] bg-gradient-to-b from-[#2F7D55] to-[#012F1C] rounded-lg mb-5">

                                <div class="flex justify-start items-start ml-10 mt-5">

                                    <!--Picture-->
                                    <div class="flex justify-center items-center w-[85px] h-[85px] bg-[#012F1C] rounded-full">
                                        <img src="{{ asset('storage/mirkado/image/defaultProfileAdmin.png') }}" alt=" " class="w-20 h-20 rounded-full">
                                    </div>

                                    <!--Account Name-->
                                    <div class="relative mt-5 ml-5">
                                        <h1 class="text-white text-[24px] font-bold">Ahadon Caraing</h1>
                                        <h1 class="text-warning-50 text-[11px] font-normal">adcaraing2024@gmail.com</h1>
                                    </div>
                                </div>

                            </div>

                            <!--Personal Information-->
                            <div class="relative mb-7 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                <h2 class="font-semibold text-primary text-[13px] px-6 pt-2">Personal Information</h2>
                                <hr class="px-2 my-2 border-solid shadow-m w-full pb-1" />

                                <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                    <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                        <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="firstName">
                                            First Name
                                        </label>
                                        <input type="text" name="firstName" id="firstName" placeholder="Enter your first name"
                                               required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-0.5 pl-2">
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                    <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                        <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="middleName">
                                            Middle Name
                                        </label>
                                        <input type="text" name="middleName" id="middleName" placeholder="Enter your middle name"
                                               required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                    <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                        <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="lastName">
                                            Last Name
                                        </label>
                                        <input type="text" name="lastName" id="lastName" placeholder="Enter your last name"
                                               required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                    <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                        <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="birthDate">
                                            Birthdate
                                        </label>
                                        <input type="date" name="birthDate" id="birthDate"
                                               required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                    <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                        <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="gender">
                                            Gender
                                        </label>
                                        <select name="gender" id="gender" required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            <option value="" selected disabled>Select your Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!--form container-->
                            <div class="p-1 relative overflow-x-hidden ml-0 w-full">

                                <form action="" method="POST" class="relative w-full">

                                    <!--Personal Information-->
                                    <div class="relative mb-7 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                        <h2 class="font-semibold text-primary text-[13px] px-6 pt-2">Personal Information</h2>
                                        <hr class="px-2 my-2 border-solid shadow-m w-full pb-1" />

                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="firstName">
                                                    First Name
                                                </label>
                                                <input type="text" name="firstName" id="firstName" placeholder="Enter your first name"
                                                       required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-0.5 pl-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="middleName">
                                                    Middle Name
                                                </label>
                                                <input type="text" name="middleName" id="middleName" placeholder="Enter your middle name"
                                                       required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="lastName">
                                                    Last Name
                                                </label>
                                                <input type="text" name="lastName" id="lastName" placeholder="Enter your last name"
                                                       required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="birthDate">
                                                    Birthdate
                                                </label>
                                                <input type="date" name="birthDate" id="birthDate"
                                                       required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="gender">
                                                    Gender
                                                </label>
                                                <select name="gender" id="gender" required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                                    <option value="" selected disabled>Select your Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Contact Information-->
                                    <div class="relative mb-7 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                        <h2 class="font-semibold text-primary text-[13px] px-6 pt-4">Contact Information</h2>
                                        <hr class="px-2 my-2 border-solid shadow-m w-full pb-1" />

                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="phoneNum">
                                                    Phone Number
                                                </label>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="country">
                                                    Region
                                                </label>
                                                <select tabindex="9" type="text" name="regions" id="regions" class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[13px] text-slate-500 py-1 pl-2" required></select>

                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="province">
                                                    Province
                                                </label>
                                                <select tabindex="10" type="text" name="provinces" id="provinces" class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[13px] text-slate-500 py-1 pl-2" required></select>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="barangay">
                                                    City/Municipality
                                                </label>
                                                <select tabindex="11" type="text" name="cities" id="cities" class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[13px] text-slate-500 py-1 pl-2" required></select>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="cityMunicipality">
                                                    Barangay
                                                </label>

                                                <select tabindex="12" type="text" name="barangays" id="barangays" class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[13px] text-slate-500 py-1 pl-2" required></select>
                                            </div>
                                        </div>
                                        <div class="hidden">
                                            <input type="hidden" name="region" id="region" />
                                            <input type="hidden" name="province" id="province" />
                                            <input type="hidden" name="city" id="city" />
                                            <input type="hidden" name="barangay" id="barangay" />
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                setUpGeneralAddressFields(
                                                    'regions',
                                                    'provinces',
                                                    'cities',
                                                    'barangays',
                                                    'region',
                                                    'province',
                                                    'city',
                                                    'barangay',
                                                    '{{ old('region') }}',
                                                    '{{ old('province') }}',
                                                    '{{ old('city') }}',
                                                    '{{ old('barangay') }}'
                                                );

                                                {{--PSGCSetup(--}}
                                                {{--    'regions',--}}
                                                {{--    'provinces',--}}
                                                {{--    'cities',--}}
                                                {{--    'barangays',--}}
                                                {{--    'region',--}}
                                                {{--    'province',--}}
                                                {{--    'city',--}}
                                                {{--    'barangay',--}}
                                                {{--    '{{ old('region') }}',--}}
                                                {{--    '{{ old('province') }}',--}}
                                                {{--    '{{ old('city') }}',--}}
                                                {{--    '{{ old('barangay') }}'--}}
                                                {{--);--}}
                                            });
                                        </script>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="streetAddress">
                                                    Street Address
                                                </label>
                                                <input type="text" name="streetAddress" id="streetAddress" placeholder="Enter your street address"
                                                       class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Account Information-->
                                    <div class="relative mb-7 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                        <h2 class="font-medium text-primary text-[13px] px-6 pt-4">Mirkado Account Information</h2>
                                        <hr class="px-2 my-2 border-solid shadow-m w-full pb-1" />

                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="emailAddress">
                                                    Email Address
                                                </label>
                                                <input type="email" name="email" id="email" placeholder="Enter your email address"
                                                       required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="relative flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full" x-data="{show: true}">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="password">
                                                    Password
                                                </label>
                                                <input class="focus:border-primary font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2" name="password" id="password" :type="show ? 'password' : 'text'" required placeholder="Password">
                                                <img class="absolute right-9 top-[8px] h-4 w-4 cursor-pointer" @click="show = !show" :class="{ 'hidden': !show, 'block': show }" src="{{ asset('storage/mirkado/icons/hide-password.png') }}" alt="Password">
                                                <img class="absolute right-9 top-[8px] h-4 w-4 cursor-pointer" @click="show = !show" :class="{ 'hidden': show, 'block': !show }" src="{{ asset('storage/mirkado/icons/show-password.png') }}" alt="Password">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="relative flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full" x-data="{show: true}">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="confirmPassword">
                                                    Confirm Password
                                                </label>
                                                <input class="focus:border-primary font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2" name="confirmPassword" id="confirmPassword" :type="show ? 'password' : 'text'" required placeholder="Confirm Password">
                                                <img class="absolute right-9 top-[8px] h-4 w-4 cursor-pointer" @click="show = !show" :class="{ 'hidden': !show, 'block': show }" src="{{ asset('storage/mirkado/icons/hide-password.png') }}" alt="Password">
                                                <img class="absolute right-9 top-[8px] h-4 w-4 cursor-pointer" @click="show = !show" :class="{ 'hidden': show, 'block': !show }" src="{{ asset('storage/mirkado/icons/show-password.png') }}" alt="Password">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Admin Role Information-->
                                    <div class="relative mb-5 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                        <div class="flex">
                                            <h2 class="font-medium text-primary pl-6 pr-2 text-[13px] pt-4">Admin Role Information</h2>
                                            <p class="font-light text-primary text-[11px] pt-4 italic">(Select Admin Role)</p>
                                        </div>

                                        <hr class="px-2 my-1 border-solid shadow-m w-full pb-1" />

                                        <ul class="w-full text-[10px] font-medium text-gray-900 px-5">
                                            <li class="w-full">
                                                <div class="flex items-center ps-3 grid-cols-3 border-b-[1px]">
                                                    <input id="farmerVerifier-checkbox" type="checkbox" value="" class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary">
                                                    <label for="farmerVerifier-checkbox" class="w-full py-3 ms-2 text-[12px] font-medium text-gray-900 dark:text-gray-300">Farmer Verifier</label>
                                                    <p class="font-light text-[10px] -ml-52 italic">Farmer Verifier will verify the farmer’s information.</p>
                                                </div>
                                            </li>
                                            <li class="w-full">
                                                <div class="flex items-center ps-3 grid-cols-3 border-b-[1px]">
                                                    <input id="bidderVerifier-checkbox" type="checkbox" value="" class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary">
                                                    <label for="bidderVerifier-checkbox" class="w-full py-3 ms-2 text-[12px] font-medium text-gray-900 dark:text-gray-300">Bidder Verifier</label>
                                                    <p class="font-light text-[10px] -ml-[220px] italic">Bidder Verifier will verify the bidder’s information.</p>
                                                </div>
                                            </li>
                                            <li class="w-full">
                                                <div class="flex items-center ps-3 grid-cols-3 border-b-[1px]">
                                                    <input id="auctionVerifier-checkbox" type="checkbox" value="" class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary">
                                                    <label for="auctionVerifier-checkbox" class="w-full py-3 ms-2 text-[12px] font-medium text-gray-900 dark:text-gray-300">Auction Verifier</label>
                                                    <p class="font-light text-[10px] -ml-52 italic">Auction Verifier will verify the auction of the farmer.</p>
                                                </div>
                                            </li>
                                            <li class="w-full">
                                                <div class="flex items-center ps-3 grid-cols-3">
                                                    <input id="offerVerifier-checkbox" type="checkbox" value="" class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary">
                                                    <label for="offerVerifier-checkbox" class="w-full py-3 ms-2 text-[12px] font-medium text-gray-900 dark:text-gray-300">Offer Verifier</label>
                                                    <p class="font-light text-[10px] -ml-[250px] italic">Offer Verifier will verify the offer of the bidder.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </form>

                            </div>

                            <!--Disable Account Information-->
                            <div class="relative mb-5 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                <div x-data="{ switchOn: false}" class="flex items-start justify-start mt-3 px-3 w-full">
                                    <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" :id="$id('disableSwitch')"
                                           :class="{ 'text-[#F74140]': switchOn, 'text-primary': ! switchOn }"
                                           class="text-[13px] font-bold select-none"
                                           x-cloak>
                                        Disabled Account
                                    </label>

                                    <input id="disableSwitch" type="checkbox" name="disableSwitch" class="hidden" :checked="switchOn">
                                    <button
                                        x-ref="switchButton"
                                        type="button"
                                        @click="switchOn = ! switchOn"
                                        :class="switchOn ? 'bg-[#F74140]' : 'bg-neutral-200', switchOn ? confirmDisableAccount = true : confirmDisableAccount = false"
                                        class="relative inline-flex h-4 py-0.5 ml-4 rounded-full focus:outline-none w-8"
                                        x-cloak>
                                        <span :class="switchOn ? 'translate-x-[16px]' : 'translate-x-0.5'" class="w-3 h-3 duration-75 ease-in-out bg-white rounded-full shadow-md"></span>
                                    </button>
                                </div>
                                <p class="text-[8px] ml-[12px] font-normal mb-2">Once you disable this account. The owner cannot access his/her account.</p>

                            </div>

                        </div>

                        <!--Buttons-->
                        <div class="w-full py-2 mb-5">
                            <div class="flex justify-end items-end overflow-hidden">

                                <!--Cancel Button-->
                                <div class="relative">
                                    <input type="submit" name="cancelBtn" id="cancelBtn" value="CANCEL"
                                           class="w-[100px] text-[12px] bg-opacity-80 px-1 py-2 font-normal tracking-wider text-red-500 bg-none rounded-md transform transition duration-500 hover:drop-shadow hover:shadow-cyan-950 hover:scale-105 hover:bg-red-100 hover:font-semibold">
                                </div>

                                <!--Add Button-->
                                <div class="relative pr-2 ml-3">
                                    <input type="submit" name="addBtn" id="addBtn" value="ADD VERIFIER"
                                           @click="successAddModal = true"
                                           class="w-[100px] text-[12px] bg-opacity-80 px-1 py-2 font-normal tracking-wider text-slate-50 bg-[#63CF57] rounded-md transform transition duration-500 hover:drop-shadow hover:shadow-cyan-950 hover:scale-105 hover:bg-[#63CF57] hover:font-semibold">
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <!--Disable account confirmation modal -->
                <div
                    class="fixed inset-0 w-full h-full flex justify-center items-center z-50 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                    x-show="confirmDisableAccount"
                    x-transition:enter="transition duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >
                    <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                        <div
                            class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20"
                            x-show="confirmDisableAccount"
                            x-transition:enter="transition transform duration-300"
                            x-transition:enter-start="scale-0"
                            x-transition:enter-end="scale-100"
                            x-transition:leave="transition transform duration-300"
                            x-transition:leave-start="scale-100"
                            x-transition:leave-end="scale-0"
                        >
                            <!-- header -->
                            <div class="p-4">
                                <h1 class="float-left text-primary font-semibold text-[18px]">Disable Account of Verifier</h1>
                                <div class="flex justify-between items-center pb-3 float-right">
                                    <div class="modal-close cursor-pointer z-50" @click="confirmDisableAccount = false">
                                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 18 18">
                                            <path
                                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>


                            <hr class="w-full mb-2"/>
                            <div class="p-3 text-center">
                                <h1 class="font-semibold text-[14px]">Are you sure, you want to disable this account?</h1>
                                <p class="font-noemal text-[12px]">Once you disable this account. The owner cannot access his/her account.</p>
                            </div>

                            <!--Buttons-->
                            <div class="w-full pt-2 pb-3 mb-5 pr-2">
                                <div class="flex justify-end items-end overflow-hidden">

                                    <!--Cancel Button-->
                                    <div class="relative">
                                        <input type="submit" name="cancelBtn" id="cancelBtn" value="CANCEL" @click="confirmDisableAccount = false"
                                               class="w-[100px] text-[12px] bg-opacity-80 px-1 py-2 font-normal tracking-wider text-red-500 bg-none rounded-md transform transition duration-500 hover:drop-shadow hover:shadow-cyan-950 hover:scale-105 hover:bg-red-100 hover:font-semibold">
                                    </div>

                                    <!--Confirm Button-->
                                    <div class="relative pr-2 ml-3">
                                        <input type="submit" name="confirmBtn" id="confirmBtn" value="CONFIRM" @click="confirmDisableAccount = false"
                                               class="w-[100px] text-[12px] bg-opacity-80 px-1 py-2 font-normal tracking-wider text-slate-50 bg-[#63CF57] rounded-md transform transition duration-500 hover:drop-shadow hover:shadow-cyan-950 hover:scale-105 hover:bg-[#63CF57] hover:font-semibold">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--Edit Verifier Modal -->
            <div x-show="editVerifierModal" class="main-modal fixed w-full h-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn slow"
                 style="background: rgba(0,0,0,.7);" x-data="{confirmDisableAccount: false}" :class="{'overflow-y-hidden': confirmDisableAccount}">

                <div class="drop-shadow modal-container bg-white w-[500px] rounded shadow-lg z-50 overflow-hidden">


                    <div class="modal-content pt-4 text-left px-6">

                        <!-- header -->
                        <h1 class="float-left text-primary font-semibold text-[18px]">Edit Verifier</h1>
                        <div class="flex justify-between items-center pb-3 float-right">
                            <div class="modal-close cursor-pointer z-50" @click="editVerifierModal = false">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                     viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <hr class="w-full mb-2"/>


                        <!-- Body -->
                        <div class="w-full grid grid-cols-1 max-h-[500px] overflow-auto px-3 mb-2">

                            <!--Profile-->
                            <div class="w-full h-[120px] bg-gradient-to-b from-[#2F7D55] to-[#012F1C] rounded-lg mb-5">

                                <div class="flex justify-start items-start ml-10 mt-5">

                                    <!--Picture-->
                                    <div class="flex justify-center items-center w-[85px] h-[85px] bg-[#012F1C] rounded-full">
                                        <img src="{{ asset('storage/mirkado/image/defaultProfileAdmin.png') }}" alt=" " class="w-20 h-20 rounded-full">
                                    </div>

                                    <!--Account Name-->
                                    <div class="relative mt-5 ml-5">
                                        <h1 class="text-white text-[24px] font-bold">Ahadon Caraing</h1>
                                        <h1 class="text-warning-50 text-[11px] font-normal">adcaraing2024@gmail.com</h1>
                                    </div>
                                </div>

                            </div>

                            <!--Personal Information-->
                            <div class="relative mb-7 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                <h2 class="font-semibold text-primary text-[13px] px-6 pt-2">Personal Information</h2>
                                <hr class="px-2 my-2 border-solid shadow-m w-full pb-1" />

                                <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                    <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                        <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="firstName">
                                            First Name
                                        </label>
                                        <input type="text" name="firstName" id="firstName" placeholder="Enter your first name"
                                               required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-0.5 pl-2">
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                    <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                        <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="middleName">
                                            Middle Name
                                        </label>
                                        <input type="text" name="middleName" id="middleName" placeholder="Enter your middle name"
                                               required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                    <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                        <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="lastName">
                                            Last Name
                                        </label>
                                        <input type="text" name="lastName" id="lastName" placeholder="Enter your last name"
                                               required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                    <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                        <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="birthDate">
                                            Birthdate
                                        </label>
                                        <input type="date" name="birthDate" id="birthDate"
                                               required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                    <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                        <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="gender">
                                            Gender
                                        </label>
                                        <select name="gender" id="gender" required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            <option value="" selected disabled>Select your Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!--form container-->
                            <div class="p-1 relative overflow-x-hidden ml-0 w-full">

                                <form action="" method="POST" class="relative w-full">

                                    <!--Personal Information-->
                                    <div class="relative mb-7 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                        <h2 class="font-semibold text-primary text-[13px] px-6 pt-2">Personal Information</h2>
                                        <hr class="px-2 my-2 border-solid shadow-m w-full pb-1" />

                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="firstName">
                                                    First Name
                                                </label>
                                                <input type="text" name="firstName" id="firstName" placeholder="Enter your first name"
                                                       required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-0.5 pl-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="middleName">
                                                    Middle Name
                                                </label>
                                                <input type="text" name="middleName" id="middleName" placeholder="Enter your middle name"
                                                       required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="lastName">
                                                    Last Name
                                                </label>
                                                <input type="text" name="lastName" id="lastName" placeholder="Enter your last name"
                                                       required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="birthDate">
                                                    Birthdate
                                                </label>
                                                <input type="date" name="birthDate" id="birthDate"
                                                       required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="gender">
                                                    Gender
                                                </label>
                                                <select name="gender" id="gender" required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                                    <option value="" selected disabled>Select your Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Contact Information-->
                                    <div class="relative mb-7 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                        <h2 class="font-semibold text-primary text-[13px] px-6 pt-4">Contact Information</h2>
                                        <hr class="px-2 my-2 border-solid shadow-m w-full pb-1" />

                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="phoneNum">
                                                    Phone Number
                                                </label>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="country">
                                                    Region
                                                </label>
                                                <select tabindex="9" type="text" name="regions" id="regions" class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[13px] text-slate-500 py-1 pl-2" required></select>

                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="province">
                                                    Province
                                                </label>
                                                <select tabindex="10" type="text" name="provinces" id="provinces" class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[13px] text-slate-500 py-1 pl-2" required></select>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="barangay">
                                                    City/Municipality
                                                </label>
                                                <select tabindex="11" type="text" name="cities" id="cities" class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[13px] text-slate-500 py-1 pl-2" required></select>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="cityMunicipality">
                                                    Barangay
                                                </label>

                                                <select tabindex="12" type="text" name="barangays" id="barangays" class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[13px] text-slate-500 py-1 pl-2" required></select>
                                            </div>
                                        </div>
                                        <div class="hidden">
                                            <input type="hidden" name="region" id="region" />
                                            <input type="hidden" name="province" id="province" />
                                            <input type="hidden" name="city" id="city" />
                                            <input type="hidden" name="barangay" id="barangay" />
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                setUpGeneralAddressFields(
                                                    'regions',
                                                    'provinces',
                                                    'cities',
                                                    'barangays',
                                                    'region',
                                                    'province',
                                                    'city',
                                                    'barangay',
                                                    '{{ old('region') }}',
                                                    '{{ old('province') }}',
                                                    '{{ old('city') }}',
                                                    '{{ old('barangay') }}'
                                                );

                                                {{--PSGCSetup(--}}
                                                {{--    'regions',--}}
                                                {{--    'provinces',--}}
                                                {{--    'cities',--}}
                                                {{--    'barangays',--}}
                                                {{--    'region',--}}
                                                {{--    'province',--}}
                                                {{--    'city',--}}
                                                {{--    'barangay',--}}
                                                {{--    '{{ old('region') }}',--}}
                                                {{--    '{{ old('province') }}',--}}
                                                {{--    '{{ old('city') }}',--}}
                                                {{--    '{{ old('barangay') }}'--}}
                                                {{--);--}}
                                            });
                                        </script>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="streetAddress">
                                                    Street Address
                                                </label>
                                                <input type="text" name="streetAddress" id="streetAddress" placeholder="Enter your street address"
                                                       class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Account Information-->
                                    <div class="relative mb-7 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                        <h2 class="font-medium text-primary text-[13px] px-6 pt-4">Mirkado Account Information</h2>
                                        <hr class="px-2 my-2 border-solid shadow-m w-full pb-1" />

                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full  ">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="emailAddress">
                                                    Email Address
                                                </label>
                                                <input type="email" name="email" id="email" placeholder="Enter your email address"
                                                       required class="font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="relative flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full" x-data="{show: true}">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="password">
                                                    Password
                                                </label>
                                                <input class="focus:border-primary font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2" name="password" id="password" :type="show ? 'password' : 'text'" required placeholder="Password">
                                                <img class="absolute right-9 top-[8px] h-4 w-4 cursor-pointer" @click="show = !show" :class="{ 'hidden': !show, 'block': show }" src="{{ asset('storage/mirkado/icons/hide-password.png') }}" alt="Password">
                                                <img class="absolute right-9 top-[8px] h-4 w-4 cursor-pointer" @click="show = !show" :class="{ 'hidden': show, 'block': !show }" src="{{ asset('storage/mirkado/icons/show-password.png') }}" alt="Password">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap items-start justify-start w-full px-2 ">
                                            <div class="relative flex mb-5 pl-2 xs:pr-2 md:pr-6 lg:pr-6 mx-3 w-50 w-full" x-data="{show: true}">
                                                <label class=" flex font-normal w-[200px] text-[12px] pt-1" for="confirmPassword">
                                                    Confirm Password
                                                </label>
                                                <input class="focus:border-primary font-light w-full border border-gray-400 rounded-[4px] shadow-sm text-[12px] text-slate-500 py-1 pl-2" name="confirmPassword" id="confirmPassword" :type="show ? 'password' : 'text'" required placeholder="Confirm Password">
                                                <img class="absolute right-9 top-[8px] h-4 w-4 cursor-pointer" @click="show = !show" :class="{ 'hidden': !show, 'block': show }" src="{{ asset('storage/mirkado/icons/hide-password.png') }}" alt="Password">
                                                <img class="absolute right-9 top-[8px] h-4 w-4 cursor-pointer" @click="show = !show" :class="{ 'hidden': show, 'block': !show }" src="{{ asset('storage/mirkado/icons/show-password.png') }}" alt="Password">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Admin Role Information-->
                                    <div class="relative mb-5 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                        <div class="flex">
                                            <h2 class="font-medium text-primary pl-6 pr-2 text-[13px] pt-4">Admin Role Information</h2>
                                            <p class="font-light text-primary text-[11px] pt-4 italic">(Select Admin Role)</p>
                                        </div>

                                        <hr class="px-2 my-1 border-solid shadow-m w-full pb-1" />

                                        <ul class="w-full text-[10px] font-medium text-gray-900 px-5">
                                            <li class="w-full">
                                                <div class="flex items-center ps-3 grid-cols-3 border-b-[1px]">
                                                    <input id="farmerVerifier-checkbox" type="checkbox" value="" class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary">
                                                    <label for="farmerVerifier-checkbox" class="w-full py-3 ms-2 text-[12px] font-medium text-gray-900 dark:text-gray-300">Farmer Verifier</label>
                                                    <p class="font-light text-[10px] -ml-52 italic">Farmer Verifier will verify the farmer’s information.</p>
                                                </div>
                                            </li>
                                            <li class="w-full">
                                                <div class="flex items-center ps-3 grid-cols-3 border-b-[1px]">
                                                    <input id="bidderVerifier-checkbox" type="checkbox" value="" class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary">
                                                    <label for="bidderVerifier-checkbox" class="w-full py-3 ms-2 text-[12px] font-medium text-gray-900 dark:text-gray-300">Bidder Verifier</label>
                                                    <p class="font-light text-[10px] -ml-[220px] italic">Bidder Verifier will verify the bidder’s information.</p>
                                                </div>
                                            </li>
                                            <li class="w-full">
                                                <div class="flex items-center ps-3 grid-cols-3 border-b-[1px]">
                                                    <input id="auctionVerifier-checkbox" type="checkbox" value="" class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary">
                                                    <label for="auctionVerifier-checkbox" class="w-full py-3 ms-2 text-[12px] font-medium text-gray-900 dark:text-gray-300">Auction Verifier</label>
                                                    <p class="font-light text-[10px] -ml-52 italic">Auction Verifier will verify the auction of the farmer.</p>
                                                </div>
                                            </li>
                                            <li class="w-full">
                                                <div class="flex items-center ps-3 grid-cols-3">
                                                    <input id="offerVerifier-checkbox" type="checkbox" value="" class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary">
                                                    <label for="offerVerifier-checkbox" class="w-full py-3 ms-2 text-[12px] font-medium text-gray-900 dark:text-gray-300">Offer Verifier</label>
                                                    <p class="font-light text-[10px] -ml-[250px] italic">Offer Verifier will verify the offer of the bidder.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </form>

                            </div>

                            <!--Disable Account Information-->
                            <div class="relative mb-5 font-semibold rounded-sm w-full bg-white drop-shadow-md">
                                <div x-data="{ switchOn: false}" class="flex items-start justify-start mt-3 px-3 w-full">
                                    <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" :id="$id('disableSwitch')"
                                           :class="{ 'text-[#F74140]': switchOn, 'text-primary': ! switchOn }"
                                           class="text-[13px] font-bold select-none"
                                           x-cloak>
                                        Disabled Account
                                    </label>

                                    <input id="disableSwitch" type="checkbox" name="disableSwitch" class="hidden" :checked="switchOn">
                                    <button
                                        x-ref="switchButton"
                                        type="button"
                                        @click="switchOn = ! switchOn"
                                        :class="switchOn ? 'bg-[#F74140]' : 'bg-neutral-200', switchOn ? confirmDisableAccount = true : confirmDisableAccount = false"
                                        class="relative inline-flex h-4 py-0.5 ml-4 rounded-full focus:outline-none w-8"
                                        x-cloak>
                                        <span :class="switchOn ? 'translate-x-[16px]' : 'translate-x-0.5'" class="w-3 h-3 duration-75 ease-in-out bg-white rounded-full shadow-md"></span>
                                    </button>
                                </div>
                                <p class="text-[8px] ml-[12px] font-normal mb-2">Once you disable this account. The owner cannot access his/her account.</p>

                            </div>

                        </div>

                        <!--Buttons-->
                        <div class="w-full py-2 mb-5">
                            <div class="flex justify-end items-end overflow-hidden">

                                <!--Cancel Button-->
                                <div class="relative">
                                    <input type="submit" name="cancelBtn" id="cancelBtn" value="CANCEL"
                                           class="w-[100px] text-[12px] bg-opacity-80 px-1 py-2 font-normal tracking-wider text-red-500 bg-none rounded-md transform transition duration-500 hover:drop-shadow hover:shadow-cyan-950 hover:scale-105 hover:bg-red-100 hover:font-semibold">
                                </div>

                                <!--Save Button-->
                                <div class="relative pr-2 ml-3">
                                    <input type="submit" name="saveBtn" id="saveBtn" value="SAVE INFO"
                                           @click="successEditModal = true"
                                           class="w-[100px] text-[12px] bg-opacity-80 px-1 py-2 font-normal tracking-wider text-slate-50 bg-[#63CF57] rounded-md transform transition duration-500 hover:drop-shadow hover:shadow-cyan-950 hover:scale-105 hover:bg-[#63CF57] hover:font-semibold">
                                </div>


                            </div>
                        </div>

                    </div>

                </div>

                <!--Disable account confirmation modal -->
                <div
                    class="fixed inset-0 w-full h-full flex justify-center items-center z-50 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                    x-show="confirmDisableAccount"
                    x-transition:enter="transition duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >
                    <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                        <div
                            class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20"
                            x-show="confirmDisableAccount"
                            x-transition:enter="transition transform duration-300"
                            x-transition:enter-start="scale-0"
                            x-transition:enter-end="scale-100"
                            x-transition:leave="transition transform duration-300"
                            x-transition:leave-start="scale-100"
                            x-transition:leave-end="scale-0"
                        >
                            <!-- header -->
                            <div class="p-4">
                                <h1 class="float-left text-primary font-semibold text-[18px]">Disable Account of Verifier</h1>
                                <div class="flex justify-between items-center pb-3 float-right">
                                    <div class="modal-close cursor-pointer z-50" @click="confirmDisableAccount = false">
                                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 18 18">
                                            <path
                                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>


                            <hr class="w-full mb-2"/>
                            <div class="p-3 text-center">
                                <h1 class="font-semibold text-[14px]">Are you sure, you want to disable this account?</h1>
                                <p class="font-noemal text-[12px]">Once you disable this account. The owner cannot access his/her account.</p>
                            </div>

                            <!--Buttons-->
                            <div class="w-full pt-2 pb-3 mb-5 pr-2">
                                <div class="flex justify-end items-end overflow-hidden">

                                    <!--Cancel Button-->
                                    <div class="relative">
                                        <input type="submit" name="cancelBtn" id="cancelBtn" value="CANCEL" @click="confirmDisableAccount = false"
                                               class="w-[100px] text-[12px] bg-opacity-80 px-1 py-2 font-normal tracking-wider text-red-500 bg-none rounded-md transform transition duration-500 hover:drop-shadow hover:shadow-cyan-950 hover:scale-105 hover:bg-red-100 hover:font-semibold">
                                    </div>

                                    <!--Confirm Button-->
                                    <div class="relative pr-2 ml-3">
                                        <input type="submit" name="confirmBtn" id="confirmBtn" value="CONFIRM" @click="confirmDisableAccount = false"
                                               class="w-[100px] text-[12px] bg-opacity-80 px-1 py-2 font-normal tracking-wider text-slate-50 bg-[#63CF57] rounded-md transform transition duration-500 hover:drop-shadow hover:shadow-cyan-950 hover:scale-105 hover:bg-[#63CF57] hover:font-semibold">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--Successfully Added Verifier Modal -->
            <div x-show="successAddModal" class="main-modal fixed w-full h-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
                 style="background: rgba(0,0,0,.7);">

                <div class="drop-shadow modal-container bg-gradient-to-r from-[#0CAB68] to-[#28E796] w-[380px] md:max-w-md mx-auto rounded shadow-lg z-50 overflow-hidden">

                    <!--graphic background-->
                    <div class="absolute inset-0 flex items-center justify-center z-0 opacity-70">
                        <img src="{{ asset('storage/mirkado/image/designModal.png') }}" class="w-[410px] h-[180px]  rounded -mt-[305px] transform scale-x-[-1]" alt="">
                    </div>

                    <div class="modal-content pt-4 text-left">

                        <!-- close icon -->
                        <div class="flex justify-between items-center pb-3 float-right pr-6">
                            <div class="modal-close cursor-pointer z-50" @click="successAddModal = false">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                     viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="w-full grid grid-cols-1">
                            <div class="flex justify-center items-center z-20 p-2 mb-4">
                                <img src="{{ asset('storage/mirkado/image/successModalEmoji.png') }}" class="w-[80px] h-[85px] rounded-full" alt="">
                            </div>
                            <h1 class="text-white text-[30px] font-semibold text-center -mt-5 tracking-[3px]">Success!</h1>
                        </div>


                        <div class="pt-2 w-full bg-white mt-5">
                            <p class="text-center  text-[15px] py-5">
                                You have successfully added a verifier.
                            </p>

                            <!--Button-->
                            <div class="flex justify-center py-1 pb-7">
                                <button @click.away="successAddModal = false"
                                        class="w-[150px] bg-[#68CA5A] bg-opacity-90 rounded-full px-4 py-2 ml-3 text-white font-medium">GOT IT</button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <!--Successfully Edited Verifier Modal -->
            <div x-show="successEditModal" class="main-modal fixed w-full h-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
                 style="background: rgba(0,0,0,.7);">

                <div class="drop-shadow modal-container bg-gradient-to-r from-[#0CAB68] to-[#28E796] w-[380px] md:max-w-md mx-auto rounded shadow-lg z-50 overflow-hidden">

                    <!--graphic background-->
                    <div class="absolute inset-0 flex items-center justify-center z-0 opacity-70">
                        <img src="{{ asset('storage/mirkado/image/designModal.png') }}" class="w-[410px] h-[180px]  rounded -mt-[305px] transform scale-x-[-1]" alt="">
                    </div>

                    <div class="modal-content pt-4 text-left">

                        <!-- close icon -->
                        <div class="flex justify-between items-center pb-3 float-right pr-6">
                            <div class="modal-close cursor-pointer z-50" @click="successEditModal = false">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                     viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="w-full grid grid-cols-1">
                            <div class="flex justify-center items-center z-20 p-2 mb-4">
                                <img src="{{ asset('storage/mirkado/image/successModalEmoji.png') }}" class="w-[80px] h-[85px] rounded-full" alt="">
                            </div>
                            <h1 class="text-white text-[30px] font-semibold text-center -mt-5 tracking-[3px]">Success!</h1>
                        </div>


                        <div class="pt-2 w-full bg-white mt-5">
                            <p class="text-center  text-[15px] py-5 px-5">
                                You have successfully edited verifier information.
                            </p>

                            <!--Button-->
                            <div class="flex justify-center py-1 pb-7">
                                <button @click.away="successAddModal = false"
                                        class="w-[150px] bg-[#68CA5A] bg-opacity-90 rounded-full px-4 py-2 ml-3 text-white font-medium">GOT IT</button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <!--Error Modal-->
            <div x-show="errorModal" class="hidden main-modal fixed w-full h-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
                 style="background: rgba(0,0,0,.7);">

                <div class="drop-shadow modal-container bg-gradient-to-r from-[#F74140] to-[#FE9E9E] w-[380px] md:max-w-md mx-auto rounded shadow-lg z-50 overflow-hidden">

                    <!--graphic background-->
                    <div class="absolute inset-0 flex items-center justify-center z-0 opacity-70">
                        <img src="{{ asset('storage/mirkado/image/designModal.png') }}" class="w-[410px] h-[180px]  rounded -mt-[305px] transform scale-x-[-1]" alt="">
                    </div>

                    <div class="modal-content pt-4 text-left">

                        <!-- close icon -->
                        <div class="flex justify-between items-center pb-3 float-right pr-6">
                            <div class="modal-close cursor-pointer z-50" @click="errorModal = false">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                     viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="w-full grid grid-cols-1">
                            <div class="flex justify-center items-center z-20 p-2 mb-4">
                                <img src="{{ asset('storage/mirkado/image/errorModalEmoji.png') }}" class="w-[80px] h-[85px] rounded-full" alt="">
                            </div>
                            <h1 class="text-white text-[30px] font-semibold text-center -mt-5 tracking-[3px]">Oopsie!</h1>
                        </div>


                        <div class="pt-2 w-full bg-white mt-5">
                            <p class="text-center  text-[15px] py-5">
                                Something went wrong. <br/>
                                Please try again.
                            </p>

                            <!--Button-->
                            <div class="flex justify-center py-1 pb-7">
                                <button @click.away="errorModal = false"
                                        class="w-[150px] bg-[#68CA5A] bg-opacity-90 rounded-full px-4 py-2 ml-3 text-white font-medium">GOT IT</button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </x-admin.navigation>
</x-app-layout>
