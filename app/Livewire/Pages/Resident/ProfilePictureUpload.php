<?php

namespace App\Livewire\Pages\Resident;

use App\Models\StaffLog;
use App\Models\UserProfilePhoto;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;


class ProfilePictureUpload extends Component
{
    use WithFileUploads;

    public $profilePicture;
    public $currentProfilePicture;

    public function mount(): void
    {
        // Load the current user's profile picture path
        $temp_photo = UserProfilePhoto::query()
            ->where('user_id', Auth::user()->id)
            ->latest() // Orders by the `created_at` column in descending order.
            ->first(); // Gets the most recent record.

        // Check if a photo exists and set the property
        $this->currentProfilePicture = $temp_photo?->photo_path;
    }

    public function updatedProfilePicture(): void
    {
        try {
            // Validate the uploaded image (image file and max 1MB size)
            $this->validate([
                'profilePicture' => 'image|max:1024', // Max file size: 1MB
            ]);

            $user = Auth::user(); // Get the authenticated user
            $hasCurrentProfilePicture = !empty($this->currentProfilePicture);

            // Check if the uploaded file is valid
            if (!$this->profilePicture || !$this->profilePicture->isValid()) {
                $this->setFeedback('Invalid file type or size. Please upload a valid image (Max: 1MB).', 'error');
                return;
            }

            // Check if the uploaded photo is the same as the current one
            if ($hasCurrentProfilePicture && $this->isSamePhoto()) {
                $this->setFeedback('No changes were made to your profile photo.', 'info');
                return; // Do not proceed with saving the same photo
            }

            // Proceed with updating the profile photo if the photo is different
            $this->updateProfilePhoto($user);
            $this->setFeedback('Your profile photo was updated successfully!', 'success');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->setFeedback('Invalid file type or size. Please upload a valid image (Max: 1MB).', 'error');
        } catch (\Exception $e) {
            $this->setFeedback('An error occurred while updating your profile photo. Please try again.', 'error');
            Log::error('Profile photo upload error:', ['error' => $e->getMessage()]);
        } finally {
            // Clear the temporary uploaded file to reset
            $this->profilePicture = null;
        }
    }

    /**
     * Set the feedback message and feedback type in session.
     *
     * @param string $message
     * @param string $type
     * @return void
     */
    private function setFeedback(string $message, string $type): void
    {
        session()->flash('feedback', $message);
        session()->flash('feedback_type', $type);
    }

    /**
     * Check if the uploaded photo is the same as the current profile photo.
     *
     * @return bool
     */
    private function isSamePhoto(): bool
    {
        // Get the uploaded file's content hash
        $uploadedFileHash = hash_file('sha256', $this->profilePicture->getRealPath());

        // If there's a current profile picture, get its stored file path
        if ($this->currentProfilePicture) {
            // Get the stored file path of the current profile picture
            $currentFilePath = storage_path('app/public/' . $this->currentProfilePicture);

            // Compare the hashes of the uploaded file and the existing file
            if (file_exists($currentFilePath)) {
                $currentFileHash = hash_file('sha256', $currentFilePath);

                // Return true if the hashes match (same content), otherwise false
                return $uploadedFileHash === $currentFileHash;
            }
        }

        return false; // Return false if the current profile picture does not exist
    }


    /**
     * Update the profile photo in the database and storage.
     *
     * @param $user
     * @return void
     */
    private function updateProfilePhoto($user): void
    {
        // Store the new profile picture
        $path = $this->profilePicture->store('profile_pictures', 'public');

        // If there's an existing profile photo, delete the old record and image
        if ($this->currentProfilePicture) {
            // Delete the old profile photo record from the database
            UserProfilePhoto::where('user_id', $user->id)
                ->where('photo_path', $this->currentProfilePicture)
                ->first()
                ->delete();

            // Remove the old profile picture from storage
            Storage::disk('public')->delete($this->currentProfilePicture);
        }

        // Create a new profile photo record in the database
        $user->profilePhoto()->create(['photo_path' => $path]);

        // Update the user's profile photo path in the user table
        $user->update(['profile_photo_path' => $path]);

        // Update the Livewire property for the current profile picture
        $this->currentProfilePicture = $path;

        // Log the admin action for auditing purposes
        StaffLog::create([
            'staff_id' => $user->id,
            'action' => 'Profile photo updated successfully.',
            'dateTime' => now(),
            'user_id' => $user->id,
        ]);
    }

    public function removeProfilePicture(): void
    {
        $user = Auth::user();

        if ($user && $this->currentProfilePicture) {
            // Remove the profile picture from storage
            Storage::disk('public')->delete($this->currentProfilePicture);

            // Remove the associated record in the UserProfilePhoto table
            $userProfilePhoto = UserProfilePhoto::where('user_id', $user->id)->where('photo_path', $this->currentProfilePicture)->first();

            if ($userProfilePhoto) {
                $userProfilePhoto->delete(); // Delete the record from the database
            }

            // Update the user's profile photo path to null
            $user->update(['profile_photo_path' => null]);

            // Reset the Livewire property
            $this->currentProfilePicture = null;

            // Log the update action for auditing purposes
            StaffLog::create([
                'staff_id' => $user->id,
                'action' => 'Profile photo removed successfully.',
                'dateTime' => now(),
                'user_id' => $user->id,
            ]);

            // Provide feedback to the user
            session()->flash('feedback', 'Profile photo removed successfully!');
            session()->flash('feedback_type', 'success');
        } else {
            session()->flash('feedback', 'No profile picture to remove.');
            session()->flash('feedback_type', 'error');
        }
    }

    public function render()
    {
        return view('livewire.pages.resident.profile-picture-upload');
    }
}
