<?php

use App\Http\Controllers\TestController;
use App\Http\Livewire\Admin\OtherConfigPage;
use App\Http\Livewire\Facturation\FacturationAbonnePage;
use App\Http\Livewire\Facturation\FacturationPrivePage;
use App\Http\Livewire\Patients\PatientAbonnePage;
use App\Http\Livewire\Patients\PatientPersonnelPage;
use App\Http\Livewire\Patients\PatientPrivePage;
use App\Http\Livewire\Tarification\ActePage;
use App\Http\Livewire\Tarification\AutrePage;
use App\Http\Livewire\Tarification\ConsultationPage;
use App\Http\Livewire\Tarification\EchoPage;
use App\Http\Livewire\Tarification\LaboPage;
use App\Http\Livewire\Tarification\RadioPage;
use App\Http\Livewire\Tarification\SejourPage;
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

//Patients routes

Route::get('patient-prive',PatientPrivePage::class)->name('patient.prive');
Route::get('patient-abonne',PatientAbonnePage::class)->name('patient.abonne');
Route::get('patient-personel',PatientPersonnelPage::class)->name('patient.personnel');
Route::get('configuration',OtherConfigPage::class)->name('configuration');

//Tarifications routes
Route::get('tarification-labo',LaboPage::class)->name('tarification.labo');
Route::get('tarification-radio',RadioPage::class)->name('tarification.radio');
Route::get('tarification-echo',EchoPage::class)->name('tarification.echo');
Route::get('tarification-consultation',ConsultationPage::class)->name('tarification.consultation');
Route::get('tarification-actes',ActePage::class)->name('tarification.acte');
Route::get('tarification-sejour',SejourPage::class)->name('tarification.sejour');
Route::get('tarification-autres',AutrePage::class)->name('tarification.autre');

//Facturation routes
Route::get('facturation-prive',FacturationPrivePage::class)->name('facturation.prive');
Route::get('facturation-abonne',FacturationAbonnePage::class)->name('facturation.abonne');

