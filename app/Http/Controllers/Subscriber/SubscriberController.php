<?php

namespace App\Http\Controllers\Subscriber;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\SubscriberInterface;
use App\Http\Resources\SubscriptionResource;
use App\Http\Requests\Subscriber\PublishStoreRequest;
use App\Http\Requests\Subscriber\SubscriberStoretRequest;

class SubscriberController extends Controller
{
  //
  private $subscriberRepositry;

  public function __construct(SubscriberInterface $subscriberRepositry)
  {
    $this->subscriberRepositry = $subscriberRepositry;
  }

  public function subscribe(SubscriberStoretRequest $request, $topic)
  {
    $data = $request->merge(['topic' => $topic])->all();

    try {
      $subscription = $this->subscriberRepositry->subscribe($data);


      return new SubscriptionResource($subscription);
    } catch (\Exception $ex) {
      return response()->json(['error' => $ex->getMessage()], 400);
    }

    return response()->json(['error' => 'Unable to perform operation'], 400);
  }

  public function publish(PublishStoreRequest $request, $topic)
  {
    $data = ['data' => $request->validated(), 'topic' => $topic];

    try {
      $subscription = $this->subscriberRepositry->publish($data);


      return response()->json(['success' => 'Messages sucessfully uploaded'], 200);
    } catch (\Exception $ex) {
      return response()->json(['error' => $ex->getMessage()], 400);
    }

    return response()->json(['error' => 'Unable to perform operation'], 400);
  }
}
