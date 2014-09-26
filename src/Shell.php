<?php

namespace Andou\Shelltools;

/**
 * Your own personal Shell
 * 
 * The MIT License (MIT)
 * 
 * Copyright (c) 2014 Antonio Pastorino <antonio.pastorino@gmail.com>
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * 
 * @author Antonio Pastorino <antonio.pastorino@gmail.com>
 * @category shelltools
 * @package andou/shelltools
 * @copyright MIT License (http://opensource.org/licenses/MIT)
 */
class Shell {

  /**
   * Script arguments
   *
   * @var array
   */
  protected $_argv;

  /**
   * Arguments count
   *
   * @var int
   */
  protected $_argc;

  /**
   * The script name
   *
   * @var string 
   */
  protected $_script_name;

  /**
   * An array of script options.
   * Options are in the format --option_name=option_value
   *
   * @var type 
   */
  protected $_options = array();

  /**
   * An array of flags
   * Flags are in the format -f
   *
   * @var type 
   */
  protected $_flags = array();

  /**
   * Count helper for the spinner
   * 
   * @var type 
   */
  protected $_spinner_count = 0;

  /**
   * Returns an instance of this class
   * 
   * @return \Andou\Shelltools\Shell
   */
  public static function getInstance() {
    $classname = __CLASS__;
    return new $classname;
  }

  /**
   * Class constructor
   * 
   * Populate shell arguments
   * 
   * @global array $argv
   * @global int $argc
   */
  public function __construct() {
    global $argv, $argc;
    $this->_script_name = array_shift($argv);
    $this->_argc = $argc - 1;
    $this->_argv = $argv;

    while ($opt = array_pop($argv)) {
      if (strpos($opt, '--') === 0) {
        $_opt = explode("=", substr($opt, 2));
        if (count($_opt) === 2) {
          list ($opt_name, $opt_value) = $_opt;
          if ($opt_value) {
            $this->_options[$opt_name] = $opt_value;
          }
        }
      } elseif (strpos($opt, '-') === 0) {
        $this->_flags[] = substr($opt, 1);
      }
    }
  }

  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////  COMMON  //////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////

  /**
   * Tells if we are in a cli environment
   * 
   * @return boolean
   */
  public function isCli() {
    return PHP_SAPI === 'cli';
  }

  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////  FLAGS  ///////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////

  /**
   * Returns all the script flags
   * 
   * e.g. -d is considered a flag
   * 
   * @return array
   */
  public function getFlags() {
    return $this->_flags;
  }

  /**
   * Tells if this script has a given flag
   *
   * @param string $flag
   * @return boolean
   */
  public function hasFlag($flag) {
    return in_array($flag, $this->_flags);
  }

  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////  OPTIONS  /////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////

  /**
   * Return all the script options
   * 
   * e.g. --outputpath=/your/path is considered an option
   * 
   * @return array
   */
  public function getOptions() {
    return $this->_options;
  }

  /**
   * Tells if this script has a given option 
   * 
   * @param string $option
   * @return boolean
   */
  public function hasOption($option) {
    return isset($this->_options[$option]);
  }

  /**
   * Returns an option 
   * 
   * @param string $option
   * @return string
   */
  public function getOption($option) {
    return $this->hasOption($option) ? $this->_options[$option] : FALSE;
  }

  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////  ARGUMENTS  ///////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////

  /**
   * Returns the value of an argument by the order number
   * 
   * @param int $argn
   * @return string
   */
  public function getArgument($argn) {
    return isset($this->_argv[(int) $argn]) ? $this->_argv[(int) $argn] : FALSE;
  }

  /**
   * Returns all the script arguments
   * 
   * @return array
   */
  public function getArguments() {
    return $this->_argv;
  }

  /**
   * Retutns the arguments count
   * 
   * @return int
   */
  public function countArguments() {
    return $this->_argc;
  }

  /**
   * Returns the script name
   * 
   * @return string
   */
  public function getScriptName() {
    return $this->_script_name;
  }

  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////  SPINNER  /////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////

  /**
   * Resets the spinner counter
   */
  public function spinnerReset() {
    $this->_spinner_count = 0;
  }

  /**
   * Prints a spinner in stdout
   */
  public function spinnerStep() {
    echo chr(27) . "[0G";
    $step = $this->_spinner_count % 3;
    switch ($step) {
      case 0:
        echo "\\";
        break;
      case 1:
        echo "/";
        break;
      case 2:
        echo "-";
        break;
      default:
        break;
    }
    $this->_spinner_count++;
  }

}