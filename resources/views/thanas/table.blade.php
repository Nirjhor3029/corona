<div class="table-responsive">
    <table class="table" id="thanas-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>District Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($thanas as $thana)
            <tr>
                <td>{{ $thana->name }}</td>
            <td>{{ $thana->district_id }}</td>
                <td>
                    {!! Form::open(['route' => ['thanas.destroy', $thana->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('thanas.show', [$thana->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('thanas.edit', [$thana->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
