<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\LogicalAnd;
use PHPUnit\Framework\Constraint\ArrayHasKey;
use PHPUnit\Framework\Constraint\Attribute;
use PHPUnit\Framework\Constraint\Callback;
use PHPUnit\Framework\Constraint\ClassHasAttribute;
use PHPUnit\Framework\Constraint\ClassHasStaticAttribute;
use PHPUnit\Framework\Constraint\FileExists;
use PHPUnit\Framework\Constraint\GreaterThan;
use PHPUnit\Framework\Constraint\IsAnything;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsIdentical;
use PHPUnit\Framework\Constraint\IsInstanceOf;
use PHPUnit\Framework\Constraint\IsJson;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\Constraint\LessThan;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\ObjectHasAttribute;
use PHPUnit\Framework\Constraint\LogicalOr;
use PHPUnit\Framework\Constraint\LogicalXor;
use PHPUnit\Framework\Constraint\TraversableContainsOnly;
use PHPUnit\Framework\Constraint\TraversableContains;
use PHPUnit\Framework\Constraint\StringStartsWith;
use PHPUnit\Framework\Constraint\StringMatchesFormatDescription;
use PHPUnit\Framework\Constraint\StringEndsWith;
use PHPUnit\Framework\Constraint\StringContains;
use PHPUnit\Framework\Constraint\RegularExpression;

/**
 * Returns a matcher that matches when the method is executed
 * zero or more times.
 *
 * @return PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount
 */
function any()
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::any',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsAnything matcher object.
 *
 * @return IsAnything
 */
function anything()
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::anything',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_ArrayHasKey matcher object.
 *
 * @param mixed $key
 *
 * @return ArrayHasKey
 */
function arrayHasKey($key)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::arrayHasKey',
        func_get_args()
    );
}

/**
 * Asserts that an array has a specified key.
 *
 * @param mixed             $key
 * @param array|ArrayAccess $array
 * @param string            $message
 */
function assertArrayHasKey($key, $array, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertArrayHasKey',
        func_get_args()
    );
}

/**
 * Asserts that an array has a specified subset.
 *
 * @param array|ArrayAccess $subset
 * @param array|ArrayAccess $array
 * @param bool              $strict  Check for object identity
 * @param string            $message
 */
function assertArraySubset($subset, $array, $strict = false, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertArraySubset',
        func_get_args()
    );
}

/**
 * Asserts that an array does not have a specified key.
 *
 * @param mixed             $key
 * @param array|ArrayAccess $array
 * @param string            $message
 */
function assertArrayNotHasKey($key, $array, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertArrayNotHasKey',
        func_get_args()
    );
}

/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object contains a needle.
 *
 * @param mixed  $needle
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 * @param bool   $ignoreCase
 * @param bool   $checkForObjectIdentity
 * @param bool   $checkForNonObjectIdentity
 */
function assertAttributeContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeContains',
        func_get_args()
    );
}

/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object contains only values of a given type.
 *
 * @param string $type
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param bool   $isNativeType
 * @param string $message
 */
function assertAttributeContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeContainsOnly',
        func_get_args()
    );
}

/**
 * Asserts the number of elements of an array, Countable or Traversable
 * that is stored in an attribute.
 *
 * @param int    $expectedCount
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 */
function assertAttributeCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeCount',
        func_get_args()
    );
}

/**
 * Asserts that a static attribute of a class or an attribute of an object
 * is empty.
 *
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 */
function assertAttributeEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeEmpty',
        func_get_args()
    );
}

/**
 * Asserts that a variable is equal to an attribute of an object.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 * @param float  $delta
 * @param int    $maxDepth
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 */
function assertAttributeEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeEquals',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is greater than another value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 */
function assertAttributeGreaterThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeGreaterThan',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is greater than or equal to another value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 */
function assertAttributeGreaterThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeGreaterThanOrEqual',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is of a given type.
 *
 * @param string $expected
 * @param string $attributeName
 * @param mixed  $classOrObject
 * @param string $message
 */
function assertAttributeInstanceOf($expected, $attributeName, $classOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeInstanceOf',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is of a given type.
 *
 * @param string $expected
 * @param string $attributeName
 * @param mixed  $classOrObject
 * @param string $message
 */
function assertAttributeInternalType($expected, $attributeName, $classOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeInternalType',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is smaller than another value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 */
function assertAttributeLessThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeLessThan',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is smaller than or equal to another value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 */
function assertAttributeLessThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeLessThanOrEqual',
        func_get_args()
    );
}

/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object does not contain a needle.
 *
 * @param mixed  $needle
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 * @param bool   $ignoreCase
 * @param bool   $checkForObjectIdentity
 * @param bool   $checkForNonObjectIdentity
 */
function assertAttributeNotContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeNotContains',
        func_get_args()
    );
}

/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object does not contain only values of a given
 * type.
 *
 * @param string $type
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param bool   $isNativeType
 * @param string $message
 */
function assertAttributeNotContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeNotContainsOnly',
        func_get_args()
    );
}

/**
 * Asserts the number of elements of an array, Countable or Traversable
 * that is stored in an attribute.
 *
 * @param int    $expectedCount
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 */
function assertAttributeNotCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeNotCount',
        func_get_args()
    );
}

/**
 * Asserts that a static attribute of a class or an attribute of an object
 * is not empty.
 *
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 */
function assertAttributeNotEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeNotEmpty',
        func_get_args()
    );
}

/**
 * Asserts that a variable is not equal to an attribute of an object.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 * @param float  $delta
 * @param int    $maxDepth
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 */
function assertAttributeNotEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeNotEquals',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is of a given type.
 *
 * @param string $expected
 * @param string $attributeName
 * @param mixed  $classOrObject
 * @param string $message
 */
function assertAttributeNotInstanceOf($expected, $attributeName, $classOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeNotInstanceOf',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is of a given type.
 *
 * @param string $expected
 * @param string $attributeName
 * @param mixed  $classOrObject
 * @param string $message
 */
function assertAttributeNotInternalType($expected, $attributeName, $classOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeNotInternalType',
        func_get_args()
    );
}

/**
 * Asserts that a variable and an attribute of an object do not have the
 * same type and value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param object $actualClassOrObject
 * @param string $message
 */
function assertAttributeNotSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeNotSame',
        func_get_args()
    );
}

/**
 * Asserts that a variable and an attribute of an object have the same type
 * and value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param object $actualClassOrObject
 * @param string $message
 */
function assertAttributeSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertAttributeSame',
        func_get_args()
    );
}

/**
 * Asserts that a class has a specified attribute.
 *
 * @param string $attributeName
 * @param string $className
 * @param string $message
 */
function assertClassHasAttribute($attributeName, $className, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertClassHasAttribute',
        func_get_args()
    );
}

/**
 * Asserts that a class has a specified static attribute.
 *
 * @param string $attributeName
 * @param string $className
 * @param string $message
 */
function assertClassHasStaticAttribute($attributeName, $className, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertClassHasStaticAttribute',
        func_get_args()
    );
}

/**
 * Asserts that a class does not have a specified attribute.
 *
 * @param string $attributeName
 * @param string $className
 * @param string $message
 */
function assertClassNotHasAttribute($attributeName, $className, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertClassNotHasAttribute',
        func_get_args()
    );
}

/**
 * Asserts that a class does not have a specified static attribute.
 *
 * @param string $attributeName
 * @param string $className
 * @param string $message
 */
function assertClassNotHasStaticAttribute($attributeName, $className, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertClassNotHasStaticAttribute',
        func_get_args()
    );
}

/**
 * Asserts that a haystack contains a needle.
 *
 * @param mixed  $needle
 * @param mixed  $haystack
 * @param string $message
 * @param bool   $ignoreCase
 * @param bool   $checkForObjectIdentity
 * @param bool   $checkForNonObjectIdentity
 */
function assertContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertContains',
        func_get_args()
    );
}

/**
 * Asserts that a haystack contains only values of a given type.
 *
 * @param string $type
 * @param mixed  $haystack
 * @param bool   $isNativeType
 * @param string $message
 */
function assertContainsOnly($type, $haystack, $isNativeType = null, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertContainsOnly',
        func_get_args()
    );
}

/**
 * Asserts that a haystack contains only instances of a given classname
 *
 * @param string            $classname
 * @param array|Traversable $haystack
 * @param string            $message
 */
function assertContainsOnlyInstancesOf($classname, $haystack, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertContainsOnlyInstancesOf',
        func_get_args()
    );
}

/**
 * Asserts the number of elements of an array, Countable or Traversable.
 *
 * @param int    $expectedCount
 * @param mixed  $haystack
 * @param string $message
 */
function assertCount($expectedCount, $haystack, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertCount',
        func_get_args()
    );
}

/**
 * Asserts that a variable is empty.
 *
 * @param mixed  $actual
 * @param string $message
 *
 * @throws AssertionFailedError
 */
function assertEmpty($actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertEmpty',
        func_get_args()
    );
}

/**
 * Asserts that a hierarchy of DOMElements matches.
 *
 * @param DOMElement $expectedElement
 * @param DOMElement $actualElement
 * @param bool       $checkAttributes
 * @param string     $message
 */
function assertEqualXMLStructure(DOMElement $expectedElement, DOMElement $actualElement, $checkAttributes = false, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertEqualXMLStructure',
        func_get_args()
    );
}

/**
 * Asserts that two variables are equal.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 * @param float  $delta
 * @param int    $maxDepth
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 */
function assertEquals($expected, $actual, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertEquals',
        func_get_args()
    );
}

/**
 * Asserts that a condition is not true.
 *
 * @param bool   $condition
 * @param string $message
 *
 * @throws AssertionFailedError
 */
function assertNotTrue($condition, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotTrue',
        func_get_args()
    );
}

/**
 * Asserts that a condition is false.
 *
 * @param bool   $condition
 * @param string $message
 *
 * @throws AssertionFailedError
 */
function assertFalse($condition, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertFalse',
        func_get_args()
    );
}

/**
 * Asserts that the contents of one file is equal to the contents of another
 * file.
 *
 * @param string $expected
 * @param string $actual
 * @param string $message
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 */
function assertFileEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertFileEquals',
        func_get_args()
    );
}

/**
 * Asserts that a file exists.
 *
 * @param string $filename
 * @param string $message
 */
function assertFileExists($filename, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertFileExists',
        func_get_args()
    );
}

/**
 * Asserts that the contents of one file is not equal to the contents of
 * another file.
 *
 * @param string $expected
 * @param string $actual
 * @param string $message
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 */
function assertFileNotEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertFileNotEquals',
        func_get_args()
    );
}

/**
 * Asserts that a file does not exist.
 *
 * @param string $filename
 * @param string $message
 */
function assertFileNotExists($filename, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertFileNotExists',
        func_get_args()
    );
}

/**
 * Asserts that a value is greater than another value.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertGreaterThan($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertGreaterThan',
        func_get_args()
    );
}

/**
 * Asserts that a value is greater than or equal to another value.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertGreaterThanOrEqual($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertGreaterThanOrEqual',
        func_get_args()
    );
}

/**
 * Asserts that a variable is of a given type.
 *
 * @param string $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertInstanceOf($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertInstanceOf',
        func_get_args()
    );
}

/**
 * Asserts that a variable is of a given type.
 *
 * @param string $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertInternalType($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertInternalType',
        func_get_args()
    );
}

/**
 * Asserts that a string is a valid JSON string.
 *
 * @param string $actualJson
 * @param string $message
 */
function assertJson($actualJson, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertJson',
        func_get_args()
    );
}

/**
 * Asserts that two JSON files are equal.
 *
 * @param string $expectedFile
 * @param string $actualFile
 * @param string $message
 */
function assertJsonFileEqualsJsonFile($expectedFile, $actualFile, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertJsonFileEqualsJsonFile',
        func_get_args()
    );
}

/**
 * Asserts that two JSON files are not equal.
 *
 * @param string $expectedFile
 * @param string $actualFile
 * @param string $message
 */
function assertJsonFileNotEqualsJsonFile($expectedFile, $actualFile, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertJsonFileNotEqualsJsonFile',
        func_get_args()
    );
}

/**
 * Asserts that the generated JSON encoded object and the content of the given file are equal.
 *
 * @param string $expectedFile
 * @param string $actualJson
 * @param string $message
 */
function assertJsonStringEqualsJsonFile($expectedFile, $actualJson, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertJsonStringEqualsJsonFile',
        func_get_args()
    );
}

/**
 * Asserts that two given JSON encoded objects or arrays are equal.
 *
 * @param string $expectedJson
 * @param string $actualJson
 * @param string $message
 */
function assertJsonStringEqualsJsonString($expectedJson, $actualJson, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertJsonStringEqualsJsonString',
        func_get_args()
    );
}

/**
 * Asserts that the generated JSON encoded object and the content of the given file are not equal.
 *
 * @param string $expectedFile
 * @param string $actualJson
 * @param string $message
 */
function assertJsonStringNotEqualsJsonFile($expectedFile, $actualJson, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertJsonStringNotEqualsJsonFile',
        func_get_args()
    );
}

/**
 * Asserts that two given JSON encoded objects or arrays are not equal.
 *
 * @param string $expectedJson
 * @param string $actualJson
 * @param string $message
 */
function assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertJsonStringNotEqualsJsonString',
        func_get_args()
    );
}

/**
 * Asserts that a value is smaller than another value.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertLessThan($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertLessThan',
        func_get_args()
    );
}

/**
 * Asserts that a value is smaller than or equal to another value.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertLessThanOrEqual($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertLessThanOrEqual',
        func_get_args()
    );
}

/**
 * Asserts that a variable is finite.
 *
 * @param mixed  $actual
 * @param string $message
 */
function assertFinite($actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertFinite',
        func_get_args()
    );
}

/**
 * Asserts that a variable is infinite.
 *
 * @param mixed  $actual
 * @param string $message
 */
function assertInfinite($actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertInfinite',
        func_get_args()
    );
}

/**
 * Asserts that a variable is nan.
 *
 * @param mixed  $actual
 * @param string $message
 */
function assertNan($actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNan',
        func_get_args()
    );
}

/**
 * Asserts that a haystack does not contain a needle.
 *
 * @param mixed  $needle
 * @param mixed  $haystack
 * @param string $message
 * @param bool   $ignoreCase
 * @param bool   $checkForObjectIdentity
 * @param bool   $checkForNonObjectIdentity
 */
function assertNotContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotContains',
        func_get_args()
    );
}

/**
 * Asserts that a haystack does not contain only values of a given type.
 *
 * @param string $type
 * @param mixed  $haystack
 * @param bool   $isNativeType
 * @param string $message
 */
function assertNotContainsOnly($type, $haystack, $isNativeType = null, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotContainsOnly',
        func_get_args()
    );
}

/**
 * Asserts the number of elements of an array, Countable or Traversable.
 *
 * @param int    $expectedCount
 * @param mixed  $haystack
 * @param string $message
 */
function assertNotCount($expectedCount, $haystack, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotCount',
        func_get_args()
    );
}

/**
 * Asserts that a variable is not empty.
 *
 * @param mixed  $actual
 * @param string $message
 *
 * @throws AssertionFailedError
 */
function assertNotEmpty($actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotEmpty',
        func_get_args()
    );
}

/**
 * Asserts that two variables are not equal.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 * @param float  $delta
 * @param int    $maxDepth
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 */
function assertNotEquals($expected, $actual, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotEquals',
        func_get_args()
    );
}

/**
 * Asserts that a variable is not of a given type.
 *
 * @param string $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertNotInstanceOf($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotInstanceOf',
        func_get_args()
    );
}

/**
 * Asserts that a variable is not of a given type.
 *
 * @param string $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertNotInternalType($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotInternalType',
        func_get_args()
    );
}

/**
 * Asserts that a condition is not false.
 *
 * @param bool   $condition
 * @param string $message
 *
 * @throws AssertionFailedError
 */
function assertNotFalse($condition, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotFalse',
        func_get_args()
    );
}

/**
 * Asserts that a variable is not null.
 *
 * @param mixed  $actual
 * @param string $message
 */
function assertNotNull($actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotNull',
        func_get_args()
    );
}

/**
 * Asserts that a string does not match a given regular expression.
 *
 * @param string $pattern
 * @param string $string
 * @param string $message
 */
function assertNotRegExp($pattern, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotRegExp',
        func_get_args()
    );
}

/**
 * Asserts that two variables do not have the same type and value.
 * Used on objects, it asserts that two variables do not reference
 * the same object.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertNotSame($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotSame',
        func_get_args()
    );
}

/**
 * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
 * is not the same.
 *
 * @param array|Countable|Traversable $expected
 * @param array|Countable|Traversable $actual
 * @param string                      $message
 */
function assertNotSameSize($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNotSameSize',
        func_get_args()
    );
}

/**
 * Asserts that a variable is null.
 *
 * @param mixed  $actual
 * @param string $message
 */
function assertNull($actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertNull',
        func_get_args()
    );
}

/**
 * Asserts that an object has a specified attribute.
 *
 * @param string $attributeName
 * @param object $object
 * @param string $message
 */
function assertObjectHasAttribute($attributeName, $object, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertObjectHasAttribute',
        func_get_args()
    );
}

/**
 * Asserts that an object does not have a specified attribute.
 *
 * @param string $attributeName
 * @param object $object
 * @param string $message
 */
function assertObjectNotHasAttribute($attributeName, $object, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertObjectNotHasAttribute',
        func_get_args()
    );
}

/**
 * Asserts that a string matches a given regular expression.
 *
 * @param string $pattern
 * @param string $string
 * @param string $message
 */
function assertRegExp($pattern, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertRegExp',
        func_get_args()
    );
}

/**
 * Asserts that two variables have the same type and value.
 * Used on objects, it asserts that two variables reference
 * the same object.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertSame($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertSame',
        func_get_args()
    );
}

/**
 * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
 * is the same.
 *
 * @param array|Countable|Traversable $expected
 * @param array|Countable|Traversable $actual
 * @param string                      $message
 */
function assertSameSize($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertSameSize',
        func_get_args()
    );
}

/**
 * Asserts that a string ends not with a given prefix.
 *
 * @param string $suffix
 * @param string $string
 * @param string $message
 */
function assertStringEndsNotWith($suffix, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertStringEndsNotWith',
        func_get_args()
    );
}

/**
 * Asserts that a string ends with a given prefix.
 *
 * @param string $suffix
 * @param string $string
 * @param string $message
 */
function assertStringEndsWith($suffix, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertStringEndsWith',
        func_get_args()
    );
}

/**
 * Asserts that the contents of a string is equal
 * to the contents of a file.
 *
 * @param string $expectedFile
 * @param string $actualString
 * @param string $message
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 */
function assertStringEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertStringEqualsFile',
        func_get_args()
    );
}

/**
 * Asserts that a string matches a given format string.
 *
 * @param string $format
 * @param string $string
 * @param string $message
 */
function assertStringMatchesFormat($format, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertStringMatchesFormat',
        func_get_args()
    );
}

/**
 * Asserts that a string matches a given format file.
 *
 * @param string $formatFile
 * @param string $string
 * @param string $message
 */
function assertStringMatchesFormatFile($formatFile, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertStringMatchesFormatFile',
        func_get_args()
    );
}

/**
 * Asserts that the contents of a string is not equal
 * to the contents of a file.
 *
 * @param string $expectedFile
 * @param string $actualString
 * @param string $message
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 */
function assertStringNotEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertStringNotEqualsFile',
        func_get_args()
    );
}

/**
 * Asserts that a string does not match a given format string.
 *
 * @param string $format
 * @param string $string
 * @param string $message
 */
function assertStringNotMatchesFormat($format, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertStringNotMatchesFormat',
        func_get_args()
    );
}

/**
 * Asserts that a string does not match a given format string.
 *
 * @param string $formatFile
 * @param string $string
 * @param string $message
 */
function assertStringNotMatchesFormatFile($formatFile, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertStringNotMatchesFormatFile',
        func_get_args()
    );
}

/**
 * Asserts that a string starts not with a given prefix.
 *
 * @param string $prefix
 * @param string $string
 * @param string $message
 */
function assertStringStartsNotWith($prefix, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertStringStartsNotWith',
        func_get_args()
    );
}

/**
 * Asserts that a string starts with a given prefix.
 *
 * @param string $prefix
 * @param string $string
 * @param string $message
 */
function assertStringStartsWith($prefix, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertStringStartsWith',
        func_get_args()
    );
}

/**
 * Evaluates a PHPUnit_Framework_Constraint matcher object.
 *
 * @param mixed      $value
 * @param Constraint $constraint
 * @param string     $message
 */
function assertThat($value, Constraint $constraint, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertThat',
        func_get_args()
    );
}

/**
 * Asserts that a condition is true.
 *
 * @param bool   $condition
 * @param string $message
 *
 * @throws AssertionFailedError
 */
function assertTrue($condition, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertTrue',
        func_get_args()
    );
}

/**
 * Asserts that two XML files are equal.
 *
 * @param string $expectedFile
 * @param string $actualFile
 * @param string $message
 */
function assertXmlFileEqualsXmlFile($expectedFile, $actualFile, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertXmlFileEqualsXmlFile',
        func_get_args()
    );
}

/**
 * Asserts that two XML files are not equal.
 *
 * @param string $expectedFile
 * @param string $actualFile
 * @param string $message
 */
function assertXmlFileNotEqualsXmlFile($expectedFile, $actualFile, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertXmlFileNotEqualsXmlFile',
        func_get_args()
    );
}

/**
 * Asserts that two XML documents are equal.
 *
 * @param string $expectedFile
 * @param string $actualXml
 * @param string $message
 */
function assertXmlStringEqualsXmlFile($expectedFile, $actualXml, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertXmlStringEqualsXmlFile',
        func_get_args()
    );
}

/**
 * Asserts that two XML documents are equal.
 *
 * @param string $expectedXml
 * @param string $actualXml
 * @param string $message
 */
function assertXmlStringEqualsXmlString($expectedXml, $actualXml, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertXmlStringEqualsXmlString',
        func_get_args()
    );
}

/**
 * Asserts that two XML documents are not equal.
 *
 * @param string $expectedFile
 * @param string $actualXml
 * @param string $message
 */
function assertXmlStringNotEqualsXmlFile($expectedFile, $actualXml, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertXmlStringNotEqualsXmlFile',
        func_get_args()
    );
}

/**
 * Asserts that two XML documents are not equal.
 *
 * @param string $expectedXml
 * @param string $actualXml
 * @param string $message
 */
function assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, $message = '')
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::assertXmlStringNotEqualsXmlString',
        func_get_args()
    );
}

/**
 * Returns a matcher that matches when the method is executed
 * at the given $index.
 *
 * @param int $index
 *
 * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtIndex
 */
function at($index)
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::at',
        func_get_args()
    );
}

/**
 * Returns a matcher that matches when the method is executed at least once.
 *
 * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastOnce
 */
function atLeastOnce()
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::atLeastOnce',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Attribute matcher object.
 *
 * @param Constraint $constraint
 * @param string     $attributeName
 *
 * @return Attribute
 */
function attribute(Constraint $constraint, $attributeName)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::attribute',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsEqual matcher object
 * that is wrapped in a PHPUnit_Framework_Constraint_Attribute matcher
 * object.
 *
 * @param string $attributeName
 * @param mixed  $value
 * @param float  $delta
 * @param int    $maxDepth
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 *
 * @return Attribute
 */
function attributeEqualTo($attributeName, $value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::attributeEqualTo',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Callback matcher object.
 *
 * @param callable $callback
 *
 * @return Callback
 */
function callback($callback)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::callback',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_ClassHasAttribute matcher object.
 *
 * @param string $attributeName
 *
 * @return ClassHasAttribute
 */
function classHasAttribute($attributeName)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::classHasAttribute',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_ClassHasStaticAttribute matcher
 * object.
 *
 * @param string $attributeName
 *
 * @return ClassHasStaticAttribute
 */
function classHasStaticAttribute($attributeName)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::classHasStaticAttribute',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_TraversableContains matcher
 * object.
 *
 * @param mixed $value
 * @param bool  $checkForObjectIdentity
 * @param bool  $checkForNonObjectIdentity
 *
 * @return TraversableContains
 */
function contains($value, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::contains',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_TraversableContainsOnly matcher
 * object.
 *
 * @param string $type
 *
 * @return TraversableContainsOnly
 */
function containsOnly($type)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::containsOnly',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_TraversableContainsOnly matcher
 * object.
 *
 * @param string $classname
 *
 * @return TraversableContainsOnly
 */
function containsOnlyInstancesOf($classname)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::containsOnlyInstancesOf',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsEqual matcher object.
 *
 * @param mixed $value
 * @param float $delta
 * @param int   $maxDepth
 * @param bool  $canonicalize
 * @param bool  $ignoreCase
 *
 * @return IsEqual
 */
function equalTo($value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::equalTo',
        func_get_args()
    );
}

/**
 * Returns a matcher that matches when the method is executed
 * exactly $count times.
 *
 * @param int $count
 *
 * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
 */
function exactly($count)
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::exactly',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_FileExists matcher object.
 *
 * @return FileExists
 */
function fileExists()
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::fileExists',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_GreaterThan matcher object.
 *
 * @param mixed $value
 *
 * @return GreaterThan
 */
function greaterThan($value)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::greaterThan',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Or matcher object that wraps
 * a PHPUnit_Framework_Constraint_IsEqual and a
 * PHPUnit_Framework_Constraint_GreaterThan matcher object.
 *
 * @param mixed $value
 *
 * @return LogicalOr
 */
function greaterThanOrEqual($value)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::greaterThanOrEqual',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsIdentical matcher object.
 *
 * @param mixed $value
 *
 * @return IsIdentical
 */
function identicalTo($value)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::identicalTo',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsEmpty matcher object.
 *
 * @return IsEmpty
 */
function isEmpty()
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::isEmpty',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsFalse matcher object.
 *
 * @return IsFalse
 */
function isFalse()
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::isFalse',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsInstanceOf matcher object.
 *
 * @param string $className
 *
 * @return IsInstanceOf
 */
function isInstanceOf($className)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::isInstanceOf',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsJson matcher object.
 *
 * @return IsJson
 */
function isJson()
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::isJson',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsNull matcher object.
 *
 * @return IsNull
 */
function isNull()
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::isNull',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsTrue matcher object.
 *
 * @return IsTrue
 */
function isTrue()
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::isTrue',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsType matcher object.
 *
 * @param string $type
 *
 * @return IsType
 */
function isType($type)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::isType',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_LessThan matcher object.
 *
 * @param mixed $value
 *
 * @return LessThan
 */
function lessThan($value)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::lessThan',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Or matcher object that wraps
 * a PHPUnit_Framework_Constraint_IsEqual and a
 * PHPUnit_Framework_Constraint_LessThan matcher object.
 *
 * @param mixed $value
 *
 * @return LogicalOr
 */
function lessThanOrEqual($value)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::lessThanOrEqual',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_And matcher object.
 *
 * @return LogicalAnd
 */
function logicalAnd()
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::logicalAnd',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Not matcher object.
 *
 * @param Constraint $constraint
 *
 * @return LogicalNot
 */
function logicalNot(Constraint $constraint)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::logicalNot',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Or matcher object.
 *
 * @return LogicalOr
 */
function logicalOr()
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::logicalOr',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Xor matcher object.
 *
 * @return LogicalXor
 */
function logicalXor()
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::logicalXor',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_StringMatches matcher object.
 *
 * @param string $string
 *
 * @return StringMatchesFormatDescription
 */
function matches($string)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::matches',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_PCREMatch matcher object.
 *
 * @param string $pattern
 *
 * @return RegularExpression
 */
function matchesRegularExpression($pattern)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::matchesRegularExpression',
        func_get_args()
    );
}

/**
 * Returns a matcher that matches when the method is never executed.
 *
 * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
 */
function never()
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::never',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_ObjectHasAttribute matcher object.
 *
 * @param string $attributeName
 *
 * @return ObjectHasAttribute
 */
function objectHasAttribute($attributeName)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::objectHasAttribute',
        func_get_args()
    );
}

/**
 * @param mixed $value, ...
 *
 * @return PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls
 */
function onConsecutiveCalls()
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::onConsecutiveCalls',
        func_get_args()
    );
}

/**
 * Returns a matcher that matches when the method is executed exactly once.
 *
 * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
 */
function once()
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::once',
        func_get_args()
    );
}

/**
 * @param int $argumentIndex
 *
 * @return PHPUnit_Framework_MockObject_Stub_ReturnArgument
 */
function returnArgument($argumentIndex)
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::returnArgument',
        func_get_args()
    );
}

/**
 * @param mixed $callback
 *
 * @return PHPUnit_Framework_MockObject_Stub_ReturnCallback
 */
function returnCallback($callback)
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::returnCallback',
        func_get_args()
    );
}

/**
 * Returns the current object.
 *
 * This method is useful when mocking a fluent interface.
 *
 * @return PHPUnit_Framework_MockObject_Stub_ReturnSelf
 */
function returnSelf()
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::returnSelf',
        func_get_args()
    );
}

/**
 * @param mixed $value
 *
 * @return PHPUnit_Framework_MockObject_Stub_Return
 */
function returnValue($value)
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::returnValue',
        func_get_args()
    );
}

/**
 * @param array $valueMap
 *
 * @return PHPUnit_Framework_MockObject_Stub_ReturnValueMap
 */
function returnValueMap(array $valueMap)
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::returnValueMap',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_StringContains matcher object.
 *
 * @param string $string
 * @param bool   $case
 *
 * @return StringContains
 */
function stringContains($string, $case = true)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::stringContains',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_StringEndsWith matcher object.
 *
 * @param mixed $suffix
 *
 * @return StringEndsWith
 */
function stringEndsWith($suffix)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::stringEndsWith',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_StringStartsWith matcher object.
 *
 * @param mixed $prefix
 *
 * @return StringStartsWith
 */
function stringStartsWith($prefix)
{
    return call_user_func_array(
        'PHPUnit\Framework\Assert::stringStartsWith',
        func_get_args()
    );
}

/**
 * @param Exception $exception
 *
 * @return PHPUnit_Framework_MockObject_Stub_Exception
 */
function throwException(Exception $exception)
{
    return call_user_func_array(
        'PHPUnit\Framework\TestCase::throwException',
        func_get_args()
    );
}
