@extends('layouts.app')
@section('content')

<div class="card-body table-responsive-sm">
    <table class="table table-hover table-light">
            <tr>
                <th>Vardas</th>
            </tr>
            @foreach ($strangers as $stranger)
                <tr>
                    <td>{{ $stranger->name }}</td>
                    <td>
                        <form action="{{ route('stranger.destroy', $stranger->id) }}" method="POST">
                            <a href="{{ route('stranger.edit', $stranger->id) }}" class="btn btn-info">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('stranger.create') }}" class="btn btn-dark">Add</a>
        </div>
    </div>
@endsection
