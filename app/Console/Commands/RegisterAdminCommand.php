<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class RegisterAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register administrator';

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
     * @return mixed
     */
    public function handle()
    {
        $details = $this->getDetails();

        $admin = $this->createAdmin($details);

        $this->display($admin);
    }

    /**
     * Ask for admin details
     *
     * @return array
     */
    private function getDetails() : array
    {
        $details['first_name'] = $this->ask('First name');
        $details['last_name'] = $this->ask('Last name');
        $details['email'] = $this->ask('Email');
        $details['password'] = $this->secret('Password');
        $details['confirm_password'] = $this->secret('Confirm password');

        while (! ($this->isRequiredLength($details['password'])
        && $this->isMatch($details['password'], $details['confirm_password']))) {

            if (! $this->isRequiredLength($details['password'])) {
                $this->error('Password must be more that six characters');
            }

            if (! $this->isMatch($details['password'], $details['confirm_password'])) {
                $this->error('Password and Confirm password do not match');
            }

            $details['password'] = $this->secret('Password');
            $details['confirm_password'] = $this->secret('Confirm password');
        }

        return $details;
    }

    /**
     * Display created admin
     *
     * @param array $admin
     * @return void
     */
    private function display(array $admin)
    {
        $headers = ['First Name', 'Last Name', 'Email', 'Admin', 'App Owner'];

        $this->table($headers, $admin);
    }

    /**
     * Create admin
     *
     * @param array $details
     * @return array
     */
    private function createAdmin(array $details) : array
    {
        if (! $this->appOwnerExists()) {
            $details['is_app_owner'] = 1;
            $details['is_admin'] = 1;
        }

        return $details;
        //return User::create($details);
    }

    /**
     * Checks if administration exists
     *
     * @return array|null
     */
    private function appOwnerExists()
    {
        return User::where('is_app_owner', 1)->first();
    }

    /**
     * Check if password and confirm password matches
     *
     * @param string $password
     * @param string $confirmPassword
     * @return bool
     */
    private function isMatch(string $password, string $confirmPassword) : bool
    {
        return $password === $confirmPassword;
    }

    /**
     * Checks if password is longer than six characters
     *
     * @param string $password
     * @return bool
     */
    private function isRequiredLength(string $password) : bool
    {
        return strlen($password) > 6;
    }
}
