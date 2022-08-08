<?php

namespace App\Http\Livewire\AdminDashboard;

use Livewire\Component;

class AdminDashboardLivewire extends Component
{
    public function render()
    {
        return view('livewire.admin-dashboard.admin-dashboard-livewire')->extends('layouts.materialize.blank');
    }
}
