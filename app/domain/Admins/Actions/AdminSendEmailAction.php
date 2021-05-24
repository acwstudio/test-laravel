<?php


namespace Domain\Admins\Actions;


use Support\Mails\Admins\AdminRegisteredMail;

class AdminSendEmailAction
{
    public $email;

    public function __construct()
    {

    }

    public function execute(string $email, array $details)
    {
        \Mail::to($email)->send(new AdminRegisteredMail($details));
    }
}
