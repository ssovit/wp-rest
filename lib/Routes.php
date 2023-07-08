<?php

namespace Sovit\Utilities;

if (!class_exists('\Sovit\Utilities\Routes')) {
    class Routes
    {

        protected $routes = [];

        private $restNamespace = '';


        public function __construct($restNamespace)
        {
            $this->restNamespace = $restNamespace;
            add_action('rest_api_init', [$this, '_restInit']);
        }

        public function _restInit()
        {
            foreach ($this->routes as $route) {
                register_rest_route($this->restNamespace, $route->getRestEndpoint(), [
                    'methods'  => $route->getRestMethod(),
                    'callback' => [$route, 'callback'],
                    'args'     => $route->getRestArgs(),
                    'permission_callback' => "__return_true"
                ]);
            }
        }

        public function registerRoute(IRoute $route)
        {
            $this->routes[] = $route;
        }
    }
}
