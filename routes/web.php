<?php

use App\Http\Controllers\TestController;
use App\Http\Livewire\Admin\ConfigPage;
use App\Http\Livewire\Patients\PatientAbonnePage;
use App\Http\Livewire\Patients\PatientPersonnelPage;
use App\Http\Livewire\Patients\PatientPrivePage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TestController::class)->group(function(){
    Route::get('test','test');
    Route::get('test2','test2');
});

Route::get('patient-prive',PatientPrivePage::class)->name('patient.prive');
Route::get('patient-abonne',PatientAbonnePage::class)->name('patient.abonne');
Route::get('patient-personel',PatientPersonnelPage::class)->name('patient.personnel');
Route::get('configuration',ConfigPage::class)->name('configuration');
