@extends('layout.base')

@section('content')

<a href="/expense-reports/create" class="btn btn-primary mb-2">Create a new Report</a>

@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>

   
    <h1>Reports </h1>
    <tbody>
        @foreach($expenseReports as $report)
        <tr>
            <td>{{$report->title}}</td>
            <td>{{$report->description}}</td>
            <td>{{$report->created_at}}</td>
            <td>{{$report->updated_at}}</td>
            <td>
                <a href="/expense-reports/{{$report->id}}" class="btn btn-primary">View</a>
                <a href="/expense-reports/{{$report->id}}/edit" class="btn btn-warning">Edit</a>
                <form action="/expense-reports/{{$report->id}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button onclick="return confirmDelete() ">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    
    </tbody>
    
</table>

@endsection

<script>
    function confirmDelete() {
       Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
        
       })
    }
</script>