<?php
/**
 * Created by PhpStorm.
 * User: sudeep
 * Date: 21/1/19
 * Time: 10:01 PM
 */

namespace App\Models;
use DB;

class LoginHelper
{

    /**
     * Function for checking login information
     *
     * @param $user_name
     * @param $password
     * @return bool
     */
    public function checkLogin($user_name, $password)
    {
        $user = DB::table('user_login')
            ->where('username', $user_name)
            ->where('password', $password)
            ->first();

        if(isset($user->user_id))
        {
            return $user;
        } else {
            return false;
        }
    }
}