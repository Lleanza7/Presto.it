<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class CategoryTranslationsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('categoryTranslations', function () {
            return [
                'it' => [
                    'Sport' => 'Sport',
                    'Elettronica' => 'Elettronica',
                    'Musica' => 'Musica',
                    'Casa' => 'Casa',
                    'Giardino' => 'Giardino',
                    'Fai da te' => 'Fai da te',
                    'Abbigliamento' => 'Abbigliamento',
                    'Accessori' => 'Accessori',
                    'Gioielli' => 'Gioielli',
                ],
                'en' => [
                    'Sport' => 'Sport',
                    'Elettronica' => 'Electronics',
                    'Musica' => 'Music',
                    'Casa' => 'Home',
                    'Giardino' => 'Garden',
                    'Fai da te' => 'Diy',
                    'Abbigliamento' => 'Clothing',
                    'Accessori' => 'Accessories',
                    'Gioielli' => 'Jewelry',
                ],
                'es' => [
                    'Sport' => 'Deporte',
                    'Elettronica' => 'Electrónica',
                    'Musica' => 'Música',
                    'Casa' => 'Casa',
                    'Giardino' => 'Jardín',
                    'Fai da te' => 'Hazlo tu mismo',
                    'Abbigliamento' => 'Ropa',
                    'Accessori' => 'Accesorios',
                    'Gioielli' => 'Joyas',
                ],
            ];
        });
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}