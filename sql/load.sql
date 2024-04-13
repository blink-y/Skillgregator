USE skillg;

INSERT INTO Users(user_id, username, email, password, user_type) VALUES
(0, 'JLi', 'jli217@u.rochester.edu', 'PASSWORD', 'learner'),
(1, 'CGrey', 'abc123@gmail.com', 'PASSWORD', 'learner'),
(2, 'EByrnes', 'keyhole233@gmail.com', 'PASSWORD', 'learner'),
(3, 'JHan', 'chief323@gmail.com', 'PASSWORD', 'educator'),
(4, 'EdSall', 'follower332@gmail.com', 'PASSWORD', 'learner'),
(5, 'AMar', 'amarupak@u.rochester.edu', 'PASSWORD', 'admin');

INSERT INTO Learners(learner_id, user_id, full_name, learning_goals, current_skill_level) VALUES
(0, 0, 'Justin Li', 'somethingsomethingsomething', 'Novice'),
(1, 1, 'Charlie Grey', 'Deepening understanding of Chemistry', 'Intermediate'),
(2, 2, 'Erika Byrnes', 'Understanding College-level mathematics', 'Novice'),
(3, 4, 'Edward Sallow', 'Deepening my broad understanding of Roman History', 'Novice');

INSERT INTO Educators(educator_id, user_id, education_background, experience) VALUES
(0, 3, 'Alma mater at Shady Sands Community College, Master''s from Junktown Uni.', '30 years teaching at Tuscon University');

INSERT INTO Admins(user_id) VALUES
(5);

INSERT INTO Skills(skill_id, skill_name, description, category) VALUES
(0, 'Pax Romana', 'The History of Rome at its height', 'History'),
(1, 'Calculus I', 'College-level introductory Calculus', 'Mathematics'),
(2, 'AP Chemistry', 'College-level Introductory Chemistry for high-school students', 'Science');

INSERT INTO Teaching(educator_id, skill_id, price, availability) VALUES
(0, 0, 24.00, '2024-12-05'),
(0, 1, 30.00, '2024-12-06'),
(0, 2, 20.00, '2024-12-07');

INSERT INTO Learning(learner_id, skill_id, preferred_learning_style) VALUES
(0, 1, 'lol lmao'),
(1, 2, 'Practical experiments'),
(2, 1, 'Lecture-style'),
(3, 0, 'Socratic Method');