<?php

namespace App\Models\goals;

class GoalDTO
{
    private int $goalID;
    private string $goalTitle;
    private string $goalDescription;
    private $dueDate;
    private int $progress;
    private int $completed;
    private int $totalTasks;
    private int $userID;
    private $createdOn;

    public static function create($goalTitle, $goalDescription, $dueDate,
                                  int $userID, int $progress = 0, int $completed = 0,
                                  $totalTasks = 0, $goalID = null, $createdOn = null): GoalDTO
    {
        return (new GoalDTO())
            ->setGoalTitle($goalTitle)
            ->setGoalDescription($goalDescription)
            ->setDueDate($dueDate)
            ->setProgress($progress)
            ->setCompleted($completed)
            ->setTotalTasks($totalTasks)
            ->setUserID($userID)
            ->setGoalID($goalID)
            ->setCreatedOn($createdOn);
    }

    /**
     * @return mixed
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @param mixed $createdOn
     */
    public function setCreatedOn($createdOn): GoalDTO
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalTasks(): int
    {
        return $this->totalTasks;
    }

    /**
     * @param int $totalTasks
     * @return GoalDTO
     */
    public function setTotalTasks(int $totalTasks): GoalDTO
    {
        $this->totalTasks = $totalTasks;
        return $this;
    }

    /**
     * @return int
     */
    public function getProgress(): int
    {
        return $this->progress;
    }

    /**
     * @param int $progress
     * @return GoalDTO
     */
    public function setProgress(int $progress): GoalDTO
    {
        $this->progress = $progress;
        return $this;
    }

    /**
     * @return int
     */
    public function getCompleted(): int
    {
        return $this->completed;
    }

    /**
     * @param int $completed
     * @return GoalDTO
     */
    public function setCompleted(int $completed): GoalDTO
    {
        $this->completed = $completed;
        return $this;
    }

    /**
     * @return int
     */
    public function getGoalID(): int
    {
        return $this->goalID;
    }

    /**
     * @param int $goalID
     * @return GoalDTO
     */
    public function setGoalID(int $goalID): GoalDTO
    {
        $this->goalID = $goalID;
        return $this;
    }

    /**
     * @return string
     */
    public function getGoalTitle(): string
    {
        return $this->goalTitle;
    }

    /**
     * @param string $goalTitle
     * @return GoalDTO
     */
    public function setGoalTitle(string $goalTitle): GoalDTO
    {
        $this->goalTitle = $goalTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getGoalDescription(): string
    {
        return $this->goalDescription;
    }

    /**
     * @param string $goalDescription
     * @return GoalDTO
     */
    public function setGoalDescription(string $goalDescription): GoalDTO
    {
        $this->goalDescription = $goalDescription;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param $dueDate
     * @return GoalDTO
     */
    public function setDueDate($dueDate): GoalDTO
    {
        $this->dueDate = $dueDate;
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
     * @return GoalDTO
     */
    public function setUserID(int $userID): GoalDTO
    {
        $this->userID = $userID;
        return $this;
    }


}