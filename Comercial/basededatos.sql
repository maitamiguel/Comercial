CREATE DATABASE comercial_db;
USE comercial_db;

CREATE TABLE SUPPLIERS(
suppliersid INT AUTO_INCREMENT PRIMARY KEY,
	VARCHAR(50),
contacttitle VARCHAR(50),
addres VARCHAR(50),
city VARCHAR(50),
region VARCHAR(50),
postalcode INT,
country VARCHAR(50),
phone INT,
fax INT,
homepage VARCHAR(50)
);

CREATE TABLE CATEGORIES(
categoryid INT AUTO_INCREMENT PRIMARY KEY,
categoryname VARCHAR (50),
description VARCHAR (50),
picture BLOB
);

CREATE TABLE CUSTOMERS(
customerid INT AUTO_INCREMENT PRIMARY KEY,
companyname VARCHAR (50),
contactname VARCHAR (50),
contacttitle VARCHAR (50),
address VARCHAR(50),
city VARCHAR (50),
region VARCHAR (50),
postalcode INT,
country VARCHAR (50),
phone INT,
fax INT
);              

CREATE TABLE SHIPPERS(
shipperid INT AUTO_INCREMENT PRIMARY KEY,
companyname VARCHAR(50),
phone INT
);

CREATE TABLE EMPLOYEES(
employeeid INT AUTO_INCREMENT PRIMARY KEY,
lastname VARCHAR(50),
firstname VARCHAR(50),
title VARCHAR(50),
titleofcourtesy VARCHAR(50),
birtdate DATE,
hiredate DATE,
address VARCHAR(50),
city VARCHAR(50),
region VARCHAR(50),
postalcode INT,
country VARCHAR(50),
homepage VARCHAR(50),
extension VARCHAR(50),
photo LONGBLOB,
notes VARCHAR(50),
reportsto VARCHAR(50)
);
CREATE TABLE ORDERS(
orderid INT AUTO_INCREMENT PRIMARY KEY,
customerid INT,
FOREIGN KEY(customerid)
	REFERENCES CUSTOMERS(customerid),
employeeid INT,
FOREIGN KEY(employeeid)
	REFERENCES EMPLOYEES(employeeid),
shipperid INT,
FOREIGN KEY(shipperid)
	REFERENCES SHIPPERS(shipperid),
orderdate DATE,
requireddate DATE,
shippeddate DATE,
shipvia VARCHAR(50),
freight INT,
shipname VARCHAR(50),
shipaddress VARCHAR(50),
shipcity VARCHAR(50),
shipregion VARCHAR(50),
shippostal_code INT,
shipcountry VARCHAR(50)
);
   

CREATE TABLE PRODUCTS(
productid INT AUTO_INCREMENT PRIMARY KEY,
productname VARCHAR(50),
suplierid INT,
FOREIGN KEY(suplierid)
	REFERENCES SUPPLIERS(suppliersid),
categoryid INT,
FOREIGN KEY(categoryid)
	REFERENCES CATEGORIES(categoryid),
quantityperunit INT,
unitprice INT,
unitsinstock INT,
unitsinorder INT,
reorderlevel INT,
discontinued VARCHAR(50)
);
   


CREATE TABLE ORDERDETAILS(
orderid INT,
FOREIGN KEY(orderid)
	REFERENCES ORDERS(orderid),
productid INT,
FOREIGN KEY(productid)
	REFERENCES PRODUCTS(productid),
unit_price INT,
quantity INT,
discount VARCHAR(50)
);

