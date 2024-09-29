<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevUp</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #343a40; 
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important; 
        }
        .nav-link:hover {
            color: #ffd700 !important; 
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#">DevUp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/user">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/course">Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/ProgrammingLanguage">Programming Languages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/lesson">Lessons</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/question">Questions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/quiz">Quizzes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/answer">Answers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/recommendation">Recommendations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/userProgress">User Progress</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
