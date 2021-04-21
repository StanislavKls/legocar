CREATE TABLE brands (
    id serial primary key,
    name varchar(255),
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE users (
    id serial primary key,
    name varchar(255),
	password text,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE models (
    id serial primary key,
    name varchar(255),
	brand_id integer references brands(id),
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE cars (
    id serial primary key,
    name varchar(255),
	brand_id integer references brands(id),
	model_id integer references models(id),
	year varchar(255),
	color varchar(255),
	user_id integer references users(id),
    created_at timestamp,
    updated_at timestamp
);
