<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


///////////////////////////////////////// START FRONTEND ROUTE /////////////////////////////////////////
Route::get('/', ['as' => 'index', 'uses' => 'WelcomeFrontEndPageController@index']);
Route::get('front/about', 'AboutFrontEndPageController@index')->name('about.front.index');
Route::get('front/service', 'ServiceFrontEndPageController@index')->name('service.front.index');
Route::get('front/portofolio', 'PortofolioFrontEndPageController@index')->name('portofolio.front.index');
Route::get('front/portofolio-detail', 'DetailPortofolioFrontEndPageController@index')->name('detail.portofolio.front.index');
Route::get('front/contact', 'ContactFrontEndPageController@index')->name('contact.front.index');
Route::get('front/bagi-pengetahuan', 'BagiPengetahuanFrontEndPageController@index')->name('bagi.pengetahuan.front.index');
Route::get('front/bagi-pengetahuan-detail', 'DetailBagiPengetahuanFrontEndPageController@index')->name('detail.bagi.pengetahuan.front.index');
Route::get('front/foto', 'FotoFrontEndPageController@index')->name('foto.front.index');

///////////////////////////////////////// END FRONTEND ROUTE /////////////////////////////////////////




///////////////////////////////////////// START BACKEND ROUTE /////////////////////////////////////////
Route::get('/monitoring', function () {
  return view('backend/pages/login');
})->name('login.pages');

Route::get('backend/dashboard', 'DashboardController@index')->name('dashboard');

// =======================================================================================================================
//Informasi Profile
Route::post('admin/store-profile', 'BeritaProfileController@store')->name('profile.store');
Route::get('admin/publish-profile/{id}', 'BeritaProfileController@flagpublish')->name('profile.flagpublish');
Route::get('admin/edit-profile/{id}', 'BeritaProfileController@edit')->name('profile.edit');
Route::post('admin/update-profile/{id}', 'BeritaProfileController@update')->name('profile.update');
Route::get('admin/delete-profile/{id}', 'BeritaProfileController@delete')->name('profile.delete');
Route::get('admin/lihat-profile', 'BeritaProfileController@lihat')->name('profile.lihat');
Route::get('admin/tambah-profile', 'BeritaProfileController@tambah')->name('profile.tambah');
//Informasi Profile kategori
Route::get('admin/lihat-kategori-profile', 'KategoriProfileController@lihatkategori')->name('profile.kategori.lihat');
Route::post('admin/store-kategori-profile', 'KategoriProfileController@store')->name('profile.kategori.store');
Route::post('admin/edit-kategori-profile', 'KategoriProfileController@edit')->name('profile.kategori.edit');
Route::get('admin/bind-kategori-profile/{id}', 'KategoriProfileController@bind')->name('profile.kategori.bind');
Route::get('admin/delete-kategori-profile/{id}', 'KategoriProfileController@delete')->name('profile.kategori.delete');
Route::get('admin/change-status-kategori-profile/{id}', 'KategoriProfileController@changeflag')->name('profile.kategori.changeflag');
// =======================================================================================================================


//========================================================================================================================
//Informasi Bagi Pengetahuan
Route::get('admin/lihat-bagi-pengetahuan', 'BeritaPengetahuanController@lihat')->name('pengetahuan.lihat');
Route::get('admin/tambah-bagi-pengetahuan', 'BeritaPengetahuanController@tambah')->name('pengetahuan.tambah');
Route::post('admin/store-bagi-pengetahuan', 'BeritaPengetahuanController@store')->name('pengetahuan.store');
Route::get('admin/edit-bagi-pengetahuan/{id}', 'BeritaPengetahuanController@edit')->name('pengetahuan.edit');
Route::post('admin/update-bagi-pengetahuan', 'BeritaPengetahuanController@update')->name('pengetahuan.update');
Route::get('admin/publish-bagi-pengetahuan/{id}', 'BeritaPengetahuanController@flagpublish')->name('pengetahuan.flagpublish');
Route::get('admin/headline-bagi-pengetahuan/{id}', 'BeritaPengetahuanController@headline')->name('pengetahuan.headline');
Route::get('admin/delete-bagi-pengetahuan/{id}', 'BeritaPengetahuanController@delete')->name('pengetahuan.delete');
Route::get('admin/preview-bagi-pengetahuan/{id}', 'BeritaPengetahuanController@preview')->name('pengetahuan.preview');


//Kategori Bagi Pengetahuan
Route::get('admin/kategori-bagi-pengetahuan', 'KategoriPengetahuanController@index')->name('pengetahuan.kategori.index');
Route::post('admin/store-kategori-bagi-pengetahuan', 'KategoriPengetahuanController@store')->name('pengetahuan.kategori.store');
Route::post('admin/edit-kategori-bagi-pengetahuan', 'KategoriPengetahuanController@edit')->name('pengetahuan.kategori.edit');
Route::get('admin/bind-kategori-bagi-pengetahuan/{id}', 'KategoriPengetahuanController@bind')->name('pengetahuan.kategori.bind');
Route::get('admin/delete-kategori-bagi-pengetahuan/{id}', 'KategoriPengetahuanController@delete')->name('pengetahuan.kategori.delete');
Route::get('admin/change-status-kategori-bagi-pengetahuan/{id}', 'KategoriPengetahuanController@changeflag')->name('pengetahuan.kategori.changeflag');
//========================================================================================================================


// =======================================================================================================================
//Management Akun
Route::get('admin/kelola-akun', 'AkunController@index')->name('akun.kelola');
Route::post('admin/store-akun', 'AkunController@store')->name('akun.store');
Route::post('admin/update-akun', 'AkunController@update')->name('akun.update');
Route::get('admin/delete-akun/{id}', 'AkunController@delete')->name('akun.delete');
Route::get('admin/bind-akun/{id}', 'AkunController@bind')->name('akun.bind');
Route::get('email-activation/{code}', 'AkunController@emailActivation');
Route::post('set-password', 'AkunController@setPassword')->name('setpassword');
Route::get('logout-process', 'AkunController@logoutProcess')->name('logout');
Route::post('login-process', 'AkunController@loginProcess')->name('login');
// =======================================================================================================================


// =======================================================================================================================
//Features
Route::get('admin/kelola-features', 'FeaturesController@index')->name('features.index');
Route::post('admin/store-features', 'FeaturesController@store')->name('features.store');
Route::get('admin/delete-features/{id}', 'FeaturesController@delete')->name('features.delete');
Route::post('admin/edit-features', 'FeaturesController@edit')->name('features.edit');
Route::get('admin/publish-features/{id}', 'FeaturesController@publish')->name('features.publish');
Route::get('admin/bind-features/{id}', 'FeaturesController@bind')->name('features.bind');
// =======================================================================================================================

// =======================================================================================================================
//Services
Route::get('admin/kelola-services', 'ServicesController@index')->name('services.index');
Route::post('admin/store-services', 'ServicesController@store')->name('services.store');
Route::get('admin/delete-services/{id}', 'ServicesController@delete')->name('services.delete');
Route::post('admin/edit-services', 'ServicesController@edit')->name('services.edit');
Route::get('admin/publish-services/{id}', 'ServicesController@publish')->name('services.publish');
Route::get('admin/bind-services/{id}', 'ServicesController@bind')->name('services.bind');
// =======================================================================================================================

// =======================================================================================================================
//Testimonial
Route::get('admin/kelola-testimonial', 'TestimonialController@index')->name('testimonial.index');
Route::post('admin/store-testimonial', 'TestimonialController@store')->name('testimonial.store');
Route::get('admin/delete-testimonial/{id}', 'TestimonialController@delete')->name('testimonial.delete');
Route::post('admin/edit-testimonial', 'TestimonialController@edit')->name('testimonial.edit');
Route::get('admin/publish-testimonial/{id}', 'TestimonialController@publish')->name('testimonial.publish');
Route::get('admin/bind-testimonial/{id}', 'TestimonialController@bind')->name('testimonial.bind');
// =======================================================================================================================


// =======================================================================================================================
//Blockquote
Route::get('admin/kelola-blockquote', 'BlockquoteController@index')->name('blockquote.index');
Route::post('admin/store-blockquote', 'BlockquoteController@store')->name('blockquote.store');
Route::get('admin/delete-blockquote/{id}', 'BlockquoteController@delete')->name('blockquote.delete');
Route::post('admin/edit-blockquote', 'BlockquoteController@edit')->name('blockquote.edit');
Route::get('admin/publish-blockquote/{id}', 'BlockquoteController@publish')->name('blockquote.publish');
Route::get('admin/bind-blockquote/{id}', 'BlockquoteController@bind')->name('blockquote.bind');
// =======================================================================================================================


// =======================================================================================================================
//Skill
Route::get('admin/kelola-skill', 'SkillController@index')->name('skill.index');
Route::post('admin/store-skill', 'SkillController@store')->name('skill.store');
Route::get('admin/delete-skill/{id}', 'SkillController@delete')->name('skill.delete');
Route::post('admin/edit-skill', 'SkillController@edit')->name('skill.edit');
Route::get('admin/publish-skill/{id}', 'SkillController@publish')->name('skill.publish');
Route::get('admin/bind-skill/{id}', 'SkillController@bind')->name('skill.bind');
// =======================================================================================================================


// =======================================================================================================================
//Jabatan
Route::get('admin/kelola-jabatan', 'JabatanController@index')->name('jabatan.index');
Route::post('admin/store-jabatan', 'JabatanController@store')->name('jabatan.store');
Route::get('admin/delete-jabatan/{id}', 'JabatanController@delete')->name('jabatan.delete');
Route::post('admin/edit-jabatan', 'JabatanController@edit')->name('jabatan.edit');
Route::get('admin/publish-jabatan/{id}', 'JabatanController@publish')->name('jabatan.publish');
Route::get('admin/bind-jabatan/{id}', 'JabatanController@bind')->name('jabatan.bind');
// =======================================================================================================================


// =======================================================================================================================
//About
Route::get('admin/kelola-about', 'AboutController@index')->name('about.index');
Route::post('admin/store-about', 'AboutController@store')->name('about.store');
Route::get('admin/delete-about/{id}', 'AboutController@delete')->name('about.delete');
Route::post('admin/edit-about', 'AboutController@edit')->name('about.edit');
Route::get('admin/publish-about/{id}', 'AboutController@publish')->name('about.publish');
Route::get('admin/bind-about/{id}', 'AboutController@bind')->name('about.bind');
// =======================================================================================================================


// =======================================================================================================================
//About 2
Route::get('admin/kelola-service-tins', 'ServiceTinsController@index')->name('service.tins.index');
Route::post('admin/store-service-tins', 'ServiceTinsController@store')->name('service.tins.store');
Route::get('admin/delete-service-tins/{id}', 'ServiceTinsController@delete')->name('service.tins.delete');
Route::post('admin/edit-service-tins', 'ServiceTinsController@edit')->name('service.tins.edit');
Route::get('admin/publish-service-tins/{id}', 'ServiceTinsController@publish')->name('service.tins.publish');
Route::get('admin/bind-service-tins/{id}', 'ServiceTinsController@bind')->name('service.tins.bind');
// =======================================================================================================================


// =======================================================================================================================
//Client
Route::get('admin/lihat-client', 'ClientController@lihat')->name('client.lihat');
Route::get('admin/tambah-client', 'ClientController@tambah')->name('client.tambah');
Route::post('admin/store-client', 'ClientController@store')->name('client.store');
Route::get('admin/edit-client/{id}', 'ClientController@edit')->name('client.edit');
Route::post('admin/update-client', 'ClientController@update')->name('client.update');
Route::get('admin/publish-client/{id}', 'ClientController@flagpublish')->name('client.flagpublish');
Route::get('admin/delete-client/{id}', 'ClientController@delete')->name('client.delete');
// =======================================================================================================================


// =======================================================================================================================
//Lokasi
Route::get('admin/kelola-lokasi', 'LokasiController@index')->name('lokasi.index');
Route::post('admin/store-lokasi', 'LokasiController@store')->name('lokasi.store');
Route::get('admin/delete-lokasi/{id}', 'LokasiController@delete')->name('lokasi.delete');
Route::post('admin/edit-lokasi', 'LokasiController@edit')->name('lokasi.edit');
Route::get('admin/publish-lokasi/{id}', 'LokasiController@publish')->name('lokasi.publish');
Route::get('admin/bind-lokasi/{id}', 'LokasiController@bind')->name('lokasi.bind');
// =======================================================================================================================


// =======================================================================================================================
//Kategori Project
Route::get('admin/kelola-kategori-project', 'KategoriProjectController@index')->name('project.kategori.index');
Route::post('admin/store-kategori-project', 'KategoriProjectController@store')->name('project.kategori.store');
Route::get('admin/delete-kategori-project/{id}', 'KategoriProjectController@delete')->name('project.kategori.delete');
Route::post('admin/edit-kategori-project', 'KategoriProjectController@edit')->name('project.kategori.edit');
Route::get('admin/publish-kategori-project/{id}', 'KategoriProjectController@publish')->name('project.kategori.publish');
Route::get('admin/bind-kategori-project/{id}', 'KategoriProjectController@bind')->name('project.kategori.bind');
// =======================================================================================================================


// =======================================================================================================================
//Project
Route::get('admin/lihat-project', 'ProjectController@lihat')->name('project.lihat');
Route::get('admin/tambah-project', 'ProjectController@tambah')->name('project.tambah');
Route::post('admin/store-project', 'ProjectController@store')->name('project.store');
Route::get('admin/edit-project/{id}', 'ProjectController@edit')->name('project.edit');
Route::post('admin/update-project', 'ProjectController@update')->name('project.update');
Route::get('admin/publish-project/{id}', 'ProjectController@flagpublish')->name('project.flagpublish');
Route::get('admin/delete-project/{id}', 'ProjectController@delete')->name('project.delete');
// =======================================================================================================================


// =======================================================================================================================
//Slider
Route::get('admin/kelola-slider', 'SliderController@index')->name('slider.index');
Route::post('admin/store-slider', 'SliderController@store')->name('slider.store');
Route::get('admin/delete-slider/{id}', 'SliderController@delete')->name('slider.delete');
Route::post('admin/edit-slider', 'SliderController@edit')->name('slider.edit');
Route::get('admin/publish-slider/{id}', 'SliderController@publish')->name('slider.publish');
Route::get('admin/bind-slider/{id}', 'SliderController@bind')->name('slider.bind');
// =======================================================================================================================


// =======================================================================================================================
//Galeri
Route::get('admin/kelola-galeri', 'GalleryController@index')->name('galeri.index');
Route::post('admin/store-galeri', 'GalleryController@store')->name('galeri.store');
Route::get('admin/delete-galeri/{id}', 'GalleryController@delete')->name('galeri.delete');
Route::post('admin/edit-galeri', 'GalleryController@edit')->name('galeri.edit');
Route::get('admin/publish-galeri/{id}', 'GalleryController@publish')->name('galeri.publish');
Route::get('admin/bind-galeri/{id}', 'GalleryController@bind')->name('galeri.bind');
// =======================================================================================================================


// =======================================================================================================================
//Video
Route::get('admin/kelola-video', 'VideoController@index')->name('video.index');
Route::post('admin/store-video', 'VideoController@store')->name('video.store');
Route::get('admin/delete-video/{id}', 'VideoController@delete')->name('video.delete');
Route::post('admin/edit-video', 'VideoController@edit')->name('video.edit');
Route::get('admin/publish-video/{id}', 'VideoController@publish')->name('video.publish');
Route::get('admin/bind-video/{id}', 'VideoController@bind')->name('video.bind');
// =======================================================================================================================


// =======================================================================================================================
//Profile
Route::get('admin/kelola-profile', 'UserProfileController@index')->name('profile.index');
Route::post('admin/edit-profile', 'UserProfileController@edit')->name('edit.profile.edit');
Route::get('admin/berita-user/{id}', 'UserProfileController@berita')->name('berita.user');
Route::post('admin/change-password', 'UserProfileController@changePassword')->name('change.password.user');
// =======================================================================================================================

////////////////////////////////////// END OF BACKEND ROUTE //////////////////////////////////////

