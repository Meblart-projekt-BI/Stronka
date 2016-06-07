]<?php
/**
 * Plik kontorlera, tutaj będą wykonywane wszystkie operacje na otrzymanych danych
 */
class Controller {

	protected $page;
	protected $db;
	protected $result = array();
	protected $params = array();


	public function __construct(PageView $page, DB $db = null) {
		$this->page = $page;
		$this->db = $db;

	}

	public function comments() {

		$data = array(
			'title' => 'Tu będą komentarze',
			'info' => 'Komentarze te będzie można edytować.'
		);

		$view = new View('Comments', $data);
		$this->page->addView($view);
	}

	public function page()
	{
		/* 
		$news = new News($this->db);
		$this->result = $news->getNews();
                 */
				 
		if($_GET['do'] == 'page') // powrot na str. glowna
				$_SESSION['main'] = true;
		
        if($_SESSION['pracownik'] == 'yes' && $_GET['do'] == 'panel')  // powrot do panelu
				$_SESSION['main'] = false;
                 
        $product = new Product($this->db);
        $this->result[1] = $product->getProducts();
        
		if($_SESSION['pracownik'] != 'yes' || $_SESSION['main'])  // str. glowna
		{
			$view = new View('Main',$this->result);
			$this->page->addView($view);
		}
		else // panel pracownika
		{
			switch($_GET['do'])
			{
				case 'zamowienia':
                    $this->result[2]= $product->getZamowienie();
                    $this->result[3]= $product->getDaneKlienta();
					$view = new View('Zamowienia',$this->result);
					$this->page->addView($view);
					break;
				case 'faktura':
                    $this->result[4]= $product->getDaneKlienta();
                    $this->result[5]= $product->getAdresKlienta();
                    $this->result[6]= $product->getZamowienieKlienta();
                    $this->result[7]= $product->getZamowienieProduktyKlienta();
					$view = new View('Faktura',$this->result);
					$this->page->addView($view);
					break;
                case 'wiadomosci':
                    $view = new View('Wiadomosci',$this->result);
					$this->page->addView($view);
					break;
				default:
					$view = new View('Panel_pracownika',$this->result);
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
            
            
            
            if(isset($id))
            {
                $product = new Product($this->db);
                $this->result[0] = $product->getProductByCategory($id);
                $this->result[1] = $product->getCategories();
                
                $view = new View('Category', $this->result);
                
                //echo 'jestem na podstonie';
            }else{
                
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
		$id = htmlspecialchars($_GET['id']);

		$cart = new Cart($this->db);
		$this->result = $cart->addItemToCart($id);



		if($_POST['send'] == 1)
		{

			$l = htmlspecialchars($_POST['ilosc']);

			$price = $this->result[0]['cena_jednostkowa'] * $l;

			$this->params = array("price" => $price);

			echo $price;

		}

		$view = new View('Cart', $this->result,$this->params);
		$this->page->addView($view);

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
		$this->result = $comm->getCommentByNewsId($id);

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
	
	public function panel_kierownika()
	{
		$id = htmlspecialchars($_GET['typ']);
		//echo $id;
		if(isset($id) && $id != "")
		{
			$view = new View($id);
		} else {
			$view = new View('panel_kierownika');
		}
		$this->page->addView($view);
	}	
}
