<?php

namespace App\Providers;

use App\Services\AddressParser\DadataParser;
use App\Services\AddressParser\MockParser;
use App\Services\AddressParser\ParserInterface;
use Dadata\DadataClient;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        $this->app->singleton( ParserInterface::class, function( $app ){
//            return new DadataParser( new DadataClient(
//                config( 'dadata.token' ),
//                config( 'dadata.secret' )
//            ));
//        });
        $this->app->singleton( ParserInterface::class, function( $app ){
            return new MockParser();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $blade = $this->app->make( 'blade.compiler' );

        $blade->extend(function ( $value ) {
            $value = preg_replace_callback( '/@icon\((user)\)/',
                function( $matches ){
                $result = preg_replace( "/{$matches[ 1 ]}/", 'this_is_my_icon', $matches[ 0 ] );
                return $result;
            }, $value );
            return $value;
        });
//        $blade->extend(function ($value) {
//            $value = preg_replace( '/---/', 'here', $value );
////            $value = preg_replace_callback( '/@icon(\(.+?\))/', function( $matches ){
////                return $matches[ 2 ] = 'my icon here';
////            }, $value );
//            return $value;
//        });

//        $blade->directive('myDirective', function ($expression) {
//            dd( 111111111 );
/*            return "<?php echo 'Modified HTML'; ?>";*/
//        });

//        Blade::directive('extends', function ($expression) {
//            // Реализуйте свою логику для изменения HTML-кода перед компиляцией
//            // Например, вы можете использовать str_replace для замены части кода
//            $expression = str_replace('---', 'here', $expression);
//
//            // Верните результат в виде расширенной директивы @extends
//            return "@extends($expression)";
//        });


    }
}
