<?php
ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doss_hubb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$tbl_advisor = "CREATE TABLE IF NOT EXISTS tbl_advisors(
    user_id int primary key auto_increment, 
    medstart_date date, 
    capturedby text(150), 
    brokercode text(150), 
    brokeragename text(150), 
    brokername text(150), 
    brokeremail text(150), 
    brokertel int(15),
    status int default(0),
    reference_id varchar(50) default(0),
    membership_num int default(0),
    terms_agreement varchar(20),
    advisor_dates date,
    advisor_memfullname varchar(50),
    mem_declaration varchar(20),
    errormessage JSON,
    errorcode varchar(255),
    created_at date,
    updated_at date
    /* option_radio text(25),  */
  )";

$tbl_members = "CREATE TABLE IF NOT EXISTS tbl_members(
    tbl_id int primary key auto_increment,
    user_id int,
    idPassType text(25), 
    mainid_number text(15), 
    main_title text(15), 
    main_surname text(50), 
    main_firstname text(50), 
    main_initial text(10), 
    main_marital text(10), 
    mgender_radio text(10), 
    m_dob date, 
    main_lang text(25),
    m_race varchar(25),
    m_deps_radio varchar(10)

)";

$tbl_members_contacts = "CREATE TABLE IF NOT EXISTS tbl_members_contacts(
    id int primary key auto_increment,
    user_id int,
    m_cell text(20),
    m_telh text(20),
    m_telw text(20),
    mtax text(20),
    m_email text(150),
    mainid_pobox text(50),
    m_psnum text(50),
    m_psname text(50),
    m_pstype text(50),
    m_psuburb text(50),
    m_postalcode text(50),
    m_ssnum text(50),
    m_ssname text(50),
    m_sstype text(50),
    m_ssuburb text(50),
    m_spostalcode text(50)
)";
$tbl_dependents = "CREATE TABLE IF NOT EXISTS tbl_dependents(
    id int primary key auto_increment,
    user_id int,
    dep_title text(20),
    d_idpass text(20),
    d_firstname text(50),
    d_surname text(50),
    d_dob text(20),
    d_marital text(20),
    d_race text(20),
    d_gender_radio text(20),
    d_rel text(20),
    d_contact text(20),
    d_tax text(20)
)";

$tbl_banks_contributions = "CREATE TABLE IF NOT EXISTS tbl_banks_contributions(
  id int primary key auto_increment,
  user_id int,
  thirdpartycheck varchar(10),
  bankname varchar(50),
  accholderid varchar(50),
  accholder varchar(50), 
  accholdersurname varchar(50),
  accnum varchar(50),
  acctype varchar(50),
  debitdate varchar(25),
  branchcode varchar(25),
  branchname varchar(50),
  verification JSON DEFAULT NULL,
  idvalidation JSON DEFAULT NULL,
  consentupload varchar(50)
)";

$tbl_banks_refunds = "CREATE TABLE IF NOT EXISTS tbl_banks_refunds(
  id int primary key auto_increment,
  user_id int,
  thirdpartycheck varchar(10),
  sameacccheck varchar(10),
  bankname varchar(50),
  accholderid varchar(50),
  accholder varchar(50),
  accholdersurname varchar(50),
  accnum varchar(50),
  acctype varchar(50),
  debitdate varchar(25),
  branchcode varchar(25),
  branchname varchar(50)
)";

$tbl_medical_scheme = "CREATE TABLE IF NOT EXISTS tbl_medical_scheme(
  id int primary key auto_increment,
  user_id int,
  fullname varchar(50),
  medscheme varchar(50),
  membership_num varchar(50),
  medjoindate date,
  medenddate date,
  comupload varchar(150)
)";

$tbl_medical_questions = "CREATE TABLE IF NOT EXISTS tbl_medical_questions(
  id int primary key auto_increment,
  user_id int,
  medical_questions int,
  fullname varchar(50),
  illness varchar(50),
  treated varchar(50),
  firsttreatmentdate date,
  lasttreatmentdate date,
  gpfullname varchar(150)
)";

$tbl_gpnominations = "CREATE TABLE IF NOT EXISTS tbl_gpnominations(
  id int primary key auto_increment,
  user_id int,
  fullname varchar(50),
  firstdocname varchar(50),
  firstdocpnum varchar(50),
  seconddocname varchar(50),
  seconddocpnum varchar(50)
)";

if ($conn->query($tbl_advisor) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

if ($conn->query($tbl_members) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($tbl_members_contacts) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

if ($conn->query($tbl_dependents) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

if ($conn->query($tbl_banks_contributions) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

if ($conn->query($tbl_banks_refunds) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

if($conn->query($tbl_medical_scheme) === FALSE){
  echo "Error creating table: " . $conn->error;
}


if($conn->query($tbl_medical_questions) === FALSE){
  echo "Error creating table: " . $conn->error;
}

if($conn->query($tbl_gpnominations) === FALSE){
  echo "Error creating table: " . $conn->error;
}
