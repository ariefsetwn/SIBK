<?php

namespace App\Http\Middleware;

use Closure;

class CheckBanned
{
  public function handle($request, Closure $next)
  {
    if (auth()->check() && auth()->user()->is_active == 'non-aktif') {
      auth()->logout();
      $message = 'Akun ini telah dinonaktifkan. Silakan hubungi admin';
      return redirect()->route('login')->withMessage($message);
    }
    return $next($request);
  }
}
