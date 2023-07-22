<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use SebastianBergmann\CodeUnit\Exception;
use Illuminate\Support\Str;
use Symfony\Component\Console\Exception\Exception as ConsoleException;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    private $githubUserId;
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback(Request $request)
    {
        try {
            Socialite::with($request)->user();
        } catch (Exception $e) {
            return redirect('/exam/explain');
        }
        $this->redirectToGithub();
        $usersKey = Str::uuid(); // UUIDを生成して 'id' カラムに登録
        $GLOBALS['usersKey'] = $usersKey;
        // Githubからのレスポンスから必要な情報を取得
        $githubUserId = $request->input('user_id');
        $GLOBALS['githubUserId'] = $githubUserId;

        $idKey = 'user:{id}:ID';
        Redis::set($idKey, $usersKey);

        $personalGithubInfoKey = 'user:'.$usersKey.':'.$githubUserId;
        Redis::set($personalGithubInfoKey, 'personal_github_info');
        $this->redirectToDiscord($usersKey);
    }

    public function redirectToDiscord($usersKey)
    {
        $this->checkInfoInCache('github');
        return Socialite::driver('discord')->redirect();
    }

    public function handleDiscordCallback(Request $request)
    {
        // Discordからのレスポンスから必要な情報を取得
        $discordUserId = $request->input('user_id');
        // orth_users_info テーブルにデータを登録
        $personalDiscordInfoKey = 'user:{id}:personal_discord_info';
        Redis::set($discordUserId, 'personal_discord_info');
        // その他の処理やリダイレクトなどを行う
        $this->checkInfoInCache('discord');
        $this->redirect($personalDiscordInfoKey);
    }

    private function redirect ($platformId)
    {
        $githubUserId = $GLOBALS['githubUserId'];
        $usersKey = $GLOBALS['usersKey'];

        if($this->checkInfoInCache('discord') === true) {
            // コーディング試験ページに転送
            return redirect()->to('http://localhost:3000/'.$githubUserId); 
        }
    }

    private function checkInfoInCache($platformName) {
        $usersKey = $GLOBALS['usersKey'];
        $targetIdKey = 'user:{'.$usersKey.'}:ID';
        $idValue = Redis::get($targetIdKey);
        try {
            $userInfo = Redis::get('user:{'.$idValue.'}:personal_'.$platformName.'_info');
            if ($userInfo == null) {
                throw new ConsoleException($platformName.'の情報がありません');
            }
        } catch (ConsoleException $e) {
            return Socialite::driver($platformName)->redirect();
        }
        return true;
    }
}
