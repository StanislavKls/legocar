<?php

require __DIR__ . './../vendor/autoload.php';

use function Legocar\Migrations\migration;

$sql0 = "CREATE TABLE users (
    id serial primary key,
    name varchar(255),
	password text,
    created_at timestamp,
    updated_at timestamp,
    role varchar(255)
    )";

$sql1 = "CREATE TABLE brands (
    id serial primary key,
    name varchar(255)
    )";

$sql2 = "CREATE TABLE models (
    id serial primary key,
    name varchar(255),
	brand_id integer references brands(id)
    )";


$sql3 = "CREATE TABLE cars (
        id serial primary key,
        brand_id integer references brands(id),
        model_id integer references models(id),
        year varchar(255),
        color varchar(255),
        user_id integer references users(id),
        image_path varchar(255),
        image_size varchar(255),
        created_at timestamp,
        updated_at timestamp
    );";

$sql4 = "INSERT INTO models (name) values ('M5')";
$sql5 = "INSERT INTO models (name) values ('CIVIC')";
$sql6 = "INSERT INTO brands (name) values ('Honda')";
$sql7 = "INSERT INTO brands (name) values ('BMW')";

migration($sql3);
