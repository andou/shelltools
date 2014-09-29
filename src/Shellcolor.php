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
class Shellcolor {

  /**
   * The color code
   *
   * @var string 
   */
  protected $_color;

  const FG_BLACK = '0;30';
  const FG_DARK_GREY = '1;30';
  const FG_BLUE = '0;34';
  const FG_LIGHT_BLUE = '1;34';
  const FG_GREEN = '0;32';
  const FG_LIGHT_GREEN = '1;32';
  const FG_CYAN = '0;36';
  const FG_LIGHT_CYAN = '1;36';
  const FG_RED = '0;31';
  const FG_LIGHT_RED = '1;31';
  const FG_PURPLE = '0;35';
  const FG_LIGHT_PURPLE = '1;35';
  const FG_BROWN = '0;33';
  const FG_YELLOW = '1;33';
  const FG_LIGHT_GRAY = '0;37';
  const FG_WHITE = '1;37';
  const BG_BLACK = '40';
  const BG_RED = '41';
  const BG_GREEN = '42';
  const BG_YELLOW = '43';
  const BG_BLUE = '44';
  const BG_MAGENTA = '45';
  const BG_CYAN = '46';
  const BG_LIGHT_GREY = '47';

  /**
   * Class contructor
   * 
   * @param string $color
   */
  public function __construct($color) {
    $this->_color = $color;
  }

  /**
   * Returns the color
   * 
   * @return string
   */
  public function getColor() {
    return $this->_color;
  }

  /**
   * Converts to string this object
   * 
   * @return string
   */
  public function __toString() {
    return $this->getColor();
  }

  /**
   * Generates a colored string to be printed
   * 
   * @param string $string
   * @param \Andou\Shelltools\Shellcolor $fg
   * @param \Andou\Shelltools\Shellcolor $bg
   * @return string
   */
  public static function getColoredString($string, \Andou\Shelltools\Shellcolor $fg = NULL, \Andou\Shelltools\Shellcolor $bg = NULL) {
    $fgs = empty($fg) ? "" : sprintf("\033[%sm", $fg);
    $bgs = empty($bg) ? "" : sprintf("\033[%sm", $bg);
    $eols = (empty($fg) && empty($bg) ) ? "" : "\033[0m";
    return sprintf("%s%s%s%s", $fgs, $bgs, $string, $eols);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_BLACK() {
    return new Shellcolor(self::FG_BLACK);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_DARK_GREY() {
    return new Shellcolor(self::FG_DARK_GREY);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_BLUE() {
    return new Shellcolor(self::FG_BLUE);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_LIGHT_BLUE() {
    return new Shellcolor(self::FG_LIGHT_BLUE);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_GREEN() {
    return new Shellcolor(self::FG_GREEN);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_LIGHT_GREEN() {
    return new Shellcolor(self::FG_LIGHT_GREEN);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_CYAN() {
    return new Shellcolor(self::FG_CYAN);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_LIGHT_CYAN() {
    return new Shellcolor(self::FG_LIGHT_CYAN);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_RED() {
    return new Shellcolor(self::FG_RED);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_LIGHT_RED() {
    return new Shellcolor(self::FG_LIGHT_RED);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_PURPLE() {
    return new Shellcolor(self::FG_PURPLE);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_LIGHT_PURPLE() {
    return new Shellcolor(self::FG_LIGHT_PURPLE);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_BROWN() {
    return new Shellcolor(self::FG_BROWN);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_YELLOW() {
    return new Shellcolor(self::FG_YELLOW);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_LIGHT_GRAY() {
    return new Shellcolor(self::FG_LIGHT_GRAY);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function FG_WHITE() {
    return new Shellcolor(self::FG_WHITE);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function BG_BLACK() {
    return new Shellcolor(self::BG_BLACK);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function BG_RED() {
    return new Shellcolor(self::BG_RED);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function BG_GREEN() {
    return new Shellcolor(self::BG_GREEN);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function BG_YELLOW() {
    return new Shellcolor(self::BG_YELLOW);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function BG_BLUE() {
    return new Shellcolor(self::BG_BLUE);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function BG_CYAN() {
    return new Shellcolor(self::BG_CYAN);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function BG_MAGENTA() {
    return new Shellcolor(self::BG_MAGENTA);
  }

  /**
   * 
   * @return \Andou\Shelltools\Shellcolor
   */
  public static function BG_LIGHT_GREY() {
    return new Shellcolor(self::BG_LIGHT_GREY);
  }

}
