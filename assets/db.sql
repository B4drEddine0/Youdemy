CREATE DATABASE youdemy;
USE youdemy;

CREATE TABLE users (
    users_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'teacher', 'admin') NOT NULL,
    status varchar(50) DEFAULT 'active'
);


CREATE TABLE categories (
    cat_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE tags (
    tag_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL UNIQUE
);

CREATE TABLE courses (
    courses_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    teacher_id INT,
    category_id INT,
    type ENUM('text', 'video') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES users(users_id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(cat_id) ON DELETE CASCADE
);

CREATE TABLE course_tags (
    courses_id INT,
    tag_id INT,
    PRIMARY KEY (courses_id, tag_id),
    FOREIGN KEY (courses_id) REFERENCES courses(courses_id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(tag_id) ON DELETE CASCADE
);


CREATE TABLE enrollments (
    student_id INT,
    courses_id INT,
    enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (student_id, courses_id),
    FOREIGN KEY (student_id) REFERENCES users(users_id) ON DELETE CASCADE,
    FOREIGN KEY (courses_id) REFERENCES courses(courses_id) ON DELETE CASCADE
);


CREATE TABLE text_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    courses_id INT NOT NULL,
    content TEXT NOT NULL,
    FOREIGN KEY (courses_id) REFERENCES courses(courses_id) ON DELETE CASCADE
);

CREATE TABLE video_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    courses_id INT NOT NULL,
    content varchar(255) NOT NULL,
    FOREIGN KEY (courses_id) REFERENCES courses(courses_id) ON DELETE CASCADE
);



