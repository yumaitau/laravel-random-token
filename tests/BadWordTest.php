<?php

it('simple safe word test', function () {
    expect(callCheckValue('hello'))->toBeTrue();
});

it('simple bad word test', function () {
    expect(callCheckValue('fuck'))->toBeFalse();
});

it('hidden bad word test', function () {
    expect(callCheckValue('s4it'))->toBeFalse();
});

/**
 * A dirty wrapper for calling the protected method.
 *
 * @return mixed
 *
 * @throws ReflectionException
 */
function callCheckValue(string $input)
{
    $reflection = new ReflectionClass(\YumaIt\RandomToken\RandomToken::class);
    $method = $reflection->getMethod('checkValue');
    $method->setAccessible(true);

    return $method->invokeArgs(null, [$input]);
}
