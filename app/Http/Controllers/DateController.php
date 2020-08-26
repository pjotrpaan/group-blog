<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DateController extends Controller
{
  /**
   * Format and return date by locale.
   *
   * @param  Date $date
   * @param  localizaton $locale
   * @return String
   */
  public static function formatDateByLocale($date, $locale)
  {
    if ($locale == 'en') 
    {
      $formattedDate = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
      return $formattedDate;
    } 
    else if ($locale == 'et')
    {
      $formattedDate = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.Y');
      return $formattedDate;
    }
  }
}
