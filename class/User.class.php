<?php
class User  extends DBObject{

    public $id_klienta;
    public $imie;
    public $nazwisko;
    public $login;
    public $haslo;
    public $id_zamowienia;
    public $id_pracownika;
    public $email;
    public $result = array();


    protected static $table = 'klient';
	protected static $table_ = 'pracownik';

    function __construct(DB $db = null)
    {
        $this->db = $db;
    }

    function create()
    {
        $this->data = array(
            'imie' => $this->imie,
            'nazwisko'  => $this->nazwisko,
            'login' => $this->login,
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

        $stm2 = $this->db->query("select * from ".static::$table." where email = '$this->email' and haslo = '$pass'");
        $stm = $this->db->count("select * from ".static::$table." where email = '$this->email' and haslo = '$pass'");
        $this->result = $stm;
  
        if($stm == 1) // klient
        {
            $_SESSION['user']=$this->email;
            $_SESSION['login']='yes';
			echo(1);
        }
		else //pracownik
		{
			$stm2 = $this->db->query("select * from ".static::$table_." where email = '$this->email' and haslo = '$this->haslo'");
			$stm = $this->db->count("select * from ".static::$table_." where email = '$this->email' and haslo = '$this->haslo'");
			$result2 = $stm2->fetch(PDO::FETCH_ASSOC);
			$this->result = $stm;
			
            if($stm == 1) 
			{
				$_SESSION['user']=$this->email;
				$_SESSION['login']='yes';
				$_SESSION['pracownik'] = true;
				$_SESSION['main'] = false;
				
				if($result2)
				{
					$this->id_pracownika = $result2["id_pracownika"];
					if($this->id_pracownika >= 1000 && $this->id_pracownika < 2000)
						$_SESSION['kierownik'] = TRUE;
				}
				
				echo(1);
			}
		}
    }
    
    

}