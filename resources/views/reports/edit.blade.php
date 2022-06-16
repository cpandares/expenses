@extends('layout.base')

@section('content')

<div class="card p-5 shadow">

    <h2>Edit </h2>
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
            <form action="/expense-reports/{{ $report->id }}" method="POST">
                @csrf
                @method('PUT')
               
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" value="{{ $report->title }}" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea 
                        class="form-control" 
                        id="description"                        
                        name="description" 
                        rows="3"
                        style="resize: none;">{{ $report->description }}</textarea>
                        
                       

                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection