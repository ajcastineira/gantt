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

class Hour extends Obj {

  function int() {
    return $this->hourINT;
  }

  function minutes() {

    $obj   = $this;
    $array = array();

    while($obj->hourINT == $this->hourINT) {
      $array[] = $obj;
      $obj = $obj->plus('1minute')->minute();    
    }

    return new Iterator($array);
        
  }
  
  function next() {
    return $this->plus('1hour')->hour();
  }

  function prev() {
    return $this->minus('1hour')->hour();
  }

}
