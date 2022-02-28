<?php

namespace Navitas\Blackhole;

use Illuminate\Mail\MailServiceProvider;

class BlackholeMailServiceProvider extends MailServiceProvider
{
    /**
     * Register the Illuminate mailer instance.
     *
     * @return void
     */
    protected function registerIlluminateMailer()
    {
       
        if ($this->isDriverBlackhole()) {
            
            $this->app->singleton('mail.manager', function($app) {
                return new BlackholeMailManager($app);
            });

            // Copied from Illuminate\Mail\MailServiceProvider
            $this->app->bind('mailer', function ($app) {
                return $app->make('mail.manager')->mailer();
            });
        } else {
            parent::registerIlluminateMailer();
        }
    }

    private function isDriverBlackhole()
    {
        return $this->app['config']['mail.default'] === 'blackhole';
    }
}