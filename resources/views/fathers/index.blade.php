@extends('layouts.app')
@section('content')

    <div class="card-body table-responsive-sm p-4">
        <table class="table table-hover table-light">
            <tr>
                <th>Name</th>
                <th>Amount</th>
                <th>Confirmed</th>
                <th>Description</th>
            </tr>
            @foreach ($fathers as $father)
                <tr>
                    <td>{{ $father->name }}</td>
                    <td>{{ $father->amount }}</td>
                    <td>@if ($father->confirmed ==1)
                        yes
                    @else
                        no
                    @endif</td>
                    <td>{!! $father->description !!}</td>
                    <td>
                        <form action="{{ route('father.destroy', $father->id) }}" method="POST">
                            <a href="{{ route('father.edit', $father->id) }}" class="btn btn-info">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('father.create') }}" class="btn btn-dark">Add</a>
        </div>
    </div>
@endsection
