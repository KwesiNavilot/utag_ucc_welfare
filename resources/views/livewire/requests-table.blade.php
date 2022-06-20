<div class="w-100">
    <div class="w-100 mb-4 d-lg-flex d-md-block">
        <div class="d-flex form-group p-0 col-lg-5 col-md-9 col-sm-12 mr-lg-4">
            <label class="col-3 p-0">Filter Status</label>
            <select style="height: 45px" class="form-control" title="Filter requests" wire:model="filterStatus">
                <option value="" selected>None</option>
                <option value="Approved">Approved</option>
                <option value="Pending">Pending</option>
            </select>
        </div>

        <div class="d-flex form-group p-0 col-lg-5 col-md-9 col-sm-12">
            <label class="col-3 p-0">Filter Type</label>
            <select style="height: 45px" class="form-control" title="Filter requests" wire:model="filterType">
                <option value="" selected>None</option>
                <option value="Child Birth">Childbirth</option>
                <option value="Death of Spouse">Death of Spouse</option>
                <option value="Death of Parent">Death of Parent</option>
                <option value="Death of Member">Death of Member</option>
                <option value="Retirement">Retirement</option>
            </select>
        </div>
    </div>

    <section class="bg-white shade w-100 p-0">
        <table class="table table-hover table-responsive-sm table-responsive-lg table-responsive-md">
            <thead>
            <tr class="rqs-table">
                <th class="px-lg-4 text-truncate" scope="col">Request Type</th>
                <th class="px-lg-4 text-truncate" scope="col">Requested By</th>
                <th class="px-lg-4" scope="col">Status</th>
                <th class="px-lg-4 text-truncate" scope="col" colspan="2">Request Date</th>
            </tr>
            </thead>

            <tbody>
            @forelse($requests as $request)
                <tr wire:loading.class.delay="text-muted">
                    <td class="p-0 text-truncate">
                        <a href="{{ route('execs.requests.show', $request) }}"
                           class="d-flex text-decoration-none">
                            {{ $request->request_type }}
                        </a>
                    </td>
                    <td class="p-0 text-truncate">
                        <a href="{{ route('execs.requests.show', $request) }}"
                           class="d-flex text-decoration-none">
                            {{ $request->user->firstname . " " . $request->user->lastname }}
                        </a>
                    </td>
                    <td class="p-0">
                        <a href="{{ route('execs.requests.show', $request) }}"
                           class="d-flex text-decoration-none badge badge-pill @if($request->status == "Approved")badge-success @else badge-danger @endif">
                            {{ $request->status }}
                        </a>
                    </td>
                    <td class="p-0 text-truncate">
                        <a href="{{ route('execs.requests.show', $request) }}"
                           class="d-flex text-decoration-none">
                            {{ $request->created_at->format('jS F, Y') }}
                        </a>
                    </td>
                    <td class="p-0 align-middle">
                        <a href="{{ route('execs.requests.show', $request) }}"
                           class="d-flex text-decoration-none">
                            <i class="icofont-rounded-right"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center font-weight-bold text-muted">
                        {{ __("No results found") }}
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </section>

    <div class="paginator float-lg-right mt-2">
        {{ $requests->links() }}
    </div>
</div>
