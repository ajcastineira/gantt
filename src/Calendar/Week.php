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

class Week extends Obj {

  function __toString() {
    return $this->firstDay()->format('Y-m-d') . ' - ' . $this->lastDay()->format('Y-m-d');
  }

  var $weekINT;

  function int() {
    return $this->weekINT;
  }

  function __construct($year=false, $week=false) {

    if(!$year) $year = date('Y');
    if(!$week) $week = date('W');

    $this->yearINT = intval($year);
    $this->weekINT = intval($week);

    $ts     = strtotime('Thursday', strtotime($year . 'W' . $this->padded()));
    $monday = strtotime('-3days', $ts);

    parent::__construct(date('Y', $monday), date('m', $monday), date('d', $monday), 0, 0, 0);
    
  }
  
  function years() {
    $array = array();
    $array[] = $this->firstDay()->year();
    $array[] = $this->lastDay()->year();
      
    // remove duplicates
    $array = array_unique($array);
    
    return new Iterator($array);
  }

  function months() {
    $array = array();
    $array[] = $this->firstDay()->month();
    $array[] = $this->lastDay()->month();

    // remove duplicates
    $array = array_unique($array);

    return new Iterator($array);
  }
  
  function firstDay() {
    $cal = new Calendar();
    return $cal->date($this->timestamp);    
  }

  function lastDay() {
    $first = $this->firstDay();
    return $first->plus('6 days');
  }
    
  function days() {
    
    $day   = $this->firstDay();
    $array = array();
                
    for($x=0; $x<7; $x++) {
      $array[] = $day;
      $day = $day->next();
    }
        
    return new Iterator($array);

  }

  function next() {

    $next = strtotime('Thursday next week', $this->timestamp);
    $year = date('Y', $next);
    $week = date('W', $next);
                                  
    return new CalendarWeek($year, $week);

  }
  
  function prev() {

    $prev = strtotime('Monday last week', $this->timestamp);
    $year = date('Y', $prev);
    $week = date('W', $prev);

    return new CalendarWeek($year, $week);

  }
   
}  
