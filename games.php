<?php require_once('includes/db.php');?>
<?php require_once('includes/header.php');?>


<!-- FORM SOM GEMMER USERS SCORE -->
<div class="container d-flex justify-content-center mb-2">
    <?php
        if(isset($_POST['submit'])){
        $points = mysqli_real_escape_string($conn, $_POST['points']);
        $user = $_SESSION['username'];
            $sql = "UPDATE users SET game_score=$points WHERE username='$user'";
            if ($conn->query($sql) === TRUE) {
                echo "If you are logged in, your score is now saved to your profile.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
    ?>
</div>

<!-- GAME TEXT -->
<div class="container-fluid">
    <div class="row game-text">
        <div class="col-8">
            <h1>The Captain Marvel Game</h1>
            <p>Carol Danvers needs your help to free the skrulls <br>and prevent an intergalactic conflict.
                You need to get <br>one of the infinity stones, the Tesseract, before <br>anyone else.
                But beware, you only <br>have limited time, so do your best!</p>
            
            <!-- MODAL BUTTON -->
            <button type="button" class="button-send mb-3" data-toggle="modal" id="startGame" data-target="#launchGame">
                Start
            </button>

            <!-- GAME TEXT -->
            <p>* The game takes a while to load - please be patient. <br />The game is optimized for desktop use only.</p>

            <!-- MODAL -->
            <div class="modal modal-game fade" id="launchGame" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <canvas id="canvas" height="800" width="800"></canvas>
                    <!-- TIME COUNTER -->
                    <div class="counter">
                        Get the Tesseract before the time runs out! <span id="countdown">01:30</span>.
                    </div>
                    <!-- POINTS COUNTER -->
                    <div class="points">
                        Points: <span class="point-value"></span>
                    </div>
                </div>
            </div>
            
            <!-- MODAL TO SAVE POINTS AFTER GAME -->
            <div class="modal modal-game fade" id="totalScore" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form action="games.php" method="POST">
                        Save your score (*overwrites your recent saved score): <span class="point-value"></span>
                        <input id="scoreInput" type="hidden" name="points" value="" />
                        <input class="button-send" name="submit" type="submit" value="Save"/>
                        <button class="button-send" onclick="location.reload();">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('includes/footer.php');?>