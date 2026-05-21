<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * @var array<string, string>
     */
    protected array $rules = [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ];

    /**
     * @var array<string, string>
     */
    protected array $messages = [
        'name.required' => 'Name is required.',
        'name.min' => 'Name must be at least 3 characters.',

        'email.required' => 'Email is required.',
        'email.email' => 'Invalid email format.',
        'email.unique' => 'This email is already registered.',

        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 8 characters.',
        'password.confirmed' => 'Password confirmation does not match.',
    ];

    public function register(): void
    {
        $this->validate();

        User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash(
            'success',
            'Registration successful. Please login.'
        );

        $this->redirect(
            route('login'),
            navigate: true
        );
    }

    public function render(): View
    {
        return view('livewire.auth.register');
    }
}
