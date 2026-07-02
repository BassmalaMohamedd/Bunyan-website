<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TranslatePublicHtml
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (app()->isLocale('ar') && $response->isSuccessful()
            && str_contains((string) $response->headers->get('Content-Type'), 'text/html')) {
            $translations = array_merge((array) trans('site'), (array) trans('admin_ui'));
            if (is_array($translations)) {
                uksort($translations, fn ($a, $b) => strlen($b) <=> strlen($a));
                $html = $response->getContent();
                $protected = [];
                if ($request->is('admin*')) {
                    $html = preg_replace_callback('/<textarea\b[^>]*>.*?<\/textarea>|\bvalue=("[^"]*"|\'[^\']*\')/is', function ($match) use (&$protected) {
                        $token = '___AQARNA_PROTECTED_'.count($protected).'___';
                        $protected[$token] = $match[0];
                        return $token;
                    }, $html);
                }
                $html = strtr($html, $translations);
                $response->setContent($protected ? strtr($html, $protected) : $html);
            }
        }

        return $response;
    }
}
