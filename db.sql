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
    FOREIGN KEY (teacher_id) REFERENCES users(users_id),
    FOREIGN KEY (category_id) REFERENCES categories(cat_id)
);

CREATE TABLE course_tags (
    courses_id INT,
    tag_id INT,
    PRIMARY KEY (courses_id, tag_id),
    FOREIGN KEY (courses_id) REFERENCES courses(courses_id),
    FOREIGN KEY (tag_id) REFERENCES tags(tag_id)
);


CREATE TABLE enrollments (
    student_id INT,
    courses_id INT,
    enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (student_id, courses_id),
    FOREIGN KEY (student_id) REFERENCES users(users_id),
    FOREIGN KEY (courses_id) REFERENCES courses(courses_id)
);


CREATE TABLE text_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    courses_id INT NOT NULL,
    content TEXT NOT NULL,
    FOREIGN KEY (courses_id) REFERENCES courses(courses_id)
);

CREATE TABLE video_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    courses_id INT NOT NULL,
    content varchar(255) NOT NULL,
    FOREIGN KEY (courses_id) REFERENCES courses(courses_id)
);




-- Insert test data
-- Insert admin user
INSERT INTO users (username, email, password, role, status) 
VALUES ('admin', 'admin@youdemy.com', 'admin123', 'admin', 'active');

-- Insert teacher
INSERT INTO users (username, email, password, role, status, bio) 
VALUES ('john_teacher', 'teacher@youdemy.com', 'teacher123', 'teacher', 'active', 'Experienced web development instructor');

-- Insert student
INSERT INTO users (username, email, password, role, status) 
VALUES ('mike_student', 'student@youdemy.com', 'student123', 'student', 'active');

-- Insert categories
INSERT INTO categories (name) VALUES
('Web Development'),
('Mobile Development'),
('Data Science'),
('Design');

-- Insert tags
INSERT INTO tags (name) VALUES
('JavaScript'),
('PHP'),
('Python'),
('React'),
('Laravel'),
('UI/UX');