#!/usr/bin/env php
<?php
  enum Status: string {
    case TO_DO = "todo";
    case IN_PROGRESS = "in-progress";
    case DONE = "done";
  }

  class Task {
    public int $id;
    public string $description;
    public Status $status;
    public string $createdAt;
    public string $updatedAt;

    function __construct(int $id, string $description, Status $status) {
      $this->id = $id;
      $this->description = $description;
      $this->status = $status;
      $this->createdAt = date("Y-m-d H:i:s");
      $this->updatedAt = date("Y-m-d H:i:s");
    }
  }

  $tasks = [];

  $command = readline();
  $splitted = explode(" ", $command);

  if($splitted[0] !== "task-list") {
    echo "Incorrect prefix \"" . $splitted[0] . "\"";
  }

  switch ($splitted[1]) {
    case 'add':
      array_push($tasks, new Task(1, $splitted[2], Status::TO_DO));
      print_r($tasks);
      break;
    
    default:
      # code...
      break;
  }

?>