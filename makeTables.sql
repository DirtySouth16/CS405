/*  createTables.sql*/
CREATE TABLE Employee (
		EID INT(6) NOT NULL auto_increment,
		password VARCHAR(20) NOT NULL,
		isManager BOOLEAN NOT NULL DEFAULT 0,
		PRIMARY KEY (EID)
);

CREATE TABLE Item (
		IID INT(10) NOT NULL auto_increment,
		quantity INT NOT NULL,
		price FLOAT NOT NULL,
		name VARCHAR(20),
		PRIMARY KEY (IID)
);

CREATE TABLE Customer (
		CID VARCHAR(254) NOT NULL,
		password VARCHAR(20) NOT NULL,
		isVIP BOOLEAN NOT NULL DEFAULT 0,
		PRIMARY KEY (CID)
);

CREATE TABLE Transactions (
                TID INT(10) NOT NULL auto_increment,
                status VARCHAR(20) NOT NULL,
		total INT NOT NULL,
		tDate date NOT NULL,
		PRIMARY KEY (TID)
);

CREATE TABLE Sale (
		SID INT(10) NOT NULL auto_increment,
		percentage FLOAT,
		startDate date NOT NULL,
		endDate date NOT NULL,
		PRIMARY KEY (SID)

);

CREATE TABLE inCART (
		CID VARCHAR(254) NOT NULL,
		IID INT NOT NULL,
		PRIMARY KEY(CID, IID)
);

CREATE TABLE purchased (
		CID VARCHAR(254) NOT NULL,
		TID INT NOT NULL,
		PRIMARY KEY(CID, TID)
);

CREATE TABLE ordered (
		TID INT NOT NULL,
		IID INT NOT NULL,
		PRIMARY KEY(TID, IID)
);

CREATE TABLE promote (
		EID VARCHAR(20) NOT NULL,
		SID INT NOT NULL,
		PRIMARY KEY(EID, SID)
);

CREATE TABLE onSale (
		IID INT NOT NULL,
		SID INT NOT NULL,
		PRIMARY KEY(IID,SID)
);
*/
