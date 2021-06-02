<?php


namespace Domain\Admins\Actions;

use Support\Mails\Admins\AdminRegisteredMail;

class AdminSendEmailAction
{
    /**
     * @param string $email
     * @param array $details
     */
    public function execute(string $email, array $details)
    {
        \Mail::to($email)->send(new AdminRegisteredMail($details));
    }
}
