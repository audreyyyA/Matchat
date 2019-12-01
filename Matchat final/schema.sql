create table users (
	id integer auto_increment,
	pseudo varchar(30) not null,
	age integer not null,
	password varchar(255) not null,
	email varchar(100) not null,
	sex varchar(15) not null,
	primary key(id)
);

create table criterion ( --
	id integer auto_increment,
	name varchar(30) not null,
	description varchar(300),
	nameforum varchar(55) not null,
	primary key(id)
);


create table forummessage (
	id integer auto_increment,
	content text not null,
	users_id integer not null,
	criterion_id integer not null,
	primary key(id),
	constraint fk_criterion_forummessage foreign key(criterion_id) references  criterion(id) on delete cascade,
	constraint fk_users_forummessage foreign key(users_id) references  users(id) on delete cascade
);

create table privatemessage(
	id integer auto_increment,
	content text not null,
	sender_id integer not null,
	receiver_id integer not null,
	primary key(id),
	constraint fk_customer_sender_id foreign key(sender_id) references  users(id) on delete cascade,
	constraint fk_customer_receiver_id foreign key(receiver_id) references  users(id) on delete cascade
);

create table friend(
	users_id integer not null,
	friend_id integer not null,
	primary key(users_id,friend_id),
	constraint fk_friend foreign key(friend_id) references users(id),
	constraint fk_users_friend foreign key(users_id) references users(id)
); 

create table link(
	users_id integer not null,
	criterion_id integer not null,
	primary key(criterion_id, users_id),
	constraint fk_criterion_link foreign key(criterion_id) references  criterion(id) on delete cascade,
	constraint fk_users_link foreign key(users_id) references  users(id) on delete cascade
);

create table onforum(
	users_id integer not null,
	criterion_id integer not null,
	primary key(users_id, criterion_id),
	constraint fk_users_onforum foreign key(users_id) references  users(id) on delete cascade,
	constraint fk_criterion_onforum foreign key(criterion_id) references  criterion(id) on delete cascade
);
