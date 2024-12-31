<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /index.php");
    exit();
}

include "./templates/header.php";
?>
<div class="container">
    <div class="sidebar">
    <a href="#" onclick="showContent(event, 'about-us')" class="active">About Us</a>
    <a href="#" onclick="showContent(event, 'certificates')">My Certificates</a>
    <a href="#" onclick="showContent(event, 'career-planning')">Career Planning</a>
    <a href="#" onclick="showContent(event, 'videos-books')">Доступ до відео і книг</a>
    <a href="#" onclick="showContent(event, 'my-courses')">Мої курси</a>
    <a href="#" onclick="showContent(event, 'practice-tracking')">Облік практики</a>
</div>


<div class="main-content">
<div id="about-me" class="content-section">
    <h2>About Me</h2>
    <form id="about-me-form" action="save_about_me.php" method="POST" enctype="multipart/form-data">
        <h3>Visible Information (Displayed in Specialist's Card)</h3>
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name" required>
        </div>
        <div class="form-group">
            <label for="clinical_experience">Total Clinical Work Experience:</label>
            <textarea id="clinical_experience" name="clinical_experience" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <div>
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male">Male</label>
            </div>
            <div>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Female</label>
            </div>
            <div>
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Other</label>
            </div>
        </div>
        <div class="form-group">
            <label for="specialization">Specialization (e.g., psychologist, psychotherapist):</label>
            <textarea id="specialization" name="specialization" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="work_areas">Areas of Work (e.g., depression, anxiety, trauma):</label>
            <textarea id="work_areas" name="work_areas" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="photo">Upload Your Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="about_me">About Me:</label>
            <textarea id="about_me" name="about_me" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="video_message">Video Message (URL):</label>
            <input type="url" id="video_message" name="video_message">
        </div>
        <div class="form-group">
            <label for="education">Psychological Education (Institution & Location):</label>
            <textarea id="education" name="education" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="qualification_courses">Qualification Courses:</label>
            <textarea id="qualification_courses" name="qualification_courses" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="relevant_experience">Other Relevant Experience:</label>
            <textarea id="relevant_experience" name="relevant_experience" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="session_language">Session Language:</label>
            <input type="text" id="session_language" name="session_language" required>
        </div>
        <div class="form-group">
            <label for="session_format">Session Format:</label>
            <div>
                <input type="radio" id="online" name="session_format" value="online" required>
                <label for="online">Online</label>
            </div>
            <div>
                <input type="radio" id="in_person" name="session_format" value="in_person">
                <label for="in_person">In-person</label>
            </div>
        </div>

        <h3>Internal Information (Admins/Supervisors Only)</h3>
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
        </div>
        <div class="form-group">
            <label for="other_education">Other Education (Specializations & Degrees):</label>
            <textarea id="other_education" name="other_education" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="professional_societies">Professional Societies or Associations:</label>
            <textarea id="professional_societies" name="professional_societies" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label>Psychology Education and Training Hours:</label>
            <textarea id="education_hours" name="education_hours" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="therapeutic_approaches">Therapeutic Approaches:</label>
            <textarea id="therapeutic_approaches" name="therapeutic_approaches" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="crisis_experience">Crisis Counseling Experience:</label>
            <textarea id="crisis_experience" name="crisis_experience" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="free_response">Free Response (Crisis Support Requirements):</label>
            <textarea id="free_response" name="free_response" rows="6"></textarea>
        </div>

       
        <button type="submit">Save About Me</button>
    </form>
</div>




<div id="career-planning" class="content-section" style="display:none;">
    <h2>Career Planning Questionnaire</h2>
    
    <form id="career-form-step-1" action="save_career_form.php" method="POST">
        <h3>Step 1: Initial Questions</h3>
        <div class="form-group">
            <label for="history">Your History:</label>
            <textarea id="history" name="history" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="expectations">My Expectations:</label>
            <textarea id="expectations" name="expectations" rows="4" required></textarea>
        </div>
        <button type="submit">Submit Step 1</button>
    </form>

 
    <div id="next-forms" style="display:none;">
        <form id="career-form-step-2" action="save_career_form.php" method="POST">
            <h3>Step 2: Goals</h3>
            <div class="form-group">
                <label for="goals">What Do You Want to Achieve?</label>
                <textarea id="goals" name="goals" rows="4" required></textarea>
            </div>
            <button type="submit">Submit Step 2</button>
        </form>
    </div>
</div>


<div id="certificates" class="content-section" style="display:none;">
    <h2>My Certificates</h2>

   
    <form id="certificate-upload-form" action="./php/upload_certificate.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="certificate">Upload Certificate:</label>
            <input type="file" id="certificate" name="certificate" accept=".pdf,.jpg,.jpeg,.png" required>
        </div>
        <button type="submit">Upload Certificate</button>
    </form>

    <h3>Your Uploaded Certificates</h3>
    <div id="uploaded-certificates">
        <?php include './php/certificates.php'; ?>
    </div>
</div>



<!-- Доступ до відео і книг -->
<div id="videos-books" class="content-section" style="display:none;">
            <h2>Доступ до відео і книг</h2>

            <h3>Відео</h3>
            <div id="video-categories">
                <p>Videos grouped by categories will appear here.</p>
            </div>

            <h3>Книги</h3>
            <div id="book-categories">
                <p>Books grouped by categories will appear here.</p>
            </div>

        
            <h3>Налаштування</h3>
            <form id="video-book-settings" action="save_video_book_settings.php" method="POST">
                <label for="frequency">Періодичність отримання:</label>
                <select id="frequency" name="frequency">
                    <option value="daily">Щоденно</option>
                    <option value="weekly">Щотижня</option>
                    <option value="monthly">Щомісяця</option>
                </select>

                <label for="speed">Швидкість отримання:</label>
                <select id="speed" name="speed">
                    <option value="normal">Нормально</option>
                    <option value="fast">Швидко</option>
                </select>

                <button type="submit">Зберегти налаштування</button>
            </form>
        </div>

        <div id="my-courses" class="content-section" style="display:none;">
            <h2>Мої курси</h2>

            <h3>Пройдено</h3>
            <div id="completed-courses">
                <p>List of completed courses will appear here with attached certificates.</p>
            </div>

            <button onclick="showCertificates()">Сертифікати</button>

            <h3>Заплановано</h3>
            <div id="planned-courses">
                <p>Available courses for enrollment will appear here.</p>
                <button>Перейти до корзини</button>
            </div>

            <h3>Налаштування</h3>
            <form id="course-settings" action="save_course_settings.php" method="POST">
                <label for="frequency">Періодичність отримання нових курсів:</label>
                <select id="frequency" name="frequency">
                    <option value="daily">Щоденно</option>
                    <option value="weekly">Щотижня</option>
                    <option value="monthly">Щомісяця</option>
                </select>

                <label for="speed">Швидкість отримання:</label>
                <select id="speed" name="speed">
                    <option value="normal">Нормально</option>
                    <option value="fast">Швидко</option>
                </select>

                <button type="submit">Зберегти налаштування</button>
            </form>
        </div>

        <div id="practice-tracking" class="content-section" style="display:none;">
            <h2>Облік практики</h2>

            <h3>Практика</h3>
            <form id="practice-log-form" action="save_practice_log.php" method="POST">
                <div class="form-group">
                    <label for="lectures-conducted">Проведені лекції:</label>
                    <input type="number" id="lectures-conducted" name="lectures_conducted" min="0">
                </div>
                <div class="form-group">
                    <label for="lectures-attended">Відвідані лекції:</label>
                    <input type="number" id="lectures-attended" name="lectures_attended" min="0">
                </div>
                <div class="form-group">
                    <label for="groups-conducted">Проведені групи:</label>
                    <input type="number" id="groups-conducted" name="groups_conducted" min="0">
                </div>
                <div class="form-group">
                    <label for="supervisions-conducted">Проведені супервізії:</label>
                    <input type="number" id="supervisions-conducted" name="supervisions_conducted" min="0">
                </div>
                <div class="form-group">
                    <label for="supervisions-attended">Відвідані супервізії:</label>
                    <input type="number" id="supervisions-attended" name="supervisions_attended" min="0">
                </div>
                <button type="submit">Зберегти</button>
            </form>

            <h3>Згенерувати документ</h3>
            <button onclick="generateDocument()">Формування документу</button>
        </div>
    </div>


</div>

<div class="logout-container" style="margin-top: 20px; text-align: center;">
    <a href="/test/php/logout.php" class="logout-button">Logout</a>
</div>




<?php include "./templates/footer.php"; ?>
