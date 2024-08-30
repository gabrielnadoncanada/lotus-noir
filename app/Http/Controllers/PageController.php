<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Settings\ThemeSettings;

class PageController extends Controller
{
    public function index($slug = null)
    {
        $themeSettings = app(ThemeSettings::class);
        $record = Page::find($themeSettings->site_home_page_id);

        return view('templates.single', [
            'record' => $record,
        ]);
    }
}
