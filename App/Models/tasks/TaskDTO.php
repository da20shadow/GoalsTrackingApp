<?php

namespace App\Models\tasks;

class TaskDTO
{
    private int $taskID;
    private string $taskTitle;
    private string $taskDescription;
    private $dueDate;
    private int $progress;
    private int $completed;
    private int $goalID;
    private int $userID;
    private int $totalSubtasks;

    /**
     * @param $task_title
     * @param $task_description
     * @param $due_date
     * @param null $user_id
     * @param int $totalSubtasks
     * @param null $goal_id
     * @param int $progress
     * @param int $completed
     * @return TaskDTO
     */
    public static function create($task_title, $task_description, $due_date, $user_id = null,$totalSubtasks = 0,
                                  $goal_id = null, int $progress = 0, int $completed = 0): TaskDTO
    {

        return (new TaskDTO())->setTaskTitle($task_title)
            ->setTaskDescription($task_description)
            ->setDueDate($due_date)
            ->setGoalID($goal_id)
            ->setProgress($progress)
            ->setCompleted($completed)
            ->setUserID($user_id)
            ->setTotalSubtasks($totalSubtasks);

    }

    /**
     * @return int
     */
    public function getTotalSubtasks(): int
    {
        return $this->totalSubtasks;
    }

    /**
     * @param int $totalSubtasks
     * @return TaskDTO
     */
    public function setTotalSubtasks(int $totalSubtasks): TaskDTO
    {
        $this->totalSubtasks = $totalSubtasks;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserID(): int
    {
        return $this->userID;
    }

    /**
     * @param int $userID
     * @return TaskDTO
     */
    public function setUserID(int $userID): TaskDTO
    {
        $this->userID = $userID;
        return $this;
    }

    /**
     * @param int $taskID
     * @return TaskDTO
     */
    public function setTaskID(int $taskID): TaskDTO
    {
        $this->taskID = $taskID;
        return $this;
    }

    /**
     * @param string $taskTitle
     * @return TaskDTO
     */
    public function setTaskTitle(string $taskTitle): TaskDTO
    {
        $this->taskTitle = $taskTitle;
        return $this;
    }

    /**
     * @param string $taskDescription
     * @return TaskDTO
     */
    public function setTaskDescription(string $taskDescription): TaskDTO
    {
        $this->taskDescription = $taskDescription;
        return $this;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate): TaskDTO
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @param int $progress
     * @return TaskDTO
     */
    public function setProgress(int $progress): TaskDTO
    {
        $this->progress = $progress;
        return $this;
    }

    /**
     * @param int $completed
     * @return TaskDTO
     */
    public function setCompleted(int $completed): TaskDTO
    {
        $this->completed = $completed;
        return $this;
    }

    /**
     * @param int $goalID
     * @return TaskDTO
     */
    public function setGoalID(int $goalID): TaskDTO
    {
        $this->goalID = $goalID;
        return $this;
    }



    /**
     * @return int
     */
    public function getTaskID(): int
    {
        return $this->taskID;
    }

    /**
     * @return string
     */
    public function getTaskTitle(): string
    {
        return $this->taskTitle;
    }

    /**
     * @return string
     */
    public function getTaskDescription(): string
    {
        return $this->taskDescription;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @return int
     */
    public function getProgress(): int
    {
        return $this->progress;
    }

    /**
     * @return int
     */
    public function getCompleted(): int
    {
        return $this->completed;
    }

    /**
     * @return int
     */
    public function getGoalID(): int
    {
        return $this->goalID;
    }


}