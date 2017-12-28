<?php

namespace App;

class Model
{
    private $pdo;

    public function __construct()
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
        }
    }

    public function createTables()
    {
        $commands = ['CREATE TABLE IF NOT EXISTS tasks (
                        id INTEGER PRIMARY KEY,
                        title TEXT NOT NULL
                    )'];

        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    }

    public function getTasks()
    {
        $sql = 'SELECT * FROM tasks';

        $stmt = $this->pdo->query($sql);
        $tasks = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = [
                'id' => $row['id'],
                'title' => $row['title']
            ];
        }

        return $tasks;
    }

    public function insertTask($title)
    {
        $sql = 'INSERT INTO tasks(title) VALUES(:title)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':title', $title);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function updateTask($task)
    {
        $sql = "UPDATE tasks SET title = :title WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $task->id);
        $stmt->bindValue(':title', $task->title);

        return $stmt->execute();
    }

    public function deleteTask($id)
    {
        $sql = 'DELETE FROM tasks WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
