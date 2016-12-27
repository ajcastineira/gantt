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

class Second extends Obj {

  function int() {
    return $this->secondINT;
  }
  
  function next() {
    return $this->plus('1second')->second();
  }

  function prev() {
    return $this->minus('1second')->second();
  }

}