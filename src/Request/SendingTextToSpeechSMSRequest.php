<?php

/*
 * This file is part of the smsmode-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SMSMode\Request;

use InvalidArgumentException;
use UnexpectedValueException;
use WBW\Library\SMSMode\API\SendingTextToSpeechSMSInterface;
use WBW\Library\SMSMode\Model\Attribute\DateTimeDateEnvoiTrait;
use WBW\Library\SMSMode\Serializer\NumeroSerializer;
use WBW\Library\Traits\Strings\StringMessageTrait;

/**
 * Sending text-to-speech SMS request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\SMSMode\Request
 */
class SendingTextToSpeechSMSRequest extends AbstractRequest implements SendingTextToSpeechSMSInterface {

    use DateTimeDateEnvoiTrait;
    use StringMessageTrait;

    /**
     * Sending text-to-speech SMS request.
     *
     * @var string
     */
    const SENDING_TEXT_TO_SPEECH_SMS_RESOURCE_PATH = "/http/1.6/sendVoiceMessage.do";

    /**
     * Language.
     *
     * @var string|null
     */
    private $language;

    /**
     * Numero.
     *
     * @var string[]
     */
    private $numero;

    /**
     * Title.
     *
     * @var string|null
     */
    private $title;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->setNumero([]);
    }

    /**
     * Add a numero.
     *
     * @param string $numero The numero.
     * @return SendingTextToSpeechSMSRequest Returns this sending text-to-speech SMS request.
     * @throws UnexpectedValueException Throws an unexpected value exception if the numero is invalid.
     */
    public function addNumero(string $numero): SendingTextToSpeechSMSRequest {
        NumeroSerializer::checkNumero($numero);
        $this->numero[] = $numero;
        return $this;
    }

    /**
     * Enumerates the language.
     *
     * @return string[] Returns the language enumeration.
     */
    public function enumLanguage(): array {
        return [
            self::LANGUAGE_FR,
            self::LANGUAGE_EN,
            self::LANGUAGE_DE,
            self::LANGUAGE_ES,
        ];
    }

    /**
     * Get the language.
     *
     * @return string|null Returns the language.
     */
    public function getLanguage(): ?string {
        return $this->language;
    }

    /**
     * Get the numero.
     *
     * @return string[] Returns the numero.
     */
    public function getNumero(): array {
        return $this->numero;
    }

    /**
     * {@inheritdoc}
     */
    public function getResourcePath(): string {
        return self::SENDING_TEXT_TO_SPEECH_SMS_RESOURCE_PATH;
    }

    /**
     * Get the title.
     *
     * @return string|null Returns the title.
     */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * Set the language.
     *
     * @param string|null $language The language.
     * @return SendingTextToSpeechSMSRequest Returns this sending text-to-speech request.
     * @throws InvalidArgumentException Throws an invalid argument exception if the language is invalid.
     */
    public function setLanguage(?string $language): SendingTextToSpeechSMSRequest {
        if (null !== $language && false === in_array($language, $this->enumLanguage())) {
            throw new InvalidArgumentException(sprintf('The language "%s" is invalid', $language));
        }
        $this->language = $language;
        return $this;
    }

    /**
     * Set the numero.
     *
     * @param string[] $numero The numero.
     * @return SendingTextToSpeechSMSRequest Returns this sending text-to-speech request.
     */
    protected function setNumero(array $numero): SendingTextToSpeechSMSRequest {
        $this->numero = $numero;
        return $this;
    }

    /**
     * Set the title.
     *
     * @param string|null $title The title.
     * @return SendingTextToSpeechSMSRequest Returns this sending text-to-speech request.
     */
    public function setTitle(?string $title): SendingTextToSpeechSMSRequest {
        $this->title = $title;
        return $this;
    }
}
