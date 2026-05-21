<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Login extends Component
{
    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    /**
     * @var array<string, string>
     */
    protected array $rules = [
        'email'    => 'required|email',
        'password' => 'required|min:6',
    ];

    /**
     * @var array<string, string>
     */
    protected array $messages = [
        'email.required'    => 'Email wajib diisi.',
        'email.email'       => 'Format email tidak valid.',
        'password.required' => 'Password wajib diisi.',
        'password.min'      => 'Password minimal 6 karakter.',
    ];

    public function login(): void
    {
        $this->validate();

        if (! Auth::attempt([
            'email'    => $this->email,
            'password' => $this->password,
        ], $this->remember)) {
            $this->addError('email', 'Email atau password salah.');

            return;
        }

        session()->regenerate();

        $this->redirect(
            route('dashboard'),
            // navigate: true
        );
    }

    public function render(): View
    {
        return view('livewire.auth.login');
    }
}
