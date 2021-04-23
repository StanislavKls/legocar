<?php

return [
    'cars/([0-9]+)'  => 'cars/view/$1',
    'cars/create'    => 'cars/create', 
    'cars/store'     => 'cars/store',
    'cars'           => 'cars/index',                 // action 'index' in CarsController
    'admin_panel'    => 'admin/index',                // action 'index' in AdminController
    'create_user'    => 'admin/createUser',
    'users/([0-9]+)' => 'admin/destroyUser/$1',
    'users'          => 'admin/users',
    'add_user'       => 'admin/addUser',
    'index'          => 'home/index',
    'login'          => 'home/login',
    ];
