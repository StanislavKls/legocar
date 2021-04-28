<?php

return [
    'cars/page/([0-9]+)'    => 'cars/index/$1',
    'cars/([0-9]+)'         => 'cars/view/$1',
    'cars/create'           => 'cars/create', 
    'cars/store'            => 'cars/store',
    'cars/edit/([0-9]+)'             => 'cars/edit/$1',
    'cars/update/([0-9]+)'  => 'cars/update/$1',
    //'cars'                => 'cars/index',                 // action 'index' in CarsController
    'admin_panel'           => 'admin/index',                // action 'index' in AdminController
    'create_user'           => 'admin/createUser',
    'users/([0-9]+)'        => 'admin/destroyUser/$1',
    'brands/([0-9]+)'       => 'admin/destroyBrand/$1',
    'users'                 => 'admin/users',
    'brands'                => 'admin/brands',
    'add_user'              => 'admin/addUser',
    'index'                 => 'home/index',
    'login/exit'            => 'home/exit',
    'login'                 => 'home/login',
    
    ];
