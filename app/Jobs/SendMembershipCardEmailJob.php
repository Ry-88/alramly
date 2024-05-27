<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use PDF;

class SendMembershipCardEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $membership;
    public function __construct($membership)
    {
        $this->membership = $membership;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set("pcre.backtrack_limit", "5000000");
        $data = [];
        $data['full_name'] = $this->membership->getTranslations('full_name')['ar'];
        $data['full_name_en'] = $this->membership->getTranslations('full_name')['en'];
        $data['membership_type'] = $this->membership->membership_type;

        $data['image'] = $this->membership->image->path;
        $data['id'] = $this->membership->id;
        $data['email'] = $this->membership->email;
        $data['approved_at'] = $this->membership->approved_at;
        $data['expirted_at'] = $this->membership->expirted_at;
        $data['id_number'] = $this->membership->id_number;
        $data['membership_no'] = $this->membership->membership_no;
        $data['image_extension'] = $this->membership->image_extension;

        // loaded pdf files
        $pdf = PDF::loadView('emails.cardMembership', $data);

        // send email with pdf file
        Mail::send('emails.cardMembership', $data, function ($message) use ($data, $pdf) {
            $message->to($data['email'], $data['full_name'])->subject('تتقدم لكم جمعية سفراء التراث بالتهنئة الخالصة لانضمامكم للجمعية، ونأمل أن تكونوا خير "سفير" لها في مهمتها الوطنية الخلاقة لتحقيق أهدافها المرجوة. ')
                ->attachData($pdf->output(), "membershipCard.pdf");
        });
    }
}
