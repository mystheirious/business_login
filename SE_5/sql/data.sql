CREATE TABLE painters (
    painter_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    date_of_birth VARCHAR (50),
    art_style TEXT,
    live_painting_skill INT,
    added_by INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_by INT,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE paintings (
    painting_id INT AUTO_INCREMENT PRIMARY KEY,
    painting_name VARCHAR (50),
    canvas_size VARCHAR (50),
    paint_used VARCHAR (50),
    painter_id INT,
    price VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    added_by INT,
    modified_by INT,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE user_passwords (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    email VARCHAR (50),
    contact_number VARCHAR (15),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
