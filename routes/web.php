<?php

use App\Modules\AttributeModule\Attribute\Controllers\AttributeController;
use App\Modules\BattleModule\Battle\Controllers\BattleController;
use App\Modules\BattleModule\BattleInvitation\Controllers\BattleInvitationController;
use App\Modules\KingdomModule\Kingdom\Controllers\KingdomController;
use App\Modules\KnightModule\Knight\Controllers\KnightController;
use App\Modules\PrincessModule\Princess\Controllers\PrincessController;
use App\Modules\VirtueModule\Virtue\Controllers\VirtueController;
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
})->name('home');
Route::get('/test', [KnightController::class, 'test']);

Route::get('/viewBattles', [BattleController::class, 'index'])->name('battle.index');
Route::get('/viewBattles/{id}', [BattleController::class, 'show'])->name('battle.show');

Route::group(['prefix' => 'generate'], function () {
    Route::get('/knights/{kingdomName}', [KnightController::class, 'generateToDatabase'])->name('generate.knights');

    Route::get('/kingdom', [KingdomController::class, 'create'])->name('generate.kingdom.create');
    Route::post('/kingdom/store', [KingdomController::class, 'store'])->name('generate.kingdom.store');

    Route::get('/princess', [PrincessController::class, 'create'])->name('generate.princess.create');
    Route::post('/princess/store', [PrincessController::class, 'store'])->name('generate.princess.store');

    Route::get('/attributes', [AttributeController::class, 'create'])->name('generate.attribute.create');
    Route::post('/attributes/store', [AttributeController::class, 'store'])->name('generate.attribute.store');

    Route::get('/virtues', [VirtueController::class, 'create'])->name('generate.virtue.create');
    Route::post('/virtues/store', [VirtueController::class, 'store'])->name('generate.virtue.store');
});


Route::get('/battleResult/{id}', [BattleController::class, 'battle'])->name('battle.battle');
Route::get('/prepareBattle/{kingdomName}', [BattleInvitationController::class, 'prepareBattle'])->name('kingdom.prepare-battle');
Route::get('/invitation/reject/{token}', [BattleInvitationController::class, 'reject'])->name('invitation.reject');
