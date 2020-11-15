<?php
    class ApplicationController
    {
        private static $instance = null;

        private $routes;

        private function __construct()
        {
            $this->routes = [
                "/" => [
                    "controller" => "MainController",
                    "view" => "HomePage"
                ],

                "user_add_form" => [
                    "controller" => null,
                    "view" => "AddUserForm"
                ],

                "user_add" => [
                    "controller" => "AddUserController",
                    "view" => "AddUserValidationView"
                ],

                "user_connect_form" => [
                    "controller" => null,
                    "view" => "ConnectUserForm"
                ],

                "user_connect" => [
                    "controller" => "ConnectUserController",
                    "view" => "ConnectUserValidationView"
                ],

                "user_disconnect" => [
                    "controller" => "DisconnectUserController",
                    "view" => "DisconnectUserView"
                ],

                "upload_activity_form" => [
                    "controller" => null,
                    "view" => "UploadActivityForm"
                ],

                "upload_activity" => [
                    "controller" => "UploadActivityController",
                    "view" => "UploadActivityView"
                ],

                "list_activities" => [
                    "controller" => "ListActivityController",
                    "view" => "ListActivityView"
                ],

                "error" => [
                    "controller" => null,
                    "view" => "ErrorView"
                ]
            ];
        }

        public static function getInstance()
        {
            if (self::$instance == null)
            {
                self::$instance = new ApplicationController();
            }

            return self::$instance;
        }

        public function getController($request)
        {    
            $page = $request["page"];
            if (array_key_exists($page, $this->routes))
            {
                return $this->routes[$page]["controller"];
            }

            return null;
        }

        public function getView($request)
        {
            $page = $request["page"];
            if (array_key_exists($page, $this->routes))
            {
                return $this->routes[$page]["view"];
            }

            return $this->routes["error"]["view"];
        }
    }
?>