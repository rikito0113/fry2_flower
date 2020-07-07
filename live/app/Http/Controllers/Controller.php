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

    protected $_playerId = false;

    public function init()
    {
        // ハッシュ値を保持している時
        if (session()->has('hash')) {
            $hash = session('hash');
            $AllPlayer = Player::latest()->get();
            foreach ($AllPlayer as &$player) {
                if (Hash::check($hash, $player->player_id)) {
                    $_playerId = $player->player_id;
                }
            }
        }

        // もしplayerIdが取れなかった場合はloginへ
        if (!$_playerId) {
            session()->flush();
            return redirect()->route('login');
        }
    }
}
