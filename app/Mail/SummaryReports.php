<?php

namespace App\Mail;

use App\ExpenseReport;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SummaryReports extends Mailable
{
    use Queueable, SerializesModels;

    private $expenseReports;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ExpenseReport $expenseReport)
    {
        $this->expenseReports = $expenseReport;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('reports.mail',[
            "report"=>$this->expenseReports
        ]);
    }
}
