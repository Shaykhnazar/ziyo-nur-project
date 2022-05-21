<?php

return [
    'diploma' => [
        'title' => 'Diplomlar',

        'actions' => [
            'index' => 'Diplomlar',
            'create' => 'Yangi Diplom',
            'edit' => 'Tahrirlash :name',
        ],

        'columns' => [
            'id' => 'ID',
            'number' => 'Raqam',
            'url' => 'Url',

        ],
    ],

    'admin-user' => [
        'title' => 'Foydalanuvchilar',

        'actions' => [
            'index' => 'Foydalanuvchilar',
            'create' => 'Yangi Foydalanuvchi',
            'edit' => 'Tahrirlash :name',
            'edit_profile' => 'Profilni tahrirlash',
            'edit_password' => 'Parolni o\'zgartirish',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Oxirgi kirish',
            'activated' => 'Aktiv',
            'email' => 'Email',
            'first_name' => 'Ism',
            'forbidden' => 'Taqiqlangan',
            'language' => 'Til',
            'last_name' => 'Familiya',
            'password' => 'Parol',
            'password_repeat' => 'Takror parol',

            //Belongs to many relations
            'roles' => 'Rollar',

        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
