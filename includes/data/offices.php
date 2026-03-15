<?php

$offices = [
    [
        'id' => 'tuscolana',
        'name' => 'Ufficio Tuscolana',
        'address' => 'Via Flavio Stilicone 11, 00175 Roma (RM)',
        'phone' => '351 0203838',
        'phone_landline' => '06 87880399',
        'email' => 'info@cafpcpoint.it',
        'type' => 'main',
        'coordinates' => [
            'lat' => '41.854307',
            'lng' => '12.568315',
            'embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2968.5855570850926!2d12.568315315361678!3d41.8543070792221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13258c9c2c2c2c2c%3A0x2c2c2c2c2c2c2c2c!2sVia%20Flavio%20Stilicone%2C%2011%2C%2000175%20Roma%20RM%2C%20Italy!5e0!3m2!1sen!2sit!4v1700000000000!5m2!1sen!2sit'
        ]
    ],
    [
        'id' => 'colli_albani',
        'name' => 'Ufficio Colli Albani',
        'address' => 'Via Genzano 71/A, 00179 Roma (RM)',
        'phone' => '392 0417942',
        'phone_landline' => '06 88910535',
        'email' => 'cafpcpoint@yahoo.com',
        'type' => 'branch',
        'coordinates' => [
            'lat' => '41.88',
            'lng' => '12.55',
            'embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.5!2d12.55!3d41.88!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f5045c2c2c2c2c%3A0x2c2c2c2c2c2c2c2c!2sVia%20Tuscolana%2C%20Rome%2C%20Italy!5e0!3m2!1sen!2sit!4v1700000000000!5m2!1sen!2sit'
        ]
    ]
];

$working_hours = [
    'weekdays' => '9:00 AM - 6:00 PM',
    'saturday' => '10:00 AM - 4:00 PM',
    'days' => 'Monday - Friday'
];

function get_office($id) {
    global $offices;
    foreach ($offices as $office) {
        if ($office['id'] === $id) {
            return $office;
        }
    }
    return null;
}

function get_main_office() {
    global $offices;
    foreach ($offices as $office) {
        if ($office['type'] === 'main') {
            return $office;
        }
    }
    return $offices[0] ?? null;
}

function get_all_offices() {
    global $offices;
    return $offices;
}
