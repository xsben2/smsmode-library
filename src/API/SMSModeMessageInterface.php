<?php

/**
 * This file is part of the smsmode-library package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SMSMode\API;

/**
 * sMsmode message interface.
 *
 * cf. 2 Envoi de SMS
 * 	<https://www.smsmode.com/pdf/fiche-api-http.pdf>
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\SMSMode\API
 */
interface SMSModeMessageInterface {

    /**
     * Message class "SMS Pro".
     *
     * @var int
     */
    const MESSAGE_CLASS_SMS_PRO = 2;

    /**
     * Message class "SMS with authorized response".
     *
     * @var int
     */
    const MESSAGE_CLASS_SMS_RESPONSE = 4;

    /**
     * Message length.
     *
     * @var int
     */
    const MESSAGE_LENGTH = 160;

    /**
     * Message STOP always.
     *
     * @var int
     */
    const STOP_ALWAYS = 2;

    /**
     * Message STOP only.
     *
     * @var int
     */
    const STOP_ONLY = 1;

}
