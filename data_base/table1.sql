drop TABLE if EXISTS instructor;

create TABLE  instructor(
    I_id int(11) NOT NULL,
    issuer_id int(11) NOT NULL ,
    PRIMARY KEY (I_id),
    CONSTRAINT FK_issuer_id FOREIGN KEY (issuer_id) 
    REFERENCES issuer(issuer_id)
);
drop TABLE if EXISTS courses;
create TABLE courses(
    Cid int(11) NOT NULL,
    Cname varchar(15),
    PRIMARY KEY (Cid)
);
drop TABLE if EXISTS teaches;
CREATE TABLE teaches(
    I_id int(11) NOT NULL,
    Cid int(11) NOT NULL,
    PRIMARY KEY (I_id,Cid),
    CONSTRAINT FK_I_id1 FOREIGN KEY (I_id) REFERENCES instructor(I_id),
    CONSTRAINT FK_Cid1 FOREIGN KEY (Cid) REFERENCES courses(Cid)
);
drop TABLE if EXISTS book;
CREATE TABLE book(
    ISBN int(15) not null,
    title varchar(20),
    publisher varchar(25),
    edition int(12),
    ref_flag boolean,
    t_flag boolean,
    PRIMARY KEY (ISBN)
);
drop TABLE if EXISTS refer;
CREATE  TABLE refer(
    ISBN int(15) not null,
    I_id int(11) NOT NULL,
    Cid int(11) NOT NULL,
    PRIMARY key(ISBN,I_id,Cid),
    CONSTRAINT FK_I_id FOREIGN KEY (I_id) REFERENCES instructor(I_id),
    CONSTRAINT FK_Cid FOREIGN KEY (Cid) REFERENCES courses(Cid),
    CONSTRAINT FK_ISBN FOREIGN KEY (ISBN) REFERENCES book(ISBN)

);
drop TABLE if EXISTS tex;
CREATE TABLE tex(
  ISBN int(15) not null,
  I_id int(11) NOT NULL,
  Cid int(11) NOT NULL,
  PRIMARY key(ISBN, I_id, Cid),
    CONSTRAINT FK_I_id2 FOREIGN KEY (I_id) REFERENCES instructor(I_id),
    CONSTRAINT FK_Cid2 FOREIGN KEY (Cid) REFERENCES courses(Cid),
    CONSTRAINT FK_ISBN2 FOREIGN KEY (ISBN) REFERENCES book(ISBN)
);
drop TABLE if EXISTS author;
CREATE TABLE author(
    A_id varchar(15) not null,
    name varchar(20),
    PRIMARY KEY (A_id)
);
drop TABLE if EXISTS written;
CREATE TABLE written(
    A_id varchar(15) not null,
    ISBN int(15) not null,
    PRIMARY KEY (A_id,ISBN),
    CONSTRAINT FK_ISBN3 FOREIGN KEY (ISBN) REFERENCES book(ISBN),
    CONSTRAINT FK_A_id3 FOREIGN KEY (A_id) REFERENCES author(A_id)
);
drop TABLE if EXISTS copy;
CREATE TABLE copy(
    ISBN int(15) not null,
    C_id int(11) NOT NULL,
    purchase_date DATETIME ,
    PRIMARY KEY (C_id, ISBN),
    CONSTRAINT FK_ISBN4 FOREIGN KEY (ISBN) REFERENCES book(ISBN)
    
);
drop TABLE if EXISTS issuer;
CREATE table issuer(
    issuer_id int(11) NOT NULL,
    PRIMARY KEY (issuer_id)
);
drop TABLE if EXISTS issues;
CREATE TABLE issues(
    issuer_id int(11) NOT NULL,
    ISBN int(15) not null,
    C_id int(11) NOT NULL,
    issue_date DATETIME ,
    return_date DATETIME,
    PRIMARY KEY (ISBN,C_id,issuer_id),
    CONSTRAINT FK_issuer_id5 FOREIGN KEY (issuer_id) REFERENCES issuer(issuer_id),
    CONSTRAINT FK_ISBN5 FOREIGN KEY (ISBN) REFERENCES copy(ISBN),
    CONSTRAINT FK_C_id5 FOREIGN KEY (C_id) REFERENCES copy(C_id)
);
drop TABLE if EXISTS univ;
CREATE TABLE univ(
    U_id varchar(15) NOT NULL ,
    U_name varchar(20),
    totalbooks int(200),
    issuer_id int(11) NOT NULL,
    PRIMARY KEY (U_id),
    CONSTRAINT FK_issuer_id6 FOREIGN KEY (issuer_id) REFERENCES issuer(issuer_id)

    
);

drop TABLE if EXISTS students;

create table students(
    Sid varchar(6) NOT null,
    Pass VARCHAR (15) ,
    issuer_id int(11) NOT NULL,
    type int(5),
    PRIMARY KEY (Sid),
    CONSTRAINT FK_issuer_id7 FOREIGN KEY (issuer_id) REFERENCES issuer(issuer_id)
);

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  
  `admin_name` varchar(120) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_pswd` varchar(15) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  PRIMARY KEY (admin_id)
);
