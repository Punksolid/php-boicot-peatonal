<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage())
                ->subject('Verifica tu dirección de correo electrónico')
                ->line("En nombre de todo el equipo de BoicotPeatonal.ORG, queremos darte las gracias por registrarte en nuestra plataforma. Sabemos que tu tiempo es valioso y apreciamos el hecho de que hayas decidido unirte a nosotros en esta lucha por la justicia social y la seguridad vial.")
                ->line("Al registrarte en BoicotPeatonal.ORG, te has convertido en parte de una comunidad que se preocupa por el bienestar de los peatones y ciclistas en nuestras ciudades. Tu compromiso y apoyo son fundamentales para llevar adelante nuestra misión y hacer que nuestras calles sean lugares más seguros para todos.")
                ->line("¡Bienvenido a la comunidad de BoicotPeatonal.ORG!")
                ->line("Si tienes alguna duda o sugerencia, no dudes en escribirnos a @BoicotPeatonal en Twitter.")
                ->line("Saludos,")
                ->line("El equipo de BoicotPeatonal.ORG")
                ->action('Verificar Email', $url);
        });
    }
}
