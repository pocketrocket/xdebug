--TEST--
Test for bug #1270: String parsing marked not covered (> PHP 7.1.3; < PHP 7.2)
--SKIPIF--
<?php if (!version_compare(phpversion(), "7.1.3", '>')) echo "skip > PHP 7.1.3; < PHP 7.2 needed\n"; ?>
<?php if (!version_compare(phpversion(), "7.2", '<=')) echo "skip > PHP 7.1.3; < PHP 7.2 needed\n"; ?>
<?php if (!extension_loaded('zend opcache')) echo "skip opcache required\n"; ?>
--FILE--
<?php
xdebug_start_code_coverage( XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE );

include dirname( __FILE__ ) . '/bug01270.inc';

try { func1(); } catch (Exception $e) { }
try { func2(); } catch (Exception $e) { }
try { func3(); } catch (Exception $e) { }

$cc = xdebug_get_code_coverage();

ksort( $cc );
var_dump( array_slice( $cc, 1, 1 ) );
?>
--EXPECTF--
array(1) {
  ["%sbug01270.inc"]=>
  array(16) {
    [2]=>
    int(1)
    [4]=>
    int(1)
    [5]=>
    int(1)
    [6]=>
    int(1)
    [7]=>
    int(1)
    [11]=>
    int(1)
    [13]=>
    int(1)
    [14]=>
    int(1)
    [15]=>
    int(1)
    [16]=>
    int(1)
    [20]=>
    int(1)
    [22]=>
    int(1)
    [23]=>
    int(1)
    [25]=>
    int(1)
    [27]=>
    int(1)
    [33]=>
    int(1)
  }
}
