<div class="w-100">
    <div class="w-100">
        <div class="form-group p-0 mb-4 col-lg-6 col-md-6 col-sm-12">
            <input class="form-control" type="text" wire:model="search"
                   placeholder="Search for Members based on either name"
                   title="Use this to search through your dataset">
        </div>
    </div>

    <section class="bg-white shade w-100 p-0">
        <table class="table table-hover table-responsive-sm table-responsive-lg table-responsive-md">
            <thead>
            <tr>
                <th class="px-lg-4 text-truncate" scope="col">Name</th>
                <th class="px-lg-4 text-truncate" scope="col">Department</th>
                <th class="px-lg-4 text-truncate" scope="col" colspan="2">Phone Number</th>
            </tr>
            </thead>

            <tbody>
            @forelse($members as $member)
                <tr wire:loading.class.delay="text-muted disabled">
                    <td class="p-0 text-truncate">
                        <a href="{{ route('execs.members.show', $member) }}"
                           class="d-flex text-decoration-none">
                            {{ $member->firstname . " " . $member->lastname }}
                        </a>
                    </td>
                    <td class="p-0 text-truncate">
                        <a href="{{ route('execs.members.show', $member) }}"
                           class="d-flex text-decoration-none">
                            {{ $member->department }}
                        </a>
                    </td>
                    <td class="p-0 text-truncate">
                        <a href="{{ route('execs.members.show', $member) }}"
                           class="d-flex text-decoration-none">
                            {{ $member->phonenumber }}
                        </a>
                    </td>
                    <td class="p-0 align-middle">
                        <a href="{{ route('execs.members.show', $member) }}"
                           class="d-flex text-decoration-none">
                            <i class="icofont-rounded-right"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center font-weight-bold text-muted">
                        {{ __("No results found") }}
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </section>

    <div class="paginator float-lg-right mt-4">
        {{ $members->links() }}
    </div>
</div>
