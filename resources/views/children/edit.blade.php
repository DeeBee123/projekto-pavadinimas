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

                        <form action="{{route('child.update', $child->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf @method('put')

                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$child->name}}">
                        </div>
                        <div class="form-group">
                        @if($child->url)
                        <div class="img">
                            <label for="photo">Photo</label>
                            <img src="{{asset('images/'. $child->url)}}" />
                            <input type="file" id="photo" name="url" class="form-control">

                        </div>
                        @else
                        <h2>No photos yet.</h2>
                    @endif
                    </div>
                        <div class="form-group">
                            <label>Father:</label>
                           <select name="father_id" id="">
                            @foreach ($fathers as $father)
                            <option value={{$father->id}} @if($father->id === $child->father->id)
                                selected
                                @endif>{{$father->name}}
                            </option>
                            @endforeach
                        </select>

                        </div>
                        <button type="submit" class="btn btn-dark">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
