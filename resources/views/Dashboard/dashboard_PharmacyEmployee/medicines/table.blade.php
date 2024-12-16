<div class="table-responsive">
    <table class="table text-md-nowrap" id="example2">
        <thead>
            <tr>
                <th class="wd-15p border-bottom-0">#</th>
                <th class="wd-20p border-bottom-0">Medicine Name</th>
                <th class="wd-15p border-bottom-0">Section Name</th>
                <th class="wd-15p border-bottom-0">Price</th>
                <th class="wd-15p border-bottom-0">Stock</th>
                <th class="wd-15p border-bottom-0">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($medicines as $medicine)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $medicine->name }}</td>
                    <td>{{ $medicine->section->name }}</td>
                    <td>{{ number_format($medicine->price, 2) }}</td>
                    <td>
                        <span
                            @if ($medicine->stock === 0)
                                style="background-color: red; color: white; padding: 5px; border-radius: 3px;"
                            @elseif ($medicine->stock < 3)
                                style="background-color: yellow; color: black; padding: 5px; border-radius: 3px;"
                            @endif
                        >
                            {{ $medicine->stock === 0 ? 'Out of Stock' : $medicine->stock }}
                        </span>
                    </td>
                    <td>
                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                           data-toggle="modal" href="#editMedicine{{ $medicine->id }}">
                            <i class="las la-pen"></i>
                        </a>
                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                           data-toggle="modal" href="#deleteMedicine{{ $medicine->id }}">
                            <i class="las la-trash"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Hardluck But There is No Medicines Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
