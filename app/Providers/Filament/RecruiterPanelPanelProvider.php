<?php

namespace App\Providers\Filament;

use App\Filament\RecruiterPanel\Pages\Auth\Register;
use App\Http\Middleware\RecruiterAuthenticate;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class RecruiterPanelPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
        ->id('recruiter')
            ->path('recruiter')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->login()
            ->registration(Register::class)
            ->discoverResources(in: app_path('Filament/RecruiterPanel/Resources'), for: 'App\\Filament\\RecruiterPanel\\Resources')
            ->discoverPages(in: app_path('Filament/RecruiterPanel/Pages'), for: 'App\\Filament\\RecruiterPanel\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/RecruiterPanel/Widgets'), for: 'App\\Filament\\RecruiterPanel\\Widgets')
            ->widgets([
          
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class,
                RecruiterAuthenticate::class,
            ])
            ->brandLogo('/assets_livewire/admin.png')

            ->plugins([
                \Hasnayeen\Themes\ThemesPlugin::make(),
                 
            ]);
    }
}
