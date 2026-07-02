<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Aside extends Component
{
    /**
     * Create a new component instance.
     */
    public $routes;
    public function __construct()
    {
        $this->routes = [];

        // Dashboard
        $this->routes[] = [
            "label" => "Dashboard",
            "icon" => "fas fa-laptop",
            "route_name" => "dashboard",
            "route_active" => "dashboard",
            "is_dropdown" => false,
        ];

        $this->routes[] = [
            "label" => "Data Users",
            "icon" => "fas fa-users",
            "route_name" => "users.index",
            "route_active" => "users.*",
            "is_dropdown" => false,
        ];

        $this->routes[] = [
            "label" => "Kegiatan",
            "icon" => "fas fa-calendar-check",
            "route_name" => "kegiatan.index",
            "route_active" => "kegiatan.*",
            "is_dropdown" => false,
        ];

        $this->routes[] = [
            "label" => "Artikel",
            "icon" => "fas fa-newspaper",
            "route_name" => "artikel.index",
            "route_active" => "artikel.*",
            "is_dropdown" => false,
        ];

        $this->routes[] = [
            "label" => "Proker",
            "icon" => "fas fa-tasks",
            "route_name" => "proker.index",
            "route_active" => "proker.*",
            "is_dropdown" => false,
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.aside');
    }
}
