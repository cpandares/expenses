


<div class="row">
    <div class="col">
        <h2>Report detail: {{ $report->title }}</h2>

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
                    <td>{{ $expense->description }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->created_at }}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>