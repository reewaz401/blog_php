CREATE TABLE IF NOT EXISTS User
(
    id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username  VARCHAR(255) NOT NULL,
    password  LONGTEXT NOT NULL,
    email     VARCHAR(255) NOT NULL,
    gender    CHAR(1),
    roles     INT         NOT NULL
);

CREATE TABLE IF NOT EXISTS Post
(
    id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT,
    author  INT NOT NULL,
    image TEXT
);

CREATE TABLE IF NOT EXISTS Comment
(
    id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    post_id INT NOT NULL,
    content TEXT,
    author  INT NOT NULL
);

