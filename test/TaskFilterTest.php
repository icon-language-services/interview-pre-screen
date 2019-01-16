<?php

use PHPUnit\Framework\TestCase;
use IconLanguageServices\InterviewPreScreen\TaskFilter;

class TaskFilterTest extends TestCase
{
    private function taskList()
    {
        return [
            ['type' => 'TST', 'status' => 'CNF'],
            ['type' => 'IMP', 'status' => 'CNF'],
            ['type' => 'DAT', 'status' => 'CNF'],
            ['type' => 'NUL', 'status' => 'CNF'],
            ['type' => 'TST', 'status' => 'NOT'],
            ['type' => 'IMP', 'status' => 'NOT'],
            ['type' => 'DAT', 'status' => 'NOT'],
            ['type' => 'NUL', 'status' => 'NOT'],
            ['type' => 'TST', 'status' => 'AVG'],
            ['type' => 'IMP', 'status' => 'AVG'],
            ['type' => 'DAT', 'status' => 'AVG'],
            ['type' => 'NUL', 'status' => 'AVG'],
        ];
    }

    /**
     * @test
     */
    function confirmed_tasks_cannot_be_NUL()
    {
        $processor = new TaskFilter($this->taskList());

        $this->assertNoNULTasksIn($processor->confirmed());
    }

    /**
     * @test
     */
    function confirmed_tasks_cannot_have_NOT_status()
    {
        $processor = new TaskFilter($this->taskList());

        $this->assertNoNOTTasksIn($processor->confirmed());
    }

    /**
     * @test
     */
    function unconfirmed_tasks_cannot_be_CNF()
    {
        $processor = new TaskFilter($this->taskList());

        $this->assertNoCNFTasksIn($processor->unconfirmed());
    }

    /**
     * Custom Assertions
     * -----------------
     */

    private function assertNoNULTasksIn($tasks)
    {
        if (in_array('NUL', array_column($tasks, 'type'))) {
            $this->fail("The task list contains a NUL task: \n" . print_r($tasks, true));
        } else {
            $this->assertTrue(true, 'The task list contains no NUL tasks');
        }
    }

    private function assertNoNOTTasksIn($tasks)
    {
        if (in_array('NOT', array_column($tasks, 'status'))) {
            $this->fail("The task list contains a NOT task: \n" . print_r($tasks, true));
        } else {
            $this->assertTrue(true, 'The task list contains no NOT tasks');
        }
    }

    private function assertNoCNFTasksIn($tasks)
    {
        if (in_array('CNF', array_column($tasks, 'status'))) {
            $this->fail("The task list contains a CNF task: \n" . print_r($tasks, true));
        } else {
            $this->assertTrue(true, 'The task list contains no CNF tasks');
        }
    }
}
