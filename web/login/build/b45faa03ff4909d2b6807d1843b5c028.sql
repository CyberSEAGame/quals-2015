drop table 'users';
create table 'users' ( 'id' integer primary key autoincrement, 'name' varchar(20), 'password' varchar(50) );

insert into 'users' ( 'name', 'password' ) values ( 'admin', '2b8a8dc4ee4049d16ca6e5e4e08e1887' );
