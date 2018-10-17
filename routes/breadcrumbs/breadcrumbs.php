<?php

// Home
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('dashboard'));
});


/*
 *  Administration Module
 */
 
// Home > Role List
Breadcrumbs::register('role_list', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Role List', route('role.create'));
});

Breadcrumbs::register('role_permission', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Add Role Permission', route('permission.index'));
});

Breadcrumbs::register('user_list', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('User List', route('user-registration.index'));
});