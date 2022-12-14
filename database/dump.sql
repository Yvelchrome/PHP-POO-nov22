CREATE TABLE IF NOT EXISTS User (
    userId INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(256) NOT NULL,
    admin INT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (userId)
);

CREATE TABLE IF NOT EXISTS Post(
    postId INT NOT NULL AUTO_INCREMENT,
    userId INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    creationDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    image VARCHAR(255),
    PRIMARY KEY (postId),
    FOREIGN KEY (userId) REFERENCES User(userId) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Comment(
    commentId INT NOT NULL AUTO_INCREMENT,
    userId INT NOT NULL,
    postId INT NOT NULL,
    content TEXT NOT NULL,
    username VARCHAR(255) NOT NULL,
    creationDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (commentId),
    FOREIGN KEY (userId) REFERENCES User(userId) ON DELETE CASCADE,
    FOREIGN KEY (postId) REFERENCES Post(postId) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Child(
    childId INT NOT NULL AUTO_INCREMENT,
    userId INT NOT NULL,
    postId INT NOT NULL,
    content TEXT NOT NULL,
    username VARCHAR(255) NOT NULL,
    creationDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    commentId INT NOT NULL,
    position INT DEFAULT 0,
    PRIMARY KEY (childId),
    FOREIGN KEY (userId) REFERENCES User(userId) ON DELETE CASCADE,
    FOREIGN KEY (postId) REFERENCES Post(postId) ON DELETE CASCADE,
    FOREIGN KEY (commentId) REFERENCES Comment(commentId) ON DELETE CASCADE
);

INSERT INTO User (username, email, password, admin) VALUES("admin", "admin@gmail.com", "admin", 1);
INSERT INTO User (username, email, password, admin) VALUES("user", "user@gmail.com","user", 0);