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
                        <form action="{{route('father.update', $father->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf @method('put')

                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$father->name}}">
                        </div>
                        <div class="form-group">
                            <label>Amount:</label>
                            <input type="text" name="amount" class="form-control" value="{{$father->amount}}">
                        </div>
                        <div class="form-group">
                            <label>Confirmed:</label>
                            <input type="text" name="confirmed" class="form-control" value="{{$father->confirmed}}">
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea type="text" name="description" class="tinymce-editor" name="body" cols="30" rows="10" >{{$father->description}}</textarea>
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
