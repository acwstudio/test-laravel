<?php

namespace App\Console\Commands;

use Domain\Users\Actions\UsersCreatedSendEmailAction;
use Domain\Users\Employers\Actions\EmployerUserCreateAction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\Command;

class EmployerUserCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:employer-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user for employer application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(EmployerUserCreateAction $employerUserCreateAction,
                           UsersCreatedSendEmailAction $usersCreatedSendEmailAction)
    {
        $fields['name'] = $this->ask('Name?');
        $fields['email'] = $this->ask('Email?');
        $fields['password'] = $this->ask('Password?');

        $validator = Validator::make($fields,
            [
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:employers,email'],
                'password' => ['required', 'min:8']
            ]
        );

        if ($validator->fails()) {
            $this->info('Employer user is not created. See messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        $admin = $employerUserCreateAction->execute($fields);
        $usersCreatedSendEmailAction->execute($fields['email'], $fields);

        $this->info('Employer user created');

        return 0;
    }
}
