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
                            ->search('firstname', $this->search)
                            ->orderBy('lastname')
                            ->get()->paginate(25)
        ]);
    }
}
