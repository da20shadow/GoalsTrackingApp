<?php

namespace App\Models\goals;

class GoalDTO
{
    private int $goalID;
    private string $goalTitle;
    private string $goalDescription;
    private $dueDate;
    private int $userID;

    public static function create($goalTitle, $goalDescription, $dueDate, $userID, $goalID = null): GoalDTO
    {
        return (new GoalDTO())
            ->setGoalTitle($goalTitle)
            ->setGoalDescription($goalDescription)
            ->setDueDate($dueDate)
            ->setUserID($userID)
            ->setGoalID($goalID);
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