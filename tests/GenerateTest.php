<?php

use YumaIt\RandomToken\RandomToken;

it('simple generate test', function () {
    expect(RandomToken::generate())->toBeString();
});

it('generate with length test', function () {
    expect(RandomToken::generate(10))->toHaveLength(10);
    expect(RandomToken::generate(20))->toHaveLength(20);
    expect(RandomToken::generate(30))->toHaveLength(30);
});
