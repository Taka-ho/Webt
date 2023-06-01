<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use SebastianBergmann\CodeUnit\Exception;
use Illuminate\Support\Str;
use App\Models\OrthUsersInfo;
use App\Models\UsersCodes;

class AuthController extends Controller
{
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

        // Githubからのレスポンスから必要な情報を取得
        $githubUserId = $request->input('user_id');

        // orth_users_info テーブルにデータを登録
        $userInfo = new OrthUsersInfo;
        $usersKey = Str::uuid(); // UUIDを生成して 'key' カラムに登録
        $userInfo->key = $usersKey;
        $userInfo->personal_github_info = $githubUserId;
        $userInfo->save();
        $this->redirectToDiscord($usersKey);
    }

    public function redirectToDiscord($usersKey)
    {
        $this->checkInfoInDB($usersKey, 'github');
        return Socialite::driver('discord')->redirect();
    }

    public function handleDiscordCallback(Request $request)
    {
        // Discordのコールバック処理
    
        // Discordからのレスポンスから必要な情報を取得
        $discordUserId = $request->input('user_id');

        // orth_users_info テーブルにデータを登録
        $userInfo = new OrthUsersInfo;
        $userInfo->personal_discord_info = $discordUserId;
        $userInfo->save();
    
        // その他の処理やリダイレクトなどを行う
        $this->redirect ($discordUserId);
    }

    public function redirect ($discordUserId)
    {
        $this->checkInfoInDB(OrthUsersInfo::where('personal_discord_info', $discordUserId)->value('key'), 'discord');

        $id = Str::uuid()->toString();
        $userCode = new UsersCodes;
        $userCode->id = $id;
        // コーディング試験ページに転送
        return redirect()->to('http://localhost:3000/'.$id); 
    }

    private function checkInfoInDB($usersKey, $platform_name) {
        try {
            $userInfo = OrthUsersInfo::where('key', $usersKey)->value('personal_'.$platform_name.'_info');
            if ($userInfo == null) {
                throw new Exception($platform_name.'の情報がありません');
            }
        } catch (Exception $e) {
            return Socialite::driver($platform_name)->redirect();
        }
    }
}
