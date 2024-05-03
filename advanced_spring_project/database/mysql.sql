CREATE DATABASE IF NOT EXISTS job_search;

USE job_search;

CREATE TABLE IF NOT EXISTS job_table(
    job_id INT AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255),
    job_type VARCHAR(100),
    company VARCHAR(255),
    job_description TEXT,
    region VARCHAR(100),
    state VARCHAR(100),
    city VARCHAR(100),
    specialization VARCHAR(255)
);


INSERT INTO job_table (job_title, job_type, company, job_description, region, state, city, specialization) VALUES
    ('Software Engineer', 'regular', 'Google', 'We are looking for a talented Software Engineer', 'West', 'California', 'Mountain View', 'Software Development'),
    ('Data Analyst', 'regular', 'Microsoft', 'Join our team as a Data Analyst and work', 'East', 'Washington', 'Redmond', 'Data Analysis'),
    ('Intern Developer', 'intern', 'Amazon', 'We are seeking interns to work on various software development', 'West', 'California', 'San Francisco', 'Software Development'),
    ('Marketing Manager', 'regular', 'Meta', 'Meta is looking for a skilled Marketing Manager', 'East', 'New York', 'New York City', 'Marketing'),
    ('HR Intern', 'intern', 'Apple', 'Apple is hiring HR Interns', 'West', 'California', 'Cupertino', 'Human Resources'),
    ('Frontend Developer', 'regular', 'Facebook', 'Join our team as a Frontend Developer and work on developing our web pages', 'West', 'California', 'Menlo Park', 'Software Development'),
    ('Data Scientist', 'regular', 'IBM', 'We are seeking a Data Scientist to analyze our data', 'East', 'New York', 'Armonk', 'Data Science'),
    ('Product Manager', 'regular', 'Netflix', 'Netflix is looking for a talented Product Manager', 'West', 'California', 'Los Gatos', 'Product Management'),
    ('UX/UI Designer', 'regular', 'Adobe', 'Adobe is seeking a creative UX/UI Designer to come up with the best UI', 'West', 'California', 'San Jose', 'Design'),
    ('Quality Assurance Tester', 'regular', 'Tesla', 'We are hiring a Quality Assurance Tester', 'West', 'California', 'Palo Alto', 'Quality Assurance'),
    ('Finance Intern', 'intern', 'Goldman Sachs', 'Goldman Sachs is offering internships in finance', 'East', 'New York', 'New York City', 'Finance'),
    ('Software Engineer', 'regular', 'Twitter', 'Twitter is looking for a passionate Software Engineer', 'West', 'California', 'San Francisco', 'Software Development'),
    ('Business Analyst', 'regular', 'Salesforce', 'Join our team as a Business Analyst and help analyze', 'West', 'California', 'San Francisco', 'Business Analysis'),
    ('HR Manager', 'regular', 'LinkedIn', 'LinkedIn is hiring an experienced HR Manager', 'West', 'California', 'Sunnyvale', 'Human Resources'),
    ('Entry Level Software Developer', 'entry_level', 'Facebook', 'Facebook is seeking entry-level Software Developers', 'West', 'California', 'Menlo Park', 'Software Development'),
    ('Entry Level Data Analyst', 'entry_level', 'IBM', 'We are hiring entry-level Data Analysts to assist in analyzing our data', 'East', 'New York', 'Armonk', 'Data Analysis'),
    ('Entry Level Product Manager', 'entry_level', 'Netflix', 'Netflix is looking for entry-level Product Managers ', 'West', 'California', 'Los Gatos', 'Product Management'),
    ('Entry Level UX/UI Designer', 'entry_level', 'Adobe', 'Adobe is seeking entry-level UX/UI Designers ', 'West', 'California', 'San Jose', 'Design'),
    ('Entry Level Quality Assurance Tester', 'entry_level', 'Tesla', 'We are hiring entry-level Quality Assurance Testers to ensure quality of our products', 'West', 'California', 'Palo Alto', 'Quality Assurance'),
    ('Entry Level Finance Analyst', 'entry_level', 'Goldman Sachs', 'Goldman Sachs is offering entry-level Finance Analyst positions', 'East', 'New York', 'New York City', 'Finance'),
    ('Entry Level Software Engineer', 'entry_level', 'Twitter', 'Twitter is looking for entry-level Software Engineers', 'West', 'California', 'San Francisco', 'Software Development'),
    ('Entry Level Business Analyst', 'entry_level', 'Salesforce', 'Join our team as an entry-level Business Analyst and help in analysis', 'West', 'California', 'San Francisco', 'Business Analysis'),
    ('Entry Level HR Coordinator', 'entry_level', 'LinkedIn', 'LinkedIn is hiring entry-level HR Coordinators', 'West', 'California', 'Sunnyvale', 'Human Resources');
