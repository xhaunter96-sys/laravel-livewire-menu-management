<?php

namespace App\Livewire\Core;

use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Menu;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Menu Management')]
class Menus extends Component
{
    use WithPagination;

    public string $name         = '';
    public string $slug         = '';
    public ?int   $menuId       = null;
    public bool   $activeStatus = true;
    public bool   $isOpen       = false;

    // Reset pagination saat modal dibuka/tutup
    public function updatedIsOpen(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.core.menus', [
            'title' => 'Menu Management',
            'menus' => Menu::latest()->paginate(10),
        ]);
    }

    public function openModal(): void
    {
        $this->resetFields();
        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
        $this->resetFields();
    }

    private function resetFields(): void
    {
        $this->name         = '';
        $this->slug         = '';
        $this->activeStatus = true;
        $this->menuId       = null;
        $this->resetErrorBag();
    }

    public function updatedName(string $value): void
    {
        $this->slug = Str::slug($value);
    }

    public function store(): void
    {
        $this->validate([
            'name'         => 'required|string|max:255',
            'slug'         => 'required|string|max:255|unique:menus,slug,' . $this->menuId,
            'activeStatus' => 'boolean',
        ]);

        Menu::updateOrCreate(
            ['id' => $this->menuId],
            [
                'name'          => $this->name,
                'slug'          => $this->slug,
                'user_id'       => auth()->id() ?? 1,
                'active_status' => $this->activeStatus,
            ]
        );

        session()->flash('message', $this->menuId ? 'Menu berhasil diupdate.' : 'Menu berhasil ditambahkan.');

        $this->closeModal();
    }

    public function edit(string $slug): void
    {
        $menu = Menu::where('slug', $slug)->firstOrFail();

        $this->menuId       = $menu->id;
        $this->name         = $menu->name;
        $this->slug         = $menu->slug;
        $this->activeStatus = $menu->active_status;
        $this->isOpen       = true;
    }

    public function delete(string $slug): void
    {
        Menu::where('slug', $slug)->firstOrFail()->delete();

        session()->flash('message', 'Menu berhasil dihapus.');
    }
}
