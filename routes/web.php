<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/budget', function () {
    return view('dashboards.budget');
})->name('dashboard.budget');

Route::get('/dashboard/activities', function () {
    return view('dashboards.activities');
})->name('dashboard.activities');

Route::get('/dashboard/budget-vs-actuals', function () {
    return view('dashboards.budget-vs-actuals');
})->name('dashboard.budget-vs-actuals');

Route::get('/dashboard/milestones', function () {
    return view('dashboards.milestones');
})->name('dashboard.milestones');
