<?php
    interface Controller
    {
        /**
         * Traite la variable $_REQUEST reçue en paramètre
         */
        public function handle($request);
    }
?>