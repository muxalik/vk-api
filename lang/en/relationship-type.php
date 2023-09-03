<?php

use App\Enums\RelationshipType;

return [
    RelationshipType::NONE->value => 'None',
    RelationshipType::SINGLE->value => 'Single',
    RelationshipType::IN_A_RELATIONSHIP->value => 'In a relationship',
    RelationshipType::ENGAGED->value => 'Engaged',
    RelationshipType::MARRIED->value => 'Married',
    RelationshipType::IN_A_CIVIL_UNION->value => 'In a civil union',
    RelationshipType::IN_LOVE->value => 'In love',
    RelationshipType::ITS_COMPLICATED->value => 'It\s complicated',
    RelationshipType::ACTIVELY_SEARCHING->value => 'Actively searching',
];
