<?php

use App\Enums\Relationships;

return [
    Relationships::NONE->value => 'None',
    Relationships::SINGLE->value => 'Single',
    Relationships::IN_A_RELATIONSHIP->value => 'In a relationship',
    Relationships::ENGAGED->value => 'Engaged',
    Relationships::MARRIED->value => 'Married',
    Relationships::IN_A_CIVIL_UNION->value => 'In a civil union',
    Relationships::IN_LOVE->value => 'In love',
    Relationships::ITS_COMPLICATED->value => 'It\s complicated',
    Relationships::ACTIVELY_SEARCHING->value => 'Actively searching',
];
