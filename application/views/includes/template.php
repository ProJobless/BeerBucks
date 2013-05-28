<?php
	
	// Loads Header
	$this->load->view("includes/header.php");

	// Loads Body
	$this->load->view($view);

	// Loads Footer
	$this->load->view("includes/footer.php");