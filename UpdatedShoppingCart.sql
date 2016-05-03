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


-- each item is unique, but may be a copy with info and a price tag for that same media;different medias may have same price tag
CREATE TABLE Digitallibrary(
	UFC INT NOT NULL, 
	ISBN INT NOT NULL,
	FOREIGN KEY(ISBN) REFERENCES MediaDescription(ISBN), 
	PRIMARY KEY(UFC)
	);
-- 
CREATE TABLE MediaDescription(
	ISBN INT NOT NULL, --needed to be in seperate table so items don't 'plagerize' and say thy are diff copy
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







# Create data
INSERT INTO `customer` (`CID`, `Email`, `PhoneNumber`, `FirstName`, `Middlename`, `LastName`, 'Address') VALUES
(1, 'billyjoe123@mail.com', '123456789', 'Billy', 'M', 'Joe', '100 n northland'),
(12, 'bob@msn.com', '480-798-9009', 'Bob', 'Jim', 'Smith', '200 s southland'),
(123, 'ChelseaY@gmail.com', '480-098-9100', 'Chelsea', '', 'Rogers', '300 e eastland')
(1234, 'Eric@hotmail.com', '480-098-9101', 'Cheesey', 'D', 'Rogers', '400 w westland');

INSERT INTO Orders (`OrderID`, `Date`, `CID`) VALUES
('2016-12-01', 1),
('2016-02-12', 12),
('2016-03-04', 123),
('2016-09-08', 1234)
('2016-09-08', 5);





INSERT INTO DigitalLibrary Values (921,9023,'Terminator 2');
INSERT INTO DigitalLibrary Values (123,876,'Hangar 18');
INSERT INTO DigitalLibrary Values (543,5676,'Intro to Database Management');
INSERT INTO DigitalLibrary Values (321,4674,'Advanced Data Strcutures');

INSERT INTO MediaDescription Values (0, 1, 'Terminator 2',9.99,'Video','Action','1992','James Cameroon');
INSERT INTO MediaDescription Values (01, 2, 'Hangar 18',0.99,'Music','Metal','1992','Megadeth');
INSERT INTO MediaDescription Values (012, 3, 'Intro to Database Management',19.99,'eBook','Computer Science','2004','Michael Douglas');
INSERT INTO MediaDescription Values (0123, 4, 'Advanced Data Strcutures',29.99,'eBook','Computer Science','1999','Sarah Dean');
INSERT INTO MediaDescription Values (01234, 5, 'Terminator 2',9.99,'Video','Action','1992','James Cameroon');


INSERT INTO Favorites Values (1,'Hangar 18',123);
