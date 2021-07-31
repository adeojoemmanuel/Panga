<?php

namespace App\Interfaces;

interface SubscriberInterface
{
  public function subscribe($data);
  public function publish($data);
}
