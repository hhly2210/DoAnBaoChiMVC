<?php 
    class Session {
        public static function init(){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
            
        public static function set($key, $val){
            self::init();
            $_SESSION[$key] = $val;
        }
            
        public static function get($key){
            self::init();
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }else 
                return false;
        }
            
        public static function checkSession(){
            self::init();
            // if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            //     Session::destroy();
            // }
            if(self::get("adminlogin") == false) {
                self::destroy();
                header("Location:/admin/page/login.php");
                die();
            }
        }
        public static function checkLogin(){
            self::init();
            if(self::get("adminlogin") == true) {
                header("Location:/admin/page/index.php");
            }
        }
        public static function destroy()
        {
            self::init();
            session_unset();
            session_destroy();
            header("Location:/admin/page/login.php");
        }
              
}
