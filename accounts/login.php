<?php
    $page = "Login";
    include_once 'partials/account-header.php';
    // $log->info('session', $_SESSION['logged_in']);
    if (isset($_SESSION['account'])) {
        $log->info('account', $_SESSION['account']);
    }
?>


        <div class="wrapper fadeInDown">
          <div id="formContent">
            <!-- Tabs Titles -->
            <div class="titles mt-3">
              <h4>We are <span>Rarity Cars</span></h4>
              <p>Welcome back! Log in and resume.</p>
            </div>

            <!-- Icon -->
            <div class="fadeIn first">
              <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
              <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#5f6368" id="icon"><path d="M480-480.67q-66 0-109.67-43.66Q326.67-568 326.67-634t43.66-109.67Q414-787.33 480-787.33t109.67 43.66Q633.33-700 633.33-634t-43.66 109.67Q546-480.67 480-480.67ZM160-160v-100q0-36.67 18.5-64.17T226.67-366q65.33-30.33 127.66-45.5 62.34-15.17 125.67-15.17t125.33 15.5q62 15.5 127.28 45.3 30.54 14.42 48.96 41.81Q800-296.67 800-260v100H160Zm66.67-66.67h506.66V-260q0-14.33-8.16-27-8.17-12.67-20.5-19-60.67-29.67-114.34-41.83Q536.67-360 480-360t-111 12.17Q314.67-335.67 254.67-306q-12.34 6.33-20.17 19-7.83 12.67-7.83 27v33.33ZM480-547.33q37 0 61.83-24.84Q566.67-597 566.67-634t-24.84-61.83Q517-720.67 480-720.67t-61.83 24.84Q393.33-671 393.33-634t24.84 61.83Q443-547.33 480-547.33Zm0-86.67Zm0 407.33Z"/></svg>
            </div>

            <!-- Login Form -->
            <form action="index.php?page=accounts/signin" method="POST" class="log-in" autocomplete="off">
              <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email" required>
              <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
              <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
              <a class="underlineHover" href="index.php?page=accounts/edit">Edit Password?</a>
            </div>

          </div>
        </div>
        <?php include_once 'partials/other_footer.php';?>
