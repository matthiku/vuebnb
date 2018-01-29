<?php

use Illuminate\Support\Facades\Config;

if (!function_exists('cdn'))
{
  function cdn($asset)
  {
    if (Config::get('app.cdn.bypass') || !Config::get('app.cdn.url')) {
      return asset($asset);
    } else {
      // only works if this doesn't create 'mixed content', ie https and hhtp
      return  "//" . Config::get('app.cdn.url') . '/' . $asset;
    }
  }
}