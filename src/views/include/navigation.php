<?php
    $active = parse_url($_SERVER['REQUEST_URI'])['path'];
?>
<nav class="sticky">
    <div id="logo">Projekt WAI</div>

    <a class="menu-open">&#9776;</a>
    <div id="menu">
        <ul>
            <li><a href="/" <?php if($active == '/') echo "class='active'"; ?>>Strona Główna</a></li>
            <li id="dropdown-button1">
                <a>Artykuły &#11191;</a>
                <ul id="sub-menu1">
                    <li><a href="#1">Słowem wstępu</a></li>
                    <li><a href="#2">Narzędzia i produktywność</a></li>
                    <li><a href="#3">Postaw na szybkość</a></li>
                    <li><a href="#4">Poradnik korzystania z Internetu</a></li>
                </ul>
            </li>
            <li id="dropdown-button2">
                <a>Galeria &#11191;</a>
                <ul id="sub-menu2">
                    <li><a href="upload"  <?php if($active == '/upload') echo "class='active'"; ?>>Prześlij zdjęcie</a></li>
                    <li><a href="gallery" <?php if($active == '/gallery') echo "class='active'"; ?>>Przeglądaj</a></li>
                    <li><a href="pinned" <?php if($active == '/pinned') echo "class='active'"; ?>>Zapamiętane zdjęcia</a></li>
                </ul>
            </li>
            <li><a href="about" <?php if($active == '/about') echo "class='active'"; ?>>O mnie</a></li>
            <li><a href="contact" <?php if($active == '/contact') echo "class='active'"; ?>>Kontakt</a></li>
            <li><a href="login" <?php if($active == '/login') echo "class='active'"; ?>>Zaloguj się</a></li>
        </ul>
        <a class="menu-close" href="#">&#9932;</a>
    </div>
</nav>