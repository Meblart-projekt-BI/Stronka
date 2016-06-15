<?php


class Order extends DBObject {

    protected $db;

    protected static $table = 'zamowienie';

    function __construct(DB $db  = null)
    {
        $this->db = $db;
    }

    function create($id_dostawcy, $id_klienta, $data_zamowienia, $status_zamowienia, $koszt, $imie, $nazwisko, $ulica, $postcode, $miasto, $phone, $uwagi)
    {
        // Pobrane wartości z formularza realizacji koszyka
        $this->data = array(
            'id_dostawcy' => $id_dostawcy,
            'id_klienta'  => $id_klienta,
            'data_zamowienia' => $data_zamowienia,
            'status_zamowienia' => $status_zamowienia,
            'uwagi' => $uwagi
        );
        self::store($this->db,$this->data);
		
        $this->db->query("UPDATE `klient` SET `imie` = '".$imie."', `nazwisko` =  '".$nazwisko."', `telefon` =  '".$phone."', `ulica` =  '".$ulica."', `kod_pocztowy` =  '".$postcode."', `miasto` =  '".$miasto."' where `id_klienta`  = '".$id_klienta."'");
		
    }

    //pobieram ostatnie id zamówienia
    function getLastOrderNumber()
    {
        $id = $this->db->query("select max(id_zamowienia) from zamowienie");
        $id_zamowienia = $id->fetch();
        return $id_zamowienia[0];
    }

    //pobieram wszystkie zamówienia dla wskazanego klienta
    function getOrdersByUserId($id)
    {
        $orders = $this->db->query("select * from zamowienie z, zamowienie_szczegoly s, produkt p, kurier k where k.id_dostawcy = z.id_dostawcy and z.id_zamowienia = s.id_zamowienia and s.id_produktu = p.id_produktu and z.id_klienta = '$id'");
		$ordersDetails = $orders->fetchAll();
        return $ordersDetails;
    }
}
