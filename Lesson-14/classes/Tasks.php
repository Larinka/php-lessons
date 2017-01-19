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
            FROM task $this->sort");
        } else {
            $sth = $this->db->pdo->prepare("SELECT id, description, is_done, date_added
            FROM task ORDER BY date_added DESC");
        }
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        $result = $this->changeNumbersToLetters($result);
        return $result;
    }

    public function tasksCreatedByUser()
    {
    $this->sortBy();
    if (isset ($this->sortBy)) {
        $sth = $this->db->pdo->prepare(
            "SELECT t.id as id, t.description as description, t.is_done as is_done, t.date_added as date_added, u.login as responsible
            FROM task as t
            JOIN user as u ON u.id = t.assigned_user_id
            WHERE t.user_id = ?
            $this->sortBy");
    } else {
        $sth = $this->db->pdo->prepare(
            "SELECT t.id as id, t.description as description, t.is_done as is_done, t.date_added as date_added, u.login as responsible
            FROM task as t
            JOIN user as u ON u.id = t.assigned_user_id
            WHERE t.user_id = ?
            ORDER BY t.date_added DESC");
    }
    $sth->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $result = $this->changeNumbersToLetters($result);
    return $result;
    }

    public function tasksWhereUserAssigned()
    {
        $this->sortBy();
        if (isset ($this->sortBy)) {
            $sth = $this->db->pdo->prepare(
                "SELECT t.id as id, t.description as description, t.is_done as is_done, t.date_added as date_added, u.login as author
                FROM task as t
                JOIN user as u ON u.id = t.user_id
                WHERE t.assigned_user_id = ?
                $this->sortBy");
        } else {
            $sth = $this->db->pdo->prepare(
                "SELECT t.id as id, t.description AS description, t.is_done AS is_done, t.date_added AS date_added, u.login AS author
                FROM task AS t
                JOIN user AS u ON u.id = t.user_id
                WHERE t.assigned_user_id = ?
                ORDER BY t.date_added DESC");
        }
        $sth->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
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
        $this->changeResponsible();
    }

    protected function addNewTask()
    {
        if (!empty($_POST['new_task'])) {
            $sth = $this->db->pdo->prepare('INSERT INTO task (description, is_done, date_added, user_id, assigned_user_id)
                VALUES (?, 0, ?, ?, ?)');
            $sth->bindValue(1, $_POST['new_task'], PDO::PARAM_STR);
            $sth->bindValue(2, date('Y-m-d H:i:s'), PDO::PARAM_STR);
            $sth->bindValue(3, $_SESSION['user_id'], PDO::PARAM_INT);
            $sth->bindValue(4, $_SESSION['user_id'], PDO::PARAM_INT);
            $sth->execute();
        }
    }

    protected function deleteTask()
    {
        if (isset($_POST['delete'])) {
            $sth = $this->db->pdo->prepare('SELECT user_id from task WHERE id = ? LIMIT 1;');
            $sth->bindValue(1, $_POST['delete'], PDO::PARAM_STR);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            $authorID = $result[0]['user_id'];
            if ($authorID == $_SESSION['user_id']) {
                $sth = $this->db->pdo->prepare('DELETE from task WHERE id = ? LIMIT 1;');
                $sth->bindValue(1, $_POST['delete'], PDO::PARAM_STR);
                $sth->execute();
            } else {
                $_SESSION['error'] = 'Нельзя удалить задачу, созданную другим пользователем';
            }
        }
    }

    protected function changeTask()
    {
        if (isset($_POST['new_date_added']) || isset($_POST['new_description']) || isset($_POST['new_is_done']))
        {
            $sth = $this->db->pdo->prepare('UPDATE task
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

    protected function changeResponsible()
    {
        if (isset($_POST['new_responsible']))
        {
            $sth = $this->db->pdo->prepare('UPDATE task SET assigned_user_id = :resp
            WHERE id = :num LIMIT 1;');

            $sth->bindValue(':num', $_POST['change_id'], PDO::PARAM_INT);
            $sth->bindValue(':resp', $_POST['new_responsible'], PDO::PARAM_STR);
            $sth->execute();
        }
    }

    protected function markAsDone()
    {
        if (isset($_POST['mark_as_done'])) {
            $sth = $this->db->pdo->prepare('UPDATE task
            SET is_done = 2
            WHERE id = :num
            LIMIT 1;');

            $sth->bindValue(':num', $_POST['mark_as_done'], PDO::PARAM_INT);
            $sth->execute();
        }
    }

    public function getAllUsers()
    {
        $sth = $this->db->pdo->prepare("SELECT id as user_id, login as username FROM user ORDER BY login");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
