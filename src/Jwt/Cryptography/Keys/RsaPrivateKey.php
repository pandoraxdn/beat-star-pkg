<?php

namespace beatstar\pkg\Jwt\Cryptography\Keys;

use beatstar\pkg\Jwt\Exceptions\InvalidKeyException;

class RsaPrivateKey
{

    private $resource;

    public function __construct(string $filePath, $passphrase = '')
    {
        $this->resource = openssl_pkey_get_private('file:///' . $filePath, $passphrase);

        if (empty($this->resource)) {

            throw new InvalidKeyException();
            
        }
    }

    public function getResource()
    {
        return $this->resource;
    }

    public function close()
    {
        openssl_free_key($this->getResource());
    }
}
