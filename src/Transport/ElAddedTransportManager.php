<?php

/*
 * This file is a part of a sigrun/lelpl package providing Laravel mail driver
 * for EmailLabs API
 *
 * @author Sigrun Sp. z o.o. <sigrun@sigrun.eu>
 * @author Marek Ognicki <sigrun@sigrun.eu>
 */

namespace Sigrun\El\Transport;

use Illuminate\Mail\TransportManager;

class ElAddedTransportManager extends TransportManager
{
    /**
     * Creates mail driver 'el'.
     *
     * @return ElTransport
     */
    protected function createElDriver()
    {
        return new ElTransport();
    }
}
