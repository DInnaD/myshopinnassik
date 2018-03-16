<?php

use SleepingOwl\Admin\Navigation\Page;


return [
    [
        'title' => 'Dashboard',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ],

    [
        'title' => "Main",
        'icon' => 'fa fa-credit-card',
        'priority' =>'1000',
        'pages' => [
            (new Page(\App\Category::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),
        ],
    ],
    [
        'title' => "Brands",
        'icon' => 'fa fa-credit-card',
        'priority' =>'1000',
        'pages' => [
            (new Page(\App\Brand::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),
        ],

    ],

    [
        'title' => "Products",
        'icon' => 'fa fa-credit-card',
        'priority' =>'1000',
        'pages' => [
            (new Page(\App\Product::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),
        ],
    ],

    ];