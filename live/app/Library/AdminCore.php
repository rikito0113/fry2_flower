<?php

namespace App\Library;

// モデルの呼び出し
use App\AdminUser;

class AdminCore {
    // ログイン
    public static function login($request)
    {
        $adminUser = AdminUser::where('id', $request->id)->where('password', $request->password)->first();

        // playerがない場合はfalse
        if (!$adminUser)
            return false;
        else {
            // idをsessionに保持
            session(['admin_id' => $request->id]);
            return $adminUser;
        }
    }
}