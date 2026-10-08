<?php

class Student
{
    private mysqli $connection;

    public function __construct(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function getAll(): array
    {
        $result = $this->connection->query(
            'SELECT id, name, email, phone FROM allstudents ORDER BY id'
        );

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id): ?array
    {
        $statement = $this->connection->prepare(
            'SELECT id, name, email, phone FROM allstudents WHERE id = ?'
        );
        $statement->bind_param('i', $id);
        $statement->execute();
        $student = $statement->get_result()->fetch_assoc();
        $statement->close();

        return $student ?: null;
    }

    public function create(string $name, string $email, string $phone): void
    {
        $statement = $this->connection->prepare(
            'INSERT INTO allstudents (name, email, phone) VALUES (?, ?, ?)'
        );
        $statement->bind_param('sss', $name, $email, $phone);
        $statement->execute();
        $statement->close();
    }

    public function update(int $id, string $name, string $email, string $phone): void
    {
        $statement = $this->connection->prepare(
            'UPDATE allstudents SET name = ?, email = ?, phone = ? WHERE id = ?'
        );
        $statement->bind_param('sssi', $name, $email, $phone, $id);
        $statement->execute();
        $statement->close();
    }

    public function delete(int $id): bool
    {
        $statement = $this->connection->prepare(
            'DELETE FROM allstudents WHERE id = ?'
        );
        $statement->bind_param('i', $id);
        $statement->execute();
        $deleted = $statement->affected_rows === 1;
        $statement->close();

        return $deleted;
    }
}
