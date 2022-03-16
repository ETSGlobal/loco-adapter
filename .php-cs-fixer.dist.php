<?php

$finder = PhpCsFixer\Finder::create();
$finder->in(__DIR__.'/src')
    ->in(__DIR__.'/tests')
    ->name('*.php');

$config = new PhpCsFixer\Config();
$config->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
    ])
    ->setFinder($finder)
;

return $config;
