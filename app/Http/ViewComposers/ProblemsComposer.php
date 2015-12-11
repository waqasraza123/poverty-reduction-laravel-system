<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\DonnerController;

class ProblemsComposer
{

    protected $problems;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(DonnerController $donnerController)
    {
        // Dependencies automatically resolved by service container...
        global $problems;
        $problems = $donnerController->getProblemsData();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        global $problems;
        $view->withProblems($problems);
    }
}