<?php

it('simple generate test', function () {
    expect(\YumaIt\RandomToken\RandomToken::generate())->toBeString();
});

it('generate with length test', function () {
    expect(\YumaIt\RandomToken\RandomToken::generate(10))->toHaveLength(10);
    expect(\YumaIt\RandomToken\RandomToken::generate(20))->toHaveLength(20);
    expect(\YumaIt\RandomToken\RandomToken::generate(30))->toHaveLength(30);
});
