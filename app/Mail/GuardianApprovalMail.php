<?php

namespace App\Mail;

use Illuminate\Support\Facades\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GuardianApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $guardian;
    public $pdfPath;
    // public $player;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->guardian =   $data['guardian'];
        $this->pdfPath  =   $data['pdf'];
        // $this->player   =  $data['player'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->guardian, $this->pdfPath);
        $attachmentPath = public_path('files/consent.pdf');
        return $this->subject('Guardian Approval Email')
            ->with([
                'guardian' => $this->guardian,
            ])->attach($attachmentPath, [
                'as' => 'consent.pdf',
                'mime' => 'application/pdf',
            ])->view('emails.guardian-approval');
        Mail::to($this->guardian['gurdian_email'])->send(new GuardianApprovalMail($attachmentPath));
    }
}
