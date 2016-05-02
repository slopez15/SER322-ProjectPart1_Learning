CREATE DATABASE shoppingcart;
USE shoppingcart;
CREATE table Customer(CID INT NOT NULL, Email VARCHAR(45), PhoneNumber VARCHAR(45),
FirstName VARCHAR(45),Middlename VARCHAR(45),LastName VARCHAR(45),  primary key(CID));# still have to implement name
CREATE table Orders(CID INT NOT NULL, OrderID INT , Date date, foreign key(CID) REFERENCES Customer(CID));
CREATE table MediaDescription(Title VARCHAR(45) NOT NULL, Cost DECIMAL(6,2), Type VARCHAR(45), 
Category VARCHAR(45), Year INT, Author VARCHAR(45), primary key(Title));
CREATE table DigitalLibrary(MediaID INT NOT NULL, ISBN INT ,Title VARCHAR(45), foreign key(Title) REFERENCES MediaDescription(Title));
CREATE table Favorites(Title VARCHAR(45), Cost DECIMAL(6,2), ISBN VARCHAR(45), 
foreign key(Title) REFERENCES MediaDescription(Title),
foreign key(Cost) REFERENCES MediaDescription(Cost),
foreign key(ISBN) REFERENCES Digitallibrary(ISBN)
);# have to implement
# Create data
INSERT INTO Customer VALUES (345,'billyjoe123@mail.com','123456789','Billy','M','Joe');
INSERT INTO MediaDescription Values ('Terminator 2',9.99,'Video','Action','1992','James Cameroon');
INSERT INTO MediaDescription Values ('Hangar 18',0.99,'Music','Metal','1992','Megadeth');
INSERT INTO MediaDescription Values ('Intro to Database Management',19.99,'eBook','Computer Science','Michael Douglas');
INSERT INTO MediaDescription Values ('Advanced Data Strcutures',29.99,'eBook','Computer Science','Sarah Dean');

INSERT INTO DigitalLibrary Values (921,9023,'Terminator 2');
INSERT INTO DigitalLibrary Values (123,876,'Hangar 18');
INSERT INTO DigitalLibrary Values (543,5676,'Intro to Database Management');
INSERT INTO DigitalLibrary Values (321,4674,'Advanced Data Strcutures');

INSERT INTO Favorites Values ('Hanagr 18',0.99,876);





