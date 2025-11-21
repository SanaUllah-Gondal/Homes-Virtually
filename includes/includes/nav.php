<nav id="mainNav">
    <ul>
        <li><a href="index.php?page=home" <?= $_GET['page'] === 'home' ? 'class="active"' : '' ?>>Home</a></li>
        <li><a href="index.php?page=features" <?= $_GET['page'] === 'features' ? 'class="active"' : '' ?>>Features</a></li>
        <li><a href="index.php?page=about" <?= $_GET['page'] === 'about' ? 'class="active"' : '' ?>>About</a></li>
        <li><a href="index.php?page=team" <?= $_GET['page'] === 'team' ? 'class="active"' : '' ?>>Team</a></li>
        <li><a href="index.php?page=contact" <?= $_GET['page'] === 'contact' ? 'class="active"' : '' ?>>Contact</a></li>
    </ul>
</nav>