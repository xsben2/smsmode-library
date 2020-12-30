<?php

/*
 * This file is part of the smsmode-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SMSMode\Model\Attribute;

/**
 * String numero trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\SMSMode\Model\Attribute
 */
trait StringNumeroTrait {

    /**
     * Numero.
     *
     * @var string|null
     */
    private $numero;

    /**
     * Get the numero.
     *
     * @return string|null Returns the numero.
     */
    public function getNumero(): ?string {
        return $this->numero;
    }

    /**
     * Set the numero.
     *
     * @param string|null $numero The numero.
     */
    public function setNumero(?string $numero): self {
        $this->numero = $numero;
        return $this;
    }
}
