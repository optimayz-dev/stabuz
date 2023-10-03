<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetCurrency
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle($request, Closure $next)
    {
        // Проверяем, есть ли выбранная валюта в сессии
        if (Session::has('currency')) {
            $currency = Session::get('currency');
        } else {
            // Если выбранная валюта отсутствует, устанавливаем значение по умолчанию ('usd' в данном случае)
            $currency = 'uzs';
            Session::put('currency', $currency);
        }

        // Устанавливаем текущую выбранную валюту в приложение
        app()->singleton('currency', function () use ($currency) {
            return $currency;
        });

        // Передаем управление следующему обработчику (middleware) или контроллеру
        return $next($request);
    }


}
