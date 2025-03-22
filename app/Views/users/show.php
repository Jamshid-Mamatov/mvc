<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <p>ID: <?= htmlspecialchars($user['id']) ?></p>
    <p>Name: <?= htmlspecialchars($user['name']) ?></p>
</body>
</html>
