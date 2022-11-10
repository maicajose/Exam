<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Welcome </h1>
    <h2> Create Task </h2>
  
    <form action="/add" method = "POST">
        @csrf
        <label for="taskName"> Task Name: </label><br>
        <input type="text" id = "taskName" name = "taskName"><br>

        <label for="taskDetails"> Task Details: </label><br>
        <textarea id = "details" name = "details"></textarea><br>

        <label for="created"> Created Date: </label><br>
        <input type="datetime-local" id = "createdDate" name = "createdDate"><br>

        <label for="category"> Category: </label><br>
        <input type="text" id = "category" name = "category"><br>

        <label for="owner"> Owner: </label><br>
        <input type="text" id = "owner" name = "owner"><br><br>
        <input type="submit" value = "Create">
    
    </form>
</body>
</html>