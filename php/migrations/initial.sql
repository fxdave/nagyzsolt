create table users
(
	id int auto_increment
		primary key,
	email varchar(100) null,
	hash varchar(500) null,
	salt varchar(500) null,
	level int null,
	constraint users_email_uindex
		unique (email)
);