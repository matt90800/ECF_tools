<?php
class User {
    private $id;
    private $username;
    private $points;
    private $ownedItems;

    public function __construct($id, $username, $points) {
        $this->id = $id;
        $this->username = $username;
        $this->points = $points;
        $this->ownedItems = [];
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPoints() {
        return $this->points;
    }

    public function getOwnedItems() {
        return $this->ownedItems;
    }

    public function addOwnedItem($item) {
        $this->ownedItems[] = $item;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPoints($points) {
        $this->points = $points;
    }
}
