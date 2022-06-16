@extends('layout.base')

@section('content')

<div class="card p-5 shadow">

    <h2> Details: {{ $report->title }} </h2>
    <hr />
    <div class="row">
        <div class="col">
            <button onclick=" return window.history.back() " class="btn btn-success my-3">
                Go Back
            </button>
        </div>
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               Add Expense
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create a detail expensed</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="/expenses" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" name="description" class="form-control" id="title" placeholder="Description"> 
                                    <label for="">Amount</label>
                                    <input type="text" name="amount" class="form-control my-1">
                                    <input type="hidden" name="report_id" value="{{$report->id}}">

                                    <button type="submit" class="btn btn-primary my-1">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendEmail">
               Send Email
            </button>

            <!-- Modal -->
            <div class="modal fade" id="sendEmail" tabindex="-1" aria-labelledby="sendEmail" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send Email</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="/sendEmail/{{$report->id}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="title" placeholder="Email">
                                    <button type="submit" class="btn btn-primary my-1">Send Email</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row ">
        <div class="col">
            <h3>Report</h3>
            <table class="table">
                <thead>
                    <tr>
                       
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Date</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($report->expenses as $expense)
                    <tr>
                        <!-- <td>{{ $expense->title }}</td> -->
                        <td>{{ $expense->description }}</td>
                        <td>{{ $expense->amount }}</td>
                        <td>{{ $expense->created_at }}</td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection