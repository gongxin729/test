<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateUserBalance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $amount;

    public function __construct($user, $amount)
    {
        $this->user = $user;
        $this->amount = $amount;
    }

    public function uniqueId()
    {
        return $this->user->id . '-' . $this->amount;
    }

    public function handle()
    {
        // 更新用户余额的逻辑
        $this->user->increment('balance', $this->amount);
    }
}