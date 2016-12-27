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

use Sincco\Tools\Calendar\Second;
use Sincco\Tools\Calendar\Minute;
use Sincco\Tools\Calendar\Hour;
use Sincco\Tools\Calendar\Day;
use Sincco\Tools\Calendar\Week;
use Sincco\Tools\Calendar\Month;
use Sincco\Tools\Calendar\Year;

class Obj {
  
  var $yearINT;
  var $monthINT;
  var $dayINT;
  var $hourINT;
  var $minuteINT;
  var $secondINT;
  var $timestamp = 0;

  function __construct($year=false, $month=1, $day=1, $hour=0, $minute=0, $second=0) {

    if(!$year)  $year   = date('Y');
    if(!$month) $month  = date('m');
    if(!$day)   $day    = date('d');
    
    $this->yearINT   = intval($year);
    $this->monthINT  = intval($month);
    $this->dayINT    = intval($day);
    $this->hourINT   = intval($hour);
    $this->minuteINT = intval($minute);
    $this->secondINT = intval($second);
        
    // convert this to timestamp
    $this->timestamp = mktime($hour, $minute, $second, $month, $day, $year);
  }
  
  function year($year=false) {
    if(!$year) $year = $this->yearINT;
    return new Year($year, 1, 1, 0, 0, 0);
  }

  function month($month=false) {
    if(!$month) $month = $this->monthINT;
    return new Month($this->yearINT, $month, 1, 0, 0, 0);
  }

  function day($day=false) {
    if(!$day) $day = $this->dayINT;
    return new Day($this->yearINT, $this->monthINT, $day, 0, 0, 0);
  }

  function hour($hour=false) {
    if(!$hour) $hour = $this->hourINT;
    return new Hour($this->yearINT, $this->monthINT, $this->dayINT, $hour, 0, 0);
  }

  function minute($minute=false) {
    if(!$minute) $minute = $this->minuteINT;
    return new Minute($this->yearINT, $this->monthINT, $this->dayINT, $this->hourINT, $minute, 0);
  }

  function second($second=false) {
    if(!$second) $second = $this->secondINT;
    return new Second($this->yearINT, $this->monthINT, $this->dayINT, $this->hourINT, $this->minuteINT, $second);
  }

  function timestamp() {
    return $this->timestamp;
  }

  function __toString() {
    return date('Y-m-d H:i:s', $this->timestamp);
  }
  
  function format($format) {
    return date($format, $this->timestamp);  
  }

  function iso() {
    return date(DATE_ISO, $this->timestamp);
  }

  function cookie() {
    return date(DATE_COOKIE, $this->timestamp);
  }

  function rss() {
    return date(DATE_RSS, $this->timestamp);
  }

  function atom() {
    return date(DATE_ATOM, $this->timestamp);
  }

  function mysql() {
    return date('Y-m-d H:i:s', $this->timestamp);
  }

  function time() {
    return strftime('%T', $this->timestamp);
  }

  function ampm() {
    return strftime('%p', $this->timestamp);
  }

  function modify($string) {
    $ts = (is_int($string)) ? $this->timestamp+$string : strtotime($string, $this->timestamp);
    
    list($year, $month, $day, $hour, $minute, $second) = explode('-', date('Y-m-d-H-i-s', $ts));
    return new Day($year, $month, $day, $hour, $minute, $second);
  }

  function plus($string) {
    $modifier = (is_int($string)) ? $string : '+' . $string;
    return $this->modify($modifier);                
  }

  function add($string) {
    return $this->plus($string);  
  }
  
  function minus($string) {
    $modifier = (is_int($string)) ? -$string : '-' . $string;
    return $this->modify($modifier);                  
  }

  function sub($string) {
    return $this->minus($string);  
  }
  
  function dmy() {
    return $this->format('d.m.Y');
  }

  function padded() {
    return str_pad($this->int(),2,'0',STR_PAD_LEFT);
  }

}
