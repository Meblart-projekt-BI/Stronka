<?php


 
class Product {
    //put your code here
    
    protected $db;
    private $result = array();
    
    function __construct(DB $db  = null)
    {
        $this->db = $db;
    }
    
    public function getProductById($id)
    {
        $query = $this->db->query('select * from produkt where id_produktu = "'.$id.'"');
        $this->result = $query;
        
        return $this->result->fetchAll();
    }
    
    public function getProductByCategory($id)
    {
       $w = '';
 
 		switch($_GET['sort_by'])
 		{
 			case 'az':
 				$w .= 'ORDER BY  nazwa_produktu ASC';
 				break;
 			case 'za': 
 				$w .= 'ORDER BY  nazwa_produktu DESC';
 				break;
 			case 'cena_asc': 
 				$w .= 'ORDER BY  cena_jednostkowa DESC';
 				break;	
 			case 'cena_desc': 
 				$w .= 'ORDER BY  cena_jednostkowa ASC';
 				break;	
 		}
 		
          $query = $this->db->query('select * from produkt where id_kategorii = "'.$id.'" '.$w.' ');
          $this->result = $query;
        
        return $this->result;
    }
    
    public function getProducts()
    {

        $query = $this->db->query('select * from produkt where cena_jednostkowa < 500');
        $this->result = $query;
        
        return $this->result;
    }
    
    public function showProducts()
    {
        $query = $this->db->query('select * from produkt');
        $this->result = $query;
        
        return $this->result;
    }

    public function getZamowienie()
    {
        $query = $this->db->query('select * from zamowienie');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $key => $row)
        {
            $stm2 = $this->db->query("select imie, nazwisko from klient where id_klienta='" . $row['id_klienta'] . "'");
            $result2 = $stm2->fetch(PDO::FETCH_ASSOC);
            $result[$key] = array_merge($row, $result2);

            $query = $this->db->query('select * from zamowienie_szczegoly z, produkt p where id_zamowienia = "'.$row['id_zamowienia'].'" and z.id_produktu = p.id_produktu');
            $ret = $query->fetchAll();
            $suma = 0;
            foreach($ret as $row2) {
                $suma += $row2['ilosc'] * $row2['cena_jednostkowa'];
            }
            $query = $this->db->query('select * from zamowienie z, klient k, kurier ku where z.id_klienta = k.id_klienta and z.id_zamowienia = "'.$row['id_zamowienia'].'" and ku.id_dostawcy = z.id_dostawcy');
            $ret = $query->fetchAll();
            $suma += (0.23*$suma)+$ret[0]['cena_dostawy'];
            $result[$key]['suma'] = $suma;
        }
        
        $this->result = $result;
        return $this->result;
    }

    public function updateStatusZamowienia($id, $status)
    {
        $this->db->query("UPDATE zamowienie SET status_zamowienia='" . $status . "' where id_zamowienia='" . $id . "'");
    }
    
    public function getDaneKlienta()
    {
        $query = $this->db->query('select * from klient where id_klienta=(select id_klienta from zamowienie)');
        $this->result = $query;
        
        return $this->result;
    }
    
    public function getZamowienieKlienta()
    {
        $query = $this->db->query('select * from zamowienie where id_klienta=(select id_klienta from zamowienie)');
        $this->result = $query;
        
        return $this->result;
    }
    
    public function getZamowienieProduktyKlienta()
    {
        $query = $this->db->query('select * from produkt where id_produktu=(select id_produktu from pozycja_zamowienia)');
        $this->result = $query;
        
        return $this->result;
    }
 
    public function getAdresKlienta()
    {
        $query = $this->db->query('select * from adres_klienta where id_klienta=(select id_klienta from klient where id_klienta=(select id_klienta from zamowienie) )');
        $this->result = $query;
        

        //$query = $this->db->query('select * from produkt where cena_jednostkowa < 500');
        $query = $this->db->query('select * from produkt');
        $this->result = $query;


        return $this->result;
    }

    public function getCategories()
    {
        $query = $this->db->query('select * from kategoria');
        $this->result = $query;

        return $this->result;
    }

    public function dodajProdukt()
    {
        $query = $this->db->query("INSERT INTO produkt(id_kategorii, nazwa_produktu, cena_jednostkowa, opis_produktu, image) VALUES(1, 'nowy_produkt', 0, 'przykladowy_opis', 'image/')");
    }

    public function isKlient()
     {
         $query = $this->db->query("select * from zamowienie z, zamowienie_szczegoly s WHERE z.id_zamowienia = s.id_zamowienia AND s.id_produktu = '".$_GET['id']."' and z.id_klienta = '".$_SESSION['id_klienta']."' and z.status_zamowienia = 'paid'");
 		$this->result = $query;
 		$stm =  $this->result->fetchAll();
         return (boolean) $stm;
     }
  
 	 public function getProductOpinions($id)
     {
         $query = $this->db->query('select * from opinia o, klient k where o.id_klienta = k.id_klienta and id_produktu = "'.$id.'"');
         $this->result = $query;
         
         return $this->result->fetchAll();
     }
	 
	 public function generateFaktura($id)
	 {
         $query = $this->db->query('select * from zamowienie z, klient k, kurier ku where z.id_klienta = k.id_klienta and z.id_zamowienia = "'.$id.'" and ku.id_dostawcy = z.id_dostawcy');
         $this->result = $query;
         $ret[0] = $this->result->fetchAll();
         $query = $this->db->query('select * from zamowienie_szczegoly z, produkt p where id_zamowienia = "'.$id.'" and z.id_produktu = p.id_produktu');
         $this->result = $query;
         $ret[1] = $this->result->fetchAll();
         return $ret;
	 }

}
