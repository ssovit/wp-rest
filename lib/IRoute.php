<?php

namespace Sovit\Utilities;

if (!class_exists('\Sovit\Utilities\IRoute')) {

    interface IRoute
    {
        public function callback(\WP_REST_Request $request);

        public function getRestArgs();

        public function getRestEndpoint();

        public function getRestMethod();
    }
}
