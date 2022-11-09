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
                        <form action="{{route('father.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Amount:</label>
                            <input type="number" step="0.01" name="amount" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Confirmed</label>
                            <select name="confirmed" id="" class="form-control">
                                <option selected disabled>Select </option>
                                    <option value="1" > Yes</option>
                                    <option value="0" > No</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"  style="resize:none"></textarea>
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
