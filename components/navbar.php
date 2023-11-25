<?php
    echo "
    <nav class='navbar navbar-expand-lg bg-body-tertiary'>
        <div class='container-fluid'>
          
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                    <li class='nav-item border border-warning-subtle'>
                        <a class='nav-link active' aria-current='page' href='/BE20_CR5_animal_adoption_ChristianElger/home.php'>Pet-Home</a>
                    </li>";

                    if(isset($_SESSION["user"]) || isset($_SESSION["adm"])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='/BE20_CR5_animal_adoption_ChristianElger/user/logout.php'>Logout</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='/BE20_CR5_animal_adoption_ChristianElger/senior.php'>Senior</a>
                        </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='/BE20_CR5_animal_adoption_ChristianElger/user/update.php'>Update user</a>
                    </li>
                    ";
                    }
                    else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='/BE20_CR5_animal_adoption_ChristianElger/senior.php'>Senior</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='/BE20_CR5_animal_adoption_ChristianElger/user/register.php'>Register</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='/BE20_CR5_animal_adoption_ChristianElger/user/login.php'>Login</a>
                    </li>";
                    
                    }
                    if(isset($_SESSION["adm"])){
                        echo "
                        <li class='nav-item'>
                        <a class='nav-link' href='/BE20_CR5_animal_adoption_ChristianElger/user/dashboard.php'>User-Dashboard</a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='/BE20_CR5_animal_adoption_ChristianElger/adminhome.php'>Admin-Home</a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='/BE20_CR5_animal_adoption_ChristianElger/create.php'>Create new</a>
                        </li>";
                    }
                echo "</ul>
            </div>
        </div>
    </nav>
    ";