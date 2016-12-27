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
use Sincco\Tools\Calendar;

class Day extends Obj {

  function __toString() {
    return $this->format('Y-m-d');
  }

  function int() {
    return $this->dayINT;
  }
  
  function week() {
    $week = date('W', $this->timestamp);
    $year = ($this->monthINT == 1 && $week > 5) ? $this->year()->prev() : $this->year();
    return new CalendarWeek($year->int(), $week);      
  }

  function next() {
    return $this->plus('1day');
  }
  
  function prev() {
    return $this->minus('1day');
  }

  function weekday() {
    return date('N', $this->timestamp);
  }
  
  function name() {
    return strftime('%A', $this->timestamp);
  }

  function shortname() {
    return strftime('%a', $this->timestamp);
  }
    
  function isToday() {
    $cal = new Calendar();
    return $this == $cal->today();
  }
  
  function isYesterday() {
    $cal = new Calendar();
    return $this == $cal->yesterday();  
  }
  
  function isTomorrow() {
    $cal = new Calendar();
    return $this == $cal->tomorrow();    
  }
  
  function isInThePast() {
    return ($this->timestamp < Calendar::$now) ? true : false;
  }
  
  function isInTheFuture() {
    return ($this->timestamp > Calendar::$now) ? true : false;  
  }

  function isWeekend() {
    $num = $this->format('w');
    return ($num == 6 || $num == 0) ? true : false;
  }

  function hours() {

    $obj   = $this;
    $array = array();
    
    while($obj->int() == $this->int()) {
      $array[] = $obj->hour();
      $obj = $obj->plus('1hour');    
    }
    
    return new Iterator($array);

  }

}
