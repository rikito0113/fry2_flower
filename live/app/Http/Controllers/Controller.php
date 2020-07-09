<?php

namespace App\Http\Controllers;

use App\Player;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $_playerId;

    public function __construct()
    {
        // ハッシュ値を保持している時
        if (session()->has('hash')) {
            $hash = session('hash');
            $player = Player::where('hash', $hash)->first();
            $this->_playerId = $player->player_id;
        }

        // もしplayerIdが取れなかった場合はloginへ
        if (!$this->_playerId)
            session()->flush();
    }
}
