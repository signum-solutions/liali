<?php
/**
 * Created by PhpStorm.
 * User: sudeep
 * Date: 23/1/19
 * Time: 1:12 PM
 */

namespace App\Models;
use DB;

class UserWorker
{
    /**
     *  Function for storing tokens
     *
     * @param $accessToken
     * @param $authCode
     * @param $username
     * @param $user_email
     * @return bool
     */
    public function storeTokens($accessToken, $authCode, $username, $user_email)
    {
        $user_helper = new UserHelper();
        $response = $user_helper->checkTokens(1);

        if(!$response) {
            DB::table('tokens')
                ->insert([
                    'id' => 1,
                    'accessToken' => $accessToken,
                    'authCode' => $authCode,
                    'refreshToken' => $accessToken,
                    'tokenExpires' => $accessToken,
                    'userName' => $username,
                    'userEmail' => $user_email
                ]);

        } else {
            DB::table('tokens')
                ->where('id', 1)
                ->update([
                    'accessToken' => $accessToken,
                    'authCode' => $authCode,
                    'refreshToken' => $accessToken,
                    'tokenExpires' => $accessToken,
                    'userName' => $username,
                    'userEmail' => $user_email
                ]);
        }

        return true;
    }


    /**
     * Function for updating tokens
     *
     * @param $accessToken
     * @return bool
     */
    public function updateTokens($accessToken)
    {
        DB::table('tokens')
            ->where('id', 1)
            ->update([
                'accessToken' => $accessToken,
                'refreshToken' => $accessToken,
                'tokenExpires' => $accessToken,
            ]);

        return true;
    }


    /**
     *  Function for deleting tokens
     */
    public function deleteTokens()
    {
        DB::table('tokens')
            ->where('id', 1)
            ->update([
                'accessToken' => null,
                'refreshToken' => null,
                'tokenExpires' => null,
                'userName' => null,
                'userEmail' => null
            ]);

        return true;
    }


    /**
     * Function for updating access token
     *
     * @param $accessToken
     * @return bool
     */
    public function updateAccessToken($accessToken)
    {
        DB::table('tokens')
            ->where('id', 1)
            ->update([
                'accessToken' => $accessToken,
            ]);

        return true;
    }

}