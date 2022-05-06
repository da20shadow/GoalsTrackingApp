<?php
namespace App\Http\goals;
use App\Http\interfaces\BaseHttpHandler;
use App\Service\goal\GoalServiceInterface;

class GoalHttpHandler extends BaseHttpHandler
{

    public function create(array $formData = []){
        if (isset($formData['title']) && isset($formData['description'])
            && isset($formData['due_date'])){
            //TODO to send the goal form with ajax
        }else {
            $this->render("goal/create_goal");
        }
    }

    public function all(GoalServiceInterface $goalService){
        $this->render('goal/all_goals',$goalService->getAll());
    }

    public function goalID(GoalServiceInterface $goalService,array $id){
        $this->render('goal/_goal',$goalService->getGoalID($id));
    }
}