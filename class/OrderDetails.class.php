<?php


class OrderDetails extends DBObject {
    
    protected $db;
    
    protected static $table = 'zamowienie_szczegoly';
    
    function __construct(DB $db  = null)
    {
        $this->db = $db;
    }
    
    function create($id, $id_zakupu, $id_produktu, $id_klienta, $ilosc)
    {
        $this->data = array(
            'id_zamowienia_szczegoly' => $id,
            'id_zamowienia' => $id_zakupu,
            'id_produktu'  => $id_produktu,
            'id_klienta' => $id_klienta,
            'ilosc' => $ilosc
        );
        
        self::store($this->db,$this->data);
    }


    // W tej metodzie pobieram ostatnie id i dodaję do niego 1
    function getNewOrderDetailsNumber()
    {
        $id = $this->db->query("select max(id_zamowienia_szczegoly) from zamowienie_szczegoly");
        $id_zamowienia = $id->fetch();
        return $id_zamowienia[0]+1;
    }
}
