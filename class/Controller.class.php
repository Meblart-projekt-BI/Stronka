<?php
/**
 * Plik kontorlera, tutaj będą wykonywane wszystkie operacje na otrzymanych danych
 */
class Controller
{

	protected $page;
	protected $db;
	protected $result = array();
	protected $params = array();


	public function __construct(PageView $page, DB $db = null)
	{
		$this->page = $page;
		$this->db = $db;

	}

	public function comments()
	{

		$data = array(
			'title' => 'Tu będą komentarze',
			'info' => 'Komentarze te będzie można edytować.'
		);

		$view = new View('Comments', $data);
		$this->page->addView($view);
	}

	public function page()
	{

		if ($_GET['do'] == 'page') // powrot na str. glowna
			$_SESSION['main'] = true;
		if ($_SESSION['pracownik'] == 'yes' && $_GET['do'] == 'panel')  // powrot do panelu
			$_SESSION['main'] = false;

		$product = new Product($this->db);
		$this->result[1] = $product->getProducts();

		if ($_SESSION['pracownik'] != 'yes' || $_SESSION['main'])  // str. glowna
		{
			$view = new View('Main', $this->result);
			$this->page->addView($view);
		} else // panel klienta
		{
			switch ($_GET['do']) {
				case 'zamowienia':
                    $this->result[2]= $product->getZamowienie();
                    //$this->result[3]= $product->getDaneKlienta();
					$view = new View('Zamowienia',$this->result);
					$this->page->addView($view);
					break;
				case 'faktura':
                    //$this->result[4]= $product->getDaneKlienta();
                    //$this->result[5]= $product->getAdresKlienta();
                    //$this->result[6]= $product->getZamowienieKlienta();
                    //$this->result[7]= $product->getZamowienieProduktyKlienta();
					$view = new View('Faktura',$this->result);
					$this->page->addView($view);
					break;
                case 'wiadomosci':
                    $view = new View('Wiadomosci',$this->result);
					$this->page->addView($view);
					break;
				default:
					$view = new View('Panel_pracownika', $this->result);
					$this->page->addView($view);
					break;
			}
		}
	}

	public function clientlist()
	{
		echo 'Test';
	}

	public function category()
	{
		$id = htmlspecialchars($_GET['val']);

		if (isset($id)) {
			$product = new Product($this->db);
			$this->result[0] = $product->getProductByCategory($id);
			$this->result[1] = $product->getCategories();
			$view = new View('Category', $this->result);

			//echo 'jestem na podstonie';
		} else {
			$view = new View('Category');
		}

		$this->page->addView($view);

	}


	public function register()
	{
		$view = new View('Register');
		$this->page->addView($view);
	}

	public function login()
	{
		$view = new View('Login');
		$this->page->addView($view);
	}

	public function addToCart()
	{
		if ($_SESSION['login'] != 'yes') {
			header("Location: index.php");
		} else {
			// Tutaj wykonujemy kod dodania do koszyka dla osoby zalogowanej
			$id = htmlspecialchars($_GET['id']);
			$cart = new Cart($this->db);
			$this->result = $cart->addItemToCart($id);

			// Jeżeli kierujemy z koszyka z powrotem do edycji ilości produktu w koszyku pobieramy z $_GET ilość produktów,
			//  w przeciwnym wypadku ustawiamy wartość na 1
			$this->result[1] = 1;
			if (isset($_GET['ilosc']))
				$this->result[1] = $_GET['ilosc'];

			if ($_POST['send'] == 1) {
				$l = htmlspecialchars($_POST['ilosc']);
				$price = $this->result[0]['cena_jednostkowa'] * $l;
				$this->params = array("price" => $price);
				if ($_GET['modify'] == '1')
					$_SESSION['koszyk'][$id] = $l;
				else if ($_SESSION['koszyk'][$id] > 0)
					$_SESSION['koszyk'][$id] += $l;
				else
					$_SESSION['koszyk'][$id] = $l;
				header("Location: index.php?action=showCart");
			}

			$view = new View('Cart', $this->result, $this->params);
			$this->page->addView($view);
		}
	}

	public function showCart()
	{
		if ($_SESSION['login'] != 'yes')
			header("Location: index.php");

		if (count($_SESSION['koszyk']) <= 0)
			header("Location: index.php");

		if ($_GET['remove'] == 1) {
			unset($_SESSION['koszyk'][$_GET['id']]);
			header("Location: index.php?action=showCart");
		}

		$koszyk = $_SESSION['koszyk'];
		if (isset($koszyk) && is_array($koszyk)) {

			$productWskaznik = new Product($this->db);
			$koszyk_widok = null;

			$cart = new Cart($this->db);

			foreach ($koszyk as $id_produktu => $ilosc) {
				$produkt = $productWskaznik->getProductById($id_produktu);
				$wartosc_calkowita += $produkt[0]['cena_jednostkowa'] * $ilosc;
				$koszyk_widok[$id_produktu]['nazwa_produktu'] = $produkt[0]['nazwa_produktu'];
				$koszyk_widok[$id_produktu]['cena_jednostkowa'] = $produkt[0]['cena_jednostkowa'];
				$koszyk_widok[$id_produktu]['ilosc'] = $ilosc;
			}
			$view = new View('ShowCart', ["koszyk_widok" => $koszyk_widok, "wartosc_calkowita" => $wartosc_calkowita]);
			$this->page->addView($view);
		} else {
			$view = new View('ShowCartEmpty');
			$this->page->addView($view);
		}
	}

	public function order_step_1()
	{
		if ($_SESSION['login'] != 'yes')
			header("Location: index.php");

		if (count($_SESSION['koszyk']) <= 0)
			header("Location: index.php");

		$koszyk = $_SESSION['koszyk'];
		if (isset($koszyk) && is_array($koszyk)) {
			$view = new View('order_step_1');
			$this->page->addView($view);
		} else {
			header("Location: index.php");
		}
	}

	public function order_step_2()
	{
		if ($_SESSION['login'] != 'yes')
			header("Location: index.php");

		if (count($_SESSION['koszyk']) <= 0)
			header("Location: index.php");

		$_SESSION['zamowienie']['imie'] = $_POST['imie'];
		$_SESSION['zamowienie']['nazwisko'] = $_POST['nazwisko'];
		$_SESSION['zamowienie']['ulica'] = $_POST['ulica'];
		$_SESSION['zamowienie']['postcode'] = $_POST['postcode'];
		$_SESSION['zamowienie']['miasto'] = $_POST['miasto'];
		$_SESSION['zamowienie']['phone'] = $_POST['phone'];
		$_SESSION['zamowienie']['uwagi'] = $_POST['uwagi'];

		$koszyk = $_SESSION['koszyk'];

		$couriers = new Courier($this->db);
		$result = $couriers->getCouriers();

		$view = new View('order_step_2', ["couriers" => $result]);
		$this->page->addView($view);
	}

	public function order_step_3()
	{
		if ($_SESSION['login'] != 'yes')
			header("Location: index.php");

		if (count($_SESSION['koszyk']) <= 0)
			header("Location: index.php");

		if (!isset($_POST))
			header("Location: index.php");

		$koszyk = $_SESSION['koszyk'];

		if (isset($koszyk) && is_array($koszyk)) {
			$_SESSION['zamowienie']['id_dostawcy'] = $_POST['id_dostawcy'];
			$courier = new Courier($this->db);
			$courier_result = $courier->getCourierById($_SESSION['zamowienie']['id_dostawcy']);

			$productWskaznik = new Product($this->db);
			$koszyk_widok = null;

			$cart = new Cart($this->db);
			$kwota_zamowienia = 0;
			foreach ($koszyk as $id_produktu => $ilosc) {
				$produkt = $productWskaznik->getProductById($id_produktu);
				$koszyk_widok[$id_produktu]['nazwa_produktu'] = $produkt[0]['nazwa_produktu'];
				$koszyk_widok[$id_produktu]['cena_jednostkowa'] = $produkt[0]['cena_jednostkowa'];
				$koszyk_widok[$id_produktu]['ilosc'] = $ilosc;
				$kwota_zamowienia += $ilosc * $produkt[0]['cena_jednostkowa'];
			}
			
			$calkowita_kwota = $kwota_zamowienia + $courier_result[0]['cena_dostawy'];
			$_SESSION['zamowienie']['calkowita_kwota'] = $calkowita_kwota;

			$view = new View('order_step_3', ["koszyk_widok" => $koszyk_widok, "kwota_zamowienia" => $kwota_zamowienia, "courier" => $courier_result[0], "calkowita_kwota" => $calkowita_kwota]);
			$this->page->addView($view);
		} else {
			header("Location: index.php");
		}
	}

	public function order_step_4()
	{
		$orderDetails = new OrderDetails($this->db);
		$order = new Order($this->db);

		// Dodaję nowy wpis zamówienia potrzebnego do wyświetlania w panelu
		$order->create(
			$_SESSION['zamowienie']['id_dostawcy'],
			$_SESSION['id_klienta'],
			date("Y-m-d H:i:s"),
			'waiting',
			$_SESSION['zamowienie']['calkowita_kwota'],
			$_SESSION['zamowienie']['imie'],
			$_SESSION['zamowienie']['nazwisko'],
			$_SESSION['zamowienie']['ulica'],
			$_SESSION['zamowienie']['postcode'],
			$_SESSION['zamowienie']['miasto'],
			$_SESSION['zamowienie']['phone'],
			$_SESSION['zamowienie']['uwagi']
		);
		
		// Pobieram pierwsze wolne id zamówienia i id zamówienia szczegóły w celu użycia w metodzie wstawiania nowego zamówienia
		$zamowienie_id = $order->getLastOrderNumber();
		$zamowienie_szczegoly_id = $orderDetails->getNewOrderDetailsNumber();

		// Przechodze przez wszystkie elementy koszyka i dodaję nowe wpisy do zamówień szczegółowych		
		foreach ($_SESSION['koszyk'] as $id_produktu => $ilosc) {
			$orderDetails->create($zamowienie_szczegoly_id, $zamowienie_id, $id_produktu, $_SESSION['id_klienta'], $ilosc);
		}


		if ($_SESSION['login'] != 'yes')
			header("Location: index.php");

		if (count($_SESSION['koszyk']) <= 0)
			header("Location: index.php");

		if (!isset($_POST))
			header("Location: index.php");

		$koszyk = $_SESSION['koszyk'];

		if (isset($koszyk) && is_array($koszyk)) {
			$view = new View('order_step_4');
			$this->page->addView($view);
		} else {
			header("Location: index.php");
		}

	}

	public function show()
	{
		$id = htmlspecialchars($_GET['id']);

		$product = new Product($this->db);
		$this->result = $product->getProductById($id);

		$view = new View('Show', $this->result);
		$this->page->addView($view);

	}

	public function showComment()
	{
		$id = htmlspecialchars($_GET['id']);

		$comm = new Comment($this->db);
		$this->result = $comm->getCommentByProductId($id);

		$view = new View('Comments', $this->result);
		$this->page->addView($view);
	}

	public function edit()
	{
		$id = htmlspecialchars($_GET['id']);
		$comm = new Comment($this->db);
		$this->result = $comm->getCommentById($id);
		$view = new View('Edit', $this->result);
		$this->page->addView($view);
	}

	public function logout()
	{
		session_destroy();
		header("Location: index.php");

	}

	public function oNas()
	{
		$view = new View('oNas');
		$this->page->addView($view);
	}

	public function kontakt()
	{
		$view = new View('kontakt');
		$this->page->addView($view);
	}

	public function userpanel()
	{
		if ($_SESSION['login'] != 'yes')
			header("Location: index.php");

		$user = new User($this->db);
		// Pobranie wszystkich szczegółów użytkownika
		$user_details = $user->getUserById($_SESSION['id_klienta']);

		// Jeżeli został przesłany formularz zmiany danych użytkonika
		if (isset($_POST) && $_POST['update_user'] == 1) {
			$email = $_POST['email'];
			$email2 = $_POST['email2'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];
			$street = $_POST['street'];
			$nr_domu = $_POST['nr_domu'];
			$nr_mieszkania = $_POST['nr_mieszkania'];
			$kod_pocztowy = $_POST['kod_pocztowy'];
			$city = $_POST['city'];
			$country = $_POST['country'];
			$user->updateUserById($_SESSION['id_klienta'], $email, $password, $street, $nr_domu, $nr_mieszkania, $kod_pocztowy, $city, $country);
			header("Location: index.php?action=userpanel");
		}

		$view = new View('userpanel', ["klient" => $user_details[0]]);
		$this->page->addView($view);
	}

	public function historia()
	{
		if ($_SESSION['login'] != 'yes')
			header("Location: index.php");

		$order = new Order($this->db);
		$orders = $order->getOrdersByUserId($_SESSION['id_klienta']);

		$view = new View('historia', ["zamowienia" => $orders]);
		$this->page->addView($view);
	}

	public function panel_kierownika()
	{
		$this->result = array();
		$this->result[0] = array();
		$id = htmlspecialchars($_GET['typ']);
		//echo $id;

		$this->result[0][0] = 0; //zamowienia
		$this->result[0][1] = 0; //faktury
		$this->result[0][2] = $this->db->count("select * from klient"); //klienci
		$this->result[0][3] = $this->db->count("select * from pracownik"); //pracownicy
		$this->result[0][4] = $this->db->count("select * from produkt");; //produkty
		$this->result[0][5] = 0; //wiadomosci
		$this->result[0][6] = 0; //dostawcy

		//error_log(print_r($this->result, true), 0);

		if(!isset($id) || $id == "")
		{
			$id = 'panel_kierownika';
		}

		$view = new View($id, $this->result);

		$this->page->addView($view);
	}
}
