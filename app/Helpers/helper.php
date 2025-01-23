<?php

/** format news tags */
function formatTags(array $tags): String
{
    return implode(',', $tags);
}

/** Make Sidebar Active */
function setSidebarActive(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'active';
        }
    }
    return '';
}
