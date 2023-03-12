<?php

return [
    'models' => [
        'voter' => App\Models\User::class,
        'vote_credit' => LaravelQuadraticVoting\Models\VoteCredit::class,
        'is_votable' => App\Models\Prospect::class,
    ],

    'table_names' => [
        'votes' => 'votes',
        'vote_credits' => 'vote_bag',
    ],

    'column_names' => [
        'voter_key' => 'voter_id',
    ]
];
