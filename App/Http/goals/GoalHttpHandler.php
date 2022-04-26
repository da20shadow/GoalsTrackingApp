<?php
namespace App\Http\goals;
use App\Http\interfaces\BaseHttpHandler;
use App\Service\goal\GoalServiceInterface;

class GoalHttpHandler extends BaseHttpHandler
{

    public function create(GoalServiceInterface $goalService){
        $this->render("goal/create_goal");
    }

    public function all(GoalServiceInterface $goalService){
        $this->render('goal/all_goals',$goalService->getAll());
    }
}