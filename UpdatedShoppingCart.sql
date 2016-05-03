SHOW ENGINE INNODB STATUS;
Drop DATABASE IF EXISTS shoppingcart12; 
CREATE DATABASE shoppingcart12;
USE shoppingcart12;
-- custuomer info
CREATE TABLE Customer(
	CID INT NOT NULL auto_increment, 
	Email VARCHAR(45) NOT NULL UNIQUE, 
	PhoneNumber VARCHAR(45), 
	FirstName VARCHAR(45), 
	Middlename VARCHAR(45), 
	LastName VARCHAR(45), 
	Address VARCHAR(45), 
	PRIMARY KEY(CID));
-- each order is connected with one person and date; same person buys different days, same day different people buy
CREATE TABLE Orders(
	OrderID INT NOT NULL auto_increment, 
	Date DATE, 
	CID INT NOT NULL,
	FOREIGN KEY(CID) REFERENCES Customer(CID),
	PRIMARY KEY(OrderID)
	);


-- each product is unique, but may be a copy of isbn with info and a price tag for that media;
CREATE TABLE Digitallibrary(
	UFC INT NOT NULL, 
	ISBN INT NOT NULL REFERENCES MediaDescription(ISBN),
	-- FOREIGN KEY(ISBN) REFERENCES MediaDescription(ISBN), 
	PRIMARY KEY(UFC)
	);
-- each title is unique and may have same info, but each title has it's own values and cost
CREATE TABLE MediaDescription(
	ISBN INT NOT NULL, -- needed to be in seperate table so items don't 'plagerize' and say thy are diff copy
	Title VARCHAR(45) NOT NULL, 
	Type VARCHAR(45), 
	Category VARCHAR(45),
	Year INT, 
	Author VARCHAR(45), 
	Cost DECIMAL(6,2),
	PRIMARY KEY(ISBN)
	);


CREATE table Favorites(
	FavID INT NOT NULL,
    UFC INT NOT NULL, -- makes more sense than isbn since it's not the copy, but the item, due to price, that they may favor
    CID INT NOT NULL,
	PRIMARY KEY(FavID)
	);



