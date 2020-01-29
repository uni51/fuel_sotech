<?php

class Controller_Example extends Controller
{

    public function action_index()
    {
        return Response::forge(__DIR__);
    }

    public function after($response)
    {
        $response->set_header('Cache-Control', 'no-cache, no-store, max-age=0,must-revalidate');
        $response->set_header('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT');
        $response->set_header('Pragma', 'no-cache');
        return $response;
    }

}
