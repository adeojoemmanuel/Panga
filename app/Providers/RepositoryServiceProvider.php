<?php

namespace App\Providers;

use App\Interfaces\SubscriberInterface;
use App\Repositories\SubscriberRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    $this->app->bind(SubscriberInterface::class, SubscriberRepository::class);

    //
  }
}
