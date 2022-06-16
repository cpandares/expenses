@extends('layout.base')

@section('content')

<div class="card p-5 shadow">

    <h2>Create New Report</h2>
    <hr />
    <div class="row">
        <div class="col">
            <button onclick=" return window.history.back() " class="btn btn-success my-3">
                Go Back
            </button>
        </div>
    </div>
    <div class="row ">
        <div class="col">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/expense-reports " method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea 
                        class="form-control" 
                        id="description" 
                        name="description" 
                        rows="3" 
                        style="resize:none">{{ old('description') }}</textarea>

                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection