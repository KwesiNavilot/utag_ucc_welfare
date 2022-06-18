<?php

namespace App\Http\Livewire;

use App\Models\BenefitRequest;
use Livewire\Component;
use Livewire\WithPagination;

class RequestsTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
//        dd(BenefitRequest::all()->paginate(25));
        return view('livewire.requests-table', [
            'requests' => BenefitRequest::all()->paginate(25)
        ]);
    }
}
