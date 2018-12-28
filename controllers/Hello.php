<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The constructor loads models and makes them available to all the controller's actions.
 */
class Hello extends CI_Controller {
	public function __construct() {
		parent::__construct();
/**
 * Here, we called the different models contained in the project to be available for the controller.
 */
		$this->load->model('library_model');
			$this->load->model('loginmodel');
			$this->load->model('authors_model');
      $this->load->model('items_model');
			$this->load->model('genre_model');
			$this->load->model('addadmin_model');
			$this->load->model('addbook_model');
			$this->load->model('showbooks_model');
			$this->load->model('update_model');
			$this->load->model('showmembers_model');

			$this->load->Helper('url');


	}
/**
 * The index loads the data and makes it available to render the view.
 * It loads the default view when you go to http://localhost/Library/index.php/Hello/

 */
	public function index()
	{
		$this->load->view('homepage');
	}
///////////////////////////////////////// SEARCH RESULTS//////////////////////////////////////////////
	public function search_results()
	{
		//echo $this->input->post("search");
		//echo $this->input->post("searchby");
	/**
	 * If the title field is filled up and the search button clicked, there are 3 situations.
	 * If the first, in which case it is search by title, the function 'searchBookByTitle' is called from the library_model,
	 * and the view 'search_books' is rendered.
	 */
		if ($this->input->post("searchby")==1)
		{
			$serchresult = $this->library_model->searchBookByTitle($this->input->post("search"));
			$data = array();
			$data['item'] = $serchresult;
			$this->load->view('search_books', $data);
		}
		/**
		 * In the second situation, if the option represented by 1 is not met, option 2 which is search by ISBN is seeked.
		 * The function 'searchBookByISBN is called from the library_model, and the view 'search_books' is rendered.
		 * @var [type]
		 */
		else if ($this->input->post("searchby")==2)
		{
			$serchresult = $this->library_model->searchBookByISBN($this->input->post("search"));
			$data = array();
			$data['item'] = $serchresult;
			$this->load->view('search_books', $data);
		}
		/**
		 * Similarily, in the third situation, if the second is also not called out,
		 * the search with the given ID 3 (search by author)is seeked.
		 * The function 'searchBookByAuthor is called from the library_model, and the view 'search_books' is rendered.
		 */
	 else if ($this->input->post("searchby")==3)
	 {
		 $serchresult = $this->library_model->searchBookByAuthor($this->input->post("search"));
		 $data = array();
		 $data['item'] = $serchresult;
		 $this->load->view('search_books', $data);
	 }
	/**
	 * Otherwise, if no option is selected, the view 'search_books' is loaded.
	 */
	 else {
	 	$this->load->view('search_books');
	 }

	}
///////////////////////////////////////// ADD ADMIN/////////////////////////////////////////////////////////////
/**
 * Adding admin
 * In this function, if data is posted in each of the fields named UserName, Password, Firstname and lastname,
 * data is taken and stored into the system, while the model 'addadmin_model' is called for the view 'Add_admin' to be rendered.
 */
public function addadmin()
{
	if($this->input->post("UserName") || $this->input->post("Password") || $this->input->post("FirstName")
	|| $this->input->post("LastName"))
	{
		echo "Admin added Sucessfully!;";
		$result = $this->addadmin_model->Add_admin();
		$this->load->view('login');
/**
 * Otherwise, if no input is made, the view 'addadmin' is rendered.
 */

	}
 else {

		 $this->load->view('addadmin');
 }
}



 //////////////////////////////////////////////////////////login//////////////////////////////////////////////////////////////////////
 /**
  * action to the login form in http://localhost/Library/index.php/Hello/
  * The username and password are checked if they are correct.
  * Then,a session with keys isuserloggedin & userRole is created. If the userRole result is ID 1,
  * user is redirected to http://localhost/Library/index.php/hello/adminpage
  * If the result is ID 2, user is redirected to http://localhost/Library/index.php/hello/memberpage
  * if not, we disply a "Wrong username or password" meessage is displayed.
  */
 public function loginrequest()
	{
/**
 * Pass the values from the form via post
 */
		$result = $this->loginmodel->login($this->input->post("uname"),$this->input->post("psw"));
	/**
	 * If the result is not zero (if there is a record with the inputted username and password)
	 */
		if($result==0)
		{
			echo "Username or Password incorrect!";
	}
	else
	{
	/**
	 * 	//This session does not allow any user to access the page without logging in
	 */
		$this->session->set_userdata('isuserloggedin', 'true');
		/**
		 * If the input match that for a userRole 1, the user is redirected to the adminpage,
		 * if it is 2, he is redirected to the memberpage.
		 */
				$this->session->set_userdata('userRole', $result);
				if($result == 1){
					redirect('/hello/adminpage');
				}
				else{
					redirect('/hello/memberpage');
				}
/**
 * Here, the different functions are called from their views to be rendered.
 */
	}
	}
	public function mythirdpage()
	{
		$this->load->view('login');
	}

public function adminpage()
{
 $this->load->view('adminpage');
}
public function memberpage()
{
$this->load->view('members');
}
///////////////////////////////////////////////////////logout//////////////////////////////////////////////////
/**
 * Here, the user session is deleted, forcing the user to login again before they can use the system.
 */
public function logout()
{
	$this->session->unset_userdata('isuserloggedin');
	$this->session->unset_userdata('userrole');
	redirect('/hello');
}

///////////////////////////////////////////////////// Signup ///////////////////////////////////////////////////////////////////////////
/**
 * If all fields are filled up, they are sent to the database, and the library_model is called up, while the view is rendered.
 * The user is added, and then the 'congratulations' view is loaded. If not, the signup view is loaded.
 */
 public function signuprequest()
 {
   if($this->input->post("UserName") || $this->input->post("Password") || $this->input->post("FirstName")
	 || $this->input->post("LastName"))
   {

     $result = $this->library_model->AddUser();
		 $this->load->view('congratulations');


   }
 	else {

 			$this->load->view('signup');
 	}
 }


////////////////////////////////////////////Show books by genre////////////////////////////////////////
/**
 * Data stored under $allbooks fetched through the 'getBooksByGenre,' which is gotten by calling the library_model.
 * When a genre ID is selected, the view showbooksbygenreresults view is rendered.
 */
public function showbooksbygenre($id)
{
	$allbooks = $this->library_model->getBooksByGenre($id);

	$data = array();
	$data['books'] = $allbooks;
	//print_r($allbooks);
	$this->load->view('showbooksbygenreresults',$data);
}
/////////////////////////////////////////// Add Author //////////////////////////////////////////////////////////////
/**
 * In this function, data is posted in the Author ID and Author Name,
 * data is taken and stored into the system, while the model 'authors_model' is called for the view 'add_author' to be rendered.
 */
public function add_author()
{
	if($this->input->post("Author_ID") || $this->input->post("Author_Name"))
	{
		$data = array();
		$result = $this->authors_model->addAuthor();
		$data['result'] = $result;
		$this->load->view('add_author',$data);
	}
	else
		{
			$this->load->view('add_author');
		}

}
/////////////////////////////////////////////// Show Authors///////////////////////////////////////////////////////////////////
/**
 * The authors_model is called and the function get_all_authors is seeked. Data that is taken from the model is rendered in the show_authors view.
 */
public function showallauthors()
{
	$all_authors = $this->authors_model->get_all_authors();

	$data = array();
	$data['authors'] = $all_authors;

	$this->load->view('show_authors',$data);
}
/////////////////////////////////////////////// Add Genre /////////////////////////////////////////////////////////////////////////
/**
 * call genre_model.addgenre() to get list of all the genres
 * An empty array is created
 * results from the model are stored in $result to the data and given to 'result'.
 * This key is used to access data in the view. The genre_model is is called to get the list of genres.
 * The view add genre is loaded and passed.
 */
public function add_genre()
{
	if($this->input->post("Genre_ID") || $this->input->post("Genre"))
	{
		$result = $this->genre_model->addgenre();
		$data = array();
		$data['result'] = $result;
		$this->load->view('addgenre',$data);
	}
	else
		{
			$this->load->view('addgenre');
		}

}


///////////////////////////////////////////////Add Book////////////////////////////////////////////////////////
/**
 * call addbook_model.getauthors, addbook_model.getgenres, and addbook_model.getformats () to get list of all the authors, genres and formats.
 * An empty array is created
 * results from the model are stored in $result to the data and given to 'authorslist',genreslist and formatslist.
 * This key is used to access data in the view.
 * The view addBook is loaded and passed.
 */

public function add_book()
{
	$result = $this->addbook_model->getauthors();
	$data = array();
	$data['authorslist'] = $result;
	$result = $this->addbook_model->getgenres();
	$data['genreslist'] = $result;
	$result = $this->addbook_model->getformats();
	$data['formatslist'] = $result;

	$this->load->view('addBook',$data);
}
/**
 * add_book_result is the action from the from in http://localhost/Library/index.php/hello/add_book
 * we call addbook_model.additems() function to insert the new book to the database
 */
public function add_book_result()
	{
		if($this->input->post("ISBN") || $this->input->post("Title") || $this->input->post("ID")
		|| $this->input->post("No_Of_Pages")|| $this->input->post("Best_Of_Collection")
		|| $this->input->post("Publishing_Date")|| $this->input->post("Print_Date")
		|| $this->input->post("Edition_Num") || $this->input->post("Rating")|| $this->input->post("Author_ID")
		|| $this->input->post("Genre_ID")|| $this->input->post("Format_ID"))
		{
			$result = $this->addbook_model->additems();
			$data = array();
			$data['result'] = $result;
			$this->load->view('add_book_result',$data);
		}
	}
	////////////////////////////////////////  Update Book //////////////////////////////////////////////////////////////
/**
 * call addbook_model.getauthors, getgenres, getformats, getbookDetailsbyID,getbookauthorsbyID, getbookformatsbyID, getbookgenresbyID () to get list of all book getbookDetailsbyID
 * create an empty array called data
 */
	public function updatebook($id)
		{
			$result = $this->addbook_model->getauthors();
			$data = array();
			/**
			 * add the results from the model which are stored in $result to data and give it key "authorslist"
			 */
			$data['authorslist'] = $result;
			$result = $this->addbook_model->getgenres();
			/**
			 * add the results from the model which are stored in $result to data and give it key "genreslist"
			 */
			$data['genreslist'] = $result;
			$result = $this->addbook_model->getformats();
			/**
			 * add the results from the model which are stored in $result to data and give it key "formatslist"
			 */
			$data['formatslist'] = $result;
			$result = $this->update_model->getbookDetailsbyID($id);
			/**
			 * add the results from the model which are stored in $result to data and give it key "books"
			 */
			$data['books'] = array_pop($result);
			$result = $this->update_model->getbookauthorsbyID($id);
			/**
			 * add the results from the model which are stored in $result to data and give it key "authors_has_item"
			 */
			$data['authors_has_item'] = $result;
			$result = $this->update_model->getbookformatsbyID($id);
			/**
			 * add the results from the model which are stored in $result to data and give it key "item_has_format"
			 */
			$data['item_has_format'] = $result;
			$result = $this->update_model->getbookgenresbyID($id);
			/**
			 * add the results from the model which are stored in $result to data and give it key "genres_has_item"
			 */
			$data['genres_has_item'] = $result;
			/**
			 * load view updateitems.php and pass the data array
			 */
			$this->load->view('updateitems',$data);
		}
		/**
		 * the action from the form in http://localhost/Library/index.php/Hello/updatebook/1
		 * updatebookresults will take the data from the form and update the item based on their ID
		 */
		public function updatebookresults()
		{
			if($this->input->post("ISBN	") || $this->input->post("Title") || $this->input->post("ID")
			|| $this->input->post("No_Of_Pages") || $this->input->post("No_Of_Copies")
			|| $this->input->post("Best_Of_Collection")|| $this->input->post("Rating")
			|| $this->input->post("Publishing_Date")|| $this->input->post("Edition_Num")
			|| $this->input->post("Print_Date")|| $this->input->post("Author_ID")
			|| $this->input->post("Genre_ID")|| $this->input->post("Format_ID"))
			{
				$result = $this->update_model->updateitem();
				$data = array();
				$data['result'] = $result;
				$this->load->view('updateitemresult',$data);
			}
		}
	//////////////////////////////SHOW ALL BOOKS////////////////////////////////////////////////////////////////////////
/**
 * call showbooks_model.showbooks, showbooks_model.showbookgenres, showbooks_model.showbookauthors,and
 * showbooks_model.showbookformats to get all books' details.
 */
	public function showallitems()
		{

				$result = $this->showbooks_model->showbooks();
				$data = array();
				$data['items'] = $result;

				$result = $this->showbooks_model->showbookgenres();
				$data['booksgenres'] = array_pop($result);

				$result = $this->showbooks_model->showbookauthors();
				$data['booksauthors'] = array_pop($result);

				$result = $this->showbooks_model->showbookformats();
				$data['booksformats'] = array_pop($result);
				$this->load->view('show_items',$data);


	}

///////////////////////////////////Delete BOOK///////////////////////////////////////////////////////////
/**
 * the model addbook_model calls the function deleteitem, which in turn deletes the selected book from the items table.
 */
public function delete($id){

$result = $this->addbook_model->deleteitem($id);
redirect('Hello/showallitems');
}
///////////////////////////////////////////////SHOW ALL MEMBERS/////////////////////////////////////////
/**
 * The showmember_model calls out the function get_all_members, which in turn gets all the members, and is
 * loaded in the show_members view.  
 */
public function showallmembers()
	{
		$all_members = $this->showmembers_model->get_all_members();

    $data = array();
    $data['user'] = $all_members;
		$this->load->view('show_members',$data);
	}



}
