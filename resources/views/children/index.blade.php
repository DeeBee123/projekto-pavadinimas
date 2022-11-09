@extends('layouts.app') @section('content')

<div class="card-body table-responsive-sm p-4">
    <table class="table table-hover table-light">
        <tr>
            <th>Name</th>
            <th>Father</th>
        </tr>
        @foreach ($children as $child)
        <tr>
            <td>{{ $child->name }}</td>
            @if($child->count())
            <td><img src="{{asset('images/'. $child->url)}}" /></td>
            @endif
            <td>{{ $child->father->name }}</td>
            <td>
                <form
                    action="{{ route('child.destroy', $child->id) }}"
                    method="POST"
                >
                    <a
                        href="{{ route('child.edit', $child->id) }}"
                        class="btn btn-info"
                        >Edit</a
                    >
                    @csrf @method('delete')
                    <input
                        type="submit"
                        class="btn btn-danger"
                        value="Delete"
                    />
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('child.create') }}" class="btn btn-dark">Add</a>
    </div>
</div>
@endsection
