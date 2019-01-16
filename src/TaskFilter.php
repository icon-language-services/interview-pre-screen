<?php

namespace IconLanguageServices\InterviewPreScreen;

class TaskFilter
{
    /**
     * @var array
     */
    private $tasks;

    function __construct(array $tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * @return array
     */
    public function confirmed()
    {
        // code here
    }

    /**
     * @return array
     */
    public function unconfirmed()
    {
        // code here
    }
}
