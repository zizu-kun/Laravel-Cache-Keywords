<?php namespace Propaganistas\LaravelCacheKeywords;

use Illuminate\Cache\CacheManager as ICacheManager;
use Illuminate\Contracts\Cache\Store;

class CacheManager extends ICacheManager
{
    /**
     * Create a new cache repository with the given implementation.
     *
     * @param  \Illuminate\Contracts\Cache\Store  $store
     * @return \Propaganistas\LaravelCacheKeywords\Repository
     */
    public function repository(Store $store)
    {
        $repository = new KeywordsRepository($store);

        if ($this->app->bound('Illuminate\Contracts\Events\Dispatcher')) {
            $repository->setEventDispatcher(
                $this->app['Illuminate\Contracts\Events\Dispatcher']
            );
        }

        return $repository;
    }
}