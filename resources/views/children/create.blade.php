@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{route('child.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>Photo:</label>
                            <input type="file" name="url" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Father:</label>
                            <select name="father_id" id="">
                                @foreach ($fathers as $father)
                                <option value={{$father->id}}>{{$father->name}}</option>
                            @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-dark">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
