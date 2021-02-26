<?php

return [
    'title' => 'Shop',

    'buy' => 'Сагсанд хийх',

    'month-goal' => 'Энэ сарын зорилтот дүн',
    'month-goal-current' => ':count% биелүүлсэн',

    'fields' => [
        'price' => 'Үнэ',
        'total' => 'Нийт',
        'quantity' => 'Хэмжээ',
        'currency' => 'Үнэ',
        'category' => 'Ангилал',
        'package' => 'Package',
        'packages' => 'Packages',
        'gateways' => 'Gateways',
        'servers' => 'Servers',
        'code' => 'Код',
        'discount' => 'Хөнгөлөлт',
        'commands' => 'Commands',
        'start_date' => 'Start date',
        'expire_date' => 'Expire date',
        'required_packages' => 'Required Packages',
        'user_limit' => 'User purchase limit',
    ],

    'actions' => [
        'remove' => 'Хасах',
    ],

    'categories' => [
        'empty' => 'Энэ ангилал хоосон байна.',
    ],

    'cart' => [
        'title' => 'Сагс',
        'error-money' => 'Таны мөнгө хүрэлцэхгүй байна.',
        'purchase' => 'Амжилттай худалдан авлаа.',

        'pay-confirm-title' => 'Худалдан авах уу ?',
        'pay-confirm' => 'Та нийт :price. үнэ бүхий зүйлийг худалдах авах гэж байна.',

        'guest' => 'Нэвтрэх шаардлагатай.',
        'empty' => 'Таны сагс хоосон байна.',

        'checkout' => 'Checkout',
        'remove' => 'Хасах',
        'clear' => 'Сагсыг цэвэрлэх',
        'pay' => 'Төлөх',

        'coupons' => 'Купон',
        'add-coupon' => 'Купон нэмэх',
        'invalid-coupon' => 'Энэ купон дууссан эсвэл буруу байна.',

        'back' => 'Буцах',

        'total' => 'Нийт: :total',

        'credit' => 'Credit',
    ],

    'payment' => [
        'title' => 'Төлбөрийн хэлбэр',

        'empty' => 'Төлбөрийн хэлбэр холбогдоогүй байна.',

        'info' => 'Purchase #:id on :website',
        'error' => 'Төлбөр төлөлт амжилгүй боллоо.',

        'success' => 'Амжилттай төллөө',
        'success-info' => 'Тун удахгүй таны худалдан авсан эд зүйл олгогдох болно.',

        'redirect-info' => 'If you are not redirected automatically check that javascript is enabled on your browser.',

        'webhook' => 'New payment on the shop',
    ],

    'packages' => [
        'limit' => 'You have purchased the maximum possible for this packages.',
        'requirements' => 'You have not purchased the necessary packages to purchase this package.',
    ],

    'offers' => [
        'title-payment' => 'Төлбөрийн хэлбэр',
        'title-select' => 'Хэмжээ',

        'empty' => 'No offers are currently available.',
    ],
];
