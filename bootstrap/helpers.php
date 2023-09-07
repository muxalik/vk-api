<?php

function randomOrCreate(string $class, string $key = 'id') {
    return $class::inRandomOrder()->value($key) ?? $class::factory()->create();
}