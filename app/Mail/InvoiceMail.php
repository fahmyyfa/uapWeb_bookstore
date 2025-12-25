<?php

namespace App\Mail;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public Transaction $transaction;
    public string $pdfPath;

    public function __construct(Transaction $transaction, string $pdfPath)
    {
        $this->transaction = $transaction;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject('Invoice Pembelian - Book Kurnia')
            ->view('emails.invoice')
            ->attach($this->pdfPath, [
                'as' => 'invoice-' . $this->transaction->id . '.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
