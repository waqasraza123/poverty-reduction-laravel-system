<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\DonnerController;

class ProblemsComposer
{

    protected $problems;
    protected $allProblems;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(DonnerController $donnerController)
    {
        // Dependencies automatically resolved by service container...
        global $problems,$allProblems;
        $problems = $donnerController->getProblemsData();
        $allProblems = $donnerController->getAllProblems();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        global $problems, $allProblems;
        $view->with(['problems' => $problems, 'allProblems' => $allProblems]);
    }
}