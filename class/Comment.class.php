<?php
class Comment extends DBObject {
    protected static $table = 'comments';
    public $create_time;
    public $user;
    public $comment;
    private $db;
    public $data = array();
    public $newsid;
    public $userid=0;
    public $commentId;
    function __construct(DB $db = null)
    {
        $this->db = $db;
    }
    function create()
    {
        $this->data = array(
            'user' => $this->user,
            'comment'  => $this->comment,
            'news_id' => $this->newsid,
            'user_id' => $this->userid
        );
        self::store($this->db,$this->data);
    }
    function update()
    {
        $this->data = array(
            'user' => $this->user,
            'comment'  => $this->comment
        );
        $stm = $this->db->query("update comments set comment = '$this->comment' where id = '$this->commentId'");
        //self::set($this->db,$this->commentId,$this->data);
    }
    function getCommentByNewsId($id)
    {
        $stm = $this->db->query("select * from comments where news_id =  $id order by create_time desc");
        $this->result = $stm;
        return $this->result;
    }
    function getCommentById($id)
    {
        $stm = $this->db->query("select * from comments where id =  $id");
        $this->result = $stm;
        return $this->result;
    }
}