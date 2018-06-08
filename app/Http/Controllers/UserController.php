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

    public function redisJson()
    {
        $users  = User::get()->toJson();
//        dd($users);
        Redis::set('userjson',$users);
        $rusers = Redis::get('userjson');
        dd($rusers);
    }

    public function test()
    {
        $users = User::get()->toArray();
//        foreach ($users as $k=>$user){
//            Redis::hmset('happy:'.$k,$user);//hash 批量赋值 格式为 hmset('hash名 : ',key value)
//        }
//        dd(Redis::hlen('happy:2'));// 返回hash key数量
//         dd(Redis::hgetall("happy:0"));//获取hash 建和值
//         dd(Redis::hkeys("happy:0"));//获取hash 建
//         dd(Redis::hvals("happy:0"));//获取hash 值
//         Redis::hdel("happy:0",'id');//删除hash 中 键值对
//         dd(Redis::hexists("happy:1",'id'));//是否存在， 若存在返回1 失败0
//         dd(Redis::setnx('name','weikai'));//设置一个不存在的键和值（防止覆盖），若键已存在则返回0表示失败
//         dd(Redis::setex('name',15,'aa'));//setex( 键, 有效时间 ,值) 设置一个指定有效期的键和值（单位秒）
//        dd(Redis::get('name'));
//        dd(Redis::getset('name','bbb'));//获取原值，并设置新值
        //dd(Redis::set('num',1));
//        dd(Redis::incrby('num',1));//为指定建加指定值
//        dd(Redis::decrby('num',1));//为指定建减指定值
//        dd(Redis::append('num','avc'));//给指定建追加值返回 追加后长度
//        dd(Redis::get('num'));
//        Redis::lpush('list1','001work');//在list1头部压入一个字串
//        Redis::lpush('list1','002work');//在list1头部压入一个字串
//        Redis::lpush('list1','003work');//在list1头部压入一个字串
//        dd(Redis::lrange('list1',0,-1));//获取list1中内容 0:表示开头  -1表示结尾。
//        dd(Redis::lpop('list1'));//从头部删除元素 返回被删除的元素
//        dd(Redis::rpop('list1'));//从尾部删除元素 返回被删除的元素
//        dd(Redis::lindex('list1',1));//返回索引对应的值
//        dd(Redis::llen('list1'));//返回list1长度

    }

    /**
     * @name:redis 发布订阅
     * @author: weikai
     * @date: 2018/6/8 15:03
     */
    public function redisPublish(){
        Redis::publish('weikai:test',json_encode(['aaa'=>'vvv']));
    }


}
