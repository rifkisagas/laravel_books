<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Repositoris\UserRepository;
class UserController extends Controller
{
    protected $users;
   public function show($name){
    return "Hello ".$name."....!";
   }
   public function __contruct(UserRepository $users){
    $this->users =$users;
   }
   public function store(Request $request){

    $name = $request->name;
   }
}