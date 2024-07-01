<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1 style="color:green">User List</h1>
 
    <ul>
        <?php foreach ($users as $user) { ?>
            <li><?= $user['username']; ?>
                <a href="edit?id=<?= $user['id'] ?>">Edit</a>
                <a href="delete?id=<?= $user['id'] ?>">Delete</a>
            </li>
        <?php } ?>
    </ul>

    <h2 style="color:orange">Add User</h2>
    <form method="post" action="add">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Add User</button>
    </form>
    
    <h2 style="color:red">search</h2>
        <form method="post" action="search">
        <input type="text" name="search_term" placeholder="searching" required>
        <button type="submit">search</button>
        </form>

        

        <ul>
               <?php if(!empty($susers)){?>
               <?php foreach($susers as $su) {?>
                       <li><?php echo $su['username'];?></li>
                           <?php } ?>
                           <?php } ?>
           </ul>








</body>
</html>
