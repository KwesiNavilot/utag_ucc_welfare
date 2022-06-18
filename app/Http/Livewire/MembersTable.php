<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MembersTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.members-table', [
            'members' => User::addSelect(['department' => Department::select('name')
                            ->whereColumn('short', 'users.department')])
                            ->orderBy('created_at', 'DESC')
                            ->search(['name', 'department.name'], $this->search)
                            ->get()->paginate(25)
        ]);
    }
}
