<?php

namespace ParserReflection\Stub;

abstract class ExplicitAbstractClass {}

abstract class ImplicitAbstractClass
{
    private $a = 'foo';
    protected $b = 'bar';
    public $c = 'baz';

    abstract function test();
}

final class FinalClass
{
    public $args = [];
    public function __construct($a = null, &$b = null)
    {
        $this->args = array_slice(array($a, &$b), 0, func_num_args());
    }
}

interface SimpleInterface {}

interface InterfaceWithMethod {
    function foo();
}

trait SimpleTrait
{
    function foo() { return __CLASS__; }
}

class SimpleInheritance extends ExplicitAbstractClass {}

abstract class SimpleAbstractInheritance extends ImplicitAbstractClass
{
    public $b = 'bar1';
    public $d = 'foobar';
    private $e = 'foobaz';
}

class ClassWithInterface implements SimpleInterface {}

class ClassWithTrait
{
    use SimpleTrait;
}

class ClassWithTraitAndInterface implements InterfaceWithMethod
{
    use SimpleTrait;
}

class NoCloneable
{
    private function __clone() {}
}

class NoInstantiable
{
    private function __construct() {}
}

interface AbstractInterface
{
    public function foo();
    public function bar();
}

class ClassWithScalarConstants
{
    const A = 10, A1 = 11;
    const B = 42.0;
    const C = 'foo';
    const D = false;
}

class ClassWithMagicConstants
{
    const A = __DIR__;
    const B = __FILE__;
    const C = __NAMESPACE__;
    const D = __CLASS__;
    const E = __LINE__;

    public static $a    = self::A;
    protected static $b = self::B;
    private static $c   = self::C;
}

const NS_CONST = 'test';

class ClassWithConstantsAndInheritance extends ClassWithMagicConstants
{
    const A = 'overridden';
    const H = M_PI;
    const J = NS_CONST;

    public static $h = self::H;
}

trait TraitWithProperties
{
    private $a = 'foo';
    protected $b = 'bar';
    public $c = 'baz';

    private static $as = 1;
    protected static $bs = __TRAIT__;
    public static $cs = 'foo';
}