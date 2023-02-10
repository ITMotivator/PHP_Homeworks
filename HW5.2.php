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
    private array $comments;
    function __construct(User $user, string $description, int $priority)
    {
        $this->user = $user;
        $this->priority = $priority;
        $this->dateCreated = new DateTime();
        $this->dateUpdated = $this->dateCreated;
        $this->description = $description;
        $this->comments = [];
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
    function updateDate(): void
    {
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
    function addComment(Comment $comment): void
    {
        $this->comments[] = [
            'author' => $comment->getAuthorName(),
            'comment' => $comment->getCommentText()
        ];
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
            'description' => $this->description,
            'dateCreated' => $this->getCreationDate(),
            'lastUpdate' => $this->getLastUpdateDate(),
            'priority' => $this->priority,
            'status' => $status
        ];
        if ($this->isDone === true) {
            $statusArr['completionDate'] = $this->dateDone->format('d.m.Y H:i:s');
        }
        if (count($this->comments) > 0) {
            $statusArr['comments'] = $this->comments;
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

$user1 = new User('John');
$task1 = new Task($user1, 'Make PHP homework', 5);
$user2 = new User('Piter');
$user3 = new User('Simon');

class Comment
{
    private User $author;
    private Task $task;
    private string $text;
    function __construct(User $user, Task $task, string $text)
    {
        $this->author = $user;
        $this->task = $task;
        $this->text = $text;
    }
    function getAuthorName()
    {
        return $this->author->getUsername();
    }
    function getCommentText()
    {
        return $this->text;
    }
}

class TaskService
{
    public static function addComment(User $user, Task $task, string $text): void
    {
        $comment = new Comment($user, $task, $text);
        $task->addComment($comment);
        $task->updateDate();
    }

}
TaskService::addComment($user2, $task1, 'deadline: 10 Feb');
TaskService::addComment($user3, $task1, 'new deadline: 12 Feb');
$task1->checkTaskStatus();

?>