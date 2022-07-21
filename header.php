<header>   
    <nav>
        <div class="navigation">
            <a class="navA"  href="#">Navbar</a>
            <div>
                <ul>
                    <li>
                        <a class="navA" href="#">Home</a>
                    </li>
                    <li>
                        <a class="navA"  href="#">Features</>
                    </li>
                    <?php if(empty($_SESSION)){?>
                    <li>
                        <a class="navA"  href="./connexion.php">Connexion</a>
                    </li>
                    <?php }else{?>
                    <li>
                        <a class="navA" href="./connexion.php?deconnexion=true">Deconnexion</a>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav>    
</header>
 
 <style>

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    /* nav */
    li {
    list-style-type: none;
    padding: 0 1rem;
    }

    .navA{
        text-decoration: none;
        color: white;
    }

    .navigation{
        background-color: #593196;
        font-size: 1.5rem;
        display: flex;
        justify-content: space-between;
        padding: 1.5rem;
    }

    ul{
        display: flex;
    }
</style>