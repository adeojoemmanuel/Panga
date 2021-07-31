<?php

namespace App\Repositories;

// use App\Models\ArtisanRatings;
use App\Models\Subscriptions;

use Illuminate\Support\Facades\Http;
use App\Interfaces\SubscriberInterface;

class SubscriberRepository implements SubscriberInterface
{
  public function __construct()
  {
  }

  public function subscribe($data)
  {
    return Subscriptions::create($data);
  }

  public function getByTopic($topic)
  {
    $sub = Subscriptions::select(["url", "topic"])->where(["topic" => $topic])->get();

    return $sub;
  }

  public function publish($data)
  {
    $subs =  $this->getByTopic($data['topic']);

    if ($subs > 0) {
      foreach ($subs as $sub) {
        Http::post($sub->url, $data);
      }
    }
  }
}
