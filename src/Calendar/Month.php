<?php
# NOTICE OF LICENSE
#
# This source file is subject to the Open Software License (OSL 3.0)
# that is available through the world-wide-web at this URL:
# http://opensource.org/licenses/osl-3.0.php
#
# -----------------------
# @author: Iván Miranda
# @version: 1.0.0
# -----------------------
# PHP Gantt Creator Class
# -----------------------

namespace Sincco\Tools\Calendar;

use Sincco\Tools\Calendar\Obj;
use Sincco\Tools\Calendar\Iterator;

class Month extends Obj {

  function __toString() {
    return $this->format('Y-m');
  }

  function int() {
    return $this->monthINT;
  }

  function weeks($force=false) {

    $first = $this->firstDay();
    $week  = $first->week();    
        
    $currentMonth = $this->int();
    $nextMonth    = $this->next()->int();

    $max = ($force) ? $force : 6;
      
    for($x=0; $x<$max; $x++) {
      
      // make sure not to add weeks without a single day in the same month
      if(!$force && $x>0 && $week->firstDay()->month()->int() != $currentMonth) break;
      
      $array[] = $week;
            
      // make sure not to add weeks without a single day in the same month
      if(!$force && $week->lastDay()->month()->int() != $currentMonth) break;

      $week = $week->next();

    }
        
    return new Iterator($array);
        
  }

  function countDays() {
    return date('t', $this->timestamp);  
  }

  function firstDay() {
    return new Day($this->yearINT, $this->monthINT, 1);
  }

  function lastDay() {
    return new Day($this->yearINT, $this->monthINT, $this->countDays());  
  }

  function days() {
    
    // number of days per month
    $days  = date('t', $this->timestamp);
    $array = array();
    $ts    = $this->firstDay()->timestamp();

    foreach(range(1, $days) as $day) {
      $array[] = $this->day($day);    
    }

    return new Iterator($array);      

  }

  function day($day=1) {
    return new Day($this->yearINT, $this->monthINT, $day);
  }
  
  function next() {
    return $this->plus('1month')->month();
  }
  
  function prev() {
    return $this->minus('1month')->month();
  }
  
  function name() {
    return strftime('%B', $this->timestamp);
  }

  function shortname() {
    return strftime('%b', $this->timestamp);
  }

}
