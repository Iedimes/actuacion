<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'custumer' => [
        'title' => 'Custumers',

        'actions' => [
            'index' => 'Custumers',
            'create' => 'New Custumer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'document' => [
        'title' => 'Documents',

        'actions' => [
            'index' => 'Documents',
            'create' => 'New Document',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            
        ],
    ],

    'impression' => [
        'title' => 'Impressions',

        'actions' => [
            'index' => 'Impressions',
            'create' => 'New Impression',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'doc_id' => 'Doc',
            'cli_id' => 'Cli',
            
        ],
    ],

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cedula' => 'Cedula',
            'nombre' => 'Nombre',
            'doc_id' => 'Doc',
            
        ],
    ],

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cedula' => 'Cedula',
            'nombre' => 'Nombre',
            
        ],
    ],

    'document' => [
        'title' => 'Documents',

        'actions' => [
            'index' => 'Documents',
            'create' => 'New Document',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            
        ],
    ],

    'impression' => [
        'title' => 'Impressions',

        'actions' => [
            'index' => 'Impressions',
            'create' => 'New Impression',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'doc_id' => 'Doc',
            'cli_id' => 'Cli',
            
        ],
    ],

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'ci' => 'Ci',
            'domicilio' => 'Domicilio',
            'monto' => 'Monto',
            'gasto' => 'Gasto',
            'vto' => 'Vto',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];