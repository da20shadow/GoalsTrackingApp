<?php

namespace App\Models\subtasks;

class SubtaskDTO
{
    private int $subTaskID;
    private string $subTaskTitle;
    private string $subTaskDescription;
    private $dueDate;
    private int $progress;
    private int $completed;
    private int $taskID;
    private int $parentID;
    private int $totalSubtasks;

    public function create(string $subTaskTitle,
                                string $subTaskDescription, $dueDate, int $progress = 0,
                                int $completed = 0, int $taskID = 0, int $parentID = 0,
                                int $subTaskID = 0, int $totalSubtasks = 0): SubtaskDTO
    {
        return (new SubtaskDTO())
            ->setSubTaskID($subTaskID)
            ->setSubTaskTitle($subTaskTitle)
            ->setSubTaskDescription($subTaskDescription)
            ->setDueDate($dueDate)
            ->setProgress($progress)
            ->setCompleted($completed)
            ->setTaskID($taskID)
            ->setParentID($parentID)
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
     * @return SubtaskDTO
     */
    public function setTotalSubtasks(int $totalSubtasks): SubtaskDTO
    {
        $this->totalSubtasks = $totalSubtasks;
        return $this;
    }


    /**
     * @return int
     */
    public function getSubTaskID(): int
    {
        return $this->subTaskID;
    }

    /**
     * @return string
     */
    public function getSubTaskTitle(): string
    {
        return $this->subTaskTitle;
    }

    /**
     * @return string
     */
    public function getSubTaskDescription(): string
    {
        return $this->subTaskDescription;
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
    public function getTaskID(): int
    {
        return $this->taskID;
    }

    /**
     * @return int
     */
    public function getParentID(): int
    {
        return $this->parentID;
    }

    /**
     * @param int $subTaskID
     * @return SubtaskDTO
     */
    public function setSubTaskID(int $subTaskID): SubtaskDTO
    {
        $this->subTaskID = $subTaskID;
        return $this;
    }

    /**
     * @param string $subTaskTitle
     * @return SubtaskDTO
     */
    public function setSubTaskTitle(string $subTaskTitle): SubtaskDTO
    {
        $this->subTaskTitle = $subTaskTitle;
        return $this;
    }

    /**
     * @param string $subTaskDescription
     * @return SubtaskDTO
     */
    public function setSubTaskDescription(string $subTaskDescription): SubtaskDTO
    {
        $this->subTaskDescription = $subTaskDescription;
        return $this;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate): SubtaskDTO
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @param int $progress
     * @return SubtaskDTO
     */
    public function setProgress(int $progress): SubtaskDTO
    {
        $this->progress = $progress;
        return $this;
    }

    /**
     * @param int $completed
     * @return SubtaskDTO
     */
    public function setCompleted(int $completed): SubtaskDTO
    {
        $this->completed = $completed;
        return $this;
    }

    /**
     * @param int $taskID
     * @return SubtaskDTO
     */
    public function setTaskID(int $taskID): SubtaskDTO
    {
        $this->taskID = $taskID;
        return $this;
    }

    /**
     * @param int $parentID
     * @return SubtaskDTO
     */
    public function setParentID(int $parentID): SubtaskDTO
    {
        $this->parentID = $parentID;
        return $this;
    }


}
