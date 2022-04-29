<?php

class Session
{

    static public function set($type,$message)
    {
        setcookie($type,$message,time() + 3,"/");
    }
}
/*
    static public function logout(){
        session_destroy();
    }

}*/