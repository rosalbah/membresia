<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Empleo;

use Livewire\WithPagination;

class EmpleosIndex extends Component
{

    use WithPagination;

    public $search;
    
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $empleos = Empleo::where('user_id', auth()->user()->id)
                        ->where('name', 'LIKE', '%' . $this->search . '%')
                        ->latest('id')
                        ->paginate();

        return view('livewire.admin.empleos-index', compact('empleos'));
    }
}
