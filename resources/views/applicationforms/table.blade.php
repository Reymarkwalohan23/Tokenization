<div class="table-responsive">
    <table class="table" id="applicationforms-table">
        <thead>
            <tr>
                <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>Department</th>
        <th>Phone</th>
        <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($applicationforms as $applicationform)
            <tr>
                <td>{{ $applicationform->firstname }}</td>
            <td>{{ $applicationform->lastname }}</td>
            <td>{{ $applicationform->age }}</td>
            <td>{{ $applicationform->department }}</td>
            <td>{{ $applicationform->phone }}</td>
            <td>{{ $applicationform->email }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['applicationforms.destroy', $applicationform->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('applicationforms.show', [$applicationform->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('applicationforms.edit', [$applicationform->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
