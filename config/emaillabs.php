<?php

/*
 * This file is a part of a sigrun/lelpl package providing Laravel mail driver
 * for EmailLabs API
 *
 * @author Sigrun Sp. z o.o. <sigrun@sigrun.eu>
 * @author Marek Ognicki <sigrun@sigrun.eu>
 */

return [
    // EmailLabs api key
    'app_key' => env('EL_APP_KEY', null),
    // EmailLabs api secret
    'app_secret' => env('EL_APP_SECRET', null),
    // EmailLabs SMTP account
    'smtp_account' => env('EL_SMTP_ACCOUNT', null),
];
