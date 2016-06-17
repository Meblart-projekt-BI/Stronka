<?php


class OrderDetails extends DBObject {
    
    protected $db;
    
    protected static $table = 'zamowienie_szczegoly';
    
    function __construct(DB $db  = null)
    {
        $this->db = $db;
    }
    
    function create($id_zakupu, $id_produktu, $id_klienta, $ilosc)
    {
        $this->data = array(
            'id_zamowienia' => $id_zakupu,
            'id_produktu'  => $id_produktu,
            'id_klienta' => $id_klienta,
            'ilosc' => $ilosc
        );
        
        self::store($this->db,$this->data);
    }
}
