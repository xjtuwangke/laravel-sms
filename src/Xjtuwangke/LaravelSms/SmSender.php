<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14/10/11
 * Time: 17:28
 */

namespace Xjtuwangke\LaravelSms;

use Illuminate\Support\Facades\Config;

class SmSender {

    static $serviceProvider = null;

    public static function _init(){
        $config = Config::get( 'laravel-sms::config' , array() );
        if( array_key_exists( 'class_name' , $config ) && class_exists( $config['class_name'] ) ){
            $class = $config['class_name'];
            static::$serviceProvider = new $class( $config );
        }
    }

    public static function send( $text , $mobile ){
        return static::$serviceProvider->send( $text , $mobile );
    }

}