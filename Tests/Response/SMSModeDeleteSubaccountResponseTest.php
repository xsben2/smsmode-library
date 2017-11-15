<?php

/*
 * This file is part of the smsmode-library package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SMSMode\Tests\Response;

use PHPUnit_Framework_TestCase;
use WBW\Library\SMSMode\Response\SMSModeDeleteSubaccountResponse;
use WBW\Library\SMSMode\Response\SMSModeResponseInterface;

/**
 * sMsmode delete subaccount response test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SMSMode\Tests\Response
 * @final
 */
final class SMSModeDeleteSubaccountResponseTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests the parse() method.
	 *
	 * @return void
	 */
	public function testParse() {

		$objEx = new SMSModeDeleteSubaccountResponse("excpetion");

		$this->assertEquals(null, $objEx->getCode());
		$this->assertEquals(null, $objEx->getDescription());

		$impl = " " . SMSModeResponseInterface::RESPONSE_DELIMITER . " ";

		$obj0 = new SMSModeDeleteSubaccountResponse(implode($impl, [SMSModeDeleteSubaccountResponse::CODE_CREATED, SMSModeDeleteSubaccountResponse::DESC_CREATED]));

		$this->assertEquals(SMSModeDeleteSubaccountResponse::CODE_CREATED, $obj0->getCode());
		$this->assertEquals(SMSModeDeleteSubaccountResponse::DESC_CREATED, $obj0->getDescription());

		$obj31 = new SMSModeDeleteSubaccountResponse(implode($impl, [SMSModeDeleteSubaccountResponse::CODE_INTERNAL_ERROR, SMSModeDeleteSubaccountResponse::DESC_INTERNAL_ERROR]));

		$this->assertEquals(SMSModeDeleteSubaccountResponse::CODE_INTERNAL_ERROR, $obj31->getCode());
		$this->assertEquals(SMSModeDeleteSubaccountResponse::DESC_INTERNAL_ERROR, $obj31->getDescription());

		$obj32 = new SMSModeDeleteSubaccountResponse(implode($impl, [SMSModeDeleteSubaccountResponse::CODE_AUTHENTICATION_ERROR, SMSModeDeleteSubaccountResponse::DESC_AUTHENTICATION_ERROR]));

		$this->assertEquals(SMSModeDeleteSubaccountResponse::CODE_AUTHENTICATION_ERROR, $obj32->getCode());
		$this->assertEquals(SMSModeDeleteSubaccountResponse::DESC_AUTHENTICATION_ERROR, $obj32->getDescription());

		$obj35 = new SMSModeDeleteSubaccountResponse(implode($impl, [SMSModeDeleteSubaccountResponse::CODE_MISSING_REQUIRED_PARAMETER, SMSModeDeleteSubaccountResponse::DESC_MISSING_REQUIRED_PARAMETER]));

		$this->assertEquals(SMSModeDeleteSubaccountResponse::CODE_MISSING_REQUIRED_PARAMETER, $obj35->getCode());
		$this->assertEquals(SMSModeDeleteSubaccountResponse::DESC_MISSING_REQUIRED_PARAMETER, $obj35->getDescription());

		$obj41 = new SMSModeDeleteSubaccountResponse(implode($impl, [SMSModeDeleteSubaccountResponse::CODE_ID_ALREADY_EXISTS, SMSModeDeleteSubaccountResponse::DESC_ID_ALREADY_EXISTS]));

		$this->assertEquals(SMSModeDeleteSubaccountResponse::CODE_ID_ALREADY_EXISTS, $obj41->getCode());
		$this->assertEquals(SMSModeDeleteSubaccountResponse::DESC_ID_ALREADY_EXISTS, $obj41->getDescription());
	}

}
