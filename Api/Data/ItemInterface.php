<?php

namespace Boangri\Sergei\Api\Data;

interface ItemInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string|null
     */
    public function getDescription();
}
