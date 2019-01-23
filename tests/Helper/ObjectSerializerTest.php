<?php

/*
 * This file is part of the smsmode-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SMSMode\Tests\Helper;

use DateTime;
use Exception;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;
use WBW\Library\Core\Exception\Pointer\NullPointerException;
use WBW\Library\SMSMode\Helper\ObjectSerializer;
use WBW\Library\SMSMode\Model\AccountBalanceRequest;
use WBW\Library\SMSMode\Model\AccountBalanceResponse;
use WBW\Library\SMSMode\Model\AddingContactRequest;
use WBW\Library\SMSMode\Model\AddingContactResponse;
use WBW\Library\SMSMode\Model\Authentication;
use WBW\Library\SMSMode\Model\CheckingSMSMessageStatusRequest;
use WBW\Library\SMSMode\Model\CheckingSMSMessageStatusResponse;
use WBW\Library\SMSMode\Model\CreatingAPIKeyRequest;
use WBW\Library\SMSMode\Model\CreatingAPIKeyResponse;
use WBW\Library\SMSMode\Model\CreatingSubAccountRequest;
use WBW\Library\SMSMode\Model\CreatingSubAccountResponse;
use WBW\Library\SMSMode\Model\DeletingSMSRequest;
use WBW\Library\SMSMode\Model\DeletingSMSResponse;
use WBW\Library\SMSMode\Model\DeletingSubAccountRequest;
use WBW\Library\SMSMode\Model\DeletingSubAccountResponse;
use WBW\Library\SMSMode\Model\DeliveryReport;
use WBW\Library\SMSMode\Model\DeliveryReportRequest;
use WBW\Library\SMSMode\Model\DeliveryReportResponse;
use WBW\Library\SMSMode\Model\RetrievingSMSReplyRequest;
use WBW\Library\SMSMode\Model\RetrievingSMSReplyResponse;
use WBW\Library\SMSMode\Model\SendingSMSMessageRequest;
use WBW\Library\SMSMode\Model\SendingSMSMessageResponse;
use WBW\Library\SMSMode\Model\SendingTextToSpeechSMSRequest;
use WBW\Library\SMSMode\Model\SendingTextToSpeechSMSResponse;
use WBW\Library\SMSMode\Model\SentSMSMessage;
use WBW\Library\SMSMode\Model\SentSMSMessageListRequest;
use WBW\Library\SMSMode\Model\SentSMSMessageListResponse;
use WBW\Library\SMSMode\Model\SMSReply;
use WBW\Library\SMSMode\Model\TransferringCreditsRequest;
use WBW\Library\SMSMode\Model\TransferringCreditsResponse;
use WBW\Library\SMSMode\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Tests\Fixtures\Helper\TestObjectSerializer;

/**
 * Object serializer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\SMSMode\Tests\Helper
 */
class ObjectSerializerTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("dmY", ObjectSerializer::DESERIALIZE_DATE_FORMAT);
        $this->assertEquals("dmY-H:i", ObjectSerializer::DESERIALIZE_DATETIME_FORMAT);
        $this->assertEquals("|", ObjectSerializer::DESERIALIZE_DELIMITER);
        $this->assertEquals("dmY", ObjectSerializer::SERIALIZE_DATE_FORMAT);
        $this->assertEquals("dmY-H:i", ObjectSerializer::SERIALIZE_DATETIME_FORMAT);
    }

    /**
     * Tests the deserializeAccountBalanceResponse() method.
     *
     * @return void
     */
    public function testDeserializeAccountBalanceResponse() {

        // Initialize a Raw response mock.
        $rawResponse = "212.5";

        $obj = ObjectSerializer::deserializeAccountBalanceResponse($rawResponse);
        $this->assertInstanceOf(AccountBalanceResponse::class, $obj);

        $this->assertNull($obj->getCode());
        $this->assertNull($obj->getDescription());

        $this->assertEquals(212.5, $obj->getAccountBalance());
    }

    /**
     * Tests the deserializeAddingContactResponse() method.
     *
     * @return void
     */
    public function testDeserializeAddingContactResponse() {

        // Initialize a Raw response mock.
        $rawResponse = "0 | Contact added";

        $obj = ObjectSerializer::deserializeAddingContactResponse($rawResponse);
        $this->assertInstanceOf(AddingContactResponse::class, $obj);

        $this->assertEquals(0, $obj->getCode());
        $this->assertEquals("Contact added", $obj->getDescription());
    }

    /**
     * Tests the deserializeCheckingSMSMessageStatusResponse() method.
     *
     * @return void
     */
    public function testDeserializeCheckingSMSMessageStatusResponse() {

        // Initialize a Raw response mock.
        $rawResponse = "0 | Sent";

        $obj = ObjectSerializer::deserializeCheckingSMSMessageStatusResponse($rawResponse);
        $this->assertInstanceOf(CheckingSMSMessageStatusResponse::class, $obj);

        $this->assertEquals(0, $obj->getCode());
        $this->assertEquals("Sent", $obj->getDescription());
    }

    /**
     * Tests the deserializeCreatingAPIKeyResponse() method.
     *
     * @return void
     */
    public function testDeserializeCreatingAPIKeyResponse() {

        // Initialize a Raw response mock.
        $rawResponse = <<< EOT
{
    "id":"id",
    "accessToken":"accessToken",
    "creationDate":"21012019",
    "state":"state",
    "expiration":"22012019",
    "account":"account"
}
EOT;

        $obj = ObjectSerializer::deserializeCreatingAPIKeyResponse($rawResponse);
        $this->assertInstanceOf(CreatingAPIKeyResponse::class, $obj);

        $this->assertNull($obj->getCode());
        $this->assertNull($obj->getDescription());

        $this->assertEquals("accessToken", $obj->getAccessToken());
        $this->assertEquals("account", $obj->getAccount());
        $this->assertEquals("2019-01-21", $obj->getCreationDate()->format("Y-m-d"));
        $this->assertEquals("2019-01-22", $obj->getExpiration()->format("Y-m-d"));
        $this->assertEquals("id", $obj->getId());
        $this->assertEquals("state", $obj->getState());
    }

    /**
     * Tests the deserializeCreatingSubAccountResponse() method.
     *
     * @return void
     */
    public function testDeserializeCreatingSubAccountResponse() {

        // Initialize a Raw response mock.
        $rawResponse = "0 | Sub-account created";

        $obj = ObjectSerializer::deserializeCreatingSubAccountResponse($rawResponse);
        $this->assertInstanceOf(CreatingSubAccountResponse::class, $obj);

        $this->assertEquals(0, $obj->getCode());
        $this->assertEquals("Sub-account created", $obj->getDescription());
    }

    /**
     * Tests the deserializeDeletingSMSResponse() method.
     *
     * @return void
     */
    public function testDeserializeDeletingSMSResponse() {

        // Initialize a Raw response mock.
        $rawResponse = "0 | SMS message deleted";

        $obj = ObjectSerializer::deserializeDeletingSMSResponse($rawResponse);
        $this->assertInstanceOf(DeletingSMSResponse::class, $obj);

        $this->assertEquals(0, $obj->getCode());
        $this->assertEquals("SMS message deleted", $obj->getDescription());
    }

    /**
     * Tests the deserializeDeletingSubAccountResponse() method.
     *
     * @return void
     */
    public function testDeserializeDeletingSubAccountResponse() {

        // Initialize a Raw response mock.
        $rawResponse = "0 | Sub-account deleted";

        $obj = ObjectSerializer::deserializeDeletingSubAccountResponse($rawResponse);
        $this->assertInstanceOf(DeletingSubAccountResponse::class, $obj);

        $this->assertEquals(0, $obj->getCode());
        $this->assertEquals("Sub-account deleted", $obj->getDescription());
    }

    /**
     * Tests the deserializeDeliveryReport() method.
     *
     * @return void
     */
    public function testDeserializeDeliveryReport() {

        // Initialize a Raw response mock.
        // $rawResponse = "33612345678 0"; /* A well formed raw response */
        $rawResponse = "   33612345678     0   "; /* A bad formed raw response */

        $obj = TestObjectSerializer::deserializeDeliveryReport($rawResponse);
        $this->assertInstanceOf(DeliveryReport::class, $obj);

        $this->assertEquals(0, $obj->getCode());
        $this->assertNull($obj->getDescription());

        $this->assertEquals("33612345678", $obj->getNumero());
    }

    /**
     * Tests the deserializeDeliveryReport() method.
     *
     * @return void
     */
    public function testDeserializeDeliveryReportResponse() {

        // Initialize a Raw response mock.
        // $rawResponse = "33612345670 0 | 33612345671 2 | 33612345672 11"; /* A well formed delivery report. */
        $rawResponse = "  33612345670   0    |   33612345671   2   |   33612345672   11    "; /* A bad formed delivery report */

        $obj = ObjectSerializer::deserializeDeliveryReportResponse($rawResponse);
        $this->assertInstanceOf(DeliveryReportResponse::class, $obj);

        $this->assertNull($obj->getCode());
        $this->assertNull($obj->getDescription());

        $this->assertCount(3, $obj->getDeliveryReports());

        $this->assertEquals(0, $obj->getDeliveryReports()[0]->getCode());
        $this->assertEquals("33612345670", $obj->getDeliveryReports()[0]->getNumero());

        $this->assertEquals(2, $obj->getDeliveryReports()[1]->getCode());
        $this->assertEquals("33612345671", $obj->getDeliveryReports()[1]->getNumero());

        $this->assertEquals(11, $obj->getDeliveryReports()[2]->getCode());
        $this->assertEquals("33612345672", $obj->getDeliveryReports()[2]->getNumero());
    }

    /**
     * Tests the deserializeDeliveryReport() method.
     *
     * @return void
     */
    public function testDeserializeDeliveryReportResponseWithException() {

        // Initialize a Raw response mock.
        $rawResponse = "31 | Internal error";

        $obj = ObjectSerializer::deserializeDeliveryReportResponse($rawResponse);
        $this->assertInstanceOf(DeliveryReportResponse::class, $obj);

        $this->assertEquals(31, $obj->getCode());
        $this->assertEquals("Internal error", $obj->getDescription());

        $this->assertCount(0, $obj->getDeliveryReports());
    }

    /**
     * Tests the deserializeDeliveryReport() method.
     *
     * @return void
     */
    public function testDeserializeDeliveryReportWithoutArguments() {

        // Initialize a Raw response mock.
        // $rawResponse = "33612345678 0"; /* A well formed raw response */
        $rawResponse = "33612345678"; /* A bad formed raw response */

        $obj = TestObjectSerializer::deserializeDeliveryReport($rawResponse);
        $this->assertInstanceOf(DeliveryReport::class, $obj);

        $this->assertNull($obj->getCode());
        $this->assertNull($obj->getDescription());

        $this->assertNull($obj->getNumero());
    }

    /**
     * Tests the deserializeResponse() method.
     *
     * @return void
     */
    public function testDeserializeResponse() {

        // Set a Sent SMS message response mock.
        $obj = new SendingSMSMessageResponse();

        // Initialize a Raw response mock.
        // $rawResponse = "0 | Sent"; /* A well formed raw response */
        $rawResponse = "0"; /* A bad formed raw response */

        TestObjectSerializer::deserializeResponse($obj, $rawResponse);

        $this->assertNull($obj->getCode());
        $this->assertNull($obj->getDescription());
    }

    /**
     * Tests the deserializeRetrievingSMSReplyResponse() method.
     *
     * @return void
     */
    public function testDeserializeRetrievingSMSReplyResponse() {

        // Initialize a Raw response mock.
        $rawResponse = <<< EOT
responseID1 | 23012019-18:00 | from1 | text1 | to1 | messageID1
responseID2 | 23012019-19:00 | from2 | text2 | to2 | messageID2
responseID3 | 23012019-20:00 | from3 | text3 | to3 | messageID3
EOT;

        $obj = ObjectSerializer::deserializeRetrievingSMSReplyResponse($rawResponse);
        $this->assertInstanceOf(RetrievingSMSReplyResponse::class, $obj);

        $this->assertNull($obj->getCode());
        $this->assertNull($obj->getDescription());

        $this->assertCount(3, $obj->getSmsReplies());

        $this->assertEquals("from1", $obj->getSmsReplies()[0]->getFrom());
        $this->assertEquals("messageID1", $obj->getSmsReplies()[0]->getMessageID());
        $this->assertEquals("2019-01-23 18:00", $obj->getSmsReplies()[0]->getReceptionDate()->format("Y-m-d H:i"));
        $this->assertEquals("responseID1", $obj->getSmsReplies()[0]->getResponseID());
        $this->assertEquals("text1", $obj->getSmsReplies()[0]->getText());
        $this->assertEquals("to1", $obj->getSmsReplies()[0]->getTo());

        $this->assertEquals("from2", $obj->getSmsReplies()[1]->getFrom());
        $this->assertEquals("messageID2", $obj->getSmsReplies()[1]->getMessageID());
        $this->assertEquals("2019-01-23 19:00", $obj->getSmsReplies()[1]->getReceptionDate()->format("Y-m-d H:i"));
        $this->assertEquals("responseID2", $obj->getSmsReplies()[1]->getResponseID());
        $this->assertEquals("text2", $obj->getSmsReplies()[1]->getText());
        $this->assertEquals("to2", $obj->getSmsReplies()[1]->getTo());

        $this->assertEquals("from3", $obj->getSmsReplies()[2]->getFrom());
        $this->assertEquals("messageID3", $obj->getSmsReplies()[2]->getMessageID());
        $this->assertEquals("2019-01-23 20:00", $obj->getSmsReplies()[2]->getReceptionDate()->format("Y-m-d H:i"));
        $this->assertEquals("responseID3", $obj->getSmsReplies()[2]->getResponseID());
        $this->assertEquals("text3", $obj->getSmsReplies()[2]->getText());
        $this->assertEquals("to3", $obj->getSmsReplies()[2]->getTo());
    }

    /**
     * Tests the deserializeRetrievingSMSReplyResponse() method.
     *
     * @return void
     */
    public function testDeserializeRetrievingSMSReplyResponseWithException() {

        // Initialize a Raw response mock.
        $rawResponse = "32 | Authentication error";

        $obj = ObjectSerializer::deserializeRetrievingSMSReplyResponse($rawResponse);
        $this->assertInstanceOf(RetrievingSMSReplyResponse::class, $obj);

        $this->assertEquals(32, $obj->getCode());
        $this->assertEquals("Authentication error", $obj->getDescription());

        $this->assertCount(0, $obj->getSmsReplies());
    }

    /**
     * Tests the deserializeSMSReply() method.
     *
     * @return void
     */
    public function testDeserializeSMSReply() {

        // Initialize a Raw response mock.
        // $rawResponse = "responseID | 23012019-18:00 | from | text | to | messageID"; /* A well formed raw response */
        $rawResponse = "     responseID    |    23012019-18:00    |    from     | text    |    to    |     messageID    "; /* A bad formed raw response */

        $obj = TestObjectSerializer::deserializeSMSReply($rawResponse);
        $this->assertInstanceOf(SMSReply::class, $obj);

        $this->assertNull($obj->getCode());
        $this->assertNull($obj->getDescription());

        $this->assertEquals("from", $obj->getFrom());
        $this->assertEquals("messageID", $obj->getMessageID());
        $this->assertEquals("2019-01-23 18:00", $obj->getReceptionDate()->format("Y-m-d H:i"));
        $this->assertEquals("responseID", $obj->getResponseID());
        $this->assertEquals("text", $obj->getText());
        $this->assertEquals("to", $obj->getTo());
    }

    /**
     * Tests the deserializeSMSReply() method.
     *
     * @return void
     */
    public function testDeserializeSMSReplyWithoutArguments() {

        // Initialize a Raw response mock.
        // $rawResponse = "responseID | 23012019-18:00 | from | text | to | messageID"; /* A well formed raw response */
        $rawResponse = "responseID | 23012019-18:00 | from | text | to"; /* A bad formed raw response */

        $obj = TestObjectSerializer::deserializeSMSReply($rawResponse);
        $this->assertInstanceOf(SMSReply::class, $obj);

        $this->assertNull($obj->getCode());
        $this->assertNull($obj->getDescription());

        $this->assertNull($obj->getFrom());
        $this->assertNull($obj->getMessageID());
        $this->assertNull($obj->getReceptionDate());
        $this->assertNull($obj->getResponseID());
        $this->assertNull($obj->getText());
        $this->assertNull($obj->getTo());
    }

    /**
     * Tests the deserializeSendingSMSMessageResponse() method.
     *
     * @return void
     */
    public function testDeserializeSendingSMSMessageResponse() {

        // Initialize a Raw response mock.
        $rawResponse = "0 | Accepted | smsID";

        $obj = ObjectSerializer::deserializeSendingSMSMessageResponse($rawResponse);
        $this->assertInstanceOf(SendingSMSMessageResponse::class, $obj);

        $this->assertEquals(0, $obj->getCode());
        $this->assertEquals("Accepted", $obj->getDescription());

        $this->assertEquals("smsID", $obj->getSmsID());
    }

    /**
     * Tests the deserializeSendingTextToSpeechSMSResponse() method.
     *
     * @return void
     */
    public function testDeserializeSendingTextToSpeechSMSResponse() {

        // Initialize a Raw response mock.
        $rawResponse = "0 | Accepted | smsID";

        $obj = ObjectSerializer::deserializeSendingTextToSpeechSMSResponse($rawResponse);
        $this->assertInstanceOf(SendingTextToSpeechSMSResponse::class, $obj);

        $this->assertEquals(0, $obj->getCode());
        $this->assertEquals("Accepted", $obj->getDescription());

        $this->assertEquals("smsID", $obj->getSmsID());
    }

    /**
     * Tests the deserializeSentSMSMessage() method.
     *
     * @return void
     */
    public function testDeserializeSentSMSMessage() {

        // Initialize a Raw response mock.
        // $rawResponse = "smsID | 23012019-18:00 | message | 33612345678 | 0.1 | 1"; /* A well formed raw response */
        $rawResponse = "     smsID    |    23012019-18:00    |    message     | 33612345678    |    0.1    |     1    "; /* A bad formed raw response */

        $obj = TestObjectSerializer::deserializeSentSMSMessage($rawResponse);
        $this->assertInstanceOf(SentSMSMessage::class, $obj);

        $this->assertNull($obj->getCode());
        $this->assertNull($obj->getDescription());

        $this->assertEquals(0.1, $obj->getCostCredits());
        $this->assertEquals("message", $obj->getMessage());
        $this->assertEquals("33612345678", $obj->getNumero());
        $this->assertEquals(1, $obj->getRecipientCount());
        $this->assertEquals("2019-01-23 18:00", $obj->getSendDate()->format("Y-m-d H:i"));
        $this->assertEquals("smsID", $obj->getSmsID());
    }

    /**
     * Tests the deserializeSentSMSMessageListResponse() method.
     *
     * @return void
     */
    public function testDeserializeSentSMSMessageListResponse() {

        // Initialize a Raw response mock.
        $rawResponse = <<< EOT
smsID1 | 23012019-18:00 | message1 | 33612345670 | 0.1 | 1
smsID2 | 23012019-19:00 | message2 | 33612345671 | 0.2 | 2
smsID3 | 23012019-20:00 | message3 | 33612345672 | 0.3 | 3
EOT;

        $obj = ObjectSerializer::deserializeSentSMSMessageListResponse($rawResponse);
        $this->assertInstanceOf(SentSMSMessageListResponse::class, $obj);

        $this->assertNull($obj->getCode());
        $this->assertNull($obj->getDescription());

        $this->assertCount(3, $obj->getSentSMSMessages());

        $this->assertEquals(0.1, $obj->getSentSMSMessages()[0]->getCostCredits());
        $this->assertEquals("message1", $obj->getSentSMSMessages()[0]->getMessage());
        $this->assertEquals("33612345670", $obj->getSentSMSMessages()[0]->getNumero());
        $this->assertEquals(1, $obj->getSentSMSMessages()[0]->getRecipientCount());
        $this->assertEquals("2019-01-23 18:00", $obj->getSentSMSMessages()[0]->getSendDate()->format("Y-m-d H:i"));
        $this->assertEquals("smsID1", $obj->getSentSMSMessages()[0]->getSmsID());

        $this->assertEquals(0.2, $obj->getSentSMSMessages()[1]->getCostCredits());
        $this->assertEquals("message2", $obj->getSentSMSMessages()[1]->getMessage());
        $this->assertEquals("33612345671", $obj->getSentSMSMessages()[1]->getNumero());
        $this->assertEquals(2, $obj->getSentSMSMessages()[1]->getRecipientCount());
        $this->assertEquals("2019-01-23 19:00", $obj->getSentSMSMessages()[1]->getSendDate()->format("Y-m-d H:i"));
        $this->assertEquals("smsID2", $obj->getSentSMSMessages()[1]->getSmsID());

        $this->assertEquals(0.3, $obj->getSentSMSMessages()[2]->getCostCredits());
        $this->assertEquals("message3", $obj->getSentSMSMessages()[2]->getMessage());
        $this->assertEquals("33612345672", $obj->getSentSMSMessages()[2]->getNumero());
        $this->assertEquals(3, $obj->getSentSMSMessages()[2]->getRecipientCount());
        $this->assertEquals("2019-01-23 20:00", $obj->getSentSMSMessages()[2]->getSendDate()->format("Y-m-d H:i"));
        $this->assertEquals("smsID3", $obj->getSentSMSMessages()[2]->getSmsID());
    }

    /**
     * Tests the deserializeSentSMSMessageListResponse() method.
     *
     * @return void
     */
    public function testDeserializeSentSMSMessageListResponseWithException() {

        // Initialize a Raw response mock.
        $rawResponse = "32 | Authentication error";

        $obj = ObjectSerializer::deserializeSentSMSMessageListResponse($rawResponse);
        $this->assertInstanceOf(SentSMSMessageListResponse::class, $obj);

        $this->assertEquals(32, $obj->getCode());
        $this->assertEquals("Authentication error", $obj->getDescription());

        $this->assertCount(0, $obj->getSentSMSMessages());
    }

    /**
     * Tests the deserializeSentSMSMessage() method.
     *
     * @return void
     */
    public function testDeserializeSentSMSMessageWithoutArguments() {

        // Initialize a Raw response mock.
        // $rawResponse = "smsID | 23012019-18:00 | message | 33612345678 | 0.1 | 1"; /* A well formed raw response */
        $rawResponse = "smsID | 23012019-18:00 | message | 33612345678 | 0.1"; /* A bad formed raw response */

        $obj = TestObjectSerializer::deserializeSentSMSMessage($rawResponse);
        $this->assertInstanceOf(SentSMSMessage::class, $obj);

        $this->assertNull($obj->getCode());
        $this->assertNull($obj->getDescription());

        $this->assertNull($obj->getCostCredits());
        $this->assertNull($obj->getMessage());
        $this->assertNull($obj->getNumero());
        $this->assertNull($obj->getRecipientCount());
        $this->assertNull($obj->getSendDate());
        $this->assertNull($obj->getSmsID());
    }

    /**
     * Tests the deserializeTransferringCreditsResponse() method.
     *
     * @return void
     */
    public function testDeserializeTransferringCreditsResponse() {

        // Initialize a Raw response mock.
        $rawResponse = "0 | Transfer done";

        $obj = ObjectSerializer::deserializeTransferringCreditsResponse($rawResponse);
        $this->assertInstanceOf(TransferringCreditsResponse::class, $obj);

        $this->assertEquals(0, $obj->getCode());
        $this->assertEquals("Transfer done", $obj->getDescription());
    }

    /**
     * Tests the serializeAccountBalance() method.
     *
     * @return void
     */
    public function testSerializeAccountBalance() {

        // Set an account balance request mock.
        $arg = new AccountBalanceRequest();

        $res = [];
        $this->assertEquals($res, ObjectSerializer::serializeAccountBalanceRequest($arg));
    }

    /**
     * Tests the serializeAddingContactRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     */
    public function testSerializeAddingContactRequest() {

        // Set an Adding contact request mock.
        $arg = new AddingContactRequest();

        $arg->setNom("nom");
        $arg->setMobile("mobile");

        $arg->setPrenom("prenom");
        $arg->setGroupes(["groupe1", "groupe2"]);
        $arg->setSociete("societe");
        $arg->setOther("other");
        $arg->setDate(new DateTime("2017-09-12 11:00:00"));

        $res = [
            "nom"     => "nom",
            "mobile"  => "mobile",
            "prenom"  => "prenom",
            "groupes" => "groupe1,groupe2",
            "societe" => "societe",
            "other"   => "other",
            "date"    => "12092017",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeAddingContactRequest($arg));
    }

    /**
     * Tests the serializeAddingContactRequest() method.
     *
     * @return void
     */
    public function testSerializeAddingContactRequestWithoutArguments() {

        // Set an Adding contact request mock.
        $arg = new AddingContactRequest();

        try {

            ObjectSerializer::serializeAddingContactRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"nom\" is missing", $ex->getMessage());
        }

        try {

            $arg->setNom("nom");
            ObjectSerializer::serializeAddingContactRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"mobile\" is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the serializeAuthentication() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     */
    public function testSerializeAuthentication() {

        // Set a Creating sub-account request mock.
        $arg = new Authentication();

        $arg->setPseudo("pseudo");
        $arg->setPass("pass");

        $res = [
            "pseudo" => "pseudo",
            "pass"   => "pass",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeAuthentication($arg));
    }

    /**
     * Tests the serializeAuthentication() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     */
    public function testSerializeAuthenticationWithToken() {

        // Set a Creating sub-account request mock.
        $arg = new Authentication();

        $arg->setAccessToken("accessToken");
        $arg->setPseudo("pseudo");
        $arg->setPass("pass");

        $res = [
            "accessToken" => "accessToken",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeAuthentication($arg));
    }

    /**
     * Tests the serializeAuthentication() method.
     *
     * @return void
     */
    public function testSerializeAuthenticationWithoutArguments() {

        // Set a Authentication mock.
        $arg = new Authentication();

        try {

            ObjectSerializer::serializeAuthentication($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"pseudo\" is missing", $ex->getMessage());
        }

        try {

            $arg->setPseudo("pseudo");
            ObjectSerializer::serializeAuthentication($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"pass\" is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the serializeCheckingSMSMessageStatusRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     */
    public function testSerializeCheckingSMSMessageStatusRequest() {

        // Set a Checking SMS message status mock.
        $arg = new CheckingSMSMessageStatusRequest();

        $arg->setSmsID("smsID");

        $res = [
            "smsID" => "smsID",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeCheckingSMSMessageStatusRequest($arg));
    }

    /**
     * Tests the serializeCheckingSMSMessageStatusRequest() method.
     *
     * @return void
     */
    public function testSerializeCheckingSMSMessageStatusRequestWithoutArguments() {

        // Set a Checking SMS message status mock.
        $arg = new CheckingSMSMessageStatusRequest();

        try {

            ObjectSerializer::serializeCheckingSMSMessageStatusRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"smsID\" is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the serializeCreatingAPIKeyRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     */
    public function testSerializeCreatingAPIKeyRequest() {

        // Set an Creating API key request mock.
        $arg = new CreatingAPIKeyRequest();

        $arg->setAccessToken("accessToken");

        $res = [
            "accessToken" => "accessToken",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeCreatingAPIKeyRequest($arg));
    }

    /**
     * Tests the serializeCreatingAPIKeyRequest() method.
     *
     * @return void
     */
    public function testSerializeCreatingAPIKeyRequestWithoutArguments() {

        // Set an Creating API key request mock.
        $arg = new CreatingAPIKeyRequest();

        try {

            ObjectSerializer::serializeCreatingAPIKeyRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"accessToken\" is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the serializeCreatingSubAccountRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     */
    public function testSerializeCreatingSubAccount() {

        // Set a Creating sub-account request mock.
        $arg = new CreatingSubAccountRequest();

        $arg->setNewPseudo("newPseudo");
        $arg->setNewPass("newPass");

        $arg->setReference("reference");
        $arg->setNom("nom");
        $arg->setPrenom("prenom");
        $arg->setSociete("societe");
        $arg->setAdresse("adresse");
        $arg->setVille("ville");
        $arg->setCodePostal("codePostal");
        $arg->setMobile("mobile");
        $arg->setTelephone("telephone");
        $arg->setFax("fax");
        $arg->setEmail("email");
        $arg->setDate(new DateTime("2017-09-12 11:00:00"));

        $res = [
            "newPseudo"  => "newPseudo",
            "newPass"    => "newPass",
            "reference"  => "reference",
            "nom"        => "nom",
            "prenom"     => "prenom",
            "societe"    => "societe",
            "adresse"    => "adresse",
            "ville"      => "ville",
            "codePostal" => "codePostal",
            "mobile"     => "mobile",
            "telephone"  => "telephone",
            "fax"        => "fax",
            "email"      => "email",
            "date"       => "12092017",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeCreatingSubAccountRequest($arg));
    }

    /**
     * Tests the serializeCreatingSubAccountRequest() method.
     *
     * @return void
     */
    public function testSerializeCreatingSubAccountWithoutArguments() {

        // Set a Creating sub-account request mock.
        $arg = new CreatingSubAccountRequest();

        try {

            ObjectSerializer::serializeCreatingSubAccountRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"newPseudo\" is missing", $ex->getMessage());
        }

        try {

            $arg->setNewPseudo("newPseudo");
            ObjectSerializer::serializeCreatingSubAccountRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"newPass\" is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the serializeDeletingSMSRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     */
    public function testSerializeDeletingSMSRequest() {

        // Set a Delete SMS request mock.
        $arg = new DeletingSMSRequest();

        $arg->setSmsID("smsID");

        $res1 = [
            "smsID" => "smsID",
        ];
        $this->assertEquals($res1, ObjectSerializer::serializeDeletingSMSRequest($arg));

        $arg->setSmsID(null);
        $arg->setNumero("numero");

        $res2 = [
            "numero" => "numero",
        ];
        $this->assertEquals($res2, ObjectSerializer::serializeDeletingSMSRequest($arg));
    }

    /**
     * Tests the serializeDeletingSMSRequest() method.
     *
     * @return void
     */
    public function testSerializeDeletingSMSRequestWithoutArguments() {

        // Set a Delete SMS request mock.
        $arg = new DeletingSMSRequest();

        try {

            ObjectSerializer::serializeDeletingSMSRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"smsID\" or \"numero\" is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the serializeDeletingSubAccountRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     */
    public function testSerializeDeletingSubAccountRequest() {

        // Set a Deleting sub-account request mock.
        $arg = new DeletingSubAccountRequest();

        $arg->setPseudoToDelete("pseudoToDelete");

        $res = [
            "pseudoToDelete" => "pseudoToDelete",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeDeletingSubAccountRequest($arg));
    }

    /**
     * Tests the serializeDeletingSubAccountRequest() method.
     *
     * @return void
     */
    public function testSerializeDeletingSubAccountRequestWithoutArguments() {

        // Set a Deleting sub-account request mock.
        $arg = new DeletingSubAccountRequest();
        try {

            ObjectSerializer::serializeDeletingSubAccountRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"pseudoToDelete\" is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the serializeDeliveryReportRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     */
    public function testSerializeDeliveryReportRequest() {

        // Set a Delivery report request mock.
        $arg = new DeliveryReportRequest();

        $arg->setSmsID("smsID");

        $res = [
            "smsID" => "smsID",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeDeliveryReportRequest($arg));
    }

    /**
     * Tests the serializeDeliveryReportRequest() method.
     *
     * @return void
     */
    public function testSerializeDeliveryReportRequestWithoutArguments() {

        // Set a Delivery report request mock.
        $arg = new DeliveryReportRequest();

        try {

            ObjectSerializer::serializeDeliveryReportRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"smsID\" is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the serializeRetrievingSMSReplyRequest() method.
     *
     * @return void
     */
    public function testSerializeRetrievingSMSReplyRequest() {

        // Set a Retrieving SMS reply request mock.
        $arg = new RetrievingSMSReplyRequest();

        try {

            $arg->setStart(0);
            $arg->setOffset(null);
            ObjectSerializer::serializeRetrievingSMSReplyRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The optional parameter \"offset\" is missing", $ex->getMessage());
        }

        try {

            $arg->setStart(null);
            $arg->setOffset(0);
            ObjectSerializer::serializeRetrievingSMSReplyRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The optional parameter \"start\" is missing", $ex->getMessage());
        }

        try {

            $arg->setStart(0);
            $arg->setOffset(0);
            ObjectSerializer::serializeRetrievingSMSReplyRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(IllegalArgumentException::class, $ex);
            $this->assertEquals("The \"offset\" must be greater than \"start\"", $ex->getMessage());
        }

        $arg->setStart(0);
        $arg->setOffset(10);

        $res = [
            "start"  => 0,
            "offset" => 10,
        ];
        $this->assertEquals($res, ObjectSerializer::serializeRetrievingSMSReplyRequest($arg));
    }

    /**
     * Tests the serializeRetrievingSMSReplyRequest() method.
     *
     * @return void
     */
    public function testSerializeRetrievingSMSReplyRequestWithStartAndEndDate() {

        // Set a Retrieving SMS reply request mock.
        $arg = new RetrievingSMSReplyRequest();

        try {

            $arg->setStartDate(new DateTime("2017-09-14 12:00:00"));
            ObjectSerializer::serializeRetrievingSMSReplyRequest($arg);
        } catch (Exception $ex) {
            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The optional parameter \"endDate\" is missing", $ex->getMessage());
        }

        try {

            $arg->setStartDate(null);
            $arg->setEndDate(new DateTime("2017-09-14 12:00:00"));
            ObjectSerializer::serializeRetrievingSMSReplyRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The optional parameter \"startDate\" is missing", $ex->getMessage());
        }

        try {

            $arg->setStartDate(new DateTime("2017-09-14 12:00:00"));
            $arg->setEndDate(new DateTime("2017-09-14 12:00:00"));
            ObjectSerializer::serializeRetrievingSMSReplyRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(IllegalArgumentException::class, $ex);
            $this->assertEquals("The \"endDate\" must be greater than \"startDate\"", $ex->getMessage());
        }

        $arg->setStartDate(new DateTime("2017-09-14 12:00:00"));
        $arg->setEndDate(new DateTime("2017-09-14 14:00:00"));

        $res = [
            "startDate" => "14092017-12:00",
            "endDate"   => "14092017-14:00",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeRetrievingSMSReplyRequest($arg));
    }

    /**
     * Tests the serializeRetrievingSMSReplyRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     * @throws IllegalArgumentException Throws an illegal argument exception.
     */
    public function testSerializeRetrievingSMSReplyRequestWithoutArguments() {

        // Set a Retrieving SMS reply request mock.
        $arg = new RetrievingSMSReplyRequest();

        $res = [];
        $this->assertEquals($res, ObjectSerializer::serializeRetrievingSMSReplyRequest($arg));
    }

    /**
     * Tests the serializeSendingSMSMessageRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     * @throws IllegalArgumentException Throws an illegal argument exception.
     */
    public function testSerializeSendingSMSMessageRequest() {

        // Set a Sending SMS message request mock.
        $arg = new SendingSMSMessageRequest();

        $arg->setMessage("message");
        $arg->setNumero(["numero1", "numero2"]);

        $arg->setClasseMsg(SendingSMSMessageRequest::CLASSE_MSG_SMS);
        $arg->setDateEnvoi(new DateTime("2017-09-07 10:00:00"));
        $arg->setRefClient("refClient");
        $arg->setEmetteur("emetteur");
        $arg->setNbrMsg(1);
        $arg->setNotificationURL("notificationURL");
        $arg->setNotificationURLReponse("notificationURLReponse");
        $arg->setStop(SendingSMSMessageRequest::STOP_ALWAYS);

        $res = [
            "message"                  => "message",
            "numero"                   => "numero1,numero2",
            "classe_msg"               => 4,
            "date_envoi"               => "07092017-10:00",
            "refClient"                => "refClient",
            "emetteur"                 => "emetteur",
            "nbr_msg"                  => 1,
            "notification_url"         => "notificationURL",
            "notification_url_reponse" => "notificationURLReponse",
            "stop"                     => 2,
        ];
        $this->assertEquals($res, ObjectSerializer::serializeSendingSMSMessageRequest($arg));
    }

    /**
     * Tests the serializeSendingSMSMessageRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     * @throws IllegalArgumentException Throws an illegal argument exception.
     */
    public function testSerializeSendingSMSMessageRequestWithGroupe() {

        // Set a Sending SMS message request mock.
        $arg = new SendingSMSMessageRequest();

        $arg->setMessage("message");
        $arg->setGroupe("groupe");

        $arg->setClasseMsg(SendingSMSMessageRequest::CLASSE_MSG_SMS);
        $arg->setDateEnvoi(new DateTime("2017-09-07 10:00:00"));
        $arg->setRefClient("refClient");
        $arg->setEmetteur("emetteur");
        $arg->setNbrMsg(1);
        $arg->setNotificationURL("notificationURL");
        $arg->setNotificationURLReponse("notificationURLReponse");

        $res = [
            "message"                  => "message",
            "groupe"                   => "groupe",
            "classe_msg"               => 4,
            "date_envoi"               => "07092017-10:00",
            "refClient"                => "refClient",
            "emetteur"                 => "emetteur",
            "nbr_msg"                  => 1,
            "notification_url"         => "notificationURL",
            "notification_url_reponse" => "notificationURLReponse",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeSendingSMSMessageRequest($arg));
    }

    /**
     * Tests the serializeSendingSMSMessageRequest() method.
     *
     * @return void
     */
    public function testSerializeSendingSMSMessageRequestWithoutArguments() {

        // Set a Sending SMS message request mock.
        $arg = new SendingSMSMessageRequest();

        try {

            ObjectSerializer::serializeSendingSMSMessageRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"message\" is missing", $ex->getMessage());
        }

        try {

            $arg->setMessage("message");
            ObjectSerializer::serializeSendingSMSMessageRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"number\" or \"group\" is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the serializeSendingTextToSpeechRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     */
    public function testSerializeSendingTextToSpeechRequest() {

        // Set a Sending text-to-speech request mock.
        $arg = new SendingTextToSpeechSMSRequest();

        $arg->setMessage("message");
        $arg->setNumero(["numero1", "numero2"]);

        $arg->setTitle("title");
        $arg->setDateEnvoi(new DateTime("2019-01-17"));
        $arg->setLanguage("language");

        $res = [
            "message"    => "message",
            "numero"     => "numero1,numero2",
            "title"      => "title",
            "date_envoi" => "17012019",
            "language"   => "language",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeSendingTextToSpeechRequest($arg));
    }

    /**
     * Tests the serializeSendingTextToSpeechRequest() method.
     *
     * @return void
     */
    public function testSerializeSendingTextToSpeechRequestWithoutArguments() {

        // Set a Sending text-to-speech request mock.
        $arg = new SendingTextToSpeechSMSRequest();

        try {

            ObjectSerializer::serializeSendingTextToSpeechRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"message\" is missing", $ex->getMessage());
        }

        try {

            $arg->setMessage("message");
            ObjectSerializer::serializeSendingTextToSpeechRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"numero\" is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the serializeSentSMSMessageRequest() method.
     *
     * @return void
     */
    public function testSerializeSentSMSMessageRequest() {

        // Set a Deleting sub-account request mock.
        $arg = new SentSMSMessageListRequest();

        $arg->setOffset(10);

        $res = [
            "offset" => 10,
        ];
        $this->assertEquals($res, ObjectSerializer::serializeSentSMSMessageRequest($arg));
    }

    /**
     * Tests the serializeSentSMSMessageRequest() method.
     *
     * @return void
     */
    public function testSerializeSentSMSMessageRequestWithoutArguments() {

        // Set a Deleting sub-account request mock.
        $arg = new SentSMSMessageListRequest();

        $res = [];
        $this->assertEquals($res, ObjectSerializer::serializeSentSMSMessageRequest($arg));
    }

    /**
     * Test the serializeTransferringCreditsRequest() method.
     *
     * @return void
     * @throws NullPointerException Throws a null pointer exception.
     */
    public function testSerializeTransferringCreditsRequest() {

        // Set a Transferring credits request mock.
        $arg = new TransferringCreditsRequest();

        $arg->setTargetPseudo("targetPseudo");
        $arg->setCreditAmount(212);

        $arg->setReference("reference");

        $res = [
            "targetPseudo" => "targetPseudo",
            "creditAmount" => 212,
            "reference"    => "reference",
        ];
        $this->assertEquals($res, ObjectSerializer::serializeTransferringCreditsRequest($arg));
    }

    /**
     * Test the serializeTransferringCreditsRequest() method.
     *
     * @return void
     */
    public function testSerializeTransferringCreditsRequestWithoutArguments() {

        // Set a Transferring credits request mock.
        $arg = new TransferringCreditsRequest();

        try {

            ObjectSerializer::serializeTransferringCreditsRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"targetPseudo\" is missing", $ex->getMessage());
        }

        try {

            $arg->setTargetPseudo("targetPseudo");
            ObjectSerializer::serializeTransferringCreditsRequest($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(NullPointerException::class, $ex);
            $this->assertEquals("The mandatory parameter \"creditAmount\" is missing", $ex->getMessage());
        }
    }
}
