<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14/10/11
 * Time: 17:21
 */

return array(

    'appkey' => '' ,

    'appsecret' => '' ,

    'debounce' => 30 ,  //in seconds

    'retry' => 3 ,

    'logger' => function( $message , $context , $flag ){
        if( ! is_array( $context ) ){
            $context = [ 'context' => $context ];
        }
        Log::$flag( $message , $context );
        return TRUE;
    } ,

    'set_cache' => function( $key , $value , $duration ){
        $now = new \DateTime();
        $to = $now->modify( '+ ' . (int) $duration . 's' );
        return Cache::add( 'laravel-sms-' . $key , $value , $to );
    } ,

    'get_cache' => function( $key ){
        return Cache::get( 'laravel-sms-' . $key , false );
    } ,

    'class_name' => '\Sms\Tui3' ,
);