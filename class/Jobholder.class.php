<?php
class Jobholder extends DBObject{

    public $id_pracownika;
    public $imie;
    public $nazwisko;
    public $haslo;
    public $id_szefa;
    public $id_klienta;
    public $id_magazynu;
    public $email;
    
    public $result = array();


    protected static $table = 'pracownik';

    function __construct(DB $db = null)
    {
        $this->db = $db;
    }

    function create()
    {
        $this->data = array(
            'imie' => $this->imie,
            'nazwisko'  => $this->nazwisko,
            'haslo' => $this->haslo,
            'email' => $this->email
        );
        if(self::store($this->db,$this->data))
        {
            echo "registered";
        }

    }
    
    function login()
    {
        $pass = md5($this->haslo);

        $stm2 = $this->db->query("select * from ".static::$table." where
        email = '$this->email' and haslo = '$pass'");

        $stm = $this->db->count("select * from ".static::$table." where
        email = '$this->email' and haslo = '$pass'");

        $this->result = $stm;

   
        if($stm == 1)
        {
            $_SESSION['pracownik']=$this->imie;
            $_SESSION['login']='yes';
            
            echo "1";
        }
    }

}