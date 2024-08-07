<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;
use App\Models\KindProductType;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            view()->share('productTypesAll', ProductType::with(['kinds.supplies', 'supplies'])->get());
            view()->share('kindProducts', KindProductType::get());
        } catch (\Exception $e) {
            // Xử lý lỗi, ví dụ: log lỗi hoặc hiển thị thông báo
            \Log::error($e->getMessage());
        }
    }
}
