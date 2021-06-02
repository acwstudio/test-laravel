<?php

namespace App\Console\Commands;

use Domain\Admins\Actions\AdminSendEmailAction;
use Domain\Admins\Actions\AdminUserCreateAction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class AdminUserCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user for admin application';

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
    public function handle(AdminUserCreateAction $createAction, AdminSendEmailAction $emailAction)
    {
        $fields['name'] = $this->ask('Name?');
        $fields['email'] = $this->ask('Email?');
        $fields['password'] = $this->ask('Password?');

        $validator = Validator::make($fields,
            [
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:admins,email'],
                'password' => ['required', 'min:8']
            ]
        );

        if ($validator->fails()) {
            $this->info('Admin user is not created. See messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        $admin = $createAction->execute($fields);
        $emailAction->execute($fields['email'], $fields);

//        dd($admin->tokens()->where('name', 'spa')->count());
        $this->info('Admin user created');

        return 0;
    }
}
