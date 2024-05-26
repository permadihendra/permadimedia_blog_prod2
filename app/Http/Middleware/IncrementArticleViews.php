<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Article;

class IncrementArticleViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Use getStatusCode() to obtain the status code
        if ($response->getStatusCode() === 200) {
            // dump('response 200');
            $article_get = Article::where('slug', $request->route('slug'))->first(); // get the route varialble  url 'article/{slug}'
            // dump($article_get);

            if ($article_get) {
                $ip = $request->ip(); // retrieve the users IP Address
                $viewed = session()->get('viewed_articles', []);

                // Create unique key for the sesion to avoid collision across different article
                $uniqueViewKey = $ip . '-' . $article_get->id;

                if (!in_array($uniqueViewKey, $viewed)) {
                    $article_get->increment('views'); // Call the increment method, increment the views
                    $viewed[] = $uniqueViewKey; // Add this article to the viewd list
                    session()->put('viewed_articles', $viewed); // Save back to the session
                }
            } else {
                abort(402);
            }
        }

        return $response;
    }
}
