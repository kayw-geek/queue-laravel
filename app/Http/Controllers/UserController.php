<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailQueue;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use phpDocumentor\Reflection\DocBlock\Serializer;

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

    /**
     * @name: 输出
     * @author: weikai
     * @date: 2018/6/6 15:21
     */
    public function echo()
    {
        dd('ghjkl');
    }

    public function redisSet()
    {
        Redis::set('name','weikai');
        $name = Redis::get('name');
        dd($name);
    }

    public function redisHset()
    {
        $users  = User::get()->toArray();
//        dd($users);
        Redis::hmset('userarray',$users);
        $rusers = Redis::hmget('userarray');
        dd($rusers);
    }


    public function redisJson()
    {
        $users  = User::get()->toJson();
//        dd($users);
        Redis::hmset('userjson',$users);
        $rusers = Redis::hmget('userjson');
        dd($rusers);
    }
}
