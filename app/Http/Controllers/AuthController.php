<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use SebastianBergmann\CodeUnit\Exception;
use Illuminate\Support\Str;
use App\Models\UsersInfo;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\Console\Exception\Exception as ConsoleException;

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

        // Githubからのレスポンスから必要な情報を取得
        $githubUserId = $request->input('user_id');
        $GLOBALS['githubUserId'] = $githubUserId;
        // orth_users_info テーブルにデータを登録
        $userInfo = new UsersInfo;
        $usersKey = Str::uuid(); // UUIDを生成して 'id' カラムに登録
        $userInfo->id = $usersKey;
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
        // Discordからのレスポンスから必要な情報を取得
        $discordUserId = $request->input('user_id');
        // orth_users_info テーブルにデータを登録
        $userInfo = new UsersInfo;
        $userInfo->personal_discord_info = $discordUserId;
        $userInfo->save();
    
        // その他の処理やリダイレクトなどを行う
        $this->checkInfoInDB($discordUserId, 'discord');
        $this->redirect($discordUserId);
    }

    private function redirect ($discordUserId)
    {
        $githubUserId = $GLOBALS['githubUserId'];
        $userInfo = UsersInfo::where('personal_github_id', $$githubUserId)
                    ->where('personal_discord_id', $discordUserId)
                    ->first('id');
        if($this->checkInfoInDB(Cache::table('users_info')->where('personal_github_info', 'personal_discord_info')->first(), 'discord') === true)
        {
            // コーディング試験ページに転送
            return redirect()->to('http://localhost:3000/'.$userInfo->id); 
        }
    }

    private function checkInfoInDB($userId, $platform_name) {
        try {
            $userInfo = UsersInfo::where('id', $userId)->value('personal_'.$platform_name.'_info');
            if ($userInfo == null) {
                throw new ConsoleException($platform_name.'の情報がありません');
            }
        } catch (ConsoleException $e) {
            return Socialite::driver($platform_name)->redirect();
        }
        return true;
    }
}
