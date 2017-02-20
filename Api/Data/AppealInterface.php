<?php
namespace AD\NewContactUs\Api\Data;


interface AppealInterface
{

    const APPEAL_ID     = 'id';
    const USERNAME      = 'username';
    const EMAIL         = 'email';
    const COMMENT       = 'comment';
    const STATUS        = 'status';
    const CREATION_TIME = 'created_at';


    public function getId();
    public function getUserName();
    public function getEmail();
    public function getComment();
    public function getCreationTime();
    public function getStatus();

    public function setId($id);
    public function setUserName($username);
    public function setEmail($email);
    public function setComment($comment);
    public function setCreationTime($creationTime);
    public function setStatus($status);
}
