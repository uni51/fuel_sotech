<?php

namespace User;

class Controller_Hello extends \Controller
{

    function action_index()
    {
        return \Response::forge('Hello!');
    }

//    function action_index()
//    {
//        if (\Request::main() === \Request::active()) {
//            //:
//            //通常のリクエストの場合の処理
//            //:
//        } else {
//            //:
//            //HMVCリクエストの場合の処理
//            //:
//            //
//        }
//    }

}