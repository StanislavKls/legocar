<?php

return [
    'cars/([0-9]+)' => 'cars/view/$1',
    'cars'          => 'cars/index',                 // action 'index' in CarsController
    'admin_panel'   => 'admin/index'                 // action 'index' in AdminController
    ];
