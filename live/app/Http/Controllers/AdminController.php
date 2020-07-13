<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\AdminUser;

// ライブラリの呼び出し
use App\Library\AdminCore;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // login
    public function login()
    {
        // セッションを保持している場合はadmin.indexへ
        if (session()->has('admin_id')) {
            return redirect()->route('admin.index');
        }
        return view('admin.login');
    }

    // login処理実行
    public function loginExec(Request $request)
    {
        $adminUser = AdminCore::login($request);

        if ($adminUser)
            return redirect()->route('admin.index');
        else
            return redirect()->route('admin.login');
    }

    // 管理画面のindexページ
    public function index(Request $request)
    {
        return view('admin.index');
    }
}
