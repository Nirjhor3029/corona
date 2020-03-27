<div class="table-responsive">
    <table class="table" id="suppliers_table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Priority</th>
                <th>Capacity</th>
                <th>User</th>
                <th>Service Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->priority }}</td>
                <td>{{ $supplier->capacity }}</td>
                <td>{{ $supplier->user->name }}</td>
                <td>{{ $supplier->service_type->service_name }}</td>
                <td>
                    {!! Form::open(['route' => ['suppliers.destroy', $supplier->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{-- <a href="{{ route('suppliers.show', [$supplier->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                        <a href="{{ route('suppliers.edit', [$supplier->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
