#Drop DATABASE IF EXISTS simple;
#CREATE DATABASE simple;
USE simple;# MySQL returned an empty result set (i.e. zero rows).

CREATE table Person(name varchar(20) NOT NULL,  primary key(name));# MySQL returned an empty result set (i.e. zero rows).

# Create data
INSERT INTO Person VALUES ('Saul');# 1 row affected.

INSERT INTO Person VALUES ('Quy');# 1 row affected.

INSERT INTO Person VALUES ('Mike');# 1 row affected.

INSERT INTO Person VALUES ('Tony');# 1 row affected.

INSERT INTO Person VALUES ('An');# 1 row affected.

INSERT INTO Person VALUES ('Eddy');# 1 row affected.



