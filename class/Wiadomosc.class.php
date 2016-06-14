<?php
class Wiadomosc  extends DBObject{

    public $result = array();


    protected static $table = 'wiadomosc';

    function __construct(DB $db = null)
    {
        $this->db = $db;
    }

    public function getMsgTitles()
    {
        $stm = $this->db->query("select id_wiadomosci, id_klienta, tytul_wiadomosci from wiadomosc");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $key => $row)
        {
            $stm2 = $this->db->query("select imie, nazwisko from klient where id_klienta='" . $row['id_klienta'] . "'");
            $result2 = $stm2->fetch(PDO::FETCH_ASSOC);
            $result[$key] = array_merge($row, $result2);
        }
        //error_log(print_r($result, true), 0);
        return $result;
    }

    public function getMsgTresc($id)
    {

        $stm = $this->db->query("select tytul_wiadomosci, tresc_wiadomosci, id_klienta from wiadomosc where id_wiadomosci='" . $id . "'");

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        $new = '';

        $your_array = explode("\n", $result['tresc_wiadomosci']);
        if (is_array($your_array)) {
            foreach($your_array as $line) {
                $new .= "--->>>" . $line . "\r\n";
            }
        }

        $new = "tytul=" . $result['tytul_wiadomosci'] . "$" . $new;
        $stm = $this->db->query("select email from klient where id_klienta='" . $result['id_klienta'] . "'");
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        $new = "email=" . $result['email'] . "$$" . $new;

        return $new;
    }

    public function usunWiadomosc($id)
    {
        $stm = $this->db->query("delete from wiadomosc where id_wiadomosci='" . $id . "'");
    }

    public function dodajWiadomosc($tytul, $tresc, $id_klienta)
    {
        $this->db->query("insert into wiadomosc(tresc_wiadomosci, id_klienta, tytul_wiadomosci) values('" . $tresc . "', '" . $id_klienta . "', '" . $tytul . "')");
    }

    public function zliczWiadomosci($id_klienta)
    {
        return $this->db->count("select * from klient where id_klienta='" . $id_klienta . "'");
    }
}