<?php

namespace App\Livewire\Modals\Admin\StaffRolesModal;

use App\Enums\Staff\StaffRoleStatus;
use App\Models\AdminLog;
use App\Models\StaffPermission;
use App\Models\StaffRole;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EditStaffRoleModal extends Component
{
    public string $identifier = ''; // Unique identifier for the modal
    public ?StaffRole $staffRole = null; // The staff role being edited

    public string $name = ''; // staff role name
    public bool $status = false; // staff role status
    public array $selectedPermissions = []; // Selected permissions IDs
    public Collection $staff_permissions; // All available permissions
    public bool $selectAllPermissions = false; // Track if "Select All" checkbox is checked

    /**
     * Initialize the component with the given StaffRole.
     */
    public function mount(): void
    {
        $this->identifier = uniqid('edit_staff_role_modal');
        $this->staff_permissions = StaffPermission::all()->pluck('label', 'id') ?? collect();
    }

    /**
     * Show the modal and load the staff role's data.
     */
    #[On('show-edit-staff-role-modal')]
    public function showModal(StaffRole $staffRole): void
    {
        // Bind the staff role object to the component's properties
        $this->staffRole = $staffRole;
        $this->name = $staffRole->name; // Set the name property
        $this->status = $staffRole->status === StaffRoleStatus::ENABLED;
//        $this->selectedPermissions = $staffRole->permissions->pluck('id')->toArray();

        // If there are existing selected permissions (when editing), make sure they persist
        if ($this->staffRole) {
            $this->selectedPermissions = $this->staffRole->permissions->pluck('id')->toArray();
        }

        // Update the 'selectAllPermissions' state based on existing selected permissions
        $this->selectAllPermissions = count($this->selectedPermissions) === $this->staff_permissions->count();

        // Dispatch events to show the modal
        $this->dispatch('show-' . $this->identifier);
        $this->dispatch('edit-staff-role-modal-shown', $this->staffRole);
    }


    /**
     * Handle the "Select All" checkbox change.
     */
    public function toggleSelectAllPermissions(): void
    {
        if ($this->selectAllPermissions) {
            // If "Select All" is checked, select all permissions
            $this->selectedPermissions = $this->staff_permissions->keys()->toArray();
        } else {
            // If "Select All" is unchecked, deselect all permissions
            $this->selectedPermissions = [];
        }
    }

    public function togglePermissions(): void
    {
        // Check if all permissions are selected
        if (count($this->selectedPermissions) !== $this->staff_permissions->count()) {
            // If not all permissions are selected, uncheck "Select All"
            $this->selectAllPermissions = false;
        } else {
            // If all permissions are selected, check "Select All"
            $this->selectAllPermissions = true;
        }
    }


    public function updatedSelectedPermissions(): void
    {
        // Check if all permissions are selected
        $this->selectAllPermissions = count($this->selectedPermissions) === $this->staff_permissions->count();
    }

    /**
     * Validation rules for form inputs.
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2', // Minimum length for the word
                'max:255',
                'unique:staff_roles,name,' . ($this->staffRole->id ?? 'NULL'),
                'regex:/^[a-zA-Z\s]+$/',  // Ensure only letters and spaces
                function ($attribute, $value, $fail) {
                    // Split the name into words
                    $words = explode(' ', $value);
                    foreach ($words as $word) {
                        // Check if each word is a valid word (using a dictionary)
                        if (!$this->isValidWord($word)) {
                            return $fail('The word "' . $word . '" is not a valid word.');
                        }
                    }
                },
            ],
            'status' => ['required', 'boolean'],
            'selectedPermissions' => ['array', 'min:1'],
            'selectedPermissions.*' => ['exists:staff_permissions,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The staff role name is required.',
            'name.unique' => 'This staff role name already exists.',
            'name.regex' => 'The staff role name must contain only letters and spaces.',
            'selectedPermissions.required' => 'At least one staff permission must be selected.',
            'selectedPermissions.*.exists' => 'One or more permissions are invalid.',
        ];
    }

    /**
     * Check if the given word is valid.
     *
     * @param string $word
     * @return bool
     */
    protected function isValidWord(string $word): bool
    {
        // Get words from the dictionary file (for example, words.txt)
        $dictionary = File::get(resource_path('words.txt')); // Adjust path as needed
        $validWords = explode("\n", $dictionary); // Convert file content into an array of words

        // Check if the word exists in the dictionary
        return in_array(strtolower($word), $validWords);
    }

    /**
     * Clear the form inputs.
     */
    public function clear(): void
    {
        $this->reset([
            'name',
            'status',
            'selectedPermissions',
            'selectAllPermissions',
        ]);
    }

    /**
     * Save the updated staff role data.
     */
    public function save(): void
    {
        $this->validate();

        // Check for changes
        $originalName = $this->staffRole->name;
        $originalStatus = $this->staffRole->status;
        $originalPermissions = $this->staffRole->permissions->pluck('id')->sort()->values()->toArray();
        $newPermissions = collect($this->selectedPermissions)->sort()->values()->toArray();

        $hasChanges = $originalName !== $this->name
            || $originalStatus !== ($this->status ? StaffRoleStatus::ENABLED : StaffRoleStatus::DISABLED)
            || $originalPermissions !== $newPermissions;

        if (!$hasChanges) {
            $this->dispatch('modal-close'); // Close the modal
            session()->flash('feedback', 'No changes detected.');
            session()->flash('feedback_type', 'info');
            return;
        }

        try {
            // Update staff role properties
            $this->staffRole->name = $this->name;
            $this->staffRole->status = $this->status ? StaffRoleStatus::ENABLED : StaffRoleStatus::DISABLED;
            $this->staffRole->save();

            // Sync permissions
            $this->staffRole->permissions()->sync($this->selectedPermissions);

            // Log the update
            AdminLog::create([
                'admin_id' => auth()->id(),
                'action' => "Updated staff role: {$this->staffRole->name}",
                'dateTime' => now(),
                'user_id' => auth()->id(),
            ]);

            $this->dispatch('modal-close'); // Close the modal before feedback
            session()->flash('feedback', 'Staff Role updated successfully!');
            session()->flash('feedback_type', 'success');

        } catch (\Exception $e) {
            AdminLog::create([
                'admin_id' => auth()->id(),
                'action' => "Failed to update staff role: {$this->staffRole->name}. Error: {$e->getMessage()}",
                'dateTime' => now(),
                'user_id' => auth()->id(),
            ]);

            session()->flash('feedback', 'There was an issue updating the Staff Role.');
            session()->flash('feedback_type', 'error');
        }

        $this->dispatch('staff-role-updated'); // Refresh parent component if needed
    }



    /**
     * Render the Livewire component.
     */
    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        return view('livewire.modals.admin.staff-roles-modal.edit-staff-role-modal');
    }
}
