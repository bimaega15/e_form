<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('setting.roles.index'));
});

Breadcrumbs::for('permissions', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Permissions', route('setting.permissions.index'));
});

Breadcrumbs::for('settings', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Settings', route('setting.settings.index'));
});

Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Profile', route('account.profile.index'));
});

Breadcrumbs::for('menu', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Menu', route('master.menu.index'));
});

Breadcrumbs::for('myProfile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('My Profile', route('myProfile.index'));
});

Breadcrumbs::for('categoryOffice', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kategori Office', route('master.categoryOffice.index'));
});

Breadcrumbs::for('metodePembayaran', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Metode Pembayaran', route('master.metodePembayaran.index'));
});

Breadcrumbs::for('typeProduct', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Tipe Produk', route('master.typeProduct.index'));
});

Breadcrumbs::for('jabatan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Jabatan', route('master.jabatan.index'));
});

Breadcrumbs::for('unit', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Unit', route('master.unit.index'));
});
