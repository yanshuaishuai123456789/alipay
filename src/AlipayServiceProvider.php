<?php
namespace Sepia\Alipay;


use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Support\ServiceProvider;
use Sepia\Alipay\Lib\Alipay;
use Sepia\Alipay\Builder\Builder;
class AlipayServiceProvider extends ServiceProvider
{

    /**
     * boot process
     */
    public function boot()
    {
        $this->setup();
    }



    public function setup()
    {
        $config = realpath(dirname(__FILE__).'/Config/config.php');

        if($this->app instanceof LaravelApplication && $this->app->runningInConsole()){
            $this->publishes([
                $config=>config_path('alipay.php')
            ]);
        }elseif($this->app instanceof LumenApplication){
            $this->app->configure('alipay.php');
        }
        $this->mergeConfigFrom($config, 'wechat');
    }


    /**
     * Register the provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('alipay', function ($app) {
            $alipay = new Alipay(config('alipay'));
            return $alipay;
        });
        $this->app->singleton('alipay.builder', function ($app) {
            $builder = new Builder();
            return $builder;
        });

    }


}