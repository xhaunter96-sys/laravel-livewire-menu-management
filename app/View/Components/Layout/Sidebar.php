<?php

namespace App\View\Components\Layout;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class Sidebar extends Component
{
    /** @var Collection<int, Menu> $menus */
    public Collection $menus;

    public function __construct()
    {
        $this->menus = Menu::where('active_status', true)
            ->with(['submenus' => function ($query) {
                $query->where('active_status', true)->orderBy('name');
            }])
            ->orderBy('name')
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.layout.sidebar');
    }
}
