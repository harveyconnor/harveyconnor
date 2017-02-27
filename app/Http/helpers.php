<?php
function set_active($path, $active = 'active')
{
    return (Request::is($path)) ? $active : '';
}

function set_open($path, $active = 'open')
{
    return (Request::is($path) || Request::is($path.'*')) ? $active : '';
}

