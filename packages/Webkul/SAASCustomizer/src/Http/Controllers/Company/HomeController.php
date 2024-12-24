<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Company;

use Webkul\SAASCustomizer\Repositories\Company\ThemeRepository;
use Webkul\SAASCustomizer\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Using const variable for status
     */
    const STATUS = 1;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASCustomizer\Repositories\Company\ThemeRepository  $themeRepository
     * @return void
    */
    public function __construct(protected ThemeRepository $themeRepository)
    {
    }

    /**
     * loads the home page for the storefront
     * 
     * @return \Illuminate\View\View 
     */
    public function index()
    {
        $customizations = $this->themeRepository->orderBy('sort_order')->findWhere([
            'status'     => self::STATUS,
            'channel_id' => company()->getCurrentChannel()->id,
        ]);

        return view('saas::companies.home.index', compact('customizations'));
    }

    /**
     * loads the home page for the storefront
     */
    public function notFound()
    {
        abort(404);
    }
}