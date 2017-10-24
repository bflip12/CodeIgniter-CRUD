<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebook extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();

    $this->TPL['update'] = false;
    $this->TPL['newentry'] = false;
    $this->TPL['updateEntryInvalid'] = false;
    $this->TPL['newentryInvalid'] = false;

    $this->load->library('form_validation', 'session');
    $this->load->helper(array('form', 'url'));

    $this->form_validation->set_rules('fname', 'Username', 'trim|required|min_length[5]|max_length[15]');

    $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[5]|max_length[20]');

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|callback_regex_match');

    }





  public function index()
  {
    $this->display();


  }

  public function regex_match($phonenumber)
  {

    if(preg_match("/\d{3}-\d{4}/", $phonenumber))
    {
      $this->form_validation->set_message('regex_match', 'The phone number field is not valid.');
      return true;
    }
    else {
      return false;
    }
  }

  private function display()
  {
    $query = $this->db-> query("SELECT * FROM phonebook ORDER BY id ASC;");
    $this->TPL['listing'] = $query->result_array();

    $this->load->view('phonebook_view', $this->TPL);

  }

  public function delete($id)
  {
    $query = $this->db->query("DELETE FROM phonebook where id = '$id';");

    $this->display();
  }

  public function newentry()
  {
    if($this->form_validation->run() != FALSE)
    {
      $fname = $this->input->post("fname");
      $lname = $this->input->post("lname");
      $phone = $this->input->post("phone");
      $email = $this->input->post("email");
      $query = $this->db->query("INSERT INTO phonebook VALUES (NULL, '$fname', '$lname', '$phone', '$email', NULL, NULL, NULL, NULL);");

      redirect(current_url());
    }
    else
    {
      $this->TPL['newentryInvalid'] = true;
      $this->display();
    }
  }

  public function addnew()
  {
    $this->TPL['newentry'] = TRUE;

    $this->display();
  }

  public function update($id)
  {

    $query = $this->db->query("SELECT * FROM phonebook where id = '$id';");
    $this->TPL['entry'] = $query->result_array()[0];

    $this->TPL['update'] = true;

    $this->display();
  }

  public function updateentry($id)
  {
    if($this->form_validation->run() == FALSE)
    {
      $query = $this->db->query("SELECT * FROM phonebook where id = '$id';");
      $this->TPL['entry'] = $query->result_array()[0];
      $this->TPL['updateEntryInvalid'] = true;
      $this->display();

  }
  else
  {


    $fname = $this->input->post("fname");
    $lname = $this->input->post("lname");
    $phone = $this->input->post("phone");
    $email = $this->input->post("email");
    $query = $this->db->query("UPDATE phonebook " .
                              "SET fname = '$fname'," .
                              "    lname = '$lname'," .
                              "    phone = '$phone'," .
                              "    email = '$email'" .
                              " WHERE id = '$id';");
                              redirect(current_url());
  }


  }

}
