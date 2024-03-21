<?php
// session_start();

class Todo
{
    /**
     * @var string
     */
    public $task = "";

    public function __construct()
    {
    }

    /**
     * create task
     * @param string $task dasdadsa
     * @return $_SESSION 
     */
    public function create($task)
    {
        $_SESSION['todo'][] = [
            'task' => $task,
            'status' => 0
        ];

        return $_SESSION['todo'];
    }

    /**
     * List task
     * @return $_SESSION array
     */
    public function list()
    {
        return $_SESSION['todo'] ?? [];
    }


    /**
     * Delete task
     * @param int $key
     */
    public function delete($key)
    {
        if (isset($_SESSION['todo'][$key])) {
            unset($_SESSION['todo'][$key]);
        }
    }

    /**
     * task status changed
     */
    public function statusChange($key)
    {
        if (isset($_SESSION['todo'][$key])) {
            if ($_SESSION['todo'][$key]['status'] == 1) {
                $_SESSION['todo'][$key]['status'] = 0;
            } else {
                $_SESSION['todo'][$key]['status'] = 1;
            }
        }
    }

    /**
     * update task
     * @param int $key
     * @param string $task
     * @return void
     */
    public function update($key, $task)
    {
        if (isset($_SESSION['todo'][$key])) {
            $_SESSION['todo'][$key]['task'] = $task;
        }
    }

    /**
     * Empty task list
     */
    public function clear()
    {
        if (isset($_SESSION['todo'])) {
            unset($_SESSION['todo']);
        }
    }
}
