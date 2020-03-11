CREATE TABLE customer_details (
  Acc_Num int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  FirstName varchar(50) NOT NULL,
  LastName varchar(50) NOT NULL,
  FatherName varchar(50) NOT NULL,
  DOB Date NOT NULL,
  Gender varchar(15) NOT NULL,
  MobileNumber bigint NOT NULL,
  Email varchar(50) NOT NULL,
  Password varchar(255) NOT NULL,
  Address varchar(255) NOT NULL,
  City varchar(50) NOT NULL,
  District varchar(50) NOT NULL,
  PIN varchar(10) NOT NULL,
  State varchar(50) NOT NULL,
  SubmitDateTime datetime DEFAULT CURRENT_TIMESTAMP,
  Approved ENUM('Yes', 'No', 'Disabled') DEFAULT 'No'
);

CREATE TABLE staff_details (
  FirstName varchar(50) NOT NULL,
  LastName varchar(50) NOT NULL,
  FatherName varchar(50) NOT NULL,
  DOB Date NOT NULL,
  Gender varchar(15) NOT NULL,
  MobileNumber bigint NOT NULL,
  Email varchar(50) PRIMARY KEY NOT NULL,
  Password varchar(255) NOT NULL,
  Address varchar(255) NOT NULL,
  City varchar(50) NOT NULL,
  District varchar(50) NOT NULL,
  PIN varchar(10) NOT NULL,
  State varchar(50) NOT NULL,
  FirstLogin ENUM('Yes', 'No') DEFAULT 'No'
);

CREATE TABLE login_details (
  AccountType char(10) NOT NULL,
  FirstName varchar(50) NOT NULL,
  LoginEmailID char(50) PRIMARY KEY NOT NULL,
  LoginPassword char(255) NOT NULL,
  LastLogin datetime DEFAULT NULL
);

CREATE TABLE accounts (
  Acc_Num int PRIMARY KEY NOT NULL,
  Balance bigint DEFAULT 0
);

CREATE TABLE transactions (
  TransactionDateTime datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  TrasactionID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  Acc_Num int NOT NULL,
  Credit bigint,
  Debit bigint,
  Balance bigint NOT NULL,
  Description varchar(50) NOT NULL
);

ALTER TABLE customer_details AUTO_INCREMENT=1000;
ALTER TABLE transactions AUTO_INCREMENT=10000;

INSERT INTO customer_details (
  FirstName, LastName, FatherName, DOB, Gender, MobileNumber, Email,
  Password, Address, City, District, PIN, State) VALUES (
    '$FirstName', '$LastName', '$FatherName', '$DOB', '$Gender', '$MobileNumber', '$Email',
    '$Password', '$Address', '$City', '$District', '$PIN', '$State');
