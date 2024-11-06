<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateUserBalance;
use App\model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     *更改用户余额
     * @param  Request  $request
     * @return Response
     */
    public function updateUserBalance(Request $request)
    {

        $user = User::find(1);
        $amount = 1000; // 假设是增加1000的余额
        UpdateUserBalance::dispatch($user, $amount);
    }


