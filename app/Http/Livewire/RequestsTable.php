<?php

namespace App\Http\Livewire;

use App\Models\BenefitRequest;
use Livewire\Component;
use Livewire\WithPagination;

class RequestsTable extends Component
{
    use WithPagination;

    public $filterStatus = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        //dd(BenefitRequest::search(['request_type', 'status'], $this->search)->get());
        return view('livewire.requests-table', [
            'requests' => BenefitRequest::all()
                            ->when($this->filterStatus, function($query) {
                                return $query->where('status', $this->filterStatus);
                            })->paginate(25)
        ]);
    }
}
