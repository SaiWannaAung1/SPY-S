<?php
namespace App\Http\Controllers;
class Session{

    public static function add($key,$value){
        if (!self::has($key)){
            $_SESSION[$key] = $value;
        }else{
            echo "Session ".$key. "already exist!";
        }
    }
    public static function has($key){
        return isset($_SESSION[$key]) ? true : false;
    }

    public static function remove($key){
        if (self::has($key)){
            unset($_SESSION[$key]);
        }
    }

    public static function get($key){
        if (self::has($key)){
            return $_SESSION[$key];
        }else{
            return null;
        }
    }   public static function replace($key,$value){
        if (self::has($key)){
            self::remove($key);
            self::add($key,$value);
        }else{
            self::add($key,$value);
        }
    }

    public static function flash ($key,$value="")
    {
        if (!empty($value)){
            self::replace($key,$value);
        }else{
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>'.self::get($key).'</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
            self::remove($key);
        }
    }
}
