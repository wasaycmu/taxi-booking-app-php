drop database if exists Karwa;

create database Karwa;

use Karwa;

-- Drop Table CarAssignment;
-- Drop Table Feedback;
-- Drop Table Booking;
-- Drop Table Customer_Favorites;
-- Drop Table Car;
-- Drop Table Driver;
-- Drop Table Customer;


CREATE TABLE Customer ( Email VARCHAR(30) UNIQUE NOT NULL,
FirstName VARCHAR(25) NOT NULL,
LastName VARCHAR(25) NOT NULL,
password VARCHAR(20) NOT NULL,
mobileNumber INT(20) NOT NULL,
PRIMARY KEY (mobileNumber) );

CREATE TABLE Driver ( DriverID INT(6) NOT NULL,
FirstName VARCHAR(50) NOT NULL,
LastName VARCHAR(50) NOT NULL,
mobileNumber INT(15) UNIQUE NOT NULL,
LicenseNumber INT(10) UNIQUE NOT NULL,
ExpirationDate DATE NOT NULL,
DateOfHire DATE NOT NULL,
Picture blob ,
PRIMARY KEY (DriverID) );


CREATE TABLE Car ( TaxiID varchar(8) NOT NULL,
LicensePlate INT(15) UNIQUE NOT null,
DateOfPurchase DATE NOT NULL,
TypeOfCar varchar(25) not null,
CurrentLocation varchar(40) not null,
Milage int(10) not null,
Make varchar(10) not null,
Model varchar(15) not null,
PRIMARY KEY (TaxiID) );

CREATE TABLE Booking ( TaxiID varchar(8) not null,
DriverID INT(6) NOT NULL,
BookingID VARCHAR(10) not null,
mobileNumber INT(20) NOT NULL,
ETA time not null,
DropOffLocation varchar(40),
bookingTime time not null,
bookingDate date not null,
pickUpDate date not null,
TotalFare int not null,
PickUpLocation varchar(40) not null,
AddBookingInfo varchar(50),
foreign key (DriverID) references Driver(DriverID),
foreign key (TaxiID) references Car(TaxiID),
foreign key (mobileNumber) references Customer(mobileNumber),
Primary Key (BookingID)
);


CREATE TABLE Customer_Favorites( Favorites varchar(40),
mobileNumber int(20) NOT NULL,
FOREIGN KEY (mobileNumber) REFERENCES Customer(mobileNumber),
PRIMARY KEY (Favorites, mobileNumber) );

CREATE TABLE Feedback(
BookingID varchar(10) not null,
Stars int(1) NOT NULL,
Comments varchar(200),
FOREIGN KEY (BookingID) REFERENCES Booking(BookingID),
Primary Key (BookingID)
);

CREATE TABLE CarAssignment(
TaxiID varchar(8) not null,
DriverID INT(6) NOT NULL,
fromDate date not null,
toDate date,
shiftTime int(8) not null,
FOREIGN KEY (TaxiID) REFERENCES Car(TaxiID),
FOREIGN KEY (DriverID) REFERENCES Driver(DriverID),
Primary Key (TaxiID, DriverID, shiftTime, fromDate)
);

INSERT INTO Customer (Email, FirstName, LastName, password, mobileNumber)
VALUES ('yasir@koko.com','Joanne','Rowling', 'hodor', 44559900);
INSERT INTO Customer (Email, FirstName, LastName, password, mobileNumber)
VALUES ('talha@koko.com','talha','anees', 'falafil', 99008899);
INSERT INTO Customer (Email, FirstName, LastName, password, mobileNumber)
VALUES ('wasay@koko.com','Abdul','Wasay', 'hodor', 11111111);
INSERT INTO Customer (Email, FirstName, LastName, password, mobileNumber)
VALUES ('idk@koko.com','idk','kdi', 'falafil', 22222222);
INSERT INTO Customer (Email, FirstName, LastName, password, mobileNumber)
VALUES ('nami@koko.com','Nami','Ametaf', 'psswrd', 33333333);

INSERT INTO Car (TaxiID, LicensePlate, DateOfPurchase, TypeOfCar, CurrentLocation, Milage, Make, Model)
VALUES (123123, 22334455, 01/27/2016, 'Sedan','gharafa, Doha', 20005, 'Honda', 'Civic');
INSERT INTO Car (TaxiID, LicensePlate, DateOfPurchase, TypeOfCar, CurrentLocation, Milage, Make, Model)
VALUES (321321, 98788869,12/27/2015, '4by4','Al-Rayyan, Doha', 20006, 'Hyundai', 'Sonata');
INSERT INTO Car (TaxiID, LicensePlate, DateOfPurchase, TypeOfCar, CurrentLocation, Milage, Make, Model)
VALUES (101010, 00001111, 11/27/2016, 'Sedan','Lusail, Qatar', 20007, 'Kia','So');
INSERT INTO Car (TaxiID, LicensePlate, DateOfPurchase, TypeOfCar, CurrentLocation, Milage, Make, Model)
VALUES (202020, 00002222, 01/27/2010, '4by4','Corniche, Doha', 20099, 'Suzuki', 'Bolan');
INSERT INTO Car (TaxiID, LicensePlate, DateOfPurchase, TypeOfCar, CurrentLocation, Milage, Make, Model)
VALUES (303030, 00003333, 03/15/2002, 'Sedan','C Ring Road, Doha', 23232, 'Ford','Escape');


INSERT INTO Driver (DriverID, FirstName, LastName, MobileNumber, LicenseNumber, ExpirationDate, DateofHire)
VALUES (001,'Kunafa', 'Khan', 87654322, 8787878, 01/28/2018, 01/28/2014);
INSERT INTO Driver (DriverID, FirstName, LastName, MobileNumber, LicenseNumber, ExpirationDate, DateofHire)
VALUES (002,'Funta', 'Tyrewala', 11993344, 0930234, 02/14/2019, 02/14/2013);
INSERT INTO Driver (DriverID, FirstName, LastName, MobileNumber, LicenseNumber, ExpirationDate, DateofHire)
VALUES (003,'Yasir', 'Bhutto', 11001100, 0920124, 05/14/2020, 09/11/2012);
INSERT INTO Driver (DriverID, FirstName, LastName, MobileNumber, LicenseNumber, ExpirationDate, DateofHire)
VALUES (004,'Nami', 'Machardani', 22002200, 0020234, 11/29/2019, 01/18/2010);
INSERT INTO Driver (DriverID, FirstName, LastName, MobileNumber, LicenseNumber, ExpirationDate, DateofHire)
VALUES (005,'Wasay', 'Iqbal', 33003300, 0110234, 12/23/2022, 10/26/2016);

INSERT INTO Booking (BookingID, ETA, DropOffLocation, BookingTime, TotalFare, pickUpLocation, AddBookingInfo, mobileNumber, TaxiID, DriverID, bookingDate, pickUpDate)
VALUES ('CT 0001', 20, 'Airport', 1530, 60, 'male dorms, doha', 'Come quickly please', 44559900, 123123, 001, 12/12/2009, 12/12/2009);
INSERT INTO Booking (BookingID, ETA, DropOffLocation, BookingTime, TotalFare, pickUpLocation, AddBookingInfo, mobileNumber, TaxiID, DriverID, bookingDate, pickUpDate)
VALUES ('BT 0002', 20, 'Souq Waqif', 1830, 60, 'Female dorms, doha', 'Come quickly please', 99008899, 321321,002, 12/12/2008, 12/12/2008);
INSERT INTO Booking (BookingID, ETA, DropOffLocation, BookingTime, TotalFare, pickUpLocation, AddBookingInfo, mobileNumber, TaxiID, DriverID, bookingDate, pickUpDate)
VALUES ('FT 0003', 05, 'Katara', 1030, 50, 'Corniche, Doha', 'I am near the main entrance', 11111111, 101010, 003, 12/12/2007, 12/12/2007);
INSERT INTO Booking (BookingID, ETA, DropOffLocation, BookingTime, TotalFare, pickUpLocation, AddBookingInfo, mobileNumber, TaxiID, DriverID, bookingDate, pickUpDate)
VALUES ('KT 0004', 10, 'Pearl', 1330, 80, 'Souq Waqif, doha', 'Taxi Drop Off area', 22222222, 202020, 004, 12/12/2006, 12/12/2006);
INSERT INTO Booking (BookingID, ETA, DropOffLocation, BookingTime, TotalFare, pickUpLocation, AddBookingInfo, mobileNumber, TaxiID, DriverID, bookingDate, pickUpDate)
VALUES ('CT 0005', 15, 'Wakrah Port', 1930, 160, 'Al Nasr, doha', 'Gate # 3', 33333333, 303030, 005, 12/12/2010, 12/12/2010);

INSERT INTO CarAssignment (TaxiID, DriverID, fromDate, toDate, shiftTime)
VALUES (123123,001, 01/12/2015, 01/03/2016, 0800);
INSERT INTO CarAssignment (TaxiID, DriverID, fromDate, toDate, shiftTime)
VALUES (321321,002, 01/11/2015, 01/01/2016, 1200);
INSERT INTO CarAssignment (TaxiID, DriverID, fromDate, toDate, shiftTime)
VALUES (101010,003, 11/22/2013, 11/12/2016, 1800);
INSERT INTO CarAssignment (TaxiID, DriverID, fromDate, toDate, shiftTime)
VALUES (202020,004, 05/03/2012, 03/04/2018, 0800);
INSERT INTO CarAssignment (TaxiID, DriverID, fromDate, toDate, shiftTime)
VALUES (303030,005, 07/15/2014, 05/09/2019, 0000);


INSERT INTO Customer_Favorites (favorites, mobileNumber)
VALUES ('Al-gharafa, doha',44559900);
INSERT INTO Customer_Favorites (favorites, mobileNumber)
VALUES ('Shamali, Doha', 99008899);
INSERT INTO Customer_Favorites (favorites, mobileNumber)
VALUES ('Souq Waqif, Doha', 11111111);
INSERT INTO Customer_Favorites (favorites, mobileNumber)
VALUES ('Katara, Doha', 22222222);
INSERT INTO Customer_Favorites (favorites, mobileNumber)
VALUES ('Pearl, Doha', 33333333);


INSERT INTO Feedback (BookingID, Stars, Comments)
VALUES ('CT 0001',4, 'Great Service');
INSERT INTO Feedback (BookingID, Stars, Comments)
VALUES ('BT 0002',2, 'Bad Service.');
INSERT INTO Feedback (BookingID, Stars, Comments)
VALUES ('FT 0003',3, 'It was ok');
INSERT INTO Feedback (BookingID, Stars, Comments)
VALUES ('KT 0004',1, 'Worst Cab Ride Ever');
INSERT INTO Feedback (BookingID, Stars, Comments)
VALUES ('CT 0005',5, 'I LOVED IT!!');



