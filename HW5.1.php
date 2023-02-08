<?php

class Task
{
    private string $description;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private int $priority;
    private bool $isDone = false;
    private User $user;
    function __construct(User $user, int $priority)
    {
        $this->user = $user;
        $this->priority = $priority;
        $this->dateCreated = new DateTime();
        $this->dateUpdated = $this->dateCreated;
    }
    function setDescription(string $description): void
    {
        $this->description = $description;
        $this->dateUpdated = new DateTime();
    }
    function changePriority(int $priority): void
    {
        $this->priority = $priority;
        $this->dateUpdated = new DateTime();
    }
    function getLastUpdateDate(): string
    {
        $format = 'd.m.Y H:i:s';
        if ($this->dateUpdated === $this->dateCreated) {
            return 'No updates yet';
        } else {
            $date = $this->dateUpdated->format($format);
            return $date;
        }
    }
    function getCreationDate(): string
    {
        $format = 'd.m.Y H:i:s';
        $date = $this->dateUpdated->format($format);
        return $date;
    }
    function markAsDone(): void
    {
        $this->isDone = true;
        $this->dateUpdated = new DateTime();
        $this->dateDone = $this->dateUpdated;
    }
    function checkTaskStatus(): void
    {
        $status = '';
        if ($this->isDone === true) {
            $status = 'done';
        } else {
            $status = 'active';
        }
        $statusArr = [
            'dateCreated' => $this->getCreationDate(),
            'lastUpdate' => $this->getLastUpdateDate(),
            'priority' => $this->priority,
            'status' => $status
        ];
        if ($this->isDone === true) {
            $statusArr['completionDate'] = $this->dateDone->format('d.m.Y H:i:s');
        }
        print_r($statusArr);
    }
}

class User
{
    private string $username;
    private ?int $age;
    function __construct(string $username)
    {
        $this->username = $username;
    }
    function getUsername(): string
    {
        return $this->username ?? 'unknown';
    }
    private function getValidAge(?int $age): ?int
    {
        if ($age > 0 && $age <= 125) {
            return $age;
        }
        return null;
    }
    public function setAge(?int $age): void
    {
        $this->age = $this->getValidAge($age);
    }
    public function getAge(): ?int
    {
        return $this->age;
    }
}

$user1 = new User('Ivan');
$task1 = new Task($user1, 5);
$task1->checkTaskStatus();
$task1->changePriority(10);
echo $task1->getCreationDate();
$task1->markAsDone();
$task1->checkTaskStatus();

?>