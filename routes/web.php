<?php
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\KaryaController;
use App\Http\Controllers\Admin\ProfilProdiController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\MataKuliahController;
use App\Http\Controllers\BeritaUserController;
use Illuminate\Support\Facades\Mail; // 
use App\Mail\SendEmail; // 
use App\Models\Dosen;
use App\Models\Karya;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// tambahkan route baru
Route::get('/mail/send', function () {
    $data = [
        'subject' => 'Testing Kirim Email',
        'title' => 'Testing Kirim Email',
        'body' => 'Ini adalah email uji coba dari Tutorial Laravel: Send Email Via SMTP GMAIL @ qadrLabs.com'
    ];

    Mail::to('email_tujuan@gmail.com')->send(new SendEmail($data));

});

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

// Home
//Route::get('/', function () {
    //return view('pages.homepages');
//})->name('home');

require __DIR__.'/auth.php';

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Tentang
// Halaman Tentang Prodi untuk user
Route::get('/tentang', [ProfilProdiController::class, 'showUser'])
    ->name('tentang');
// Dosen
Route::get('/dosen', function () {
    $dosens = Dosen::all();
    return view('pages.dosen', compact('dosens'));
})->name('homepage.dosen'); 


// Route untuk USER (bisa lihat doang)
Route::get('/matakuliah', [MataKuliahController::class, 'indexUser'])->name('matakuliah.user');

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
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// forgot password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password.submit');

Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password/{token}', [AuthController::class, 'submitResetPassword'])->name('reset-password.submit');

// Proses update password baru

// Karya
// Route::get('karya', [KaryaController::class, 'karyaUser'])->name('karya.user');
// Route::post('karya', [KaryaController::class, 'store'])->name('karya.store');
// Route::get('karya/{id}', [KaryaController::class, 'userShow'])->name('karya.show');

    //cari karya lainnya
    Route::get('karya', function(Request $request){
    $query = Karya::where('status_validasi', 'accepted');

    if ($request->has('judul')) {
        $query->where('judul', 'like', '%' . $request->judul . '%');
    }
    
    if ($request->has('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    $karya = $query->get();

    return view('pages.karya',compact('karya'));
    });

    //cari karya lainnya (2)
    Route::get('karya/{id}', function($id){
        $karya=Karya::find($id);
        $review = Review::with('user')->where('karya_id', $id)->get();
        return view('pages.detailkarya',compact('karya','review'));
    });

    // Admin routes
    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('berita', BeritaController::class);
    });

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/{id}', [BeritaController::class, 'indexUser'])->name('berita.show');

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
    Route::post('review', [ReviewController::class, 'store'])->name('review.store');
});

// ============================================
// ROUTES KHUSUS ADMIN
// ============================================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    
    // Dashboard Admin
    Route::get('dashboard', function () {
    return view('admin.pages.dashboard');
    })->name('dashboard');
    
    // Kelola Karya masih salah masih error
    Route::get('karya/validasi', [KaryaController::class, 'validation'])->name("karya.validasi");
    Route::get('karya/validasi/{id}', [KaryaController::class, 'validationForm'])->name("karya.form");
    Route::resource('karya', KaryaController::class);

    // Info Prodi
    Route::resource('info-prodi', ProfilProdiController::class);
    Route::get('/info-prodi/{kodeProdi}/edit/{type}', 
        [ProfilProdiController::class, 'editWithType']
    )->name('info-prodi.editType');

    // Dosen 
    Route::get('dosen', function () {
        $dosens = Dosen::all();
        return view('admin.pages.dosen', compact('dosens'));
    })->name('dosen.index');
    Route::get('dosen/create', function () {
        return view('admin.pages.tambahdosen');
    })->name('dosen.create');
    Route::post('dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');

    //ini terbaru yaps
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
    Route::get('/dosen/{id}', [DosenController::class, 'show'])->name('dosen.show');

    // Ajuan Karya
    Route::get('ajuankarya', function () {
        // karya yang statusnya submission
        $karyas = Karya::where('status_validasi', 'submission')->get();
        return view('admin.pages.ajuankarya', compact('karyas'));
    })->name('ajuankarya');

    Route::get('ajuankarya1', function () {
    return view('admin.pages.ajuankarya1');
    })->name('ajuankarya1');

    // Lihat Karya
    Route::get('lihatkarya', function () {
        $karyas = Karya::where('status_validasi', 'accepted')->get();        
        return view('admin.pages.lihatkarya', compact('karyas'));
    })->name('lihatkarya');
    
    // Lihat Validasi
    Route::get('lihatvalidasi', function () {
    return view('admin.pages.lihatvalidasi');
    })->name('lihatvalidasi');

    // Route::get('validasikonten', function () {
    // return view('admin.pages.validasikonten');
    // })->name('validasikonten');

    Route::get('validasikonten1', function () {
    return view('admin.pages.validasikonten1');
    })->name('validasikonten1');

    // Lihat Pengunjung
    Route::get('lihat-pengunjung', function () {
        // ambli semua user
        $users = User::get();
        return view('admin.pages.lihatpengunjung', compact('users'));
    })->name('lihatpengunjung');

    // ADMIN MANAGEMENT
    Route::get('/list', [AdminController::class, 'index'])
        ->name('admin.list');

    Route::get('/create', [AdminController::class, 'create'])
        ->name('admin.create');

    Route::post('/store', [AdminController::class, 'store'])
        ->name('admin.store');

    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])
        ->name('admin.delete');
});
    //berita 
    Route::get('/berita', [BeritaController::class, 'indexUser'])->name('berita.user');
    Route::get('/berita/{id}', [BeritaUserController::class, 'show'])->name('berita.show');
    Route::get('/berita/create',[BeritaController::class, 'create'])->name('berita.create');
    Route::delete('/berita/{id}/delete',[BeritaController::class, 'destroy'])->name('berita.destroy');

    Route::get('/berita', [BeritaUserController::class, 'index'])->name('berita.user');
    Route::get('/berita/{id}', [BeritaUserController::class, 'show'])->name('berita.show');

    // Route untuk ADMIN (bisa CRUD)
    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('matakuliah', MataKuliahController::class);
    });
    
    // kelola review
    Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/review', [ReviewController::class, 'index'])->name('admin.review.index');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('admin.review.destroy');
});

Route::get('/admin/review', [ReviewController::class, 'index'])->name('admin.review.index');
Route::get('/admin/review/{id}', [ReviewController::class, 'show'])->name('admin.review.show');
Route::get('/admin/review/{id}/edit', [ReviewController::class, 'edit'])->name('admin.review.edit');
Route::put('/admin/review/{id}', [ReviewController::class, 'update'])->name('admin.review.update');
Route::delete('/admin/review/{id}', [ReviewController::class, 'destroy'])->name('admin.review.destroy');


        // route kelola admin
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

// Route::get('kirimtautan', function () {
//     return view('admin.pages.kirimtautan');
// })->name('ajuankarya');

// Route::get('lupasandi', function () {
//     return view('admin.pages.lupasandi');
// })->name('lupasandi');


