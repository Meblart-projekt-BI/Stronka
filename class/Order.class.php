<?php


class Order extends DBObject {
    
    protected $db;
    
    protected static $table = 'zamowienie';
    
    function __construct(DB $db  = null)
    {
        $this->db = $db;
    }
    
    function create($id_dostawcy, $id_klienta, $data_zamowienia, $status_zamowienia, $imie, $nazwisko, $ulica, $postcode, $miasto, $phone, $uwagi)
    {
        // Pobrane wartości z formularza realizacji koszyka
        $this->data = array(
            'id_dostawcy' => $id_dostawcy,
            'id_klienta'  => $id_klienta,
            'data_zamowienia' => $data_zamowienia,
            'status_zamowienia' => $status_zamowienia,
            'imie' => $imie,
            'nazwisko' => $nazwisko,
            'ulica' => $ulica,
            'postcode' => $postcode,
            'miasto' => $miasto,
            'phone' => $phone,
            'uwagi' => $uwagi
        );
        
        self::store($this->db,$this->data);
    }

    // W tej metodzie pobieram ostatnie id zamówienia
    function getLastOrderNumber()
    {
        $id = $this->db->query("select max(id_zamowienia) from zamowienie");
        $id_zamowienia = $id->fetch();
        return $id_zamowienia[0];
    }
}
