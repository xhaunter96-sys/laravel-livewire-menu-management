<?php

namespace App\Livewire\Core;

use Livewire\Attributes\Layout;
use App\Models\Menu;
use App\Models\Submenu;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\WithPagination;


#[Layout('layouts.app')]
#[Title('Submenu Management')]
class Submenus extends Component
{
    /** @var Collection<int, Submenu> */
    public Collection $submenus;

    /** @var Collection<int, Menu> */
    public Collection $menus;

    public string $name      = '';
    public string $slug      = '';
    public string $url       = '';
    public string $icon      = '';
    public ?int $menuId      = null;
    public ?int $submenuId   = null;
    public bool $activeStatus = true;
    public bool $isOpen       = false;

    public function mount(): void
    {
        $this->menus    = Menu::orderBy('name')->get();
        $this->submenus = Submenu::with('menu')->latest()->get();
    }
    public function render(): View
    {
        return view('livewire.core.submenus');
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
        $this->name       = '';
        $this->slug       = '';
        $this->url        = '';
        $this->icon       = '';
        $this->menuId     = null;
        $this->submenuId  = null;
        $this->activeStatus = true;
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
            'slug'         => 'required|string|max:255|unique:submenus,slug,' . $this->submenuId,
            'url'          => 'required|string|max:255',
            'icon'         => 'nullable|string|max:100',
            'menuId'       => 'required|exists:menus,id',
            'activeStatus' => 'boolean',
        ]);

        Submenu::updateOrCreate(
            ['id' => $this->submenuId],
            [
                'name'          => $this->name,
                'slug'          => $this->slug,
                'url'           => $this->url,
                'icon'          => $this->icon,
                'menu_id'       => $this->menuId,
                'active_status' => $this->activeStatus,
                'user_id'       => 1,
            ]
        );

        session()->flash('message', $this->submenuId ? 'Submenu berhasil diupdate.' : 'Submenu berhasil ditambahkan.');
        $this->closeModal();
    }

    public function edit(string $slug): void
    {
        $submenu            = Submenu::where('slug', $slug)->firstOrFail();
        $this->submenuId    = $submenu->id;
        $this->name         = $submenu->name;
        $this->slug         = $submenu->slug;
        $this->url          = $submenu->url;
        $this->icon         = $submenu->icon ?? '';
        $this->menuId       = $submenu->menu_id;
        $this->activeStatus = $submenu->active_status;
        $this->isOpen       = true;
    }

    public function delete(string $slug): void
    {
        Submenu::where('slug', $slug)->firstOrFail()->delete();
        session()->flash('message', 'Submenu berhasil dihapus.');
    }
}
