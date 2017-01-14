<?php

class Tasks
{
    private $db;
    private $sort;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllTasks()
    {
        $this->sortBy();
        if (isset ($this->sort)) {
            $sth = $this->db->pdo->prepare("SELECT id, description, is_done, date_added
            FROM tasks $this->sort");
        } else {
            $sth = $this->db->pdo->prepare("SELECT id, description, is_done, date_added
            FROM tasks ORDER BY date_added DESC");
        }
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        $result = $this->changeNumbersToLetters($result);
        return $result;
    }

    protected function changeNumbersToLetters($allTasks)
    {
        foreach ($allTasks as $key => $task) {
            switch ($task['is_done']) {
                case 0:
                    $allTasks[$key]['is_done'] = 'Не выполнено';
                    break;
                case 1:
                    $allTasks[$key]['is_done'] = 'В процессе';
                    break;
                case 2:
                    $allTasks[$key]['is_done'] = 'Выполнено';
                    break;
            }
        }
        return $allTasks;
    }

    protected function sortBy()
    {
        if (isset($_POST['sort_by'])) {
            switch ($_POST['sort_by']) {
                case 'description':
                    $this->sort = 'ORDER BY description';
                    break;
                case 'is_done':
                    $this->sort = 'ORDER BY is_done';
                    break;
                case 'date_added':
                    $this->sort = 'ORDER BY date_added DESC';
                    break;
                default:
                    $this->sort = 'ORDER BY date_added DESC';
            }
        }
    }

    public function userAction()
    {
        $this->addNewTask();
        $this->deleteTask();
        $this->changeTask();
        $this->markAsDone();
    }

    protected function addNewTask()
    {
        if (!empty($_POST['new_task'])) {
            $sth = $this->db->pdo->prepare('INSERT INTO tasks (description, is_done, date_added)
                VALUES (?, 0, ?)');
            $sth->bindValue(1, $_POST['new_task'], PDO::PARAM_STR);
            $sth->bindValue(2, date('Y-m-d H:i:s'), PDO::PARAM_STR);
            $sth->execute();
        }
    }

    protected function deleteTask()
    {
        if (isset($_POST['delete'])) {
            $sth = $this->db->pdo->prepare('DELETE from tasks WHERE id = ? LIMIT 1;');
            $sth->bindValue(1, $_POST['delete'], PDO::PARAM_STR);
            $sth->execute();
        }
    }

    protected function changeTask()
    {
        if (isset($_POST['new_date_added']) || isset($_POST['new_description']) || isset($_POST['new_is_done']))
        {
            $sth = $this->db->pdo->prepare('UPDATE tasks
            SET date_added = :date,
            description = :desc,
            is_done = :status
            WHERE id = :num
            LIMIT 1;');

            $sth->bindValue(':num', $_POST['change_id'], PDO::PARAM_INT);
            $sth->bindValue(':date', $_POST['new_date_added'], PDO::PARAM_STR);
            $sth->bindValue(':desc', $_POST['new_description'], PDO::PARAM_STR);
            $sth->bindValue(':status', $_POST['new_is_done'], PDO::PARAM_STR);

            $sth->execute();
        }
    }

    protected function markAsDone()
    {
        if (isset($_POST['mark_as_done'])) {
            $sth = $this->db->pdo->prepare('UPDATE tasks
            SET is_done = 2
            WHERE id = :num
            LIMIT 1;');

            $sth->bindValue(':num', $_POST['mark_as_done'], PDO::PARAM_INT);
            $sth->execute();
        }
    }
}
