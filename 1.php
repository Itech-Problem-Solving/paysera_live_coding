<?php
class TaskOutputDTO {
    private $output;

    public function __construct(string $output)
    {
        $this->output = $output;
    }

    public function getOutput(): string {
        return $this->output;
    }
}

abstract class Task {
    abstract public function execute(): TaskOutputDTO;
}

class TaskV1 extends Task {
    public function execute(): TaskOutputDTO
    {
        $output = [];
        
        for ($i = 1; $i <= 20; $i++) {
            if ($i % 15 == 0) {
                $output[] = "papow";
            } else if ($i % 3 == 0) {
                $output[] = "pa";
            } else if ( $i % 5 == 0) {
                $output[] = "pow";
            } else {
                $output[] = $i;
            }
        }
        return new TaskOutputDTO(implode(" ", $output));
    }
}

class TaskV2 extends Task {
    public function execute(): TaskOutputDTO
    {
        $output = [];
        
        for ($i = 1; $i <= 15; $i++) {
            if ($i % 14 == 0) {
                $output[] = "hateeho";
            } else if ($i % 2 == 0) {
                $output[] = "hatee";
            } else if ( $i %7 == 0) {
                $output[] = "ho";
            } else {
                $output[] = $i;
            }
        }
        return new TaskOutputDTO(implode("-", $output));
    }
}

class TaskV3 extends Task {
    public function execute(): TaskOutputDTO
    {
        $output = [];
        for ( $i = 1; $i <= 10; $i ++ ) {
            $res = "";
            if (in_array($i, [1, 4, 9])) {
                $res .= "joff";
            }
            if ( $i > 5 ) {
                $res .= "tchoff";
            }
            if ( $res === "" ) {
                $res = $i;
            }
            $output[] = $res;
        }
        return new TaskOutputDTO(implode("-", $output));
    }
}

class TaskRunner {
    private $tasks;

    public function __construct() {
        $this->tasks = [];
    }

    public function addTask(Task $task) {
        $this->tasks[] = $task;
    }

    public function run() {
        foreach($this->tasks as $task) {
            $output = $task->execute();
            echo $output->getOutput() . "\n";
        }
    }
}

$taskRunner = new TaskRunner();
$taskRunner->addTask(new TaskV1());
$taskRunner->addTask(new TaskV2());
$taskRunner->addTask(new TaskV3());
$taskRunner->run();
