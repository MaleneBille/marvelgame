<?php require_once('includes/db.php');?>
<?php require_once('includes/header.php');?>

<!-- HIGHSCORE TABEL -->
<div class="container-fluid">
    <div class="row game-text">
        <div class="col-8">
            <h1 class="game-text">Highscore</h1>
            
            <div class="highscore">
                <?php
                    // HER HENTES GAMESCORE FRA USERS    
                    $sql = "SELECT username, game_score FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // HER ER OUTPUT DATA FOR HVER ROW
                        while($row = $result->fetch_assoc()) {
                            echo "<p>BRUGER: " . $row["username"] ." - SCORE: " . $row["game_score"] . "</p>";
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php require_once('includes/footer.php');?>