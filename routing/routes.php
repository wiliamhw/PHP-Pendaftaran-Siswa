<?php

$router->define([

    // Entry
    '' => 'routing/redirect.php',
    'entry/user/login' => 'entry/views/user-login.view.php',
    'entry/user/register' => 'entry/views/user-register.view.php',
    'entry/admin/login' => 'entry/views/admin-login.view.php',
    'entry/admin/register' => 'entry/views/admin-register.view.php',
    'entry/reset-pass' => 'entry/views/reset-pass.view.php',
    'entry/logout' => 'entry/assets/logout.asset.php',

    // Main
    'main/dashboard' => 'main/views/index.view.php',
    'main/siswa/list' => 'main/views/list-siswa.view.php',
    'main/profile' => 'main/views/profile.view.php',
    'main/siswa/daftar' => 'main/views/form-daftar.view.php',
]);