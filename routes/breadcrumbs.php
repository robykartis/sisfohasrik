<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard Super Admin Index
Breadcrumbs::for('superadmin_index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('superadmin.index'));
});
// Dashboard Super Admin > Akun
Breadcrumbs::for('akun', function ($trail) {
    $trail->push('Akun', ('akun.index'));
});
// Dashboard Super Admin > Akun > Add
Breadcrumbs::for('akun_add', function ($trail) {
    $trail->parent('akun');
    $trail->push('Tambah Akun ', ('akun.create'));
});


// Home > Blog
// Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });
