USE {database_name};

CREATE TABLE admin(
  user VARCHAR(255) not null primary key,
  password VARCHAR(255) not null primary key
);

INSERT INTO admin({user}, {password});

CREATE TABLE fields(
  tag VARCHAR(255) not null primary key,
  value TEXT not null primary key
);

INSERT INTO fields("sitename", {SITE_NAME});
INSERT INTO fields("enterprise", {ENTERPRISE_TEXT});

CREATE TABLE plans(
  id INT not null auto_increment primary key,
  name TEXT not null,
  description TEXT not null,
  price DOUBLE not null,
  img TEXT not null
);

CREATE TABLE cities(
  id INT not null auto_increment primary key,
  name VARCHAR(255) not null,
  state VARCHAR(255) not null
);

CREATE TABLE cities_plans(
  city_id INT not null,
  plan_id INT not null,
  PRIMARY KEY(city_id, plan_id),
  FOREIGN KEY(city_id) REFERENCES city(id),
  FOREIGN KEY(plan_id) REFERENCES plans(id)
);

CREATE TABLE best_friends(
  cpf VARCHAR(14) not null primary key,
  cod VARCHAR(255) not null,
  name VARCHAR(255) not null,
  phone VARCHAR(255) not null,
  status INT not null default(0)
);