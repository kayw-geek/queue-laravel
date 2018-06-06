<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailQueue;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store()
    {
       $users = User::where('id','>','24')->get();
       foreach ($users as $user){
           $this->dispatch(new SendMailQueue($user));
       }
       echo "Done";
    }

    public function echo()
    {
        dd('ghjkl');
    }
}
