<?php
class Event {
    public $id;
    public $name;
    public $date;
    public $location;
    public $participants;
    public $rating;
    public $activity;
    public function __construct($id, $name, $date, $location, $participants, $rating, $activity) {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->location = $location;
        $this->participants = $participants;
        $this->rating = $rating;
        $this->activity = $activity;
    }
}
?>