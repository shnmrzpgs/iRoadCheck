<x-app-layout>

    <x-admin.admin-navigation page_title="Manage Users">
        <div class="z-0 text-[#202020] bg-[#FBFBFB] pt-4 lg:px-2 px-0 pb-4 rounded-lg w-full min-w-[40vh] max-w-full h-full min-h-[60vh] max-h-full "
             x-data="{
                isPasswordVisible: false,
                generatePassword() {
                    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
                    const length = 12;
                    let password = '';
                    for (let i = 0; i < length; i++) {
                        password += chars.charAt(Math.floor(Math.random() * chars.length));
                    }
                    this.formData.password = password;
                },
                isAccountDisabled: false,
                activeTab: 'basic-info',
                visitedTabs: [],
                tabs: [
                    { key: 'basic-info', label: 'Basic Information' },
                    { key: 'access-info', label: 'Access Control' },
                    { key: 'account-info', label: 'Account Settings' }
                ],
                formData: {
                    firstName: '',
                    middleName: '',
                    lastName: '',
                    gender: '',
                    email: '',
                    idNumber: '',
                    password: '',
                    assignedPermissions: []
                },
                get canAddUser() {
                return this.visitedTabs.length === this.tabs.length &&
                    this.formData.firstName.trim() &&
                    this.formData.lastName.trim() &&
                    this.formData.email.trim() &&
                    this.formData.idNumber.trim();
                },

                activateTab(tabKey) {
                    this.activeTab = tabKey;
                },

                nextTab() {
                    const currentIndex = this.tabs.findIndex(tab => tab.key === this.activeTab);

                    if (currentIndex < this.tabs.length - 1) {
                        const currentTabKey = this.tabs[currentIndex].key;

                        // Mark the current tab as done (visited)
                        this.visitedTabs.push(currentTabKey);

                        // Activate the next tab
                        const nextTab = this.tabs[currentIndex + 1].key;
                        this.activateTab(nextTab);
                    }
                },
                previousTab() {
                    const currentIndex = this.tabs.findIndex(tab => tab.key === this.activeTab);
                    if (currentIndex > 0) {
                        const prevTab = this.tabs[currentIndex - 1].key;
                        this.activateTab(prevTab);
                    }
                },
                validateAndSubmit() {
                    if (Object.values(this.formData).every(value => value.trim())) {
                        alert('Staff successfully added!');
                        this.showAddModal = false;
                    } else {
                        alert('Please fill in all required fields.');
                    }
                },
                addUser() {
                    // Call validateAndSubmit when adding the user
                    this.validateAndSubmit();
                },
                hoveredTab: null,
                currentPage: 1,
                totalPages: 20,
                maxVisiblePages: 5,
                get pages() {
                    const start = Math.max(this.currentPage - Math.floor(this.maxVisiblePages / 2), 1);
                    const end = Math.min(start + this.maxVisiblePages - 1, this.totalPages);
                    return Array.from({ length: end - start + 1 }, (_, i) => start + i);
                },
                goToPage(page) {
                    if (page >= 1 && page <= this.totalPages) {
                        this.currentPage = page;
                    }
                },
                prevPage() {
                    if (this.currentPage > 1) this.currentPage--;
                },
                nextPage() {
                    if (this.currentPage < this.totalPages) this.currentPage++;
                },
                showAddModal: false,
                openAddSuccessModal: false,
                showViewModal: false,
                users: [
                    { profileImage: 'Staffsset("storage/icons/profile-graphics.png") }}', email: 'john@example.com', userType: 'admin', status: 'Disabled', firstName: 'John', middleName: 'A.', lastName: 'Doe', gender: 'Male' },
                    { profileImage: 'Staffsset("storage/icons/profile-graphics.png") }}', email: 'jane@example.com', userType: 'Staff', status: 'Enabled', firstName: 'Jane', middleName: '', lastName: 'Smith', gender: 'Female' },
                    { profileImage: 'Staffsset("storage/icons/profile-graphics.png") }}', email: 'michael.brown@example.com', userType: 'Moderator', status: 'Enabled', firstName: 'Michael', middleName: 'T.', lastName: 'Brown', gender: 'Male' },
                    { profileImage: 'Staffsset("storage/icons/profile-graphics.png") }}', email: 'emily.davis@example.com', userType: 'Staff', status: 'Enabled', firstName: 'Emily', middleName: 'R.', lastName: 'Davis', gender: 'Female' },
                    { profileImage: 'Staffsset("storage/icons/profile-graphics.png") }}', email: 'chris.johnson@example.com', userType: 'admin', status: 'Disabled', firstName: 'Chris', middleName: '', lastName: 'Johnson', gender: 'Non-binary' },
                    { profileImage: 'Staffsset("storage/icons/profile-graphics.png") }}', email: 'sarah.wilson@example.com', userType: 'Staff', status: 'Disabled', firstName: 'Sarah', middleName: 'E.', lastName: 'Wilson', gender: 'Female' },
                    { profileImage: 'Staffsset("storage/icons/profile-graphics.png") }}', email: 'david.martinez@example.com', userType: 'Staff', status: 'Enabled', firstName: 'David', middleName: 'L.', lastName: 'Martinez', gender: 'Male' },
                    { profileImage: 'Staffsset("storage/icons/profile-graphics.png") }}', email: 'sophia.garcia@example.com', userType: 'Moderator', status: 'Enabled', firstName: 'Sophia', middleName: '', lastName: 'Garcia', gender: 'Female' },
                    { profileImage: 'Staffsset("storage/icons/profile-graphics.png") }}', email: 'ethan.lee@example.com', userType: 'admin', status: 'Enabled', firstName: 'Ethan', middleName: 'H.', lastName: 'Lee', gender: 'Male' },
                    { profileImage: 'Staffsset("storage/icons/profile-graphics.png") }}', email: 'olivia.anderson@example.com', userType: 'Staff', status: 'Disabled', firstName: 'Olivia', middleName: 'M.', lastName: 'Anderson', gender: 'Female' }
                ],
                selectedUser: {},
                viewUser(user) {
                    this.selectedUser = user;
                    this.showViewModal = true;
                },
                permissions: [
                    { id: 1, name: 'View Dashboard' },
                    { id: 2, name: 'Manage Users' },
                    { id: 3, name: 'Edit Settings' },
                    { id: 4, name: 'Generate Reports' },
                    { id: 5, name: 'Access Restricted Data' },
                    { id: 6, name: 'Manage Inventory' },
                    { id: 7, name: 'Approve Requests' },
                    { id: 8, name: 'View Logs' },
                    { id: 9, name: 'Assign Roles' },
                    { id: 10, name: 'Update Profile' },
                    { id: 11, name: 'Manage Permissions' },
                    { id: 12, name: 'Delete Records' },
                    { id: 13, name: 'Export Data' },
                    { id: 14, name: 'View Notifications' },
                    { id: 15, name: 'Reset Passwords' },
                    { id: 16, name: 'Monitor Activity' },
                    { id: 17, name: 'Manage Categories' },
                    { id: 18, name: 'View Reports' },
                    { id: 19, name: 'Add New Entries' },
                    { id: 20, name: 'Archive Data' }
                ],
                userTypePermissions: {
                    Admin: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10], // Full permissions
                    Moderator: [1, 4, 8, 9], // Limited permissions
                    User: [1, 4, 10], // Basic permissions
                },
                get filteredPermissions() {
                    if (this.formData.userType && this.userTypePermissions[this.formData.userType]) {
                        return this.permissions.filter(permission =>
                        this.userTypePermissions[this.formData.userType].includes(permission.id)
                        );
                    }
                    return [];
                },
                assignPermissions() {
                    if (this.formData.userType && this.userTypePermissions[this.formData.userType]) {
                        this.formData.assignedPermissions = [...this.userTypePermissions[this.formData.userType]];
                        } else {
                            this.formData.assignedPermissions = [];
                        }
                },

              }"
            >

            <!--Page description and Add button-->
            <div class="px-6" >
                <div class="mr-auto">
                    <div class="flex flex-col">
                        <!--Page description-->
                        <div class="sm:flex-auto">
                            <p class="mt-2 lg:text-sm text-xs text-[#656565]">
                                A list of all users in iRoadCheck System.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-start ">

                    <!--Dropdown Filters-->
                    <div class="flex lg:gap-2 gap-1 mr-auto mb-0 mt-4"
                         x-data="{
                             filters: {
                                 status: '',
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

                    <!--Add Button-->
                    <div class="sm:mt-0 sm:flex-none -mt-8">
                        <div class="flex w-full items-center px-1 md:px-4 py-2 md:mx-auto md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
                            <div class="w-full">
                                <div @click="showAddModal = true">

                                    <button type="submit" name="addUser" id="addUser" value="addUser"
                                            class="flex gap-x-[8px] w-auto text-xs px-[14px] py-[8px] font-normal tracking-wider text-[#FFFFFF]  bg-gradient-to-b from-[#84D689] to-green-500 rounded-full hover:drop-shadow hover:bg-[#4AA76F] hover:scale-105 hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier (0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" viewBox="0 0 594.95996 595.499987" height="15" preserveAspectRatio="xMidYMid meet" class="mt-1 mr-0 hidden sm:block">
                                            <defs>
                                                <clipPath id="9bb67f9de8">
                                                    <path d="M 5.070312 4.839844 L 590.328125 4.839844 L 590.328125 590 L 5.070312 590 Z M 5.070312 4.839844 " clip-rule="nonzero"/>
                                                </clipPath>
                                            </defs>
                                            <g clip-path="url(#9bb67f9de8)">
                                                <path fill="#ffffff" d="M 484.441406 4.777344 L 110.621094 4.777344 C 108.894531 4.777344 107.164062 4.824219 105.441406 4.910156 C 103.714844 4.996094 101.992188 5.125 100.273438 5.296875 C 98.554688 5.46875 96.839844 5.679688 95.128906 5.9375 C 93.421875 6.191406 91.71875 6.488281 90.023438 6.828125 C 88.332031 7.164062 86.644531 7.546875 84.96875 7.964844 C 83.292969 8.386719 81.628906 8.851562 79.976562 9.351562 C 78.324219 9.855469 76.683594 10.398438 75.058594 10.980469 C 73.429688 11.566406 71.820312 12.1875 70.222656 12.851562 C 68.628906 13.511719 67.050781 14.214844 65.488281 14.953125 C 63.925781 15.691406 62.382812 16.46875 60.859375 17.285156 C 59.335938 18.101562 57.832031 18.953125 56.351562 19.839844 C 54.871094 20.730469 53.410156 21.65625 51.976562 22.617188 C 50.539062 23.574219 49.125 24.570312 47.738281 25.601562 C 46.351562 26.628906 44.988281 27.691406 43.652344 28.789062 C 42.320312 29.886719 41.011719 31.015625 39.730469 32.175781 C 38.449219 33.335938 37.199219 34.527344 35.976562 35.746094 C 34.753906 36.96875 33.566406 38.222656 32.402344 39.5 C 31.242188 40.78125 30.117188 42.089844 29.019531 43.425781 C 27.921875 44.761719 26.859375 46.121094 25.828125 47.507812 C 24.800781 48.898438 23.804688 50.308594 22.84375 51.746094 C 21.882812 53.179688 20.960938 54.640625 20.070312 56.121094 C 19.183594 57.605469 18.328125 59.105469 17.515625 60.628906 C 16.699219 62.152344 15.921875 63.695312 15.183594 65.257812 C 14.441406 66.820312 13.742188 68.398438 13.078125 69.992188 C 12.417969 71.589844 11.792969 73.203125 11.210938 74.828125 C 10.628906 76.453125 10.085938 78.09375 9.582031 79.746094 C 9.078125 81.398438 8.617188 83.066406 8.195312 84.742188 C 7.773438 86.417969 7.394531 88.101562 7.054688 89.796875 C 6.71875 91.488281 6.421875 93.191406 6.164062 94.902344 C 5.910156 96.609375 5.695312 98.324219 5.527344 100.042969 C 5.355469 101.761719 5.226562 103.484375 5.140625 105.210938 C 5.050781 106.9375 5.007812 108.664062 5.003906 110.390625 L 5.003906 484.210938 C 5.007812 485.9375 5.050781 487.664062 5.140625 489.390625 C 5.226562 491.117188 5.355469 492.839844 5.527344 494.558594 C 5.695312 496.277344 5.910156 497.992188 6.164062 499.703125 C 6.421875 501.410156 6.71875 503.113281 7.054688 504.804688 C 7.394531 506.5 7.773438 508.1875 8.195312 509.863281 C 8.617188 511.539062 9.078125 513.203125 9.582031 514.855469 C 10.085938 516.507812 10.628906 518.148438 11.210938 519.773438 C 11.792969 521.402344 12.417969 523.011719 13.078125 524.609375 C 13.742188 526.203125 14.441406 527.78125 15.183594 529.34375 C 15.921875 530.90625 16.699219 532.449219 17.515625 533.972656 C 18.328125 535.496094 19.183594 536.996094 20.070312 538.480469 C 20.960938 539.960938 21.882812 541.421875 22.84375 542.855469 C 23.804688 544.292969 24.800781 545.707031 25.828125 547.09375 C 26.859375 548.480469 27.921875 549.84375 29.019531 551.175781 C 30.117188 552.511719 31.242188 553.820312 32.402344 555.101562 C 33.566406 556.382812 34.753906 557.632812 35.976562 558.855469 C 37.199219 560.074219 38.449219 561.265625 39.730469 562.425781 C 41.011719 563.589844 42.320312 564.714844 43.652344 565.8125 C 44.988281 566.910156 46.351562 567.972656 47.738281 569 C 49.125 570.03125 50.539062 571.027344 51.976562 571.988281 C 53.410156 572.945312 54.871094 573.871094 56.351562 574.761719 C 57.832031 575.648438 59.335938 576.5 60.859375 577.316406 C 62.382812 578.132812 63.925781 578.910156 65.488281 579.648438 C 67.050781 580.386719 68.628906 581.089844 70.222656 581.75 C 71.820312 582.414062 73.429688 583.035156 75.058594 583.621094 C 76.683594 584.203125 78.324219 584.746094 79.976562 585.25 C 81.628906 585.753906 83.292969 586.214844 84.96875 586.636719 C 86.644531 587.054688 88.332031 587.4375 90.023438 587.773438 C 91.71875 588.113281 93.421875 588.410156 95.128906 588.667969 C 96.839844 588.921875 98.554688 589.132812 100.273438 589.304688 C 101.992188 589.476562 103.714844 589.605469 105.441406 589.691406 C 107.164062 589.78125 108.894531 589.824219 110.621094 589.828125 L 484.441406 589.828125 C 486.167969 589.824219 487.894531 589.78125 489.621094 589.691406 C 491.347656 589.605469 493.070312 589.476562 494.789062 589.304688 C 496.507812 589.132812 498.222656 588.921875 499.929688 588.667969 C 501.640625 588.410156 503.339844 588.113281 505.035156 587.773438 C 506.730469 587.4375 508.414062 587.054688 510.089844 586.636719 C 511.765625 586.214844 513.429688 585.753906 515.085938 585.25 C 516.738281 584.746094 518.378906 584.203125 520.003906 583.621094 C 521.628906 583.035156 523.242188 582.414062 524.835938 581.75 C 526.433594 581.089844 528.011719 580.390625 529.574219 579.648438 C 531.136719 578.910156 532.679688 578.132812 534.203125 577.316406 C 535.726562 576.5 537.226562 575.648438 538.710938 574.761719 C 540.191406 573.871094 541.648438 572.945312 543.085938 571.988281 C 544.523438 571.027344 545.933594 570.03125 547.324219 569 C 548.710938 567.972656 550.070312 566.910156 551.40625 565.8125 C 552.742188 564.714844 554.050781 563.589844 555.332031 562.425781 C 556.609375 561.265625 557.863281 560.074219 559.082031 558.855469 C 560.304688 557.632812 561.496094 556.382812 562.65625 555.101562 C 563.816406 553.820312 564.945312 552.511719 566.042969 551.175781 C 567.136719 549.84375 568.203125 548.480469 569.230469 547.09375 C 570.261719 545.707031 571.253906 544.292969 572.214844 542.855469 C 573.175781 541.421875 574.101562 539.960938 574.988281 538.480469 C 575.878906 536.996094 576.730469 535.496094 577.546875 533.972656 C 578.363281 532.449219 579.140625 530.90625 579.878906 529.34375 C 580.617188 527.78125 581.320312 526.203125 581.980469 524.609375 C 582.644531 523.011719 583.265625 521.402344 583.847656 519.773438 C 584.433594 518.148438 584.976562 516.507812 585.480469 514.855469 C 585.980469 513.203125 586.445312 511.539062 586.863281 509.863281 C 587.285156 508.1875 587.667969 506.5 588.003906 504.804688 C 588.34375 503.113281 588.640625 501.410156 588.894531 499.703125 C 589.152344 497.992188 589.363281 496.277344 589.535156 494.558594 C 589.707031 492.839844 589.835938 491.117188 589.921875 489.390625 C 590.007812 487.664062 590.054688 485.9375 590.054688 484.210938 L 590.054688 110.390625 C 590.054688 108.664062 590.007812 106.9375 589.921875 105.210938 C 589.835938 103.484375 589.707031 101.761719 589.535156 100.042969 C 589.363281 98.324219 589.152344 96.609375 588.894531 94.902344 C 588.640625 93.191406 588.34375 91.488281 588.003906 89.796875 C 587.667969 88.101562 587.285156 86.417969 586.863281 84.742188 C 586.445312 83.066406 585.980469 81.398438 585.480469 79.746094 C 584.976562 78.09375 584.433594 76.453125 583.847656 74.828125 C 583.265625 73.203125 582.644531 71.589844 581.980469 69.992188 C 581.320312 68.398438 580.617188 66.820312 579.878906 65.257812 C 579.140625 63.695312 578.363281 62.152344 577.546875 60.628906 C 576.730469 59.105469 575.878906 57.605469 574.988281 56.121094 C 574.101562 54.640625 573.175781 53.179688 572.214844 51.746094 C 571.253906 50.308594 570.261719 48.898438 569.230469 47.507812 C 568.203125 46.121094 567.136719 44.761719 566.042969 43.425781 C 564.945312 42.089844 563.816406 40.78125 562.65625 39.5 C 561.496094 38.222656 560.304688 36.96875 559.082031 35.746094 C 557.863281 34.527344 556.609375 33.335938 555.332031 32.175781 C 554.050781 31.015625 552.742188 29.886719 551.40625 28.789062 C 550.070312 27.691406 548.710938 26.628906 547.324219 25.601562 C 545.933594 24.570312 544.523438 23.574219 543.085938 22.617188 C 541.648438 21.65625 540.191406 20.730469 538.710938 19.839844 C 537.226562 18.953125 535.726562 18.101562 534.203125 17.285156 C 532.679688 16.46875 531.136719 15.691406 529.574219 14.953125 C 528.011719 14.214844 526.433594 13.511719 524.835938 12.851562 C 523.242188 12.1875 521.628906 11.566406 520.003906 10.980469 C 518.378906 10.398438 516.738281 9.855469 515.085938 9.351562 C 513.429688 8.851562 511.765625 8.386719 510.089844 7.964844 C 508.414062 7.546875 506.730469 7.164062 505.035156 6.828125 C 503.339844 6.488281 501.640625 6.191406 499.929688 5.9375 C 498.222656 5.679688 496.507812 5.46875 494.789062 5.296875 C 493.070312 5.125 491.347656 4.996094 489.621094 4.910156 C 487.894531 4.824219 486.167969 4.777344 484.441406 4.777344 Z M 417.222656 316.320312 L 316.5 316.320312 L 316.5 417.042969 C 316.5 417.664062 316.46875 418.28125 316.40625 418.898438 C 316.34375 419.515625 316.253906 420.128906 316.132812 420.738281 C 316.011719 421.347656 315.859375 421.949219 315.675781 422.542969 C 315.496094 423.136719 315.289062 423.71875 315.050781 424.292969 C 314.8125 424.867188 314.546875 425.425781 314.253906 425.972656 C 313.960938 426.519531 313.640625 427.050781 313.292969 427.566406 C 312.949219 428.082031 312.578125 428.582031 312.183594 429.0625 C 311.792969 429.539062 311.375 430 310.933594 430.4375 C 310.496094 430.878906 310.035156 431.292969 309.554688 431.6875 C 309.074219 432.082031 308.578125 432.449219 308.0625 432.792969 C 307.546875 433.136719 307.011719 433.457031 306.464844 433.75 C 305.917969 434.042969 305.359375 434.304688 304.785156 434.542969 C 304.210938 434.78125 303.625 434.988281 303.03125 435.171875 C 302.4375 435.351562 301.835938 435.5 301.226562 435.621094 C 300.621094 435.742188 300.007812 435.832031 299.386719 435.894531 C 298.769531 435.953125 298.152344 435.984375 297.53125 435.984375 C 296.910156 435.984375 296.289062 435.953125 295.671875 435.894531 C 295.054688 435.832031 294.441406 435.742188 293.832031 435.621094 C 293.222656 435.5 292.621094 435.351562 292.027344 435.171875 C 291.433594 434.988281 290.851562 434.78125 290.277344 434.542969 C 289.703125 434.304688 289.144531 434.042969 288.59375 433.75 C 288.046875 433.457031 287.515625 433.136719 287 432.792969 C 286.484375 432.449219 285.984375 432.082031 285.503906 431.6875 C 285.023438 431.292969 284.566406 430.878906 284.125 430.4375 C 283.6875 430 283.269531 429.539062 282.875 429.0625 C 282.480469 428.582031 282.113281 428.082031 281.765625 427.566406 C 281.421875 427.050781 281.101562 426.519531 280.808594 425.972656 C 280.515625 425.425781 280.25 424.867188 280.011719 424.292969 C 279.773438 423.71875 279.566406 423.136719 279.382812 422.542969 C 279.203125 421.949219 279.050781 421.347656 278.929688 420.738281 C 278.808594 420.128906 278.714844 419.515625 278.65625 418.898438 C 278.59375 418.28125 278.5625 417.664062 278.5625 417.042969 L 278.5625 316.269531 L 177.839844 316.269531 C 177.21875 316.269531 176.597656 316.238281 175.980469 316.175781 C 175.363281 316.117188 174.75 316.023438 174.140625 315.902344 C 173.535156 315.78125 172.933594 315.628906 172.339844 315.449219 C 171.746094 315.265625 171.160156 315.058594 170.585938 314.820312 C 170.015625 314.582031 169.453125 314.316406 168.90625 314.023438 C 168.359375 313.730469 167.828125 313.410156 167.3125 313.066406 C 166.796875 312.71875 166.300781 312.351562 165.820312 311.957031 C 165.339844 311.5625 164.878906 311.144531 164.441406 310.707031 C 164.003906 310.265625 163.585938 309.808594 163.195312 309.328125 C 162.800781 308.847656 162.429688 308.347656 162.085938 307.832031 C 161.742188 307.316406 161.421875 306.785156 161.132812 306.234375 C 160.839844 305.6875 160.574219 305.128906 160.335938 304.554688 C 160.097656 303.980469 159.890625 303.398438 159.710938 302.804688 C 159.53125 302.210938 159.378906 301.609375 159.257812 301 C 159.136719 300.390625 159.046875 299.777344 158.988281 299.160156 C 158.925781 298.542969 158.894531 297.921875 158.894531 297.300781 C 158.894531 296.679688 158.925781 296.0625 158.988281 295.441406 C 159.046875 294.824219 159.136719 294.210938 159.257812 293.601562 C 159.378906 292.996094 159.53125 292.394531 159.710938 291.800781 C 159.890625 291.203125 160.097656 290.621094 160.335938 290.046875 C 160.574219 289.472656 160.839844 288.914062 161.132812 288.367188 C 161.421875 287.816406 161.742188 287.285156 162.085938 286.769531 C 162.429688 286.253906 162.800781 285.753906 163.195312 285.277344 C 163.585938 284.796875 164.003906 284.335938 164.441406 283.898438 C 164.878906 283.457031 165.339844 283.039062 165.820312 282.644531 C 166.300781 282.253906 166.796875 281.882812 167.3125 281.539062 C 167.828125 281.191406 168.359375 280.871094 168.90625 280.578125 C 169.453125 280.285156 170.015625 280.019531 170.585938 279.78125 C 171.160156 279.542969 171.746094 279.335938 172.339844 279.152344 C 172.933594 278.972656 173.535156 278.820312 174.140625 278.699219 C 174.75 278.578125 175.363281 278.488281 175.980469 278.425781 C 176.597656 278.363281 177.21875 278.332031 177.839844 278.332031 L 278.5625 278.332031 L 278.5625 177.609375 C 278.5625 176.988281 278.589844 176.367188 278.652344 175.75 C 278.714844 175.132812 278.804688 174.519531 278.925781 173.910156 C 279.046875 173.300781 279.195312 172.699219 279.378906 172.101562 C 279.558594 171.507812 279.765625 170.925781 280.003906 170.351562 C 280.242188 169.777344 280.507812 169.214844 280.800781 168.667969 C 281.09375 168.117188 281.414062 167.585938 281.757812 167.070312 C 282.101562 166.554688 282.472656 166.054688 282.867188 165.574219 C 283.261719 165.09375 283.675781 164.636719 284.117188 164.195312 C 284.554688 163.757812 285.015625 163.339844 285.496094 162.945312 C 285.976562 162.550781 286.476562 162.183594 286.992188 161.835938 C 287.507812 161.492188 288.039062 161.171875 288.589844 160.878906 C 289.136719 160.585938 289.695312 160.320312 290.269531 160.082031 C 290.84375 159.847656 291.429688 159.636719 292.023438 159.457031 C 292.617188 159.277344 293.21875 159.125 293.828125 159.003906 C 294.4375 158.882812 295.054688 158.792969 295.671875 158.730469 C 296.289062 158.671875 296.910156 158.640625 297.53125 158.640625 C 298.152344 158.640625 298.773438 158.671875 299.390625 158.730469 C 300.007812 158.792969 300.621094 158.882812 301.230469 159.003906 C 301.839844 159.125 302.441406 159.277344 303.039062 159.457031 C 303.632812 159.636719 304.214844 159.847656 304.789062 160.082031 C 305.363281 160.320312 305.925781 160.585938 306.472656 160.878906 C 307.019531 161.171875 307.554688 161.492188 308.070312 161.835938 C 308.585938 162.183594 309.085938 162.550781 309.566406 162.945312 C 310.046875 163.339844 310.503906 163.757812 310.945312 164.195312 C 311.382812 164.636719 311.800781 165.09375 312.195312 165.574219 C 312.589844 166.054688 312.957031 166.554688 313.304688 167.070312 C 313.648438 167.585938 313.96875 168.117188 314.261719 168.667969 C 314.554688 169.214844 314.820312 169.777344 315.054688 170.351562 C 315.292969 170.925781 315.503906 171.507812 315.683594 172.101562 C 315.863281 172.699219 316.015625 173.300781 316.136719 173.910156 C 316.257812 174.519531 316.347656 175.132812 316.410156 175.75 C 316.46875 176.367188 316.5 176.988281 316.5 177.609375 L 316.5 278.332031 L 417.222656 278.332031 C 417.84375 278.332031 418.464844 278.363281 419.082031 278.421875 C 419.699219 278.484375 420.3125 278.574219 420.921875 278.695312 C 421.53125 278.816406 422.132812 278.96875 422.730469 279.148438 C 423.324219 279.328125 423.90625 279.539062 424.480469 279.773438 C 425.054688 280.011719 425.617188 280.277344 426.164062 280.570312 C 426.710938 280.863281 427.246094 281.183594 427.761719 281.527344 C 428.277344 281.875 428.777344 282.242188 429.257812 282.636719 C 429.738281 283.03125 430.195312 283.449219 430.636719 283.886719 C 431.074219 284.328125 431.492188 284.785156 431.886719 285.265625 C 432.28125 285.746094 432.648438 286.246094 432.996094 286.761719 C 433.339844 287.277344 433.660156 287.8125 433.953125 288.359375 C 434.246094 288.90625 434.511719 289.46875 434.75 290.042969 C 434.984375 290.617188 435.195312 291.199219 435.375 291.792969 C 435.554688 292.390625 435.707031 292.992188 435.828125 293.601562 C 435.949219 294.210938 436.039062 294.824219 436.101562 295.441406 C 436.160156 296.058594 436.191406 296.679688 436.191406 297.300781 C 436.191406 297.921875 436.160156 298.542969 436.101562 299.160156 C 436.039062 299.777344 435.949219 300.390625 435.828125 301 C 435.707031 301.609375 435.554688 302.214844 435.375 302.808594 C 435.195312 303.402344 434.984375 303.988281 434.75 304.558594 C 434.511719 305.132812 434.246094 305.695312 433.953125 306.242188 C 433.660156 306.792969 433.339844 307.324219 432.996094 307.839844 C 432.648438 308.355469 432.28125 308.855469 431.886719 309.335938 C 431.492188 309.816406 431.074219 310.277344 430.636719 310.714844 C 430.195312 311.152344 429.738281 311.570312 429.257812 311.964844 C 428.777344 312.359375 428.277344 312.730469 427.761719 313.074219 C 427.246094 313.417969 426.710938 313.738281 426.164062 314.03125 C 425.617188 314.324219 425.054688 314.589844 424.480469 314.828125 C 423.90625 315.066406 423.324219 315.273438 422.730469 315.453125 C 422.132812 315.632812 421.53125 315.785156 420.921875 315.90625 C 420.3125 316.027344 419.699219 316.117188 419.082031 316.179688 C 418.464844 316.242188 417.84375 316.269531 417.222656 316.269531 Z M 417.222656 316.320312 "
                                                      fill-opacity="1" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <span class="ml-0 mt-[2px] text-[#FFFFFF] text-md">Add User</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Staff/staff Modal -->
                    <div x-show="showAddModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                        <div class="p-1 bg-[#3AA76F] border-gray-600 rounded-[12px] shadow-xl overflow-hidden w-full min-w-md max-w-lg min-h-md max-h-lg mx-auto">
                            <div class="bg-[#FBFBFB] rounded-[10px] relative">

                                <!-- X Button -->
                                <button @click="showAddModal = false" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 focus:outline-none hover:bg-gray-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-6 w-6"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>

                                <!-- Modal Header -->
                                <div class="bg-gray-100 rounded-t-[8px] w-full text-md px-4 py-3">
                                    <!-- Modal Title -->
                                    <div class="text-[#3AA76F] font-medium">Adding User</div>
                                </div>

                                <!-- Modal Body -->
                                <div class="bg-[#FBFBFB] p-5 rounded-b-[8px] text-gray-600">

                                    <div class="flex mb-5">
                                        <!--Profile Picture-->
                                        <div class="relative h-16 w-16 flex-shrink-0 -mt-2">
                                            <img
                                                src="{{ asset('storage/icons/profile-graphics.png') }}"
                                                alt="Profile Image"
                                                class="h-16 w-16 rounded-full bg-gradient-to-r from-blue-500 to-green-500 p-[1px]"
                                            />
                                            <!-- Upload Photo Button -->
                                            <label for="upload-photo" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full cursor-pointer text-white text-xs hover:bg-opacity-60">
                                                Upload
                                                <input
                                                    id="upload-photo"
                                                    type="file"
                                                    class="hidden"
                                                    @change="handlePhotoUpload($event)"
                                                />
                                            </label>
                                        </div>

                                        <!-- Full Name and Email Preview-->
                                        <div class="pl-4">
                                            <!-- Preview Section -->
                                            <div class="pl-4">
                                                <div class="block text-lg font-medium text-gray-700">
                                                    <span x-text="`${formData.firstName} ${formData.middleName} ${formData.lastName}`.trim() || 'Full Name Preview'"></span>
                                                </div>
                                                <div class="block text-xs font-normal text-gray-700 italic">
                                                    <span x-text="formData.email || 'Email Preview'"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tab Navigation -->
                                    <div class="flex text-xs mb-4">
                                        <!-- Tab Template -->
                                        <template x-for="(tab, index) in tabs" :key="index">
                                            <div class="flex items-center space-x-1 mr-6">
                                                <!-- Tab Indicator (Number or Check Icon) -->
                                                <div
                                                    class="flex items-center justify-center h-6 w-6 rounded-full p-[1px] font-medium"
                                                    :class="visitedTabs.includes(tab.key)
                                                        ? 'bg-gradient-to-r from-blue-500 to-green-500'
                                                        : 'bg-gray-400'">
                                                    <span class="text-white">
                                                        <template x-if="visitedTabs.includes(tab.key)">
                                                            <span class="text-sm">✔</span>
                                                        </template>
                                                        <template x-if="!visitedTabs.includes(tab.key)">
                                                            <span x-text="index + 1" ></span>
                                                        </template>
                                                    </span>
                                                </div>
                                                <!-- Tab Label -->
                                                <div class="relative">
                                                    <button
                                                        class="text-xs font-medium relative z-10"
                                                        :class="activeTab === tab.key
                                                            ? 'text-[#676767] font-semibold'
                                                            : 'text-gray-400' && visitedTabs.includes(tab.key)
                                                            ? 'text-green-600'
                                                            : 'text-gray-400'"
                                                        @click="activateTab(tab.key)">
                                                        <span x-text="tab.label"></span>
                                                    </button>
                                                    <!-- Highlight Line -->
                                                    <span
                                                        class="absolute left-0 right-0 bottom-[-2px] h-[3px] bg-[#4AA76F] rounded-full transition-all duration-300"
                                                        x-show="activeTab === tab.key"
                                                        x-transition:enter="transition ease-out duration-300 transform opacity-0 translate-y-1"
                                                        x-transition:enter-start="opacity-0 transform translate-y-1"
                                                        x-transition:enter-end="opacity-100 transform translate-y-0"
                                                        x-transition:leave="transition ease-in duration-200 transform opacity-100 translate-y-0"
                                                        x-transition:leave-start="opacity-100 transform translate-y-0"
                                                        x-transition:leave-end="opacity-0 transform translate-y-1">
                                                    </span>
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                    <!-- Basic Information Page -->
                                    <form x-show="activeTab === 'basic-info'" class="min-h-[35vh] max-h-[35vh] overflow-y-auto space-y-6 mt-4 bg-[#FBFBFB] shadow px-3 py-10 text-xs">
                                        <!-- Name Fields -->
                                        <div class="flex space-x-4 grid grid-cols-3">
                                            <div>
                                                <label class="block font-medium text-gray-700">First Name</label>
                                                <input x-model="formData.firstName"
                                                       placeholder="First name" type="text"
                                                       class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm md:text-sm text-xs">
                                            </div>
                                            <div>
                                                <label class="block font-medium text-gray-700">Middle Name</label>
                                                <input x-model="formData.middleName"
                                                       placeholder="Middle name" type="text"
                                                       class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm md:text-sm text-xs">
                                            </div>
                                            <div>
                                                <label class="block font-medium text-gray-700">Last Name</label>
                                                <input x-model="formData.lastName"
                                                       placeholder="Last name" type="text"
                                                       class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm md:text-sm text-xs">
                                            </div>
                                        </div>
                                        <!-- Other Fields -->
                                        <div class="flex space-x-4 grid grid-cols-2">
                                            <div>
                                                <label class="block font-medium text-gray-700">Gender</label>
                                                <select x-model="formData.gender"
                                                        class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm md:text-sm text-xs">
                                                    <option value="" disabled selected>Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <!-- Email -->
                                            <div>
                                                <label class="block text-xs font-medium text-gray-700">Email address</label>
                                                <input x-model="formData.email"
                                                       placeholder="Enter your email" type="email"
                                                       class="w-full border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm md:text-sm text-xs">
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Access Control Page -->
                                    <div x-show="activeTab === 'access-info'" class="min-h-[35vh] max-h-[35vh] overflow-y-auto mt-4 bg-[#FBFBFB] shadow px-3 py-4 text-sm">

                                        <!-- Staff Type Dropdown -->
                                        <div class="px-2 mb-4">
                                            <label for="userType" class="block font-medium text-gray-700">User Role</label>
                                            <select id="userType" x-model="formData.userType" @change="assignPermissions"
                                                    class="rounded border border-gray-300 focus:outline-none focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full shadow-sm sm:text-sm">
                                                <option value="" disabled selected>Select a user type</option>
                                                <template x-for="(permissions, type) in userTypePermissions" :key="type">
                                                    <option :value="type" x-text="type"></option>
                                                </template>
                                            </select>
                                        </div>

                                        <!-- Permissions Selection -->
                                        <div class="px-3 py-2 text-sm">
                                            <div class="block font-normal text-gray-700 mb-4 text-sm">
                                                The permissions and capabilities assigned to this user type are listed below.
                                            </div>
                                            <label class="block font-medium text-gray-700 mb-2 border-b border-gray-300">Permissions</label>
                                            <ul class="list-disc pl-6 mt-2 py-2 leading-8">
                                                <template x-for="permission in filteredPermissions" :key="permission.id">
                                                    <li
                                                        class="transition-all duration-200 hover:text-green-600"
                                                        :class="{'text-green-600': formData.assignedPermissions.includes(permission.id)}"
                                                    >
                                                        <span x-text="permission.name"></span>
                                                    </li>
                                                </template>
                                            </ul>
                                        </div>

                                    </div>

                                    <!-- Account Settings Page -->
                                    <div x-show="activeTab === 'account-info'" class="min-h-[35vh] max-h-[35vh] overflow-y-auto bg-[#FBFBFB] shadow px-3 py-4 text-xs">
                                        <!-- Account Status -->
                                        <div class="mb-6 border-b border-gray-300">
                                            <!-- Label -->
                                            <label class="block font-medium text-gray-700 mb-1">Account Status</label>

                                            <!-- Toggle for Account Status -->
                                            <div
                                                class="flex items-center justify-between w-full sm:text-sm p-2 space-x-24"
                                            >
                                                <!-- Status Indicator -->
                                                <div
                                                    class="text-sm font-semibold"
                                                    :class="isAccountDisabled ? 'text-red-500' : 'text-green-500' "
                                                >
                                                    <span x-text="isAccountDisabled ?  'Disabled' : 'Enabled' "></span>
                                                </div>

                                                <!-- Toggle Button -->
                                                <label class="relative inline-flex items-center cursor-pointer ">
                                                    <!-- Hidden Checkbox -->
                                                    <input type="checkbox" x-model="isAccountDisabled" class="sr-only">

                                                    <!-- Background of the Toggle -->
                                                    <div
                                                        class="w-10 h-5 bg-green-500 rounded-full transition-colors duration-300"
                                                        :class="{ 'bg-red-500': isAccountDisabled }"
                                                    ></div>

                                                    <!-- Circle inside the Toggle -->
                                                    <div
                                                        class="absolute top-0.5 right-0.5 w-4 h-4 bg-white rounded-full shadow transform transition-transform duration-300"
                                                        :class="{ '-translate-x-5': isAccountDisabled }"
                                                    ></div>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- ID Number Input -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 text-xs">ID Number</label>
                                            <input
                                                x-model="formData.idNumber"
                                                placeholder="ID number"
                                                type="text"
                                                class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm sm:text-sm"
                                            >
                                        </div>

                                        <!-- Password Field with Toggle Visibility -->
                                        <div class="relative mt-6">
                                            <label class="block text-sm font-medium text-gray-700 text-xs">New Password</label>
                                            <div class="flex space-x-4">
                                                <div>
                                                    <input
                                                        :type="isPasswordVisible ? 'text' : 'password'"
                                                        x-model="formData.password"
                                                        placeholder="Generated password will appear here"
                                                        readonly
                                                        class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm sm:text-sm bg-gray-100 pr-10"
                                                    >
                                                    <!-- Eye Icon for Toggling -->
                                                    <button
                                                        type="button"
                                                        @click="isPasswordVisible = !isPasswordVisible"
                                                        class="float-right -mt-7 mr-2 text-gray-500 hover:text-gray-700"
                                                    >
                                                <span x-show="!isPasswordVisible">
                                                    <!-- Closed Eye Icon -->
                                                    <svg class="w-5 h-5 text-gray-600 hover:text-gray-700 transition-colors duration-200"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" zoomAndPan="magnify" viewBox="0 0 375 374.999991" preserveAspectRatio="xMidYMid meet" version="1.0">
                                                        <defs><clipPath id="f7a7acdade"><path d="M 11 71 L 364 71 L 364 324.042969 L 11 324.042969 Z M 11 71 " clip-rule="nonzero"/></clipPath></defs>
                                                        <g clip-path="url(#f7a7acdade)">
                                                            <path fill="currentColor"  d="M 359.273438 184.5 C 348.402344 167.085938 325.5 136.277344 289.753906 112.980469 L 309.460938 93.25 C 314.371094 88.332031 314.371094 80.371094 309.460938 75.457031 C 304.554688 70.539062 296.597656 70.539062 291.691406 75.457031 L 64.847656 302.566406 C 59.9375 307.484375 59.9375 315.445312 64.847656 320.359375 C 67.300781 322.820312 70.515625 324.046875 73.734375 324.046875 C 76.949219 324.046875 80.164062 322.820312 82.621094 320.359375 L 107.253906 295.699219 C 129.800781 306.417969 156.328125 313.589844 187.15625 313.589844 C 285.046875 313.589844 340.257812 241.777344 359.273438 211.3125 C 364.390625 203.125 364.390625 192.691406 359.273438 184.5 Z M 187.15625 273.40625 C 170.867188 273.40625 155.851562 268.167969 143.539062 259.367188 L 170.953125 231.921875 C 175.855469 234.292969 181.332031 235.65625 187.15625 235.65625 C 207.980469 235.65625 224.859375 218.757812 224.859375 197.910156 C 224.859375 192.078125 223.496094 186.597656 221.128906 181.6875 L 248.542969 154.242188 C 257.332031 166.566406 262.5625 181.601562 262.5625 197.910156 C 262.566406 239.605469 228.800781 273.40625 187.15625 273.40625 Z M 114.425781 217.597656 C 112.730469 211.3125 111.746094 204.730469 111.746094 197.910156 C 111.746094 156.210938 145.507812 122.410156 187.15625 122.410156 C 193.96875 122.410156 200.542969 123.398438 206.820312 125.09375 L 241.574219 90.296875 C 225.136719 85.304688 207.074219 82.226562 187.15625 82.226562 C 89.261719 82.226562 34.050781 154.039062 15.035156 184.5 C 9.921875 192.691406 9.921875 203.125 15.035156 211.3125 C 23.6875 225.175781 39.929688 247.574219 64.183594 267.898438 Z M 114.425781 217.597656 "/>
                                                        </g>
                                                    </svg>
                                                </span>
                                                        <span x-show="isPasswordVisible" style="display: none;">
                                                    <!-- Open Eye Icon -->
                                                    <svg class="w-5 h-5 text-gray-600 hover:text-gray-700 transition-colors duration-200"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" zoomAndPan="magnify" viewBox="0 0 375 374.999991" preserveAspectRatio="xMidYMid meet" version="1.0">
                                                        <defs><clipPath id="1f8a6b186c"><path d="M 6 78.503906 L 369 78.503906 L 369 315.503906 L 6 315.503906 Z M 6 78.503906 " clip-rule="nonzero"/></clipPath></defs>
                                                        <g clip-path="url(#1f8a6b186c)">
                                                            <path fill="currentColor"  d="M 364.394531 183.273438 C 344.859375 152.066406 288.148438 78.507812 187.597656 78.507812 C 87.042969 78.507812 30.332031 152.066406 10.800781 183.273438 C 5.546875 191.660156 5.546875 202.347656 10.800781 210.734375 C 30.332031 241.941406 87.042969 315.5 187.597656 315.5 C 288.148438 315.5 344.859375 241.941406 364.394531 210.734375 C 369.648438 202.347656 369.648438 191.660156 364.394531 183.273438 Z M 187.597656 274.339844 C 144.816406 274.339844 110.136719 239.714844 110.136719 197.003906 C 110.136719 154.292969 144.816406 119.667969 187.597656 119.667969 C 230.375 119.667969 265.054688 154.292969 265.054688 197.003906 C 265.054688 239.714844 230.375 274.339844 187.597656 274.339844 Z M 213.417969 184.113281 C 206.289062 184.113281 200.507812 178.34375 200.507812 171.226562 C 200.507812 167.710938 201.933594 164.539062 204.21875 162.214844 C 199.164062 159.800781 193.574219 158.335938 187.597656 158.335938 C 166.207031 158.335938 148.867188 175.648438 148.867188 197.003906 C 148.867188 218.359375 166.207031 235.671875 187.597656 235.671875 C 208.988281 235.671875 226.328125 218.359375 226.328125 197.003906 C 226.328125 191.039062 224.859375 185.453125 222.445312 180.410156 C 220.113281 182.691406 216.9375 184.113281 213.417969 184.113281 Z M 213.417969 184.113281 "/>
                                                        </g>
                                                    </svg>
                                                </span>
                                                    </button>
                                                </div>

                                                <!-- Generate Password Button -->
                                                <div class="mt-2">
                                                    <button
                                                        @click="generatePassword()"
                                                        class="px-4 py-2 text-[#4AA76F] rounded-full border border-[#4AA76F]  bg-[#4AA76F] bg-opacity-5 hover:bg-[#3AA76F] hover:bg-opacity-10 text-xs transition-all active:translate-y-[2px] active:shadow-none"
                                                    >
                                                        Generate Password
                                                    </button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Modal Footer -->
                                <div class="flex items-center justify-end pb-2 px-2 space-x-4">
                                    <!-- Left Side Buttons (Back and Add Staff) -->
                                    <div class="flex space-x-4">
                                        <!-- Back Button -->
                                        <button
                                            type="button"
                                            @click="previousTab"
                                            class="flex items-center px-4 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200 transition active:scale-95"
                                            x-show="tabs.findIndex(tab => tab.key === activeTab) > 0">
                                            <!-- Back Arrow Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                            <span class="ml-2">Back</span>
                                        </button>

                                        <!-- Add Staff Button -->
                                        <button
                                            type="button"
                                            @click="showAddModal = false; openAddSuccessModal = true"
                                            class="px-4 py-2 bg-gradient-to-b from-[#84D689] to-green-500 text-white text-sm rounded hover:bg-[#4AA76F] shadow-lg shadow-neutral-500/20 transition active:scale-95 hover:scale-105"
                                            x-show="tabs.findIndex(tab => tab.key === activeTab) === tabs.length - 1">
                                            Add User
                                        </button>
                                    </div>

                                    <!-- Next Button -->
                                    <button
                                        type="button"
                                        @click="nextTab"
                                        class="flex items-center px-4 py-2 bg-[#3AA76F] text-white text-sm rounded hover:bg-[#4AA76F] transition active:scale-95"
                                        x-show="tabs.findIndex(tab => tab.key === activeTab) < tabs.length - 1">
                                        <span class="mr-2">Next</span>
                                        <!-- Next Arrow Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Success Modal -->
                    <div
                        x-show="openAddSuccessModal"
                        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-30"
                        x-init="
                            lottie.loadAnimation({
                                container: $refs.lottieAnimation,
                                renderer: 'svg',
                                loop: true,
                                autoplay: true,
                                path: '{{ asset("animations/Animation - 1732372548058.json") }}'
                            });
                            if (openAddSuccessModal) {
                                setTimeout(() => {
                                    openAddSuccessModal = false;
                                }, 3000); // Automatically closes the modal after 3 seconds
                            }
                        "
                    >
                        <div class="p-1 bg-[#3AA76F] border-gray-600 rounded-[12px] shadow-xl overflow-hidden w-full max-w-sm">
                            <div
                                @click.away="openAddSuccessModal = false"
                                class="bg-white rounded-lg shadow-lg"
                            >

                                <!-- Modal Body -->
                                <div class="p-6 flex flex-col items-center space-y-2">

                                    <!-- Success Message -->
                                    <p class="text-center text-green-600 font-bold text-2xl">
                                        SUCCESS
                                    </p>

                                    <!-- Lottie Animation Container -->
                                    <div x-ref="lottieAnimation" class="w-28 sm:w-28 md:w-28 lg:w-32 max-w-[110px] mt-4 mb-0 drop-shadow-lg"></div>

                                    <!-- Success Message -->
                                    <p class="text-center text-gray-600 text-sm">
                                        Add User successfully!
                                    </p>
                                </div>

                                <!-- Horizontal Line with Animation -->
                                <div class="relative overflow-hidden shadow-lg w-full h-[4px] ">
                                    <img src="{{ asset('storage/images/line-successLoading.png') }}" alt="loading"
                                         class="absolute top-0 left-0 w-full h-full object-cover animate-wipe-right">
                                </div>

                                <!-- Modal Footer -->
                                <div
                                    @click="openAddSuccessModal = false" class="flex flex-col items-center px-6 py-2 bg-green-50 hover:bg-green-100 rounded-b-lg transition-all active:translate-y-[1px] active:shadow-none">

                                    <!-- Close Button -->
                                    <button
                                        class="px-4 py-2 text-green-600 text-sm font-medium rounded"
                                    >
                                        Close
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Table Content -->
            <div class="mt-2 px-6 mb-2">
                <div class="overflow-x-auto border border-t-gray-300 rounded-lg">
                    <div class="inline-block min-w-full max-h-[56vh] min-h-[48vh] overflow-y-auto align-middle">
                        <table class="min-w-full text-left divide-y divide-gray-300 hidden md:table">
                            <thead>
                            <tr>
                                <th class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575] rounded-tl-lg">No.</th>
                                <th class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">Name</th>
                                <th class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">Email Address</th>
                                <th class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">User Type</th>
                                <th class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">Status</th>
                                <th class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575] rounded-tr-lg">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 bg-white">
                            <template x-for="(user, index) in users" :key="index">
                                <tr :class="index % 2 == 0 ? 'bg-white' : 'bg-slate-50'" class="hover:bg-slate-200">
                                    <td class="whitespace-nowrap py-3 px-4 text-xs" x-text="index + 1"></td>
                                    <td class="whitespace-nowrap py-3 px-4">
                                        <div class="flex items-center">
                                            <img :src="user.profileImage" alt="Profile Image" class="h-8 w-8 rounded-full flex-shrink-0" />
                                            <div class="ml-2 text-xs font-normal text-primary-800" x-text="`${user.firstName} ${user.middleName ? user.middleName + ' ' : ''}${user.lastName}`"></div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-3 px-4 text-xs" x-text="user.email"></td>
                                    <td class="whitespace-nowrap py-3 px-4 text-xs" x-text="user.userType"></td>
                                    <td class="whitespace-nowrap py-3 px-4 text-xs font-medium">
                                        <div :class="user.status === 'Enabled' ? 'text-green-600 font-bold' : 'text-red-600 font-bold'" x-text="user.status"></div>
                                    </td>
                                    <td class="whitespace-nowrap py-3 px-4 flex space-x-4">
                                        <button class="flex items-center text-orange-500 hover:text-orange-600 font-medium text-xs transition active:scale-95 hover:bg-orange-50 hover:shadow py-1 px-3.5 rounded-md">
                                            <img src="{{ asset('storage/icons/edit-icon.png') }}" alt="Edit Icon" class="w-4 h-4 mr-2" />
                                            Edit
                                        </button>
                                        <button @click="viewUser(user)" class="flex items-center text-[#3251FF] hover:text-[#1d3fcc] font-medium text-xs transition active:scale-95 hover:bg-blue-50 hover:shadow py-1 px-3 rounded-md">
                                            <img src="{{ asset('storage/icons/view-icon.png') }}" alt="View Icon" class="w-5 h-5 mr-2" />
                                            View
                                        </button>
                                    </td>
                                </tr>
                            </template>
                            </tbody>
                        </table>

                        <!-- Mobile View -->
                        <div class="md:hidden">
                            <template x-for="(user, index) in users" :key="index">
                                <div class="mb-4 p-5 border border-gray-300 rounded-lg">
                                    <div class="flex items-center mb-2">
                                        <span class="text-xs font-bold text-[#757575] mr-2">No.:</span>
                                        <span x-text="index + 1" class="text-xs"></span>
                                    </div>
                                    <div class="flex items-center mb-4">
                                        <img :src="user.profileImage" alt="Profile Image" class="border border-green-600 h-8 w-8 rounded-full flex-shrink-0 mr-2" />
                                        <div class="text-sm font-medium text-primary-800" x-text="`${user.firstName} ${user.middleName ? user.middleName + ' ' : ''}${user.lastName}`"></div>
                                    </div>
                                    <div class="flex items-center mb-2 ml-5">
                                        <span class="text-xs font-bold text-[#757575] mr-2">Email:</span>
                                        <span x-text="user.email" class="text-xs"></span>
                                    </div>
                                    <div class="flex items-center mb-2 ml-5">
                                        <span class="text-xs font-bold text-[#757575] mr-2">User Type:</span>
                                        <span x-text="user.userType" class="text-xs"></span>
                                    </div>
                                    <div class="flex items-center mb-4 ml-5">
                                        <span class="text-xs font-bold text-[#757575] mr-2">Status:</span>
                                        <span :class="user.status === 'Enabled' ? 'text-green-600 font-bold' : 'text-red-600 font-bold'" x-text="user.status" class="text-xs"></span>
                                    </div>
                                    <div class="flex space-x-2 float-right -mt-4">
                                        <button class="flex items-center text-orange-500 hover:text-orange-600 font-medium text-xs transition active:scale-95 hover:bg-orange-100 hover:shadow py-1 px-3.5 rounded-md">
                                            <img src="{{ asset('storage/icons/edit-icon.png') }}" alt="Edit Icon" class="w-4 h-4 mr-2" />
                                            Edit
                                        </button>
                                        <button @click="viewUser(user)" class="flex items-center text-[#3251FF] hover:text-[#1d3fcc] font-medium text-xs transition active:scale-95 hover:bg-blue-100 hover:shadow py-1 px-3 rounded-md">
                                            <img src="{{ asset('storage/icons/view-icon.png') }}" alt="View Icon" class="w-5 h-5 mr-2" />
                                            View
                                        </button>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination Layout -->
            <div class="mt-4 px-6">
                <div class="flex flex-wrap items-center justify-between space-y-2 sm:space-y-0 sm:flex-nowrap">
                    <!-- Total Users -->
                    <div class="w-full sm:w-auto text-center sm:text-left text-xs text-gray-500 font-semibold">
                        Total Users: <span x-text="totalUsers"></span>
                    </div>

                    <!-- Pagination Controls -->
                    <div class="w-full sm:w-auto">
                        <nav aria-label="Page navigation" class="flex justify-center sm:justify-start items-center text-xs space-x-1">
                            <!-- First Page -->
                            <button
                                @click="goToPage(1)"
                                :disabled="currentPage === 1"
                                class="px-3 h-8 text-green-600 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 disabled:text-gray-300 disabled:hover:bg-white">
                                First
                            </button>
                            <!-- Previous Page -->
                            <button
                                @click="prevPage()"
                                :disabled="currentPage === 1"
                                class="px-3 h-8 text-green-600 bg-white border border-gray-300 hover:bg-gray-100 disabled:text-gray-300 disabled:hover:bg-white">
                                &lt; Prev
                            </button>
                            <!-- Page Numbers -->
                            <template x-for="page in pages" :key="page">
                                <button
                                    @click="goToPage(page)"
                                    :class="{'bg-green-100 text-green-600': page === currentPage, 'text-gray-500 hover:bg-gray-100': page !== currentPage}"
                                    class="px-3 h-8 border border-gray-300">
                                    <span x-text="page"></span>
                                </button>
                            </template>
                            <!-- Next Page -->
                            <button
                                @click="nextPage()"
                                :disabled="currentPage === totalPages"
                                class="px-3 h-8 text-green-600 bg-white border border-gray-300 hover:bg-gray-100 disabled:text-gray-300 disabled:hover:bg-white">
                                Next &gt;
                            </button>
                            <!-- Last Page -->
                            <button
                                @click="goToPage(totalPages)"
                                :disabled="currentPage === totalPages"
                                class="px-3 h-8 text-green-600 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 disabled:text-gray-300 disabled:hover:bg-white">
                                Last
                            </button>
                        </nav>
                    </div>

                    <!-- Page Information -->
                    <div class="w-full sm:w-auto text-center sm:text-right text-xs text-gray-500 font-semibold">
                        Page <span x-text="currentPage"></span> of <span x-text="totalPages"></span>
                    </div>
                </div>
            </div>

            <!-- View Staff Modal -->
            <div x-show="showViewModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                <div class="p-1 bg-[#3AA76F] border-gray-600 rounded-[12px] shadow-xl overflow-auto w-full max-w-xl max-h-lg">
                    <div class="bg-[#FBFBFB] rounded-[10px] relative">

                        <!-- Close Button -->
                        <button @click="showViewModal = false" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 focus:outline-none hover:bg-gray-200 hover:rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <!-- Modal Header -->
                        <div class="bg-gray-100 rounded-t-[8px] w-full text-[14px] px-4 py-3">
                            <div class="text-[#3AA76F] font-medium text-lg">View User Details</div>
                        </div>

                        <!--image bg-->
                        <div class="relative overflow-hidden shadow w-full h-[80px]">
                            <img src="{{ asset('storage/images/bg-profileName.png') }}" alt="profile name background"
                                 class="absolute top-0 left-0 w-full h-full object-cover animate-wipe-right">
                        </div>

                        <!-- Profile Section -->
                        <div class="flex items-center space-x-4 -mt-16 pl-6">
                            <!-- Profile Picture -->
                            <div class="relative h-24 w-24 flex-shrink-0">
                                <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image" class="h-24 w-24 rounded-full bg-gradient-to-r from-blue-500 to-green-500 p-[1px]" />
                            </div>
                            <!-- Name and Email -->
                            <div class="z-50 -mt-10">
                                <div class="text-2xl font-semibold text-[#4D4F50] ">
                                    <span x-text="`${selectedUser.firstName || ''} ${selectedUser.middleName || ''} ${selectedUser.lastName || ''}`.trim() || 'Full Name Preview'"></span>
                                </div>
                                <div class="text-sm text-gray-600">
                                    <span x-text="selectedUser.email || 'Email Preview'"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Body -->
                        <div class="px-6 pb-14 max-h-[270px] overflow-y-auto space-y-6 relative">
                            <!-- Tabs -->
                            <div class="flex space-x-2 border-b pb-2 sticky top-0 bg-white z-10 text-center items-center justify-between">
                                <button
                                    @click="activeTab = 'basic-info'; document.getElementById('basic-info').scrollIntoView({ behavior: 'smooth', block: 'end' }); "
                                    :class="activeTab === 'basic-info' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F] ' : 'text-gray-700'"
                                    class="px-2 py-2 font-medium text-[14px] ">
                                    Basic Information
                                </button>
                                <button
                                    @click="activeTab = 'access-control'; document.getElementById('access-control').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                                    :class="activeTab === 'access-control' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                                    class="px-2 py-2 font-medium text-[14px]">
                                    Access Control
                                </button>
                                <button
                                    @click="activeTab = 'account-settings'; document.getElementById('account-settings').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                                    :class="activeTab === 'account-settings' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                                    class="px-2 py-2 font-medium text-[14px]">
                                    Account Settings
                                </button>
                            </div>

                            <!-- Sections -->
                            <div id="basic-info" class="space-y-12">
                                <!-- Basic Information -->
                                <div>
                                    <h3 class="font-medium text-gray-700 border-b pb-2 text-xs">Basic Information</h3>
                                    <div class="mt-4 px-2 text-sm">
                                        <div class="grid grid-cols-2 gap-y-2">
                                            <span class="text-gray-600">First Name:</span>
                                            <span class="font-medium text-gray-800" x-text="selectedUser.firstName || 'N/A'"></span>

                                            <span class="text-gray-600">Middle Name:</span>
                                            <span class="font-medium text-gray-800" x-text="selectedUser.middleName || 'N/A'"></span>

                                            <span class="text-gray-600">Last Name:</span>
                                            <span class="font-medium text-gray-800" x-text="selectedUser.lastName || 'N/A'"></span>

                                            <span class="text-gray-600">Gender:</span>
                                            <span class="font-medium text-gray-800" x-text="selectedUser.gender || 'N/A'"></span>

                                            <span class="text-gray-600">Email:</span>
                                            <span class="font-medium text-gray-800" x-text="selectedUser.email || 'N/A'"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="access-control" class="space-y-12">
                                <!-- Access Control -->
                                <div>
                                    <h3 class="font-medium text-gray-700 border-b pb-2 text-xs">Access Control</h3>
                                    <div class="mt-4 px-2 text-sm">
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" x-bind:checked="selectedUser.permissions?.viewDashboard" disabled class="rounded" />
                                            <span class="text-gray-700">View Dashboard</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="account-settings" class="space-y-12">
                                <!-- Account Settings -->
                                <div class="text-sm">
                                    <h3 class="font-medium text-gray-700 border-b pb-2 text-xs">Account Settings</h3>
                                    <div class="mt-4 px-2 text-sm">
                                        <div class="grid grid-cols-2 gap-y-2">
                                            <span class="text-gray-600">Account Status:</span>
                                            <span
                                                class="font-semibold"
                                                :class="selectedUser.status === 'Enabled' ? 'text-green-600' : 'text-red-600'"
                                                x-text="selectedUser.status">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin.admin-navigation>
</x-app-layout>
