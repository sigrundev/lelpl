<?php

/*
 * This file is a part of a sigrun/lelpl package providing Laravel mail driver
 * for EmailLabs API
 *
 * @author Sigrun Sp. z o.o. <sigrun@sigrun.eu>
 * @author Marek Ognicki <sigrun@sigrun.eu>
 */

namespace Sigrun\El;

use Illuminate\Mail\MailServiceProvider;
use Sigrun\El\Transport\ElAddedTransportManager;

class ElServiceProvider extends MailServiceProvider
{
    /**
     * Publish EmailLabs config.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/emaillabs.php' => config_path('emaillabs.php'),
        ], 'emaillabs');
    }

    /**
     * Register new swift transport mail driver 'el'.
     */
    protected function registerSwiftTransport()
    {
        $this->app->singleton('swift.transport', function ($app) {
            return new ElAddedTransportManager($app);
        });
    }
}
