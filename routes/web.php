<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Admin\ProfilProdiController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MatkulController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\KaryaController;

// Route::get('/', function () {
//     return view('welcome');
// });

//oute::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    //Route::resource('karya', App\Http\Controllers\Admin\KaryaManagementController::class);
//});



//Route::get('/dashboard', function () {
    //return view('admin.pages.dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

//Route::middleware('auth')->group(function () {
   // Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');
    //Route::delete('/rating/{id}', [RatingController::class, 'destroy'])->name('rating.destroy');
//});

//Route::middleware(['auth'])->group(function () {
    //Route::post('/rating', [App\Http\Controllers\RatingController::class, 'store'])->name('rating.store');
    //Route::delete('/rating/{id}', [App\Http\Controllers\RatingController::class, 'destroy'])->name('rating.destroy');
//});


require __DIR__.'/auth.php';

// Home
Route::get('/', function () {
    return view('pages.homepages');
})->name('home');

// Tentang
Route::get('/tentang', function () {
    return view('pages.tentang');
})->name('tentang');

// Dosen
Route::get('/dosen', function () {
    return view('pages.dosen');
})->name('dosen');

// Mata Kuliah
Route::get('/mata-kuliah', function () {
    return view('pages.matkul');
})->name('matkul');

// FAQ
Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

// Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::get('logout', [AuthController::class, 'logout']);

// forgot password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');


// Proses kirim email reset password
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])
    ->middleware('guest')->name('password.email');

// Halaman Reset Password (Form input password baru)
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

// Proses update password baru
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->middleware('guest')->name('password.update');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->middleware('guest')->name('password.update');

// Karya
Route::get('karya', [KaryaController::class, 'karyaUser'])->name('karya.user');
Route::post('karya', [KaryaController::class, 'store'])->name('karya.store');
Route::get('karya/{id}', [KaryaController::class, 'userShow'])->name('karya.show');

// Berita
Route::get('/berita/{id}', function ($id) {
    return view('pages.berita', compact('id'));
})->name('berita');

// Unggah Karya
Route::get('/unggah-karya', function () {
    return view('pages.unggah');
})->name('unggah');

Route::middleware(['auth'])->group(function () {
    
    // User Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Unggah Karya (untuk semua user yang login)
    Route::get('/unggah-karya', function () {
        return view('pages.unggah');
    })->name('unggah');
    Route::post('karya', [KaryaController::class, 'store'])->name('karya.store');
    
    // Rating & Review
    Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');
    Route::delete('/rating/{id}', [RatingController::class, 'destroy'])->name('rating.destroy');
});

// ============================================
// ROUTES KHUSUS ADMIN & SUPERADMIN
// ============================================
Route::middleware(['auth', 'role:admin,superadmin'])->prefix('admin')->group(function () {
    
    // Dashboard Admin
    Route::get('dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');
    
    // Kelola Karya
    Route::get('kelola-karya', function () {
        return view('admin.pages.kelolakarya');
    })->name('kelolakarya');
    
    // Validasi Konten
    Route::get('validasi-konten', function () {
        return view('admin.pages.validasikonten');
    })->name('validasikonten');
    
    // Info Prodi
    Route::get('info-prodi', function () {
        return view('admin.pages.infoprodi');
    })->name('infoprodi');
    
    // Dosen Management
    Route::get('dosen-admin', function () {
        return view('admin.pages.dosen');
    })->name('dosen.admin');
    
    // Ajuan Karya
    Route::get('ajuan-karya', function () {
        return view('admin.pages.ajuankarya');
    })->name('ajuankarya');
    
    // Lihat Karya
    Route::get('lihat-karya', function () {
        return view('admin.pages.lihatkarya');
    })->name('lihatkarya');
    
    // Lihat Validasi
    Route::get('lihat-validasi', function () {
        return view('admin.pages.lihatvalidasi');
    })->name('lihatvalidasi');
    
    // Lihat Pengunjung
    Route::get('lihat-pengunjung', function () {
        return view('admin.pages.lihatpengunjung');
    })->name('lihatpengunjung');
    
    // Tambah Dosen
    Route::get('tambah-dosen', function () {
        return view('admin.pages.tambahdosen');
    })->name('tambahdosen');
    
    // Daftar Admin (CRUD Admin) - Nanti kita bikin controller-nya
    Route::get('daftar-admin', function () {
        return view('admin.pages.daftaradmin');
    })->name('daftaradmin');
});

 
    // Nanti di sini kamu bisa tambah route kelola admin
    // Route::get('kelola-admin', [AdminController::class, 'index'])->name('kelola.admin');
    // Route::post('kelola-admin', [AdminController::class, 'store'])->name('kelola.admin.store');
    // dst...
//});

// Route::middleware(['auth'])->prefix('admin')->group(function () {
//     Route::resource('karya', KaryaManagementController::class);
//     Route::post('karya/{id}/status', [KaryaManagementController::class, 'updateStatus'])->name('karya.status');
// });

//Route::prefix('admin')->name('admin.')->group(function () {
    //Route::resource('karya', KaryaManagementController::class);
    //Route::patch('karya/{karya}/status', [KaryaManagementController::class, 'updateStatus'])
        //->name('karya.updateStatus');
//});

// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::resource('pages.karya', KaryaManagementController::class);
//     Route::patch('karya/{karya}/status', [KaryaManagementController::class, 'updateStatus'])->name('karya.updateStatus');
// });

// Route::get('/karya', [KaryaManagementController::class, 'index'])->name('karya');
// Route::get('/unggah', [KaryaManagementController::class, 'create'])->name('unggah');

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('karya', KaryaManagementController::class);
// });
// Detail Karya
// Route::get('/karya/{id}', function ($id) {
//     return view('pages.detailkarya', compact('id'));
// })->name('detailkarya');

// // Store Karya (untuk handle form submit)
// Route::post('/karya/store', function () {
//     // Nanti bisa diisi logic untuk simpan ke database
//     return redirect()->route('karya')->with('success', 'Karya berhasil diunggah!');
// })->name('karya.store');

// Route::get('ajuankarya', function () {
//     return view('admin.pages.ajuankarya');
// })->name('ajuankarya');

// Route::get('ajuankarya1', function () {
//     return view('admin.pages.ajuankarya1');
// })->name('ajuankarya1');

// Route::get('daftaradmin', function () {
//     return view('admin.pages.daftaradmin');
// })->name('daftaradmin');

// Route::get('dosen', function () {
//     return view('admin.pages.dosen');
// })->name('dosen');

// Route::get('dosen1', function () {
//     return view('admin.pages.dosen1');
// })->name('dosen1');

// Route::get('infoprodi', function () {
//     return view('admin.pages.infoprodi');
// })->name('infoprodi');

// Route::get('infoprodicapaian', function () {
//     return view('admin.pages.infoprodicapaian');
// })->name('infoprodicapaian');

// Route::get('infoproditujuan', function () {
//     return view('admin.pages.infoproditujuan');
// })->name('infoproditujuan');

// Route::get('infoprodividio', function () {
//     return view('admin.pages.infoprodividio');
// })->name('infoprodividio');

// Route::get('infoprodivisimisi', function () {
//     return view('admin.pages.infoprodivisimisi');
// })->name('infoprodivisimisi');


// Route::get('kelolakarya', function () {
//     return view('admin.pages.kelolakarya');
// })->name('kelolakarya');

// Route::get('kelolakarya1', function () {
//     return view('admin.pages.kelolakarya1');
// })->name('kelolakarya1');

//Route::get('kelolakarya3', function () {
    //return view('admin.pages.kelolakarya3');
//})->name('kelolakarya3');

// Route::get('kirimtautan', function () {
//     return view('admin.pages.kirimtautan');
// })->name('ajuankarya');

// Route::get('lihatkarya', function () {
//     return view('admin.pages.lihatkarya');
// })->name('lihatkarya');

// Route::get('lihatpengunjung', function () {
//     return view('admin.pages.lihatpengunjung');
// })->name('lihatpengunjung');

// Route::get('lihatvalidasi', function () {
//     return view('admin.pages.lihatvalidasi');
// })->name('lihatvalidasi');

// Route::get('loginadmin01', function () {
//     return view('admin.pages.loginadmin01');
// })->name('loginadmin01');

// Route::get('lupasandi', function () {
//     return view('admin.pages.lupasandi');
// })->name('lupasandi');

// Route::get('tambahdosen', function () {
//     return view('admin.pages.tambahdosen');
// })->name('tambahdosen');

// Route::get('validasikonten', function () {
//     return view('admin.pages.validasikonten');
// })->name('validasikonten');

// Route::get('validasikonten1', function () {
//     return view('admin.pages.validasikonten1');
// })->name('validasikonten1');

