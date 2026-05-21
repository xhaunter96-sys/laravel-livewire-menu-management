<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Admin Dashboard')]
#[Layout('layouts.app')]
class AdminDashboard extends Component
{
    public function render(): View
    {
        return view('livewire.admin.admin-dashboard', [
            'title' => 'Admin Dashboard',
        ]);
    }
}
