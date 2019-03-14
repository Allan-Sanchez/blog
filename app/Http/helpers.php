<?php

function setActiveRoute($nameRoute)
{
    # code...
    request()->routeIs($nameRoute) ? 'active': '';
}