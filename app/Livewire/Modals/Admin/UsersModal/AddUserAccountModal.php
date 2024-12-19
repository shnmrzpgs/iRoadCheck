<?php
//
//namespace App\Livewire\Modals\Admin\UsersModal;
//
//use App\Livewire\Forms\AddUserAccountForm;
//use App\Models\User;
//use App\Models\UserRole;
//use Illuminate\Contracts\View\Factory;
//use Illuminate\Contracts\View\View;
//use Illuminate\Foundation\Application;
//use Illuminate\Support\Collection;
//use Illuminate\Support\Facades\Hash;
//use Livewire\Component;
//
//class AddUserAccountModal extends Component
//{
//
//    public string $identifier = '';
//
//    public Collection $user_types;
//
//    public AddUserAccountForm $form;
//
//    public ?User $user = null;
//
//    public bool $clearing_user = true;
//
//
//    public function render(): Application|Factory|View
//    {
//        return view('livewire.modals.admin.users-modal.add-user-modal', [
////            'userTypePermissions' => $this->userTypePermissions,
//        ]);
//    }
//}


namespace App\Livewire\Modals\Admin\UsersModal;

use App\Enums\User\UserGender;
use App\Enums\User\UserStatus;
use App\Livewire\Forms\AddUserAccountForm;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Component;

class AddUserAccountModal extends Component
{
    public string $identifier = '';

    public Collection $genders;

    public AddUserAccountForm $form;

    public Collection $user_status;

    public function mount(): void
    {
        $this->identifier = uniqid('add_admin_account_modal');
        $this->genders = collect([
            (object)[
                'id' => UserGender::MALE,
                'value' => UserGender::MALE,
            ],
            (object)[
                'id' => UserGender::FEMALE,
                'value' => UserGender::FEMALE,
            ],
            (object)[
                'id' => UserGender::OTHER,
                'value' => UserGender::OTHER,
            ],
        ]);

        $this->user_status = collect([
            (object)[
                'id' => UserStatus::ACTIVE,
                'value' => 'Active',
            ],
            (object)[
                'id' => UserStatus::INACTIVE,
                'value' => 'Inactive',
            ],
        ]);
    }

    public function save(): void
    {
        $form_saved = $this->form->save();

        if ($form_saved) {
            $this->form->clear();
            $this->dispatch($this->identifier . 'gender_force_clear');
            $this->dispatch('user_account_added');
            UserLog::create([
                'action' => 'user added',
                'description' => 'user admin',
                'date' => now(),
                'user_id' => auth()->id()
            ]);
        } else {
            $this->dispatch('user_account_not_added');
        }
    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        return view('livewire.modals.admin.admin-accounts-modal.add-admin-account-modal');
    }
}

